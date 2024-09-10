<?php
    require_once './core/check_api_token.php';

    if(isset($validToken) && $validToken === true && isset($currect_location_id)) {
        $response = [
            "error" => false,
            "message" => []
        ];
        
        if (!empty($_GET['view'])) {
            $view = explode("/", htmlspecialchars($_GET['view'], ENT_QUOTES, 'UTF-8'));
        
            if(isset($view[3]) && validate_integer($view[3])) {
                $movie_id = $view[3];
            }
        
            if(isset($view[4]) && validate_integer($view[4])) {
                $place_id = $view[4];
            }

            if(isset($view[5]) && !empty($view[5])) {
                $name = str_replace('+', ' ', $view[5]);
            }

            if(isset($view[6]) && !empty($view[6])) {
                $email = $view[6];
            }
        }
        
        // Check if required GET parameters are set and valid
        if (isset($movie_id) && isset($place_id) && isset($name) && isset($email)) {
            // Validate the inputs
            if (validate_integer($currect_location_id) && validate_integer($movie_id) && validate_integer($place_id)) {
                // Proceed if all inputs are valid integers
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
                        if($place["place"] == $place_id) {
                            $place_exist = true;
                        }
                    }
        
                    if(!$place_exist) {
                        $response["error"] = true;
                        $response["message"][] = "Place does not exist";
                    } else {
                        foreach ($place_data as &$place) {  // Loop by reference
                            if ($place["place"] == $place_id) {
                                if ($place["available"] == true) {
                                    $place["available"] = false;   
                                    $place["name"] = $name;
                                    $place["email"] = $email; 
                                    $new_place_data = json_encode($place_data);
    
                                    $stmt = $con->prepare("UPDATE location_movie_data SET place_data = ? WHERE location_movie_id = ? AND location_id = ?");
                                    $stmt->bind_param("sii", $new_place_data, $movie_id, $currect_location_id);
                                    if ($stmt->execute()) {
                                        $response["message"][] = "Place reserved successfully";
                                    } else {
                                        $response["error"] = true;
                                        $response["message"][] = "Failed to reserve place";
                                    }
                                    $stmt->close();
                                } else {
                                    $response["error"] = true;
                                    $response["message"][] = "Place is already reserved";
                                }
                            }
                        }
                        unset($place);  // Unset reference after loop
                    }
                } else {
                    $response["error"] = true;
                    $response["message"][] = "No place data found, make sure you are trying to reserve a place in your movie establishment/location";
                }
            } else {
                $response["error"] = true;
                $response["message"][] = "Invalid GET parameters";
            }
        } else {
            $response["error"] = true;
            $response["message"][] = "Required GET parameters are not set";
        }
        
        echo json_encode($response);
    }
?>