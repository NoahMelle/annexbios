<?php
    require_once './core/check_api_token.php';

    // Function to return error messages in the desired format
    function returnError($message, $status_code = 500) {
        return [
            'success' => false,
            'error_message' => $message,
            'status_code' => $status_code
        ];
    }

    // Initialize response array
    $response = [];

    // Check if API token is valid and location ID is set
    if (isset($validToken) && $validToken === true && isset($current_location_id)) {
        // Initialize default values
        $movie_id = null;

        // Check if 'view' parameter is present in the GET request
        if (!empty($_GET['view'])) {
            $view = explode("/", htmlspecialchars($_GET['view'], ENT_QUOTES, 'UTF-8'));

            // Validate and assign movie_id if present
            if (!empty($view[3])) {
                if(validate_integer($view[3])) {
                    $movie_id = (int)$view[3];
                } else {
                    $response = returnError("Invalid movie ID", 400);
                    echo json_encode($response);
                    exit();
                }
            }
        }

        // Prepare the SQL query based on the presence of movie_id and admin status
        if (!isset($movie_id)) {
            // Prepare query for fetching movie data based on the user type
            if (isset($tokenIsAdmin) && $tokenIsAdmin === true) {
            $stmt = $con->prepare("SELECT location_movie_id, movie_id, place_data, play_time FROM location_movie_data WHERE play_time >= CURDATE();");
            } else {
            $stmt = $con->prepare("SELECT location_movie_id, movie_id, place_data, play_time FROM location_movie_data WHERE location_id = ? AND play_time >= CURDATE();");
            $stmt->bind_param("i", $current_location_id);
            }
        } else {
            // Prepare query for fetching specific movie data
            if (isset($tokenIsAdmin) && $tokenIsAdmin === true) {
            $stmt = $con->prepare("SELECT location_movie_id, movie_id, place_data, play_time FROM location_movie_data WHERE movie_id = ? AND play_time >= CURDATE();");
            $stmt->bind_param("i", $movie_id); 
            } else {
            $stmt = $con->prepare("SELECT location_movie_id, movie_id, place_data, play_time FROM location_movie_data WHERE movie_id = ? AND location_id = ? AND play_time >= CURDATE();");
            $stmt->bind_param("ii", $movie_id, $current_location_id);
            }
        }

        // Execute the statement
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $data = [];
            $id = 0;

            // Check if no data is found
            if ($result->num_rows === 0) {
                $response = returnError("No data found", 404);
                echo json_encode($response);
                exit();
            }

            // Fetch and process results
            while ($row = $result->fetch_assoc()) {
                $place_data = json_decode($row["place_data"], true);

                $data[$id] = [
                    "location_movie_id" => $row["location_movie_id"],
                    "movie_id" => $row["movie_id"],
                    "play_time" => $row["play_time"],
                    "plays_this_week" => isThisWeek($row["play_time"]),
                    "plays_today" => isToday($row["play_time"]),
                    "place_data" => []
                ];

                if (isset($place_data)) {
                    foreach ($place_data as $place) {
                        $data[$id]["place_data"][] = [
                            "place" => $place["place"],
                            "available" => $place["available"]
                        ];
                    }
                }

                $id++;
            }

            // Output the JSON-encoded data with success response
            echo json_encode([
                'success' => true,
                'data' => $data,
                'status_code' => 200
            ]);
        } else {
            // Return error if query execution fails
            $response = returnError("Database query failed", 500);
            echo json_encode($response);
            exit();
        }
    } else {
        // Return error if the API token is invalid or missing, or location ID is not set
        $response = returnError("Invalid or missing API token, or location ID not set", 403);
        echo json_encode($response);
        exit();
    }
?>