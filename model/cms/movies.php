<?php 
$data = [
    'page_title' => "AnnexBios Films",
    'base_url' => $env['BASEURL'],
    'url_path' => 'movies',
    'movies_active' => true,
    'locations_active' => false,
    'schedule_active' => false,
    'styles' => ['movies.css'],
    'js' => ['upload_movie_to_db.js'],
    "movies" => [],
    "current_movie_id" => null
];

include "./model/cms/cms_global.php";

$stmt = $con->prepare("SELECT movie_id, imdb_id, title  FROM movie_data;");
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $data["movies"][] = [
        "database_id" => $row["movie_id"],
        "imdb_id" => $row["imdb_id"],
        "title" => $row["title"]
    ];
}

if(isset($view[2]) && $view[2] == 'verwijder' && isset($view[3]) && validate_integer($view[3])) {
    $data['current_movie_id'] = $view[3];
}

if (isset($view[2]) && $view[2] == 'wijzig') {
    if (isset($view[3]) && !empty($view[3]) && validate_integer($view[3])) {
        if (isset($_POST["movie"]) && validate_integer($_POST["movie"]) && isset($_POST["location"]) && validate_integer($_POST["location"]) && isset($_POST["place_data"]) && validate_integer($_POST["place_data"]) && isset($_POST["play_time"]) && !empty($_POST["play_time"])) {
            if (!isset($_POST["csrf_token"]) || !verifyCsrfToken($_POST["csrf_token"])) {
                die("Invalid CSRF token.");
            }
            $movie = $_POST["movie"];
            $location = $_POST["location"];
            $place_data_count = $_POST["place_data"];
            $play_time = mes($_POST["play_time"]);

            $place_data = generatePlaceData($place_data_count);

            $stmt = $con->prepare("UPDATE location_movie_data SET movie_id = ?, location_id = ?, place_data = ?, play_time = ? WHERE location_movie_id = ?;");
            $stmt->bind_param("iissi", $movie, $location, $place_data, $play_time, $view[3]);
            if ($stmt->execute()) {
                $stmt->close();
                header("Location: " . $env["BASEURL"] . "cms/filmladder");
            }
        }
    } else {
        header("Location: " . $env["BASEURL"] . "cms/vestigingen");
    }
} else if (isset($view[2]) && $view[2] == 'verwijder') {
    if (isset($view[3]) && !empty($view[3]) && validate_integer($view[3])) {
        if (isset($_POST["current_movie_id"]) && !empty($_POST["current_movie_id"]) && validate_integer($_POST["current_movie_id"])) {
            if (!isset($_POST["csrf_token"]) || !verifyCsrfToken($_POST["csrf_token"])) {
                die("Invalid CSRF token.");
            }

            $stmt = $con->prepare("DELETE FROM movie_genre_link WHERE movie_id = ?;");
            $stmt->bind_param("i", $_POST["current_movie_id"]);
            $stmt->execute();
            $stmt->close();

            $stmt = $con->prepare("DELETE FROM movie_director_link WHERE movie_id = ?;");
            $stmt->bind_param("i", $_POST["current_movie_id"]);
            $stmt->execute();
            $stmt->close();

            $stmt = $con->prepare("DELETE FROM movie_actor_link WHERE movie_id = ?;");
            $stmt->bind_param("i", $_POST["current_movie_id"]);
            $stmt->execute();
            $stmt->close();

            $stmt = $con->prepare("DELETE FROM movie_kijkwijzer_link WHERE movie_id = ?;");
            $stmt->bind_param("i", $_POST["current_movie_id"]);
            $stmt->execute();
            $stmt->close();

            $stmt = $con->prepare("DELETE FROM location_movie_data WHERE movie_id = ?;");
            $stmt->bind_param("i", $_POST["current_movie_id"]);
            $stmt->execute();
            $stmt->close();

            $stmt = $con->prepare("DELETE FROM movie_data WHERE movie_id = ?;");
            $stmt->bind_param("i", $_POST["current_movie_id"]);
            $stmt->execute();
            $stmt->close();

            header("Location: " . $env["BASEURL"] . "cms/films");
        }
    } else {
        header("Location: " . $env["BASEURL"] . "cms/films");
    }
}