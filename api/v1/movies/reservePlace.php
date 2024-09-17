<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

require_once './core/check_api_token.php';

function returnError($message, $status_code = 500) {
    return [
        'success' => false,
        'error_message' => $message,
        'status_code' => $status_code
    ];
}

$response = [];

if (isset($validToken) && $validToken === true && isset($current_location_id)) {
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
            if (validate_integer($current_location_id) && validate_integer($movie_id) && validate_integer($place_id)) {
                // Proceed if all inputs are valid
                $stmt = $con->prepare("SELECT place_data FROM location_movie_data WHERE location_movie_id = ? AND location_id = ?");
                $stmt->bind_param("ii", $movie_id, $current_location_id);
                $stmt->execute();
                $stmt->bind_result($place_data);
                $stmt->fetch();
                $stmt->close();

                if ($place_data) {
                    $place_data = json_decode($place_data, true);

                    $place_exist = false;
                    foreach ($place_data as &$place) { // Pass by reference to modify in-place
                        if ($place["place"] == $place_id) {
                            $place_exist = true;
                            if ($place["available"] == true) {
                                // Mark the place as reserved and update data
                                $place["available"] = false;
                                $place["name"] = $name;
                                $place["email"] = $email;
                                $new_place_data = json_encode($place_data);

                                // Update the place data in the database
                                $stmt = $con->prepare("UPDATE location_movie_data SET place_data = ? WHERE location_movie_id = ? AND location_id = ?");
                                $stmt->bind_param("sii", $new_place_data, $movie_id, $current_location_id);
                                if ($stmt->execute()) {
                                    $response = [
                                        'success' => true,
                                        'message' => 'Place reserved successfully',
                                        'status_code' => 200
                                    ];
                                } else {
                                    $response = returnError('Failed to reserve place', 500);
                                }
                                $stmt->close();
                            } else {
                                $response = returnError('Place is already reserved', 409);
                            }
                            break;
                        }
                    }

                    if (!$place_exist) {
                        $response = returnError('Place does not exist', 404);
                    }
                } else {
                    $response = returnError('No place data found, ensure the movie ID and location are correct', 404);
                }
            } else {
                $response = returnError('Invalid POST parameters', 400);
            }
        } else {
            $response = returnError('Required POST parameters are not set', 400);
        }
    } else {
        $response = returnError('Invalid request method', 405);
    }
} else {
    $response = returnError('Invalid or missing token', 403);
}

echo json_encode($response);
?>