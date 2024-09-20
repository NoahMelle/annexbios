<?php
     if(!isset($_POST['imdb_id']) || empty($_POST['imdb_id'])) {
        echo json_encode(array('success' => false, 'error_message' => 'No IMDB ID provided.', 'error_code' => 400));
        exit();
    }

    if (!isset($_POST['min_price']) || empty($_POST['min_price']) || !filter_var($_POST['min_price'], FILTER_VALIDATE_INT)) {
        echo json_encode(array('success' => false, 'error_message' => 'No minimum price provided.', 'error_code' => 400));
        exit();
    }

    require_once "../db_connect.php";

    $imdbId = mes($_POST['imdb_id']);
    $minPrice = intval($_POST['min_price']);
    
    $movie_db_images_baseurl = 'https://image.tmdb.org/t/p/w500/';

    function getMovieData($imdbId)
    {
        global $env;
        global $movie_db_images_baseurl;

        $authHeaders = [
            'Authorization: Bearer ' . $env['THEMOVIEDB_AUTH_TOKEN'],
            'accept: application/json'
        ];

        // Movie data request
        $dataRequest = curl_init();
        curl_setopt($dataRequest, CURLOPT_URL, "https://api.themoviedb.org/3/movie/$imdbId?language=nl-NL&append_to_response=credits");
        curl_setopt($dataRequest, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($dataRequest, CURLOPT_HTTPHEADER, $authHeaders);
        $dataResult = json_decode(curl_exec($dataRequest), true);
        curl_close($dataRequest);

        if (empty($dataResult) || isset($dataResult['status_code'])) {
            return array('success' => false, 'error_message' => 'Failed to retrieve movie data.', 'error_code' => 500);
        }

        // Trailer request
        $trailer = null;
        try {
            $trailerRequest = curl_init();
            curl_setopt($trailerRequest, CURLOPT_URL, "https://api.themoviedb.org/3/movie/$imdbId/videos");
            curl_setopt($trailerRequest, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($trailerRequest, CURLOPT_HTTPHEADER, $authHeaders);
            $trailerResult = json_decode(curl_exec($trailerRequest), true);
            curl_close($trailerRequest);

            if (!empty($trailerResult['results'])) {
                foreach ($trailerResult['results'] as $result) {
                    if (stripos($result['name'], 'Trailer') !== false || $result['type'] === 'Trailer') {
                        $trailer = 'https://www.youtube.com/watch?v=' . $result["key"];
                        break;
                    }
                }
            }
        } catch (Exception $e) {
            return array('success' => false, 'error_message' => 'Failed to retrieve trailer data.', 'error_code' => 500);
        }

        // Create JSON response
        $json_data = [
            "imdb_id" => $dataResult['imdb_id'] ?? null,
            "title" => $dataResult['original_title'] ?? null,
            "description" => $dataResult['overview'] ?? null,
            "image" => $movie_db_images_baseurl . str_replace('/', '', $dataResult['poster_path'] ?? ''),
            "rating" => $dataResult['vote_average'] ?? null,
            "length" => $dataResult['runtime'] ?? null,
            "release_date" => $dataResult['release_date'] ?? null,
            "trailer_link" => $trailer,
            "is_adult_movie" => $dataResult['adult'] === false ? 0 : 1,
            "genres" => $dataResult['genres'] ?? [],
            "directors" => [],
            "actors" => [],
            "kijkwijzers" => []
        ];

        // Extract directors
        if (isset($dataResult['credits']['crew'])) {
            foreach ($dataResult['credits']['crew'] as $crewMember) {
                if ($crewMember['job'] === 'Director') {
                    $json_data['directors'][] = [
                        "director_id" => $crewMember['id'] ?? null,
                        "name" => $crewMember['name'] ?? null,
                        "gender" => $crewMember['gender'] ?? null,
                        "image" => 'https://image.tmdb.org/t/p/w500' . ($crewMember['profile_path'] ?? '')
                    ];
                }
            }
        }

        // Extract actors
        if (isset($dataResult['credits']['cast'])) {
            foreach ($dataResult['credits']['cast'] as $actor) {
                if ($actor['known_for_department'] === 'Acting') {
                    $json_data['actors'][] = [
                        "actor_id" => $actor['id'] ?? null,
                        "name" => $actor['name'] ?? null,
                        "gender" => $actor['gender'] ?? null,
                        "image" => 'https://image.tmdb.org/t/p/w500' . ($actor['profile_path'] ?? ''),
                        "character" => $actor['character'] ?? null
                    ];
                }
            }
        }

        return $json_data;
    }
        
    function processMovie($data)
    {
        global $con;
        global $minPrice;

        $error = ['success' => false, 'error_message' => 'Script failed to start', 'status_code' => 500];
    
        $stmt = $con->prepare("SELECT imdb_id FROM movie_data WHERE imdb_id = ?");
        $stmt->bind_param("s", $data['imdb_id']);
        $stmt->bind_result($imdb_id);
        $stmt->execute();
        $stmt->fetch();
        $stmt->close();
    
        if ($imdb_id === $data['imdb_id']) {
            $error = [
                'success' => false,
                'error_message' => 'Movie already exists in the database.',
                'status_code' => 500
            ];
        }
    
    
        if (!isset($data) || gettype($data) !== 'array') {
            // Throw a 500 - Internal Server error
            $error = [
                'success' => false,
                'error_message' => 'Unknown data received for processing a movie.',
                'status_code' => 500
            ];
        }
    
        // Define the path to save the image
        $saveTo = '../../assets/img/movies/' . $data['imdb_id'] . '.jpg';
        $dbPath = 'assets/img/movies/' . $data['imdb_id'] . '.jpg';
    
        // Check if the directory exists, and create it if it doesn't
        $directory = dirname($saveTo);
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true); // Create the directory with permissions
        }
    
        // Store image in local files
        $rawImage = file_get_contents($data['image']);
      
        if ($rawImage !== false) {
            file_put_contents($saveTo, $rawImage);
    
            $con->begin_transaction();

            $stmt = $con->prepare("INSERT INTO movie_data (imdb_id, title, description, image_path, rating, length_minutes, release_date, trailer_link, is_adult_movie, minimum_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssdissss", $data['imdb_id'], $data['title'], $data['description'], $dbPath, $data['rating'], $data['length'], $data['release_date'], $data['trailer_link'], $data['is_adult_movie'], $minPrice);
            if($stmt->execute()) {
                $db_movie_id = $con->insert_id;
                $stmt->close();
    
                if(empty($db_movie_id)) {
                    $error = [
                        'success' => false,
                        'error_message' => 'Failed to insert movie data into the database.',
                        'status_code' => 500
                    ];
                }
                
                foreach($data['kijkwijzers'] as $kijkwijzer) {
                    $stmt = $con->prepare("INSERT INTO movie_kijkwijzer_link (movie_id, kijkwijzer_id) VALUES (?, ?);");
                    $stmt->bind_param("ii", $db_movie_id, $kijkwijzer);
                    if($stmt->execute()) {
                        $stmt->close();
                    } else {
                        $stmt->close();

                        $error = [
                            'success' => false,
                            'error_message' => 'Failed to insert kijkwijzer link data into the database.',
                            'status_code' => 500
                        ];
                    }
                }
                
                foreach($data['directors'] as $director) {
                    $stmt = $con->prepare("SELECT director_id, imdb_id FROM director_data WHERE imdb_id = ?;");
                    $stmt->bind_param("i", $director['director_id']);
                    $stmt->bind_result($db_director_id, $director_id);
                    $stmt->execute();
                    $stmt->fetch();
                    $stmt->close();
        
                    if($director_id === $director['director_id']) {
                        $stmt = $con->prepare("INSERT INTO movie_director_link (director_id, movie_id) VALUES (?, ?);");
                        $stmt->bind_param("ii", $db_director_id, $db_movie_id);
                        if($stmt->execute()) {
                            $stmt->close();
                        } else {
                            $stmt->close();
                            $error = [
                                'success' => false,
                                'error_message' => 'Failed to insert director link data into the database.',
                                'status_code' => 500
                            ];
                        }
                    }

                    if($director_id !== $director['director_id']) {
                        // Define the path to save the image
                        $saveTo = '../../assets/img/directors/' . $director['director_id'] . '.jpg';
                        $dbPath = 'assets/img/directors/' . $director['director_id'] . '.jpg';
                    
                        // Check if the directory exists, and create it if it doesn't
                        $directory = dirname($saveTo);
                        if (!is_dir($directory)) {
                            mkdir($directory, 0755, true); // Create the directory with permissions
                        }
                    
                        // Store image in local files
                        if (filter_var($director['image'], FILTER_VALIDATE_URL)) {
                            // It's a URL, try to fetch the image
                            $rawImage = @file_get_contents($director['image']);
                            if ($rawImage === FALSE) {
                                $dbPath = null; // Image could not be retrieved
                            } else {
                                file_put_contents($saveTo, $rawImage);
                            }
                        }
                    
                        $stmt = $con->prepare("INSERT INTO director_data (imdb_id, name, gender, image_path) VALUES (?, ?, ?, ?);");
                        $stmt->bind_param("isss", $director['director_id'], $director['name'], $director['gender'], $dbPath);
                        if($stmt->execute()) {
                            $db_director_id = $con->insert_id;

                            $stmt = $con->prepare("INSERT INTO movie_director_link (director_id, movie_id) VALUES (?, ?);");
                            $stmt->bind_param("ii", $db_director_id, $db_movie_id);
                            if($stmt->execute()) {
                                $stmt->close();
                            } else {
                                $stmt->close();

                                $error = [
                                    'success' => false,
                                    'error_message' => 'Failed to insert director link data into the database.',
                                    'status_code' => 500
                                ];
                            }
                        } else {
                            $stmt->close();
                            $error = [
                                'success' => false,
                                'error_message' => 'Failed to insert director data into the database.',
                                'status_code' => 500
                            ];
                        }
                    }
                }
    
                foreach($data['actors'] as $actor) {
                    $stmt = $con->prepare("SELECT actor_id, imdb_id FROM actor_data WHERE imdb_id = ?;");
                    $stmt->bind_param("i", $actor['actor_id']);
                    $stmt->bind_result($db_actor_id, $actor_id);
                    $stmt->execute();
                    $stmt->fetch();
                    $stmt->close();
        
                    if($actor_id === $actor['actor_id']) {
                        $stmt = $con->prepare("INSERT INTO movie_actor_link (actor_id, movie_id, character_name) VALUES (?, ?, ?);");
                        $stmt->bind_param("iis", $db_actor_id, $db_movie_id, $actor['character']);
                        if($stmt->execute()) {
                            $stmt->close();
                        } else {
                            $stmt->close();
                            $error = [
                                'success' => false,
                                'error_message' => 'Failed to insert actor link data into the database.',
                                'status_code' => 500
                            ];
                        }
                    }

                    if($actor_id !== $actor['actor_id']) {
                        // Define the path to save the image
                        $saveTo = '../../assets/img/actors/' . $actor['actor_id'] . '.jpg';
                        $dbPath = 'assets/img/actors/' . $actor['actor_id'] . '.jpg';

                        // Check if the directory exists, and create it if it doesn't
                        $directory = dirname($saveTo);
                        if (!is_dir($directory)) {
                            mkdir($directory, 0755, true); // Create the directory with permissions
                        }


                        // Store image in local files
                        if (filter_var($actor['image'], FILTER_VALIDATE_URL)) {
                            // It's a URL, try to fetch the image
                            $rawImage = @file_get_contents($actor['image']);
                            if ($rawImage === FALSE) {
                                $dbPath = null; // Image could not be retrieved
                            } else {
                                file_put_contents($saveTo, $rawImage);
                            }
                        }                            

                        $stmt = $con->prepare("INSERT INTO actor_data (imdb_id, name, gender, image_path) VALUES (?, ?, ?, ?);");
                        $stmt->bind_param("isss", $actor['actor_id'], $actor['name'], $actor['gender'], $dbPath);
                        if($stmt->execute()) {
                            $db_actor_id = $con->insert_id;

                            $stmt = $con->prepare("INSERT INTO movie_actor_link (actor_id, movie_id, character_name) VALUES (?, ?, ?);");
                            $stmt->bind_param("iis", $db_actor_id, $db_movie_id, $actor['character']);
                            if($stmt->execute()) {
                                $stmt->close();
                            } else {
                                $stmt->close();
                                $error = [
                                    'success' => false,
                                    'error_message' => 'Failed to insert actor link data into the database.',
                                    'status_code' => 500
                                ];
                            }
                        } else {
                            $stmt->close();
                            $error = [
                                'success' => false,
                                'error_message' => 'Failed to insert actor data into the database.',
                                'status_code' => 500
                            ];
                        }
                    }
                }
    
                foreach($data['genres'] as $genre) {
                    $stmt = $con->prepare("SELECT genre_id, title FROM genre_data WHERE title = ?");
                    $stmt->bind_param("s", $genre['name']);
                    $stmt->bind_result($db_genre_id, $title);
                    $stmt->execute();
                    $stmt->fetch();
                    $stmt->close();
    
                    if($title === $genre['name']) {
                        $stmt = $con->prepare("INSERT INTO movie_genre_link (genre_id, movie_id) VALUES (?, ?)");
                        $stmt->bind_param("ii", $db_genre_id, $db_movie_id);
                        if($stmt->execute()) {
                            $stmt->close();
                        } else {
                            $stmt->close();
                            $error = [
                                'success' => false,
                                'error_message' => 'Failed to insert genre link data into the database.',
                                'status_code' => 500
                            ];
                        }
                    }
    
                    if($title !== $genre['name']) {
                        $stmt = $con->prepare("INSERT INTO genre_data (imdb_id, title) VALUES (?, ?)");
                        $stmt->bind_param("is", $genre['id'], $genre['name']);
                        if($stmt->execute()) {
                            $db_genre_id = $con->insert_id;
                            $stmt->close();
    
                            $stmt = $con->prepare("INSERT INTO movie_genre_link (genre_id, movie_id) VALUES (?, ?)");
                            $stmt->bind_param("ii", $db_genre_id, $db_movie_id);
                            if($stmt->execute()) {
                                $stmt->close();
                            } else {
                                $stmt->close();
                                $error = [
                                    'success' => false,
                                    'error_message' => 'Failed to insert genre link data into the database.',
                                    'status_code' => 500
                                ];
                            }
                        } else {
                            $stmt->close();
                            $error = [
                                'success' => false,
                                'error_message' => 'Failed to insert genre data into the database.',
                                'status_code' => 500
                            ];
                        }
                    }
                }
    
                $error = [
                    'success' => true,
                    'error_message' => 'Movie data successfully inserted into the database.',
                    'status_code' => 200
                ];
            }
            $con->commit();
        } else {
            $error = [
                'success' => false,
                'error_message' => 'Failed to retrieve the image from the given path.',
                'status_code' => 500
            ];
        }

        return json_encode($error);
    }


    try {
        $data = getMovieData($imdbId);
        if($data === null) {
            echo json_encode($data);
            exit();
        } else {
            $process = processMovie($data);
            echo $process;
        }
    } catch (Exception $e) {
        error_log($e->getMessage());
        // dd($e, true);
        echo json_encode(array('success' => false, 'error_message' => $e->getMessage(), 'error_code' => 500));
        exit();
    }

?>