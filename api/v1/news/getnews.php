<?php
require_once './core/check_api_token.php';

if (isset($validToken) && $validToken === true && isset($current_location_id)) {
    $stmt = $con->prepare("SELECT news_title, news_content, published_at, image_url FROM news");
    $stmt->execute();

    $result = $stmt->get_result();
    $data = [];
    $id = 0;

    while ($row = $result->fetch_assoc()) {
        $data[$id] = [
            "title" => $row["news_title"],
            "content" => $row["news_content"],
            "date" => $row["published_at"],
            "image" => $row["image_url"]
        ];

        $id++;
    }

    echo json_encode($data);
}