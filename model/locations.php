<?php 
    $data = [
        'page_title' => "AnnexBios Locations",
        'base_url' => $env['BASEURL'],
        'website_link' => "",
        'styles' => ['locations.css'],
        'locations' => []
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