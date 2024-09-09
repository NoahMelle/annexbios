<?php
    $data = [
        'page_title' => "Gebruikers",
        'base_url' => $env['BASEURL'],
        'users_active' => true,
        'styles' => ['users.css'],
        'js' => ['users.js']
    ];

    $stmt = $con->prepare("SELECT username, last_login FROM user_data");
    $stmt->bind_result($username, $last_login);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data['users'][] = [
                'username' => $row['username'],
                'last_login' => $row['last_login']
            ];
        }
    }

    include "./model/cms/cms_global.php";

    $stmt = $con->prepare("SELECT title FROM admin_header_pages_data WHERE url <> 'gebruikers';");
    $stmt->bind_result($title);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data['available_perms'][] = $row['title'];
        }
    }
?>