<?php

$mainAutoLoad = './vendor/autoload.php';
$xmlAutoLoad = '../vendor/autoload.php';
if (file_exists($mainAutoLoad)) {
    include_once $mainAutoLoad;
} else if (file_exists($xmlAutoLoad)) {
    include_once $xmlAutoLoad;
}

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

function generateFileName($originalName)
{
    $originalName = str_replace(' ', '_', $originalName);
    $originalName = preg_replace('/[^A-Za-z0-9._-]/', '', $originalName);
    return uniqid() . "-" . $originalName;
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
    for($i = 1; $i < $amount + 1; $i++) {
        $place_data[] = [
            'place' => $i,
            'available' => true
        ];
    }
    return json_encode($place_data);
}

function getIpAddress()
{
  $ipAddress = '';
  if (! empty($_SERVER['HTTP_CLIENT_IP'])) {
    // to get shared ISP IP address
    $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
  } else if (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    // check for IPs passing through proxy servers
    // check if multiple IP addresses are set and take the first one
    $ipAddressList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
    foreach ($ipAddressList as $ip) {
      if (! empty($ip)) {
        // if you prefer, you can check for valid IP address here
        $ipAddress = $ip;
        break;
      }
    }
  } else if (! empty($_SERVER['HTTP_X_FORWARDED'])) {
    $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
  } else if (! empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
    $ipAddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
  } else if (! empty($_SERVER['HTTP_FORWARDED_FOR'])) {
    $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
  } else if (! empty($_SERVER['HTTP_FORWARDED'])) {
    $ipAddress = $_SERVER['HTTP_FORWARDED'];
  } else if (! empty($_SERVER['REMOTE_ADDR'])) {
    $ipAddress = $_SERVER['REMOTE_ADDR'];
  }
  return $ipAddress;
}
