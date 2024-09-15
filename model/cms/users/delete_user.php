<?php

function deleteUser($con, $user_id, $env)
{
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

?>