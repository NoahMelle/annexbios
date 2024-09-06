<?php
     if(!isset($_POST['imdb_id']) || empty($_POST['imdb_id'])) {
        echo json_encode(array('success' => false, 'error_message' => 'No IMDB ID provided.', 'error_code' => 400));
        exit();
    }

    require_once "../db_connect.php";

    $imdbId = mes($_POST['imdb_id']);
    

    $movie_db_images_baseurl = 'https://image.tmdb.org/t/p/w500/';

    function getMovieData($imdbId)
    {
        global $env;
        global $movie_db_images_baseurl;
        global $con;
    
        $authHeaders = [
            'Authorization: Bearer ' . $env['THEMOVIEDB_AUTH_TOKEN'],
            'accept: application/json'
        ];
    
        $dataRequest = curl_init();
        curl_setopt($dataRequest, CURLOPT_URL, "https://api.themoviedb.org/3/movie/$imdbId?language=nl-NL&append_to_response=credits");
        curl_setopt($dataRequest, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($dataRequest, CURLOPT_HTTPHEADER, $authHeaders);
    
        $dataResult = json_decode(curl_exec($dataRequest), true);
    
        $trailerRequest = curl_init();
        curl_setopt($trailerRequest, CURLOPT_URL, "https://api.themoviedb.org/3/movie/$imdbId/videos");
        curl_setopt($trailerRequest, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($trailerRequest, CURLOPT_HTTPHEADER, $authHeaders);
    
        $trailerResult = json_decode(curl_exec($trailerRequest), true);
    
        $trailer = null;
    
        foreach($trailerResult['results'] as $result) {
            if (stripos($result['name'], 'Trailer') !== false || $result['type'] === 'Trailer' || $result['type'] === 'Teaser') {
                $trailer = 'https://www.youtube.com/watch?v=' . $result["key"];
                break;
            }
        }    
    
        $json_data = [
            "imdb_id" => $dataResult['imdb_id'],
            "title" => $dataResult['original_title'],
            "description" => $dataResult['overview'],
            "image" => $movie_db_images_baseurl . str_replace('/', '', $dataResult['poster_path']),
            "rating" => $dataResult['vote_average'],    
            "length" => $dataResult['runtime'],
            "release_date" => $dataResult['release_date'],
            "trailer_link" => $trailer,
            "is_adult_movie" => intval($dataResult['adult']),
            "genres" => $dataResult['genres'],
            "directors" => [],
            "actors" => []
        ];
    
        foreach($dataResult['credits']['crew'] as $crewMember) {
            if($crewMember['job'] === 'Director') {
                $json_data['directors'][] = [
                    "director_id" => $crewMember['id'],
                    "name" => $crewMember['name'],
                    "gender" => $crewMember['gender'],
                    "image" => 'https://image.tmdb.org/t/p/w500' . $crewMember['profile_path']
                ];
            }
        }
    
        foreach($dataResult['credits']['cast'] as $actor) {
            if($actor['known_for_department'] === 'Acting') {
                $json_data['actors'][] = [
                    "actor_id" => $actor['id'],
                    "name" => $actor['name'],
                    "gender" => $actor['gender'],
                    "image" => 'https://image.tmdb.org/t/p/w500' . $actor['profile_path'],
                    "character" => $actor['character']
                ];
            }
        }
    
        return $json_data;
    }
        
    function processMovie($data)
    {
        global $con;
        global $env;
    
        $stmt = $con->prepare("SELECT imdb_id FROM movie_data WHERE imdb_id = ?");
        $stmt->bind_param("s", $data['imdb_id']);
        $stmt->bind_result($imdb_id);
        $stmt->execute();
        $stmt->fetch();
        $stmt->close();
    
        if ($imdb_id === $data['imdb_id']) {
            return json_encode(array('success' => false, 'error_message' => 'Movie already exists in the database.', 'error_code' => 500));
            exit();
        }
    
    
        if (!isset($data) || gettype($data) !== 'array') {
            // Throw a 500 - Internal Server error
            http_response_code(500);
            return json_encode(array('success' => false, 'error_message' => 'Unknown data received for processing a movie.', 'error_code' => 500));
            exit();
        }
    
        // Define the path to save the image
        $saveTo = '../../assets/img/films/' . $data['imdb_id'] . '.jpg';
        $dbPath = $env['BASEURL'] .'assets/img/films/' . $data['imdb_id'] . '.jpg';
    
        // Check if the directory exists, and create it if it doesn't
        $directory = dirname($saveTo);
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true); // Create the directory with permissions
        }
    
        // Store image in local files
        $rawImage = file_get_contents($data['image']);
      
        if ($rawImage !== false) {
            file_put_contents($saveTo, $rawImage);
    
            $stmt = $con->prepare("INSERT INTO movie_data (imdb_id, title, description, image_path, rating, length_minutes, release_date, trailer_link, is_adult_movie) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssdisss", $data['imdb_id'], $data['title'], $data['description'], $dbPath, $data['rating'], $data['length'], $data['release_date'], $data['trailer_link'], $data['is_adult_movie']);
            if($stmt->execute()) {
                $db_movie_id = $con->insert_id;
                $stmt->close();
    
                if(empty($db_movie_id)) {
                    return json_encode(array('success' => false, 'error_message' => 'Failed to insert movie data into the database. Error: ' . $stmt->error, 'error_code' => 500));
                    exit();
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
                            return json_encode(array('success' => false, 'error_message' => 'Failed to insert director link data into the database. Error: ' . $stmt->error, 'error_code' => 500));
                            exit();
                        }
                    }

                    if($director_id !== $director['director_id']) {
                        $stmt = $con->prepare("INSERT INTO director_data (imdb_id, name, gender, image_path) VALUES (?, ?, ?, ?);");
                        $stmt->bind_param("isss", $director['director_id'], $director['name'], $director['gender'], $director['image']);
                        if($stmt->execute()) {
                            $db_director_id = $con->insert_id;

                            $stmt = $con->prepare("INSERT INTO movie_director_link (director_id, movie_id) VALUES (?, ?);");
                            $stmt->bind_param("ii", $db_director_id, $db_movie_id);
                            if($stmt->execute()) {
                                $stmt->close();
                            } else {
                                $stmt->close();
                                return json_encode(array('success' => false, 'error_message' => 'Failed to insert director link data into the database. Error: ' . $stmt->error, 'error_code' => 500));
                                exit();
                            }
                        } else {
                            $stmt->close();
                            return json_encode(array('success' => false, 'error_message' => 'Failed to insert director data into the database. Error: ' . $stmt->error, 'error_code' => 500));
                            exit();
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
                            return json_encode(array('success' => false, 'error_message' => 'Failed to insert actor link data into the database. Error: ' . $stmt->error, 'error_code' => 500));
                            exit();
                        }
                    }

                    if($actor_id !== $actor['actor_id']) {
                        $stmt = $con->prepare("INSERT INTO actor_data (imdb_id, name, gender, image_path) VALUES (?, ?, ?, ?);");
                        $stmt->bind_param("isss", $actor['actor_id'], $actor['name'], $actor['gender'], $actor['image']);
                        if($stmt->execute()) {
                            $db_actor_id = $con->insert_id;

                            $stmt = $con->prepare("INSERT INTO movie_actor_link (actor_id, movie_id, character_name) VALUES (?, ?, ?);");
                            $stmt->bind_param("iis", $db_actor_id, $db_movie_id, $actor['character']);
                            if($stmt->execute()) {
                                $stmt->close();
                            } else {
                                $stmt->close();
                                return json_encode(array('success' => false, 'error_message' => 'Failed to insert actor link data into the database. Error: ' . $stmt->error, 'error_code' => 500));
                                exit();
                            }
                        } else {
                            $stmt->close();
                            return json_encode(array('success' => false, 'error_message' => 'Failed to insert actor data into the database. Error: ' . $stmt->error, 'error_code' => 500));
                            exit();
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
                            return json_encode(array('success' => false, 'error_message' => 'Failed to insert genre link data into the database. Error: ' . $stmt->error, 'error_code' => 500));
                            exit();
                        }
                    }
    
                    if($title !== $genre['name']) {
                        $stmt = $con->prepare("INSERT INTO genre_data (title) VALUES (?)");
                        $stmt->bind_param("s", $genre['name']);
                        if($stmt->execute()) {
                            $db_genre_id = $con->insert_id;
    
                            $stmt = $con->prepare("INSERT INTO movie_genre_link (genre_id, movie_id) VALUES (?, ?)");
                            $stmt->bind_param("ii", $db_genre_id, $db_movie_id);
                            if($stmt->execute()) {
                                $stmt->close();
                            } else {
                                $stmt->close();
                                return json_encode(array('success' => false, 'error_message' => 'Failed to insert genre link data into the database. Error: ' . $stmt->error, 'error_code' => 500));
                                exit();
                            }
                        } else {
                            $stmt->close();
                            return json_encode(array('success' => false, 'error_message' => 'Failed to insert genre data into the database. Error: ' . $stmt->error, 'error_code' => 500));
                            exit();
                        }
                    }
                }
    
                return json_encode(array('success' => true));
            }
        } else {
            return json_encode(array('success' => false, 'error_message' => 'Failed to retrieve the image from the given path.', 'error_code' => 500));
            exit();
        }
    }

    $data = getMovieData($imdbId);
    echo processMovie($data);
?>