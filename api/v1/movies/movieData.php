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
            $stmt = $con->prepare("SELECT title, description, image_path, rating, length, release_date, trailer_link, is_adult_movie FROM movie_data;");
        } else {
            $stmt = $con->prepare("SELECT title, description, image_path, rating, length, release_date, trailer_link, is_adult_movie FROM movie_data WHERE movie_id = ?;");
            $stmt->bind_param("i", $movie_id);
        }

        // Execute the statement
        $stmt->execute();

        $result = $stmt->get_result();
        $data = [];

        // Fetch and process results
        while ($row = $result->fetch_assoc()) {            
            $data[] = [
                "title" => $row["title"],
                "description" => $row["description"],
                "image_path" => $row["image_path"],
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