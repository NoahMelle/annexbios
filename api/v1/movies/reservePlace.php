<?php
require_once './core/check_api_token.php';

$response = [
    "error" => true,
    "message" => "An error occurred"
];

if(isset($validToken) && $validToken === true && isset($currect_location_id)) {
    // Ensure that the request method is POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Read the raw POST input and decode the JSON
        $inputData = json_decode(file_get_contents("php://input"), true);

        // Check if the required fields exist
        if (isset($inputData['movie_id'], $inputData['place_id'], $inputData['name'], $inputData['email'])) {
            $movie_id = mes($inputData['movie_id']);
            $place_id = mes($inputData['place_id']);
            $name = mes($inputData['name']);
            $email = mes($inputData['email']);

            // Validate inputs
            if (validate_integer($currect_location_id) && validate_integer($movie_id) && validate_integer($place_id)) {
                // Proceed if all inputs are valid
                $stmt = $con->prepare("SELECT place_data FROM location_movie_data WHERE location_movie_id = ? AND location_id = ?");
                $stmt->bind_param("ii", $movie_id, $currect_location_id);
                $stmt->execute();
                $stmt->bind_result($place_data);
                $stmt->fetch();
                $stmt->close();

                if ($place_data) {
                    $place_data = json_decode($place_data, true);

                    $place_exist = false;
                    foreach ($place_data as $place) {
                        if ($place["place"] == $place_id) {
                            $place_exist = true;
                            if ($place["available"] == true) {
                                $place["available"] = false;
                                $place["name"] = $name;
                                $place["email"] = $email;
                                $new_place_data = json_encode($place_data);

                                // Update the place data
                                $stmt = $con->prepare("UPDATE location_movie_data SET place_data = ? WHERE location_movie_id = ? AND location_id = ?");
                                $stmt->bind_param("sii", $new_place_data, $movie_id, $currect_location_id);
                                if ($stmt->execute()) {
                                    $response["error"] = false;
                                    $response["message"] = "Place reserved successfully";
                                } else {
                                    $response["message"] = "Failed to reserve place";
                                }
                                $stmt->close();
                            } else {
                                $response["message"] = "Place is already reserved";
                            }
                            break;
                        }
                    }

                    if (!$place_exist) {
                        $response["message"] = "Place does not exist";
                    }
                } else {
                    $response["message"] = "No place data found, ensure the movie ID and location are correct";
                }
            } else {
                $response["message"] = "Invalid POST parameters";
            }
        } else {
            $response["message"] = "Required POST parameters are not set";
        }
    } else {
        $response["message"] = "Invalid request method";
    }
}

echo json_encode($response);
?>