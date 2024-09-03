<?php
    require_once './db_connect.php';

    $response = [
        "status" => "No Status",
        "message" => []
    ];

    // Check if required GET parameters are set and valid
    if (isset($_GET["location_id"]) && isset($_GET["movie_id"]) && isset($_GET["place_id"])) {
        $location_id = $_GET["location_id"];
        $movie_id = $_GET["movie_id"];
        $place_id = $_GET["place_id"];

        // Validate the inputs
        if (validate_integer($location_id) && validate_integer($movie_id) && validate_integer($place_id)) {
            // Proceed if all inputs are valid integers
            $stmt = $con->prepare("SELECT place_data FROM location_movie_data WHERE movie_id = ? AND location_id = ?");
            $stmt->bind_param("ii", $movie_id, $location_id);
            $stmt->execute();
            $stmt->bind_result($place_data);
            $stmt->fetch();
            $stmt->close();

            if ($place_data) {
                
                $place_data = json_decode($place_data, true);

                $place_exist = false;
                foreach ($place_data["places"] as $place) {
                    if($place["place"] == $place_id) {
                        $place_exist = true;
                    }
                }

                if(!$place_exist) {
                    $response["status"] = "Error";
                    $response["message"][] = "Place does not exist";
                    
                } else {

                    if ($place_data["available"] === false) {
                        $response["status"] = "Error";
                        $response["message"][] = "No places available";
                        
                    } else {
                        foreach ($place_data["places"] as &$place) {
                            if ($place["place"] == $place_id) {
                                if ($place["available"] == true) {
                                    $place["available"] = false;    
                                    $new_place_data = json_encode($place_data);

                                    $stmt = $con->prepare("UPDATE location_movie_data SET place_data = ? WHERE id = ? AND location_id = ?");
                                    $stmt->bind_param("sii", $new_place_data, $movie_id, $location_id);
                                    if ($stmt->execute()) {
                                        $response["status"] = "Success";
                                        $response["message"][] = "Place reserved successfully";
                                    } else {
                                        $response["status"] = "Error";
                                        $response["message"][] = "Failed to reserve place";
                                        
                                    }
                                    $stmt->close();
                                    
                                } else {
                                    $response["status"] = "Error";
                                    $response["message"][] = "Place is already reserved";
                                    
                                }
                            }
                        }

                        unset($place);
                    }
                }
            } else {
                $response["status"] = "Error";
                $response["message"][] = "No place data found";
                
            }
        } else {
            $response["status"] = "Error";
            $response["message"][] = "Invalid GET parameters";
            
        }
    } else {
        $response["status"] = "Error";
        $response["message"][] = "Required GET parameters are not set";
    }

    echo json_encode($response);
?>