<?php
// Initialize default values
$movie_id = null;
$location_id = null;

if (!empty($_GET['view'])) {
    $view = explode("/", htmlspecialchars($_GET['view'], ENT_QUOTES, 'UTF-8'));

    // Validate and assign movie_id if present
    if (!empty($view[3]) && ($view[3] === 'null' || validate_integer($view[3]))) {
        $movie_id = $view[3] === 'null' ? null : (int)$view[3];
    }

    // Validate and assign location_id if present
    if (!empty($view[4]) && validate_integer($view[4])) {
        $location_id = (int)$view[4];
    }
}

// Build the base query
$query = "SELECT 
            location_movie_data.id, 
            location_movie_data.location_id, 
            location_movie_data.place_data, 
            location_movie_data.play_time, 
            location_data.name 
          FROM 
            location_movie_data 
          JOIN 
            location_data 
          ON 
            location_movie_data.location_id = location_data.location_id";

$conditions = [];
$params = [];
$types = "";

// Add conditions based on provided parameters
if ($movie_id !== null) {
    $conditions[] = "location_movie_data.movie_id = ?";
    $params[] = $movie_id;
    $types .= "i";
}

if ($location_id !== null) {
    $conditions[] = "location_movie_data.location_id = ?";
    $params[] = $location_id;
    $types .= "i";
}

if (!empty($conditions)) {
    $query .= " WHERE " . implode(" AND ", $conditions);
}

// Prepare the statement
$stmt = $con->prepare($query);

// Bind parameters if there are any
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

// Execute the statement
$stmt->execute();

$result = $stmt->get_result();
$data = [];
$id = 0;

// Fetch and process results
while ($row = $result->fetch_assoc()) {
    $place_data = json_decode($row["place_data"], true);
    
    $data[$id] = [
        "id" => $row["id"],
        "location" => [
            "id" => $row["location_id"],
            "name" => $row["name"]
        ],
        "play_time" => $row["play_time"],
        "plays_this_week" => isThisWeek($row["play_time"]),
        "plays_today" => isToday($row["play_time"]),
        "place_data" => []
    ];

    if (isset($place_data["places"])) {
        foreach ($place_data["places"] as $place) {
            $data[$id]["place_data"][] = [
                "place" => $place["place"],
                "available" => $place["available"]
            ];
        }
    }

    $id++;
}

// Output the JSON-encoded data
echo json_encode($data);
?>