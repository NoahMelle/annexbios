<?php
include_once "./vendor/autoload.php";

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (is_file(__dir__ . '/../.env')) {
    $env = parse_ini_file(__dir__ . '/../.env');
} else {
    $env = [];
}

$dbhost = $env['DBHOST'];
$dbusername = $env['DBUSERNAME'];
$dbpassword = $env['DBPASSWORD'];
$dbname = $env['DBNAME'];

$con = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);

if ($con->connect_errno) {
    echo "Failed to connect to MySQL: " . $con->connect_error;
    exit();
}

function prettyDump($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

// Function to validate integers
function validate_integer($input)
{
    return filter_var($input, FILTER_VALIDATE_INT) !== false;
}

function isToday($date)
{
    $today = new DateTime();
    $givenDate = new DateTime($date);

    // Compare only the date parts (ignoring the time)
    return $givenDate->format('Y-m-d') === $today->format('Y-m-d');
}

function isThisWeek($date)
{
    $today = new DateTime();
    $givenDate = new DateTime($date);

    // Get the start and end of this week
    $startOfWeek = (clone $today)->modify('this week')->setTime(0, 0, 0);
    $endOfWeek = (clone $today)->modify('this week +6 days')->setTime(23, 59, 59);

    return $givenDate >= $startOfWeek && $givenDate <= $endOfWeek;
}


function dd($var, $die = false)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    if ($die) {
        exit();
    }
}

function mes($value)
{
    global $con;
    return $con->real_escape_string($value);
}

function generate_token() {
    global $con;
    $token = bin2hex(random_bytes(32));

    $stmt = $con->prepare("SELECT COUNT(token) FROM location_tokens WHERE token = ?;");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if($count > 0) {
        return generate_token();
    } else {
        return $token;
    }
}

function generatePlaceData($amount) {
    $place_data = [];
    for($i = 0; $i < $amount; $i++) {
        $place_data[] = [
            'place' => $i,
            'available' => true
        ];
    }
    return json_encode($place_data);
}

$movie_db_images_baseurl = 'https://image.tmdb.org/t/p/w500/';

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
  $saveTo = './assets/img/films/' . $data['imdb_id'] . '.jpg';
  $dbPath = $env['BASEURL'] . $data['imdb_id'] . '.jpg';

  // Check if the directory exists, and create it if it doesn't
  $directory = dirname($saveTo);
  if (!is_dir($directory)) {
    mkdir($directory, 0755, true); // Create the directory with permissions
  }

  // Store image in local files
  $rawImage = file_get_contents($data['image_path']);
  
  if ($rawImage !== false) {
      file_put_contents($saveTo, $rawImage);

      $stmt = $con->prepare("INSERT INTO movie_data (imdb_id, title, description, image_path, rating, length_minutes, release_date, trailer_link, is_adult_movie) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssdisss", $data['imdb_id'], $data['title'], $data['description'], $dbPath, $data['rating'], $data['length'], $data['release_date'], $data['trailer_link'], $data['is_adult_movie']);
      if($stmt->execute()) {
        $stmt->close();
        return json_encode(array('success' => true));
      }
  } else {
      return json_encode(array('success' => false, 'error_message' => 'Failed to retrieve the image from the given path.', 'error_code' => 500));
      exit();
  }
}