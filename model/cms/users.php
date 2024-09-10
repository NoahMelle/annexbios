<?php
    $data = [
        'page_title' => "Gebruikers",
        'base_url' => $env['BASEURL'],
        'users_active' => true,
        'styles' => ['users.css'],
        'js' => ['users.js'],
        'current_url' => $_SERVER['REQUEST_URI'],
    ];

    $stmt = $con->prepare("SELECT username, last_login, user_id FROM user_data");
    $stmt->bind_result($username, $last_login, $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data['users'][] = [
                'username' => $row['username'],
                'last_login' => $row['last_login'],
                'id' => $row['user_id']
            ];
        }
    }

    include "./model/cms/cms_global.php";

    $stmt = $con->prepare("SELECT id, title FROM admin_header_pages_data WHERE url <> 'gebruikers';");
    $stmt->bind_result($id, $title);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data['available_perms'][] = [
                'title' => $row['title'],
                'id' => $row['id']
            ];
        }
    }

    // Logic for POST request

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['add-user-submit'])) {
            if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['permissions'])) {
                $username = $_POST['username'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $permissions = $_POST['permissions'];

                $passwordRegex = "/^(?=.*[A-Za-z])(?=.*[0-9])[A-Za-z0-9!\"#$%&'()*+,.\/-]{8,}$/";
                $usernameRegex = "/^[a-zA-Z0-9_]{3,255}$/";


                if (preg_match($passwordRegex, $password) === 0) {
                    $data['password_error'] = "Wachtwoord moet minimaal 8 karakters lang zijn en minimaal 1 letter en 1 cijfer bevatten.";
                }

                if (preg_match($usernameRegex, $username) === 0) {
                    $data['username_error'] = "Gebruikersnaam moet tussen de 3 en 255 karakters lang zijn en mag alleen letters, cijfers en underscores bevatten.";
                }

                $permissions = array_filter($permissions, 'is_numeric');
                $permissions = array_map('intval', $permissions);

                if (count($permissions) === 0) {
                    $data['permissions_error'] = "Selecteer minimaal één permissie.";
                }

                if (isset($data['password_error']) || isset($data['username_error']) || isset($data['permissions_error'])) {
                    $data['username'] = $username;
                    $data['permissions'] = $permissions;
                } else {
                    try {
                        $stmt = $con->prepare("INSERT INTO user_data (username, password, cms_access) VALUES (?, ?, true);");
                        $stmt->bind_param("ss", $username, $password);
                        $stmt->execute();
                        $new_user_id = $con->insert_id;
                        $stmt->close();
    
                        foreach ($permissions as $permission) {
                            $stmt = $con->prepare("INSERT INTO user_page_permission_link (page_id, user_id) VALUES (?, ?);");
                            $stmt->bind_param("ii", $permission, $new_user_id);
                            $stmt->execute();
                            $stmt->close();
                        }
    
                        header("Location: " . $env['BASEURL'] . "cms/gebruikers");
                    } catch (Exception $e) {

                        $data['error'] = "Er is iets fout gegaan bij het toevoegen van de gebruiker. Probeer het opnieuw.";
                    }
                }
            }
        } else if (isset($_POST['delete-user-submit'])) {
            if (isset($_POST['delete-user-id'])) {
                $user_id = $_POST['delete-user-id'];

                try {
                    $stmt = $con->prepare("DELETE FROM user_data WHERE user_id = ?;");
                    $stmt->bind_param("i", $user_id);
                    $stmt->execute();
                    $stmt->close();
                } catch (Exception $e) {
                    $data['error'] = "Er is iets fout gegaan bij het verwijderen van de gebruiker. Probeer het opnieuw.";
                }
                header("Location: " . $env['BASEURL'] . "cms/gebruikers");
            }
        }
    }
?>