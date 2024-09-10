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

if (isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
    $username = mes($_POST["username"]);
    $password = mes($_POST["password"]);

    $stmt = $con->prepare("SELECT u.user_id, u.username, GROUP_CONCAT(up.page_id) as page_permissions, u.password, u.cms_access, u.superuser FROM user_data u LEFT JOIN user_page_permission_link up ON u.user_id = up.user_id WHERE username = ?;");
    $stmt->bind_param("s", $username);
    $stmt->bind_result($user_id, $username, $page_permissions, $db_password, $cms_access, $superuser);
    $stmt->execute();
    $stmt->fetch();
    $stmt->close();

    if (password_verify($password, $db_password)) {
        $_SESSION["user"] = [
            "user_id" => $user_id,
            "username" => $username,
            "cms_access" => $cms_access,
            "page_permissions" => $page_permissions ? explode(",", $page_permissions) : [],
            "superuser" => $superuser
        ];

        header("Location: " . $env["BASEURL"] . "cms/vestigingen");
    } else {
        $_SESSION["user"] = [
            "user_id" => null,
            "username" => null,
            "cms_access" => null
        ];
    }
}