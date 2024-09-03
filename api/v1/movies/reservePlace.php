<?php
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
        $location_id = $view[4];
    }

    if(isset($view[5]) && validate_integer($view[5])) {
        $place_id = $view[5];
    }
}

// Check if required GET parameters are set and valid
if (isset($movie_id) && isset($location_id) && isset($place_id)) {
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
                $response["error"] = true;
                $response["message"][] = "Place does not exist";
            } else {
                if ($place_data["available"] === false) {
                    $response["error"] = true;
                    $response["message"][] = "No places available";
                } else {
                    foreach ($place_data["places"] as &$place) {  // Loop by reference
                        if ($place["place"] == $place_id) {
                            if ($place["available"] == true) {
                                $place["available"] = false;    
                                $new_place_data = json_encode($place_data);

                                $stmt = $con->prepare("UPDATE location_movie_data SET place_data = ? WHERE movie_id = ? AND location_id = ?");
                                $stmt->bind_param("sii", $new_place_data, $movie_id, $location_id);
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
            }
        } else {
            $response["error"] = true;
            $response["message"][] = "No place data found";
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
?>