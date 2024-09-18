<?php
$data = [
    'page_title' => "AnnexBios Vestigingen",
    'vestigingen_active' => true,
    'base_url' => $env['BASEURL'],
    'styles' => ['locations.css'],
    'locations' => [],
    'functions' => [],
    'current_location_id' => null,
    'current_website_link' => null,
    'current_function' => [],
    'function' => null,
    'city' => null,
    'address' => null,
    'postal_code' => null
];

include "./model/cms/cms_global.php";

// Get all locations
$stmt = $con->prepare("SELECT function_data.name AS function_name, location_data.location_id, location_data.city, location_data.address, location_data.postal_code, location_data.website_link FROM location_data JOIN function_data ON location_data.function = function_data.function_id;");
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data['locations'][] = [
            'location_id' => $row['location_id'],
            'city' => $row['city'],
            'address' => $row['address'],
            'postal_code' => $row['postal_code'],
            'website_link' => $row['website_link'],
            'function' => $row['function_name']
        ];
    }
}

if (isset($view[2]) && $view[2] == 'wijzig' && isset($view[3]) && validate_integer($view[3]) || isset($view[2]) && $view[2] == 'verwijder' && isset($view[3]) && validate_integer($view[3])) {
    $stmt = $con->prepare("SELECT function_data.name, location_data.city, location_data.address, location_data.postal_code, location_data.website_link FROM location_data JOIN function_data ON location_data.function = function_data.function_id WHERE location_id = ?;");
    $stmt->bind_param("i", $view[3]);
    $stmt->bind_result($function, $city, $address, $postal_code, $website_link);
    $stmt->execute();
    $stmt->fetch();
    $stmt->close();

    $data['current_location_id'] = $view[3];
    $data['current_website_link'] = $website_link;
    $data['city'] = $city;
    $data['address'] = $address;
    $data['postal_code'] = $postal_code;

    $stmt = $con->prepare("SELECT function_data.function_id, function_data.name FROM function_data JOIN location_data ON location_data.function = function_data.function_id WHERE location_id = ?;");
    $stmt->bind_param("i", $view[3]);
    $stmt->bind_result($function_id, $function_name);
    $stmt->execute();
    $stmt->fetch();
    $stmt->close();
    $data['current_function'] = [
        'function_id' => $function_id,
        'name' => $function_name
    ];
}

$stmt = $con->prepare("SELECT function_id, name FROM function_data;");
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    if (isset($data['current_function']['function_id']) && $row['function_id'] == $data['current_function']['function_id']) {
        $selected = true;
    } else {
        $selected = false;
    }

    $data['functions'][] = [
        'function_id' => $row['function_id'],
        'name' => $row['name'],
        'selected' => $selected ? 'selected' : ''
    ];
}
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        die('Invalid CSRF token.');
    }

    $action = $view[2] ?? null;

    if ($action === null) {
        return;
    }

    $location = $view[3] ?? null;

    if (($location === null && $action !== 'toevoegen') || ($location !== null && !validate_integer($location))) {
        return;
    }

    switch ($action) {
        case 'toevoegen':
            if (isset($_POST["function"]) && validate_integer($_POST["function"]) && isset($_POST["city"]) && !empty($_POST["city"]) && isset($_POST["address"]) && !empty($_POST["address"]) && isset($_POST["postal_code"]) && !empty($_POST["postal_code"]) && isset($_POST["website_link"]) && !empty($_POST["website_link"]) && isset($_POST["csrf_token"])) {

                $function = $_POST["function"];
                $city = mes($_POST["city"]);
                $address = mes($_POST["address"]);
                $postal_code = mes($_POST["postal_code"]);
                $website_link = mes($_POST["website_link"]);

                $stmt = $con->prepare("INSERT INTO location_data (function, city, address, postal_code, website_link) VALUES (?, ?, ?, ?, ?);");
                $stmt->bind_param("issss", $function, $city, $address, $postal_code, $website_link);
                if ($stmt->execute()) {
                    $stmt->close();

                    $last_id = $con->insert_id;

                    $stmt = $con->prepare("INSERT INTO location_tokens (location_id, token) VALUES (?, ?);");
                    $stmt->bind_param("is", $last_id, generate_token());
                    if ($stmt->execute()) {
                        $stmt->close();
                        header("Location: " . $env["BASEURL"] . "cms/vestigingen");
                    }
                }
            }
            break;
        case 'wijzig':
            if (isset($_POST["function"]) && validate_integer($_POST["function"]) && isset($_POST["city"]) && !empty($_POST["city"]) && isset($_POST["address"]) && !empty($_POST["address"]) && isset($_POST["postal_code"]) && !empty($_POST["postal_code"]) && isset($_POST["website_link"]) && !empty($_POST["website_link"])) {
                $function = $_POST["function"];
                $city = mes($_POST["city"]);
                $address = mes($_POST["address"]);
                $postal_code = mes($_POST["postal_code"]);
                $website_link = mes($_POST["website_link"]);

                $stmt = $con->prepare("UPDATE location_data SET function = ?, city = ?, address = ?, postal_code = ?, website_link = ? WHERE location_id = ?;");
                $stmt->bind_param("issssi", $function, $city, $address, $postal_code, $website_link, $view[3]);
                $stmt->execute();
                $stmt->close();

                header("Location: " . $env["BASEURL"] . "cms/vestigingen");
            } else {
                header("Location: " . $env["BASEURL"] . "cms/vestigingen");
            }
            break;
        case 'verwijder':
            if (isset($_POST["location_id"]) && !empty($_POST["location_id"]) && validate_integer($_POST["location_id"])) {
                $stmt = $con->prepare("DELETE FROM location_movie_data WHERE location_id = ?;");
                $stmt->bind_param("i", $_POST["location_id"]);
                $stmt->execute();
                $stmt->close();

                $stmt = $con->prepare("DELETE FROM location_tokens WHERE location_id = ?;");
                $stmt->bind_param("i", $_POST["location_id"]);
                $stmt->execute();
                $stmt->close();

                $stmt = $con->prepare("DELETE FROM location_data WHERE location_id = ?;");
                $stmt->bind_param("i", $_POST["location_id"]);
                $stmt->execute();
                $stmt->close();

                header("Location: " . $env["BASEURL"] . "cms/vestigingen");
            }
    }
}
