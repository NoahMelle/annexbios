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

$action = $view[2] ?? null;
$urlId = $view[3] ?? null;

include "./model/cms/cms_global.php";

if ($action) {
    switch ($action) {
        case 'wijzig':
            if (!validate_integer($urlId)) {
                return;
            }

            $schedule = getLocationMovieData($con, $urlId);

            if (!$schedule) {
                return;
            }

            $data['place_data_count'] = count(json_decode($schedule['place_data'], true));
            $data['current_location_movie_id'] = $schedule['location_movie_id'];
            $data['current_location_id'] = $schedule['location_id'];
            $data['current_movie_id'] = $schedule['movie_id'];
            $data['play_time'] = $schedule['play_time'];

            $data['movies'] = getAllMovies($con);
            foreach ($data['movies'] as $key => $movie) {
                $data['movies'][$key]['selected'] = $movie['movie_id'] == $schedule['movie_id'] ? 'selected' : '';
            }

            $data['locations'] = getAllLocations($con);
            foreach ($data['locations'] as $key => $location) {
                $data['locations'][$key]['selected'] = $location['location_id'] == $schedule['location_id'] ? 'selected' : '';
            }

            break;
        case 'verwijder':
            if (!validate_integer($urlId)) {
                return;
            }
            $data['current_location_movie_id'] = $urlId;
        case 'toevoegen':
            $data['movies'] = getAllMovies($con);
            $data['locations'] = getAllLocations($con);
            break;
    }
} else {
    // Get currently playing movies
    $stmt = $con->prepare("SELECT location_movie_id, movie_id, location_id, place_data, play_time FROM location_movie_data;");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $place_data = json_decode($row['place_data'], true);
            $stmt = $con->prepare("SELECT title, image_path, rating FROM movie_data WHERE movie_id = ?;");
            $stmt->bind_param("i", $row['movie_id']);
            $stmt->execute();
            $stmt->bind_result($title, $image_path, $rating);
            $stmt->fetch();
            $stmt->close();

            $place_data_count = 0;

            foreach ($place_data as $place) {
                if ($place['available'] == true) {
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
}

// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (!$action) {
        return;
    }

    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        die("Invalid CSRF token.");
    }

    $movieScheduleDir = __DIR__ . "/movie_schedule/";

    switch ($action) {
        case 'toevoegen':
            if (!checkValidity([$_POST['movie'], $_POST['location'], $_POST['place_data'], $_POST['play_time']])) {
                return;
            }

            include $movieScheduleDir . "add_movie_schedule.php";
            $addScheduleRes = addMovieSchedule($con, $_POST['movie'], $_POST['location'], $_POST['place_data'], $_POST['play_time']);

            if ($addScheduleRes['success']) {
                header("Location: " . $env["BASEURL"] . "cms/filmladder");
                exit;
            }

            break;
        case 'wijzig':
            if (!isset($_POST['movie']) || !isset($_POST['location']) || !isset($_POST['place_data']) || !isset($_POST['play_time']) || !isset($view[3])) {
                return;
            }

            include $movieScheduleDir . "edit_movie_schedule.php";
            $editScheduleRes = editMovieSchedule($con, $_POST['movie'], $_POST['location'], $_POST['place_data'], $_POST['play_time'], $view[3]);

            if ($editScheduleRes['success']) {
                header("Location: " . $env["BASEURL"] . "cms/filmladder");
                exit;
            }

            break;
        case 'verwijder':
            if (!checkValidity([$_POST['current_location_id']])) {
                return;
            }

            include $movieScheduleDir . "delete_movie_schedule.php";
            $deleteScheduleRes = deleteMovieSchedule($con, $_POST['current_location_id']);

            if ($deleteScheduleRes['success']) {
                header("Location: " . $env["BASEURL"] . "cms/filmladder");
                exit;
            }

            break;
    }
}

function checkValidity($data)
{
    foreach ($data as $value) {
        if (!isset($value) || empty($value)) {
            return false;
        }
    }

    return true;
}

function getAllMovies($con) {
    $stmt = $con->prepare("SELECT movie_id, title FROM movie_data;");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $movies = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $movies[] = [
                'movie_id' => $row['movie_id'],
                'title' => $row['title']
            ];
        }
    }

    return $movies;
}

function getAllLocations($con) {
    $stmt = $con->prepare("SELECT location_id, function_data.name, location_data.city, location_data.address, location_data.postal_code FROM location_data JOIN function_data ON function_data.function_id = location_data.function;");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $locations = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $locations[] = [
                'location_id' => $row['location_id'],
                'function' => $row['name'],
                'city' => $row['city'],
                'address' => $row['address'],
                'postal_code' => $row['postal_code']
            ];
        }
    }

    return $locations;
}

function getLocationMovieData($con, $id) {
    $stmt = $con->prepare("SELECT location_movie_id, movie_id, location_id, place_data, play_time FROM location_movie_data WHERE location_movie_id = ?;");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    return $result->fetch_assoc();
}