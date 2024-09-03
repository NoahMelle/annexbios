<?php
    require_once './core/check_api_token.php';

    if(isset($validToken) && $validToken === true && isset($currect_location_id)) {
        // Initialize default values
        $movie_id = null;

        if (!empty($_GET['view'])) {
            $view = explode("/", htmlspecialchars($_GET['view'], ENT_QUOTES, 'UTF-8'));

            // Validate and assign movie_id if present
            if (!empty($view[3]) && ($view[3] === 'null' || validate_integer($view[3]))) {
                $movie_id = $view[3] === 'null' ? null : (int)$view[3];
            }
        }

        if(!isset($movie_id)) {
            $stmt = $con->prepare("SELECT id, movie_id, place_data, play_time FROM location_movie_data WHERE location_id = ?");
            $stmt->bind_param("i", $currect_location_id);
        } else {
            $stmt = $con->prepare("SELECT id, movie_id, place_data, play_time FROM location_movie_data WHERE movie_id = ? AND location_id = ?");
            $stmt->bind_param("ii", $movie_id, $currect_location_id);
        }

        // Execute the statement
        $stmt->execute();

        $result = $stmt->get_result();
        $data = [];
        $id = 0;

        // Fetch and process results
        while ($row = $result->fetch_assoc()) {
            $place_data = json_decode($row["place_data"], true);
            
            $data[$id] = [
                "id" => $row["id"],
                "movie_id" => $row["movie_id"],
                "play_time" => $row["play_time"],
                "plays_this_week" => isThisWeek($row["play_time"]),
                "plays_today" => isToday($row["play_time"]),
                "place_data" => []
            ];

            if (isset($place_data["places"])) {
                foreach ($place_data["places"] as $place) {
                    $data[$id]["place_data"][] = [
                        "place" => $place["place"],
                        "available" => $place["available"]
                    ];
                }
            }

            $id++;
        }

        // Output the JSON-encoded data
        echo json_encode($data);
    }
?>