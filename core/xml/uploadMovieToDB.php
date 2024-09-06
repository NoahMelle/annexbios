<?php
    require_once "../db_connect.php";

    if(!isset($_POST['imdb_id'])) {
        echo json_encode(array('success' => false, 'error_message' => 'Geen IMDB ID Geleverd.', 'error_code' => 500));
        exit();
    }

    $imdbId = mes($_POST['imdb_id']);
    $movie_db_images_baseurl = 'https://image.tmdb.org/t/p/w500/';

    function getMovieData($imdbId) {
        global $env, $movie_db_images_baseurl;

        $authHeaders = [
            'Authorization: Bearer ' . $env['THEMOVIEDB_AUTH_TOKEN'],
            'accept: application/json'
        ];

        $dataRequest = curl_init();
        curl_setopt($dataRequest, CURLOPT_URL, "https://api.themoviedb.org/3/movie/$imdbId?language=nl-NL&append_to_response=credits");
        curl_setopt($dataRequest, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($dataRequest, CURLOPT_HTTPHEADER, $authHeaders);
        $dataResult = json_decode(curl_exec($dataRequest), true);
        
        if (isset($dataResult['errors'])) {
            return array('success' => false, 'error_message' => 'Fout bij het ophalen van filminformatie van de API.', 'error_code' => 500);
        }

        $trailerRequest = curl_init();
        curl_setopt($trailerRequest, CURLOPT_URL, "https://api.themoviedb.org/3/movie/$imdbId/videos");
        curl_setopt($trailerRequest, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($trailerRequest, CURLOPT_HTTPHEADER, $authHeaders);
        $trailerResult = json_decode(curl_exec($trailerRequest), true);
        
        $trailer = null;
        foreach ($trailerResult['results'] as $result) {
            if (stripos($result['name'], 'Trailer') !== false || $result['type'] === 'Trailer' || $result['type'] === 'Teaser') {
                $trailer = 'https://www.youtube.com/watch?v=' . $result["key"];
                break;
            }
        }

        return [
            "imdb_id" => $dataResult['imdb_id'] ?? '',
            "title" => $dataResult['original_title'] ?? '',
            "description" => $dataResult['overview'] ?? '',
            "image" => $movie_db_images_baseurl . str_replace('/', '', $dataResult['poster_path'] ?? ''),
            "rating" => $dataResult['vote_average'] ?? 0,
            "length" => $dataResult['runtime'] ?? 0,
            "release_date" => $dataResult['release_date'] ?? '',
            "trailer_link" => $trailer,
            "is_adult_movie" => intval($dataResult['adult'] ?? 0),
            "genres" => $dataResult['genres'] ?? [],
            "directors" => [],
            "actors" => []
        ];
    }

    function processMovie($data) {
        global $con, $env;

        // Check if movie already exists
        $stmt = $con->prepare("SELECT imdb_id FROM movie_data WHERE imdb_id = ?");
        $stmt->bind_param("s", $data['imdb_id']);
        $stmt->bind_result($imdb_id);
        $stmt->execute();
        $stmt->fetch();
        $stmt->close();

        if ($imdb_id === $data['imdb_id']) {
            return json_encode(array('success' => false, 'error_message' => 'Film bestaat al in de database.', 'error_code' => 500));
        }

        if (!isset($data) || !is_array($data)) {
            return json_encode(array('success' => false, 'error_message' => 'Ongeldige gegevens ontvangen.', 'error_code' => 500));
        }

        $saveTo = './assets/img/films/' . $data['imdb_id'] . '.jpg';
        $dbPath = $env['BASEURL'] .'assets/img/films/' . $data['imdb_id'] . '.jpg';

        $directory = dirname($saveTo);
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $rawImage = file_get_contents($data['image']);
        if ($rawImage !== false) {
            file_put_contents($saveTo, $rawImage);

            $stmt = $con->prepare("INSERT INTO movie_data (imdb_id, title, description, image_path, rating, length_minutes, release_date, trailer_link, is_adult_movie) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssdisss", $data['imdb_id'], $data['title'], $data['description'], $dbPath, $data['rating'], $data['length'], $data['release_date'], $data['trailer_link'], $data['is_adult_movie']);
            if ($stmt->execute()) {
                $stmt->close();

                foreach ($data['directors'] as $director) {
                    $stmt = $con->prepare("SELECT imdb_id FROM director_data WHERE imdb_id = ?");
                    $stmt->bind_param("i", $director['director_id']);
                    $stmt->bind_result($director_id);
                    $stmt->execute();
                    $stmt->fetch();
                    $stmt->close();

                    if ($director_id !== $director['director_id']) {
                        $stmt = $con->prepare("INSERT INTO director_data (imdb_id, name, gender, image_path) VALUES (?, ?, ?, ?)");
                        $stmt->bind_param("isss", $director['director_id'], $director['name'], $director['gender'], $director['image']);
                        if (!$stmt->execute()) {
                            $stmt->close();
                            return json_encode(array('success' => false, 'error_message' => 'Mislukt om regisseurgegevens in de database in te voegen.', 'error_code' => 500));
                        }
                        $stmt->close();
                    }
                }

                foreach ($data['actors'] as $actor) {
                    $stmt = $con->prepare("SELECT imdb_id FROM actor_data WHERE imdb_id = ?");
                    $stmt->bind_param("i", $actor['actor_id']);
                    $stmt->bind_result($actor_id);
                    $stmt->execute();
                    $stmt->fetch();
                    $stmt->close();

                    if ($actor_id !== $actor['actor_id']) {
                        $stmt = $con->prepare("INSERT INTO actor_data (imdb_id, name, gender, image_path) VALUES (?, ?, ?, ?)");
                        $stmt->bind_param("isss", $actor['actor_id'], $actor['name'], $actor['gender'], $actor['image']);
                        if (!$stmt->execute()) {
                            $stmt->close();
                            return json_encode(array('success' => false, 'error_message' => 'Mislukt om acteurgegevens in de database in te voegen.', 'error_code' => 500));
                        }
                        $stmt->close();
                    }
                }

                foreach ($data['genres'] as $genre) {
                    $stmt = $con->prepare("SELECT imdb_id FROM genre_data WHERE imdb_id = ?");
                    $stmt->bind_param("i", $genre['id']);
                    $stmt->bind_result($genre_id);
                    $stmt->execute();
                    $stmt->fetch();
                    $stmt->close();

                    if ($genre_id !== $genre['id']) {
                        $stmt = $con->prepare("INSERT INTO genre_data (imdb_id, title) VALUES (?, ?)");
                        $stmt->bind_param("is", $genre['id'], $genre['name']);
                        if (!$stmt->execute()) {
                            $stmt->close();
                            return json_encode(array('success' => false, 'error_message' => 'Mislukt om genregegevens in de database in te voegen.', 'error_code' => 500));
                        }
                        $stmt->close();
                    }
                }

                return json_encode(array('success' => true));
            } else {
                return json_encode(array('success' => false, 'error_message' => 'Mislukt om filmgegevens in de database in te voegen.', 'error_code' => 500));
            }
        } else {
            return json_encode(array('success' => false, 'error_message' => 'Failed to retrieve the image from the given path.', 'error_code' => 500));
        }
    }

    echo processMovie(getMovieData($imdbId));
?>