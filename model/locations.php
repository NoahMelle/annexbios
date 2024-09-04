<?php 
    $data = [
        'page_title' => "AnnexBios Locations",
        'base_url' => $env['BASEURL'],
        'website_link' => "",
        'styles' => ['locations.css'],
        'locations' => [],

        'current_location_id' => null,
        'city' => null,
        'address' => null,
        'postal_code' => null,
        'website_link' => null
    ];

    $stmt = $con->prepare("SELECT location_id, website_link, city, address, postal_code FROM location_data");
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data['website_link'] = $row['website_link'];
            $data['locations'][] = [
                'location_id' => $row['location_id'],
                'city' => $row['city'],
                'address' => $row['address'],
                'postal_code' => $row['postal_code']
            ];
        }
    }

    if(isset($view[1]) && $view[1] == 'wijzig' && isset($view[2]) && validate_integer($view[2])) {
        $stmt = $con->prepare("SELECT city, address, postal_code, website_link FROM location_data WHERE location_id = ?");
        $stmt->bind_param("i", $view[2]);
        $stmt->bind_result($city, $address, $postal_code, $website_link);
        $stmt->execute();
        $stmt->fetch();
        $stmt->close();

        $data['current_location_id'] = $view[2];
        $data['city'] = $city;
        $data['address'] = $address;
        $data['postal_code'] = $postal_code;
        $data['website_link'] = $website_link;
    } else if(isset($view[1]) && $view[1] == 'verwijder' && isset($view[2]) && validate_integer($view[2])) {
        $data['current_location_id'] = $view[2];
    }