<?php
//header('Content-Type: application/json');

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/core/db_connect.php';

$dotenv = Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
$dotenv->safeLoad();

$movie_db_images_baseurl = 'https://image.tmdb.org/t/p/original';
$movie_imdb_ids = ["tt18412256", "tt23468450", "tt6263850", "tt14858658", "tt1340094", "tt2049403", "tt10655524", "tt17505010", "tt12610390", "tt21284218", "tt12584954", "tt18259086", "tt22408160", "tt12037194", "tt5525650"];

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

  $authHeaders = [
    "Authorization: Bearer " . $_ENV['THEMOVIEDB_AUTH_TOKEN']
  ];

  $request = curl_init();
  curl_setopt($request, CURLOPT_URL, "https://api.themoviedb.org/3/movie/$imdbId?language=nl-NL&append_to_response=credits");
  curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($request, CURLOPT_HTTPHEADER, $authHeaders);

  $result = curl_exec($request);

  $json_data = json_decode($result, true);

  return $json_data;
}

function processMovie($data)
{
  global $movie_db_images_baseurl;
  global $con;
  if (!isset($data) || gettype($data) !== 'array') {
    // Throw a 500 - Internal Server error
    http_response_code(500);
    echo json_encode(array('success' => false, 'error_message' => 'Unknown data received for processing a movie.', 'error_code' => 500));
    exit();
  }

  // Store image in local files
  $rawImage = file_get_contents($movie_db_images_baseurl . $data['poster_path']);

  file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/img/films' . $data['poster_path'], $rawImage);

  $posterFilename = ltrim($data['poster_path'], '/');

//    Insert the Movie
//    $rating = 0.0;
//    $time_length = '01:00:00';
//    $null_value = null;
//    $is_adult_movie = intval($data['adult']);
//
//    $stmt = $con->prepare("INSERT INTO movie_data (imdb_id, title, description, image_path, rating, length, release_date, trailer_link, is_adult_movie) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
//    $stmt->bind_param("ssssdsssi", $data['imdb_id'], $data['original_title'], $data['overview'], $posterFilename, $rating, $time_length, $data['release_date'], $null_value, $is_adult_movie);
//    $stmt->execute();
//    $movieId = $stmt->insert_id;
//    $stmt->close();
//
//  foreach($data['credits']['cast'] as $actor) {
//
//    $rawImage = file_get_contents($movie_db_images_baseurl . $actor['profile_path']);
//
//    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/img/actors' . $actor['profile_path'], $rawImage);
//
//    $actorProfilepath = ltrim($actor['profile_path'], '/');
//
//    // Create the actor
//    $stmt = $con->prepare("INSERT INTO actor_data (name, gender, image_path) VALUES (?, ?, ?)");
//    $stmt->bind_param('sis', $actor['name'], $actor['gender'], $actorProfilepath);
//    $stmt->execute();
//    $actorId = $stmt->insert_id;
//    $stmt->close();
//
//    $characterName = trim($actor['character']) === "" ? null : $actor['character'];
//    $stmt = $con->prepare("INSERT INTO movie_actor_link (actor_id, movie_id, character_name) VALUES (?, ?, ?)");
//    $stmt->bind_param('iis', $actorId, $movieId, $characterName);
//    $stmt->execute();
//    $stmt->close();
//  }

  $director = findObjectByKeyValue($data['credits']['crew'], 'job', 'Director');

  $rawImage = file_get_contents($movie_db_images_baseurl . $director['profile_path']);

  file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/img/acteurs' . $director['profile_path'], $rawImage);

  $actorProfilepath = ltrim($director['profile_path'], '/');

  $stmt = $con->prepare('');

  var_dump($director);
//  var_dump($data['credits']['crew']);

}

$data = getMovieData('tt2049403');


processMovie($data);

// TODO
// - Film ophalen
//    - Film aanmaken
//    - Actors aanmaken -> link maken
//    - Director opzoeken -> aanmaken -> link maken
