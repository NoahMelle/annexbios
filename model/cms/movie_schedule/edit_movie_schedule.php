<?php

function editMovieSchedule($con, $movieId, $locationId, $placeData, $playTime, $id)
{

    $data = [];
    $valid = true;

    $validationFunctions = [
        'movie_id' => validate_integer($movieId),
        'location_id' => validate_integer($locationId),
        'place_data' => validate_integer($placeData),
    ];

    foreach ($validationFunctions as $key => $result) {
        if ($result === false) {
            $data["{$key}_error"] = $result["{$key}_error"];
            $valid = false;
        }
    }

    if ($valid) {
        $placeData = generatePlaceData($placeData);

        try {
            $con->begin_transaction();

            $stmt = $con->prepare("UPDATE location_movie_data SET movie_id = ?, location_id = ?, place_data = ?, play_time = ? WHERE location_movie_id = ?;");
            $stmt->bind_param("iissi", $movieId, $locationId, $placeData, $playTime, $id);
            $stmt->execute();
            $stmt->close();

            $con->commit();

            return ['success' => true, 'data' => ['entered_movie_id' => $movieId, 'entered_location_id' => $locationId, 'entered_place_data' => $placeData, 'entered_play_time' => $playTime]];
        } catch (Exception $e) {
            $con->rollback();
            return ['success' => false, 'error' => "Er is iets fout gegaan bij het wijzigen van de film. Probeer het opnieuw."];
        }
    }

    return ['success' => false, 'data' => $data];
}

?>