<?php

// Add new user, returns success boolean and data for mustache
function addUser($con, $username, $password, $permissions)
{
    $data = [];
    $valid = true;

    // Validation functions
    $validationFunctions = [
        'username' => validateUsername($username, $con),
        'password' => validatePassword($password),
        'permissions' => validatePermissions($permissions, $con)
    ];

    // Loop through each validation and update $data and $valid
    foreach ($validationFunctions as $key => $result) {
        if (!$result['success']) {
            $data["{$key}_error"] = $result["{$key}_error"];
            $valid = false;
        } else {
            if ($key === 'password') {
                $hashedPassword = $result['password'];
            }
            if ($key === 'permissions') {
                $permissions = $result['permissions'];
            }
        }
    }

    if ($valid) {
        try {
            $con->begin_transaction();

            // Insert user data
            $stmt = $con->prepare("INSERT INTO user_data (username, password, cms_access) VALUES (?, ?, true);");
            $stmt->bind_param("ss", $username, $hashedPassword);
            $stmt->execute();
            $new_user_id = $con->insert_id;
            $stmt->close();

            // Insert permissions
            $stmt = $con->prepare("INSERT INTO user_page_permission_link (page_id, user_id) VALUES (?, ?);");
            foreach ($permissions as $permission) {
                $stmt->bind_param("ii", $permission, $new_user_id);
                $stmt->execute();
            }
            $stmt->close();
            $con->commit();

            return ['success' => true, 'data' => ['entered_username' => $username, 'entered_password' => $password]];
        } catch (Exception $e) {
            $con->rollback();
            return ['success' => false, 'error' => "Er is iets fout gegaan bij het toevoegen van de gebruiker. Probeer het opnieuw."];
        }
    }

    return ['success' => false, 'data' => $data];
}
