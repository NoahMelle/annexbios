<?php
require_once './core/db_connect.php';

$movie_db_images_baseurl = 'https://image.tmdb.org/t/p/w500/';
$movie_imdb_ids = ["tt18412256"];

function findObjectByKeyValue($objects, $key, $value)
{
  foreach ($objects as $object) {
    if (isset($object[$key]) && $object[$key] == $value) {
      return $object;
    }
  }
  return null;
}

function getMovieData($imdbId)
{
  global $env;
  global $movie_db_images_baseurl;

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
    if($result['name'] === 'Official Trailer') {
      $trailer = 'https://www.youtube.com/watch?v=' . $result["key"];
      break;
    }
  }

  $json_data = [
    "imdb_id" => $dataResult['imdb_id'],
    "title" => $dataResult['original_title'],
    "description" => $dataResult['overview'],
    "image_path" => $movie_db_images_baseurl . $dataResult['poster_path'],
    "rating" => $dataResult['vote_average'],
    "length" => $dataResult['runtime'],
    "release_date" => $dataResult['release_date'],
    "trailer_link" => $trailer,
    "is_adult_movie" => intval($dataResult['adult']),
  ];

  return $json_data;
}

function processMovie($data)
{
  global $con;

  $stmt = $con->prepare("SELECT imdb_id FROM movie_data WHERE imdb_id = ?");
  $stmt->bind_param("s", $data['imdb_id']);
  $stmt->bind_result($imdb_id);
  $stmt->execute();
  $stmt->fetch();
  $stmt->close();

  if ($imdb_id === $data['imdb_id']) {
    echo json_encode(array('success' => false, 'error_message' => 'Movie already exists in the database.', 'error_code' => 500));
    exit();
  }


  if (!isset($data) || gettype($data) !== 'array') {
    // Throw a 500 - Internal Server error
    http_response_code(500);
    echo json_encode(array('success' => false, 'error_message' => 'Unknown data received for processing a movie.', 'error_code' => 500));
    exit();
  }

  // Define the path to save the image
  $saveTo = './assets/img/films/' . $data['imdb_id'] . '.jpg';
  $dbPath = $data['imdb_id'] . '.jpg';

  // Check if the directory exists, and create it if it doesn't
  $directory = dirname($saveTo);
  if (!is_dir($directory)) {
    mkdir($directory, 0755, true); // Create the directory with permissions
  }

  // Store image in local files
  $rawImage = file_get_contents($data['image_path']);
  
  if ($rawImage !== false) {
      file_put_contents($saveTo, $rawImage);

      $stmt = $con->prepare("INSERT INTO movie_data (imdb_id, title, description, image_path, rating, length, release_date, trailer_link, is_adult_movie) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssdisss", $data['imdb_id'], $data['title'], $data['description'], $dbPath, $data['rating'], $data['length'], $data['release_date'], $data['trailer_link'], $data['is_adult_movie']);
      if($stmt->execute()) {
        echo json_encode(array('success' => true));
      }
      $stmt->close();
  } else {
      echo json_encode(array('success' => false, 'error_message' => 'Failed to retrieve the image from the given path.', 'error_code' => 500));
      exit();
  }
}

$data = getMovieData('tt21284218');
processMovie($data);