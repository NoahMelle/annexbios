<?php
    require_once './core/check_api_token.php';

    if(isset($validToken) && $validToken === true) {
        // Initialize default values
        $movie_id = null;

        if (!empty($_GET['view'])) {
            $view = explode("/", htmlspecialchars($_GET['view'], ENT_QUOTES, 'UTF-8'));

            // Validate and assign movie_id if present
            if (!empty($view[3]) && ($view[3] === 'null' || validate_integer($view[3]))) {
                $movie_id = $view[3] === 'null' ? null : (int)$view[3];
            }
        }

        if(!isset($movie_id)) {
            $stmt = $con->prepare("SELECT movie_id, title, description, image_path, rating, length, release_date, trailer_link, is_adult_movie FROM movie_data;");
        } else {
            $stmt = $con->prepare("SELECT movie_id, title, description, image_path, rating, length, release_date, trailer_link, is_adult_movie FROM movie_data WHERE movie_id = ?;");
            $stmt->bind_param("i", $movie_id);
        }

        // Execute the statement
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        
        $data = [];

        // Fetch and process results
        while ($row = $result->fetch_assoc()) {   
            $genres = [];
            $directors = [];
            $actors = [];
            $viewing_guides = [];

            $stmt = $con->prepare("SELECT title FROM genre_data WHERE genre_id IN (SELECT genre_id FROM movie_genre_link WHERE movie_id = ?);");
            $stmt->bind_param("i", $row["movie_id"]);
            $stmt->execute();
            $resultGenre = $stmt->get_result();
            $stmt->close();

            while ($rowGenre = $resultGenre->fetch_assoc()) {
                $genres[] = $rowGenre["title"];
            }

            $stmt = $con->prepare("SELECT name, image_path FROM director_data WHERE director_id IN (SELECT director_id FROM movie_director_link WHERE movie_id = ?);");
            $stmt->bind_param("i", $row["movie_id"]);
            $stmt->execute();
            $resultDirector = $stmt->get_result();
            $stmt->close();

            while ($rowDirector = $resultDirector->fetch_assoc()) {
                $directors[] = [
                    "name" => $rowDirector["name"],
                    "image" => $rowDirector["image_path"]
                ];
            }

            $stmt = $con->prepare("SELECT name, image_path FROM actor_data WHERE actor_id IN (SELECT actor_id FROM movie_actor_link WHERE movie_id = ?);");
            $stmt->bind_param("i", $row["movie_id"]);
            $stmt->execute();
            $resultActor = $stmt->get_result();
            $stmt->close();

            while ($rowActor = $resultActor->fetch_assoc()) {
                $actors[] = [
                    "name" => $rowActor["name"],
                    "image" => $rowActor["image_path"]
                ];
            }

            $stmt = $con->prepare("SELECT name, image_path FROM viewing_guide_data WHERE viewing_guide_id IN (SELECT viewing_guide_id FROM movie_viewing_guide_link WHERE movie_id = ?);");
            $stmt->bind_param("i", $row["movie_id"]);
            $stmt->execute();
            $resultViewingGuide = $stmt->get_result();
            $stmt->close();

            while ($rowViewingGuide = $resultViewingGuide->fetch_assoc()) {
                $viewing_guides[] = [
                    "name" => $rowViewingGuide["name"],
                    "image" => $rowViewingGuide["image_path"]
                ];
            }

            $data[] = [
                "title" => $row["title"],
                "description" => $row["description"],
                "image" => $row["image_path"],
                "genres" => $genres,
                "directors" => $directors,
                "actors" => $actors,
                "viewing_guides" => $viewing_guides,
                "rating" => $row["rating"],
                "length" => $row["length"],
                "release_date" => $row["release_date"],
                "trailer_link" => $row["trailer_link"],
                "is_adult_movie" => $row["is_adult_movie"]
            ];
        }

        // Output the JSON-encoded data
        echo json_encode($data);
    }
?>