<?php

// Functions to update user data

function updateUsername($con, $id, $username)
{
    $validateUsernameResult = validateUsername($username, $con);
    if ($validateUsernameResult['success']) {
        $stmt = $con->prepare("UPDATE user_data SET username = ? WHERE user_id = ?;");
        $stmt->bind_param("si", $username, $id);
        $stmt->execute();
        $stmt->close();
    }
}

function updatePassword($con, $id, $password)
{
    $validatePasswordResult = validatePassword($password);
    if ($validatePasswordResult['success']) {
        $stmt = $con->prepare("UPDATE user_data SET password = ? WHERE user_id = ?;");
        $stmt->bind_param("si", $validatePasswordResult['password'], $id);
        $stmt->execute();
        $stmt->close();
    }
}

function updatePermissions($con, $id, $permissions)
{
    $validatePermissionsResult = validatePermissions($permissions, $con);
    if ($validatePermissionsResult['success']) {
        $stmt = $con->prepare("DELETE FROM user_page_permission_link WHERE user_id = ?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        $stmt = $con->prepare("INSERT INTO user_page_permission_link (page_id, user_id) VALUES (?, ?);");
        foreach ($validatePermissionsResult['permissions'] as $permission) {
            $stmt->bind_param("ii", $permission, $id);
            $stmt->execute();
        }
        $stmt->close();
    }
}

?>