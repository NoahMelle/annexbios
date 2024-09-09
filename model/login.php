<?php
$data = [
    'page_title' => "AnnexBios Log-in",
    'base_url' => $env['BASEURL'],
    'styles' => ['login.css']
];

$stmt = $con->prepare("SELECT image_path, city, address, postal_code, website_link FROM location_data");
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $data["locations"][] = [
        'image_path' => !empty($row['image_path']) ? $row['image_path'] : 'default.png',
        'city' => $row['city'],
        'address' => $row['address'],
        'postal_code' => $row['postal_code'],
        'website_link' => $row['website_link'],
    ];
}
