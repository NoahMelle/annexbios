<?php 
    $data = [
        'page_title' => "AnnexBios Vestigingen",
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

    $stmt = $con->prepare("SELECT function_data.name AS function_name, location_data.location_id, location_data.city, location_data.address, location_data.postal_code, location_data.website_link FROM location_data JOIN function_data ON location_data.function = function_data.function_id;");
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
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

    if(isset($view[1]) && $view[1] == 'wijzig' && isset($view[2]) && validate_integer($view[2]) || isset($view[1]) && $view[1] == 'verwijder' && isset($view[2]) && validate_integer($view[2])) {
        $stmt = $con->prepare("SELECT function_data.name, location_data.city, location_data.address, location_data.postal_code, location_data.website_link FROM location_data JOIN function_data ON location_data.function = function_data.function_id WHERE location_id = ?;");
        $stmt->bind_param("i", $view[2]);
        $stmt->bind_result($function, $city, $address, $postal_code, $website_link);
        $stmt->execute();
        $stmt->fetch();
        $stmt->close();

        $data['current_location_id'] = $view[2];
        $data['current_website_link'] = $website_link;
        $data['city'] = $city;
        $data['address'] = $address;
        $data['postal_code'] = $postal_code;

        $stmt = $con->prepare("SELECT function_data.function_id, function_data.name FROM function_data JOIN location_data ON location_data.function = function_data.function_id WHERE location_id = ?;");
        $stmt->bind_param("i", $view[2]);
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
    while($row = $result->fetch_assoc()) {
        if(isset($data['current_function']['function_id']) && $row['function_id'] == $data['current_function']['function_id']) {
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