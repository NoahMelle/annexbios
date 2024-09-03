<?php
    require_once './db_connect.php';

    if(isset($_GET["movie_id"]) && isset($_GET["location_id"]) && validate_integer($_GET["movie_id"]) && validate_integer($_GET["location_id"])) {
        // Case when both movie_id and location_id are set
        $stmt = $con->prepare("SELECT location_movie_data.id, location_movie_data.location_id, location_movie_data.place_data, location_movie_data.play_time, location_data.name FROM location_movie_data JOIN location_data ON location_movie_data.location_id = location_data.location_id WHERE location_movie_data.movie_id = ? AND location_movie_data.location_id = ?;");
        $stmt->bind_param("ii", $_GET["movie_id"], $_GET["location_id"]);
    } else if(isset($_GET["movie_id"]) && validate_integer($_GET["movie_id"])) {
        // Case when only movie_id is set
        $stmt = $con->prepare("SELECT location_movie_data.id, location_movie_data.location_id, location_movie_data.place_data, location_movie_data.play_time, location_data.name FROM location_movie_data JOIN location_data ON location_movie_data.location_id = location_data.location_id WHERE location_movie_data.movie_id = ?;");
        $stmt->bind_param("i", $_GET["movie_id"]);
    } else if(isset($_GET["location_id"]) && validate_integer($_GET["location_id"])) {
        // Case when only location_id is set
        $stmt = $con->prepare("SELECT location_movie_data.id, location_movie_data.location_id, location_movie_data.place_data, location_movie_data.play_time, location_data.name FROM location_movie_data JOIN location_data ON location_movie_data.location_id = location_data.location_id WHERE location_movie_data.location_id = ?;");
        $stmt->bind_param("i", $_GET["location_id"]);
    } else {
        // Case when neither movie_id nor location_id is set
        $stmt = $con->prepare("SELECT location_movie_data.id, location_movie_data.location_id, location_movie_data.place_data, location_movie_data.play_time, location_data.name FROM location_movie_data JOIN location_data ON location_movie_data.location_id = location_data.location_id;");
    }
    
    $stmt->execute();
    
    $result = $stmt->get_result();
    $data = [];
    $id = 0;

    while ($row = $result->fetch_assoc()) {
        $data[$id] = [
            "id" => $row["id"],
            "location" => [
                "id" => $row["location_id"],
                "name" => $row["name"]
            ],
            "play_time" => $row["play_time"],
            "plays_this_week" => isThisWeek($row["play_time"]),
            "plays_today" => isToday($row["play_time"]),
            "place_data" => []
        ];
        
        $place_data = json_decode($row["place_data"], true);
        foreach($place_data["places"] as $place) {
            $data[$id]["place_data"][] = [
                "place" => $place["place"],
                "available" => $place["available"]
            ];
        }

        $id++;
    }

    echo json_encode($data);
?>