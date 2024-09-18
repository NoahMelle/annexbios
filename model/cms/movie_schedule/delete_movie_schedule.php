<?php

function deleteMovieSchedule($con, $locationMovieId)
{
    try {
        $con->begin_transaction();

        $stmt = $con->prepare("DELETE FROM location_movie_data WHERE location_movie_id = ?;");
        $stmt->bind_param("i", $locationMovieId);
        $stmt->execute();
        $stmt->close();

        $con->commit();

        return ['success' => true];
    } catch (Exception $e) {
        $con->rollback();
        return ['success' => false, 'error' => "Er is iets fout gegaan bij het verwijderen van de film. Probeer het opnieuw."];
    }
}

?>