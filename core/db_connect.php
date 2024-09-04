<?php
include_once "./vendor/autoload.php";

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