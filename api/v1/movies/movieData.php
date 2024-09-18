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

    // Initialize the response
    $response = [];

    if (isset($validToken) && $validToken === true) {
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

        // Prepare the query based on the movie_id presence
        if (isset($movie_id)) {
            $stmt = $con->prepare("SELECT imdb_id, movie_id, title, description, image_path, rating, length_minutes, release_date, trailer_link, is_adult_movie, minimum_price FROM movie_data WHERE movie_id = ?;");
            $stmt->bind_param("i", $movie_id);
        } else {
            $stmt = $con->prepare("SELECT imdb_id, movie_id, title, description, image_path, rating, length_minutes, release_date, trailer_link, is_adult_movie, minimum_price FROM movie_data;");
        }

        // Execute the statement
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $stmt->close();
            
            $data = [];

            // Check if no data is found
            if ($result->num_rows === 0) {
                $response = returnError("No data found", 404);
                echo json_encode($response);
                exit();
            }

            // Fetch and process results
            while ($row = $result->fetch_assoc()) {   
                $genres = [];
                $directors = [];
                $actors = [];
                $viewing_guides = [];

                // Fetch genres
                $stmt = $con->prepare("SELECT title FROM genre_data WHERE genre_id IN (SELECT genre_id FROM movie_genre_link WHERE movie_id = ?);");
                $stmt->bind_param("i", $row["movie_id"]);
                $stmt->execute();
                $resultGenre = $stmt->get_result();
                $stmt->close();

                while ($rowGenre = $resultGenre->fetch_assoc()) {
                    $genres[] = $rowGenre["title"];
                }

                // Fetch directors
                $stmt = $con->prepare("SELECT name, image_path FROM director_data WHERE director_id IN (SELECT director_id FROM movie_director_link WHERE movie_id = ?);");
                $stmt->bind_param("i", $row["movie_id"]);
                $stmt->execute();
                $resultDirector = $stmt->get_result();
                $stmt->close();

                while ($rowDirector = $resultDirector->fetch_assoc()) {
                    $directors[] = [
                        "name" => $rowDirector["name"],
                        "image" => $rowDirector["image_path"] === null ? $rowDirector["image_path"] : $env["BASEURL"] . $rowDirector["image_path"]
                    ];
                }

                // Fetch actors
                $stmt = $con->prepare("SELECT name, image_path FROM actor_data WHERE actor_id IN (SELECT actor_id FROM movie_actor_link WHERE movie_id = ?);");
                $stmt->bind_param("i", $row["movie_id"]);
                $stmt->execute();
                $resultActor = $stmt->get_result();
                $stmt->close();

                while ($rowActor = $resultActor->fetch_assoc()) {
                    $actors[] = [
                        "name" => $rowActor["name"],
                        "image" => $rowActor["image_path"] === null ? $rowActor["image_path"] : $env["BASEURL"] . $rowActor["image_path"]
                    ];
                }

                // Fetch viewing guides
                $stmt = $con->prepare("SELECT name, age, symbols FROM kijkwijzer_genre_link WHERE kijkwijzer_genre_id IN (SELECT kijkwijzer_id FROM movie_kijkwijzer_link WHERE movie_id = ?);");
                $stmt->bind_param("i", $row["movie_id"]);
                $stmt->execute();
                $resultViewingGuide = $stmt->get_result();
                $stmt->close();
                
                $age = 0;
                $symbols = [];
                
                while ($rowViewingGuide = $resultViewingGuide->fetch_assoc()) {
                    // Update age if the current row's age is greater
                    if ($rowViewingGuide["age"] > $age) {
                        $age = $rowViewingGuide["age"];
                    }
                
                    // Decode symbols assuming it's a JSON string
                    $rowSymbols = json_decode($rowViewingGuide["symbols"], true);
                
                    // Check if decoding was successful
                    if (is_array($rowSymbols)) {
                        foreach ($rowSymbols as $symbol) {
                            // Ensure symbol is an array and has necessary keys
                            if (is_array($symbol) && isset($symbol["name"]) && isset($symbol["image"]) && !validate_integer($symbol["name"])) {
                                // Check if the symbol is already in the array
                                $symbolExists = false;
                                foreach ($symbols as $existingSymbol) {
                                    if ($existingSymbol["name"] === $symbol["name"]) {
                                        $symbolExists = true;
                                        break;
                                    }
                                }
                                
                                // Add new symbol if not already present
                                if (!$symbolExists) {
                                    $symbols[] = [
                                        "name" => $symbol["name"],
                                        "image" => $env["BASEURL"] . $symbol["image"]
                                    ];
                                }
                            }
                        }
                    }
                }
                
                // Add age-based symbol
                $symbols[] = [
                    "name" => $age . "+",
                    "image" => $env["BASEURL"] . "assets/img/viewing_guides/" . $age . ".png"
                ];

                $viewing_guides[] = [
                    "age" => $age . "+",
                    "symbols" => $symbols
                ];

                $stmt = $con->prepare("SELECT play_time FROM location_movie_data WHERE movie_id = ? ORDER BY play_time ASC LIMIT 1;");
                $stmt->bind_param("i", $row["movie_id"]);
                $stmt->bind_result($first_play_time);
                $stmt->execute();
                $stmt->fetch();
                $stmt->close();

                // Add the fetched movie data to the response
                $data[] = [
                    "imdb_id" => $row["imdb_id"],
                    "api_id" => $row["movie_id"],
                    "title" => $row["title"],
                    "description" => $row["description"],
                    "image" => $env["BASEURL"] . $row["image_path"],
                    "genres" => $genres,
                    "directors" => $directors,
                    "actors" => $actors,
                    "viewing_guides" => $viewing_guides,
                    "rating" => $row["rating"],
                    "length" => $row["length_minutes"],
                    "release_date" => $row["release_date"],
                    "trailer_link" => $row["trailer_link"],
                    "is_adult_movie" => $row["is_adult_movie"],
                    'minimum_price' => $row["minimum_price"],
                    "first_play_time" => $first_play_time === null ? null : $first_play_time
                ];
            }

            // Output the JSON-encoded data
            echo json_encode([
                'success' => true,
                'data' => $data,
                'status_code' => 200
            ]);
        } else {
            // If query execution fails
            $response = returnError("Database query failed", 500);
            echo json_encode($response);
            exit();
        }
    } else {
        // If the token is invalid or missing
        $response = returnError("Invalid or missing API token", 403);
        echo json_encode($response);
        exit();
    }
?>