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

include "./model/cms/cms_global.php";

// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        die("Invalid CSRF token.");
    }

    $action = $view[2] ?? null;


    if (isset($action) && $action === 'wijzig') {
        if (!isset($_POST['id']) || !validate_integer($_POST['id'])) {
            return;
        }

        include "./model/cms/users/edit_user.php";

        $editProperty = $view[3];
        $userId = $_POST['id'];

        if (!isset($editProperty)) {
            return;
        }

        switch ($editProperty) {
            case 'gebruikersnaam':
                if (isset($_POST['edit-username'])) {
                    updateUsername($con, $userId, $_POST['edit-username']);
                    header("location: " . $env["BASEURL"] . "cms/gebruikers/wijzig/" . $userId);
                }
                break;
            case 'wachtwoord':
                if (isset($_POST['edit-password'])) {
                    updatePassword($con, $userId, $_POST['edit-password']);
                    header("location: " . $env["BASEURL"] . "cms/gebruikers/wijzig/" . $userId);
                }
                break;
            case 'permissies':
                if (isset($_POST['permissions'])) {
                    updatePermissions($con, $userId, $_POST['permissions']);
                    header("location: " . $env["BASEURL"] . "cms/gebruikers/wijzig/" . $userId);
                }
                break;
        }
    } else if (isset($_POST['add-user-submit'])) {

        include "./model/cms/users/add_user.php";

        $addUserResult = addUser($con, $_POST['username'], $_POST['password'], $_POST['permissions']);
        $addUserSuccess = $addUserResult['success'] ?? false;
        $data = array_merge($data, $addUserResult['data']);

        if ($addUserSuccess) {
            $data['add_user_success'] = true;
        }
    } else if (isset($_POST['delete-user-submit']) && isset($_POST['delete-user-id'])) {

        include "./model/cms/users/delete_user.php";

        $data = array_merge($data, deleteUser($con, $_POST['delete-user-id'], $env));
    }
}


if (isset($view[2]) && $view[2] === 'wijzig' && isset($view[3]) && validate_integer($view[3])) {
    $data["id"] = $view[3];

    $stmt = $con->prepare("SELECT username FROM user_data WHERE user_id = ?;");
    $stmt->bind_param("i", $view[3]);
    $stmt->bind_result($username);
    $stmt->execute();
    $stmt->fetch();
    $stmt->close();

    $activatedPermissions = [];

    $stmt = $con->prepare("SELECT admin_header_pages_data.id FROM admin_header_pages_data LEFT JOIN user_page_permission_link ON admin_header_pages_data.id = user_page_permission_link.page_id WHERE user_page_permission_link.user_id = ?;");
    $stmt->bind_param("i", $view[3]);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $activatedPermissions[] = $row["id"];
        }
    } else {
        http_response_code(404);
        die("User not found.");
    }

    $activatedPermissionChecked = [];

    foreach (fetchAvailablePermissions($con) as $permission) {
        $activatedPermissionChecked[] = [
            "checked" => in_array($permission["id"], $activatedPermissions) ? 'checked' : '',
            "id" => $permission["id"],
            "title" => $permission["title"]
        ];
    }

    $data["username"] = $username;
    $data["activated_permissions"] = $activatedPermissionChecked;
}

// Function to get users and their permissions
function fetchUsers($con)
{
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
function fetchAvailablePermissions($con)
{
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

function checkIfUserAlreadyExists($con, $username)
{
    $stmt = $con->prepare("SELECT user_id FROM user_data WHERE username = ?;");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result->num_rows > 0;
}

function validateUsername($username, $con)
{
    $usernameRegex = "/^[a-zA-Z0-9_]{3,255}$/"; // 3-255 characters, letters, numbers, underscores

    $isUsernameValid = preg_match($usernameRegex, $username);

    if (!$isUsernameValid) {
        return [
            'username_error' => "Gebruikersnaam moet tussen de 3 en 255 karakters lang zijn en mag alleen letters, cijfers en underscores bevatten.",
            'success' => false,
        ];
    }

    if (checkIfUserAlreadyExists($con, $username) === true) {
        return [
            'username_error' => "Gebruiker bestaat al.",
            'success' => false,
        ];
    }

    return [
        'username' => $username,
        'success' => true,
    ];
}

function validatePassword($password)
{
    $passwordRegex = "/^(?=.*[A-Za-z])(?=.*[0-9])[A-Za-z0-9!@#$%^&*]{8,}$/"; // At least 8 characters, 1 letter, 1 number

    if (!preg_match($passwordRegex, $password)) {
        return [
            'password_error' => "Wachtwoord moet minimaal 8 karakters lang zijn en minimaal 1 letter, 1 cijfer bevatten, en alleen de speciale karakters !@#$%^&*.",
            'success' => false,
        ];
    }

    return [
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'success' => true,
    ];
}


function validatePermissions($permissions, $con)
{
    $permissions = array_map('intval', array_unique(array_filter($permissions, 'is_numeric')));

    $availablePermissions = array_map(function ($permission) {
        return $permission['id'];
    }, fetchAvailablePermissions($con));
    $validPermissions = array_filter($permissions, function ($permission) use ($availablePermissions) {
        return in_array($permission, $availablePermissions);
    });

    if (empty($validPermissions)) {
        return [
            'permissions_error' => "Selecteer minimaal één permissie.",
            'success' => false,
        ];
    }

    return [
        'permissions' => $validPermissions,
        'success' => true,
    ];
}

$data['users'] = fetchUsers($con);
$data['available_perms'] = fetchAvailablePermissions($con);
