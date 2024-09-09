<?php 
    $data = [
        'page_title' => "AnnexBios Filmladder",
        'base_url' => $env['BASEURL'],
        'styles' => ['movieSchedule.css'],
        'js' => ['load_rating.js'],
        'schedule_active' => true,
        'stars' => range(1, 5),

        'currently_playing' => [],

        'place_data_count' => 0,
        'current_location_movie_id' => null,
        'current_location_id' => null,
        'current_movie_id' => null,
        'play_time' => null,
        'movies' => [],
        'locations' => []
    ];

    include "./model/cms/cms_global.php";

    if(isset($view[2]) && $view[2] == 'wijzig' && isset($view[3]) && validate_integer($view[3]) || isset($view[2]) && $view[2] == 'verwijder' && isset($view[3]) && validate_integer($view[3])) {
        $stmt = $con->prepare("SELECT location_movie_id, movie_id, location_id, place_data, play_time FROM location_movie_data WHERE location_movie_id = ?;");
        $stmt->bind_param("i", $view[3]);
        $stmt->bind_result($location_movie_id, $movie_id, $location_id, $place_data, $play_time);
        $stmt->execute();
        $stmt->fetch();
        $stmt->close();

        $data['place_data_count'] = count(json_decode($place_data, true));
        $data['current_location_movie_id'] = $location_movie_id;
        $data['current_location_id'] = $location_id;
        $data['current_movie_id'] = $movie_id;
        $data['play_time'] = $play_time;
    }
    
    $stmt = $con->prepare("SELECT movie_id, title FROM movie_data;");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $selected = null;
            if (isset($movie_id)) {
                $selected = $row['movie_id'] == $movie_id ? 'selected' : '';
            }
    
            $data['movies'][] = [
                'movie_id' => $row['movie_id'],
                'title' => $row['title'],
                'selected' => $selected
            ];
        }
    }
    
    $stmt = $con->prepare("SELECT location_data.location_id, function_data.name, location_data.city, location_data.address, location_data.postal_code FROM location_data JOIN function_data ON function_data.function_id = location_data.function;");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $selected = null;
            if (isset($location_id)) {
                $selected = $row['location_id'] == $location_id ? 'selected' : '';
            }
    
            $data['locations'][] = [
                'location_id' => $row['location_id'],
                'function' => $row['name'],
                'city' => $row['city'],
                'address' => $row['address'],
                'postal_code' => $row['postal_code'],
                'selected' => $selected
            ];
        }
    }
    
    $currentTime = date('Y-m-d H:i:s');

    $stmt = $con->prepare("SELECT location_movie_id, movie_id, location_id, place_data, play_time FROM location_movie_data;");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $place_data = json_decode($row['place_data'], true);
            $stmt = $con->prepare("SELECT title, image_path, rating FROM movie_data WHERE movie_id = ?;");
            $stmt->bind_param("i", $row['movie_id']);
            $stmt->execute();
            $stmt->bind_result($title, $image_path, $rating);
            $stmt->fetch();
            $stmt->close();

            $place_data_count = 0;

            foreach($place_data as $place) {
                if($place['available'] == true) {
                    $place_data_count++;
                }
            }
    
            $data['currently_playing'][] = [
                'location_movie_id' => $row['location_movie_id'],
                'movie_id' => $row['movie_id'],
                'title' => $title,
                'play_time' => $row['play_time'],
                'place_data_count' => $place_data_count,
                'rating' => $rating * 10,
                'image' => $env['BASEURL'] . $image_path
            ];
        }
    }