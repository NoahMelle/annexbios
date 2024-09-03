<?php
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
    function validate_integer($input) {
        return filter_var($input, FILTER_VALIDATE_INT) !== false;
    }

    function isToday($date) {
        $today = new DateTime();
        $givenDate = new DateTime($date);
    
        // Compare only the date parts (ignoring the time)
        return $givenDate->format('Y-m-d') === $today->format('Y-m-d');
    }
    
    function isThisWeek($date) {
        $today = new DateTime();
        $givenDate = new DateTime($date);
    
        // Get the start and end of this week
        $startOfWeek = (clone $today)->modify('this week')->setTime(0, 0, 0);
        $endOfWeek = (clone $today)->modify('this week +6 days')->setTime(23, 59, 59);
    
        return $givenDate >= $startOfWeek && $givenDate <= $endOfWeek;
    }
?>