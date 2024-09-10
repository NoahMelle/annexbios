<?php
// Set initial data
$data = [
    'page_title' => "Gebruikers",
    'base_url' => $env['BASEURL'],
    'users_active' => true,
    'styles' => ['users.css'],
    'js' => ['users.js'],
    'current_url' => $_SERVER['REQUEST_URI'],
];

// Function to get users and their permissions
function fetchUsers($con) {
    $stmt = $con->prepare("
        SELECT u.user_id, u.superuser, u.username, GROUP_CONCAT(p.title) AS permissions, u.last_login 
        FROM user_data u 
        LEFT JOIN user_page_permission_link up ON u.user_id = up.user_id 
        LEFT JOIN admin_header_pages_data p ON up.page_id = p.id 
        GROUP BY u.user_id
    ");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $users = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $permissions = $row['permissions'] ? explode(",", $row['permissions']) : ($row['superuser'] ? ["Superuser"] : ["Geen permissies"]);
            $users[] = [
                'username' => $row['username'],
                'last_login' => $row['last_login'],
                'permissions' => $permissions,
                'id' => $row['user_id']
            ];
        }
    }
    return $users;
}

// Function to get available permissions
function fetchAvailablePermissions($con) {
    $stmt = $con->prepare("SELECT id, title FROM admin_header_pages_data WHERE is_permission = 1");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $available_perms = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $available_perms[] = [
                'title' => $row['title'],
                'id' => $row['id']
            ];
        }
    }
    return $available_perms;
}

// Add new user
function addUser($con, $env) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $permissions = array_map('intval', array_filter($_POST['permissions'], 'is_numeric'));

    // Define regex patterns (same as the javascript patterns)
    $passwordRegex = "/^(?=.*[A-Za-z])(?=.*[0-9])[A-Za-z0-9!\"#$%&'()*+,.\/-]{8,}$/"; // At least 8 characters, 1 letter, 1 number
    $usernameRegex = "/^[a-zA-Z0-9_]{3,255}$/"; // 3-255 characters, letters, numbers, underscores

    if (!preg_match($passwordRegex, $_POST['password'])) {
        return ['password_error' => "Wachtwoord moet minimaal 8 karakters lang zijn en minimaal 1 letter en 1 cijfer bevatten."];
    }

    if (!preg_match($usernameRegex, $username)) {
        return ['username_error' => "Gebruikersnaam moet tussen de 3 en 255 karakters lang zijn en mag alleen letters, cijfers en underscores bevatten."];
    } else if (checkIfUserAlreadyExists($con, $username) === true) {
        return ['username_error' => "Gebruiker bestaat al."];
    } else {
        $data['entered_username'] = $username;
        $data['username_error'] = "";
    }

    if (count($permissions) === 0) {
        return ['permissions_error' => "Selecteer minimaal één permissie."];
    }

    try {
        // Start transaction, automatically rolls back if error occurs
        $con->begin_transaction();
        $stmt = $con->prepare("INSERT INTO user_data (username, password, cms_access) VALUES (?, ?, true);");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $new_user_id = $con->insert_id;
        $stmt->close();

        $stmt = $con->prepare("INSERT INTO user_page_permission_link (page_id, user_id) VALUES (?, ?);");
        foreach ($permissions as $permission) {
            $stmt->bind_param("ii", $permission, $new_user_id);
            $stmt->execute();
        }
        $stmt->close();
        $con->commit();

        return ['success' => true];

    } catch (Exception $e) {
        // Revert to previous state
        $con->rollback();
        return ['error' => "Er is iets fout gegaan bij het toevoegen van de gebruiker. Probeer het opnieuw."];
    }
}

function deleteUser($con, $user_id, $env) {
    try {
        $stmt = $con->prepare("DELETE FROM user_data WHERE user_id = ?;");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->close();
    } catch (Exception $e) {
        return ['error' => "Er is iets fout gegaan bij het verwijderen van de gebruiker. Probeer het opnieuw."];
    }
    header("Location: " . $env['BASEURL'] . "cms/gebruikers");
    exit;
}

function checkIfUserAlreadyExists($con, $username) {
    $stmt = $con->prepare("SELECT user_id FROM user_data WHERE username = ?;");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result->num_rows > 0;
}

// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['add-user-submit'])) {
        $addUserResult = addUser($con, $env);
        $addUserSuccess = $addUserResult['success'] ?? false;

        if ($addUserSuccess) {
            $data['entered_username'] = $_POST['username'];
            $data['entered_password'] = $_POST['password'];
            $data['add_user_success'] = true;
        } else {
            $data['username'] = $_POST['username']; // Keep username in input field when transaction fails
            $data = array_merge($data, $addUserResult);
        }
    } else if (isset($_POST['delete-user-submit']) && isset($_POST['delete-user-id'])) {
        $data = array_merge($data, deleteUser($con, $_POST['delete-user-id'], $env));
    }
}

$data['users'] = fetchUsers($con);
$data['available_perms'] = fetchAvailablePermissions($con);

include "./model/cms/cms_global.php";
?>