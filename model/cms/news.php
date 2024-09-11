<?php

$data = [
    'page_title' => "Nieuws",
    'base_url' => $env['BASEURL'],
    'styles' => ['news.css'],
    'current_url' => $_SERVER['REQUEST_URI'],
    'news' => fetchNews($con)
];

function fetchNews($con) {
    $stmt = $con->prepare("SELECT id, news_title, image_url, news_content FROM news");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $news = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $news[] = [
                'id' => $row['id'],
                'news_title' => $row['news_title'],
                'image_url' => $row['image_url'],
                'news_content' => $row['news_content']
            ];
        }
    }

    return $news;
}

function handleFileUpload($file, $env) {
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . $env['BASEURL'] . "assets/img/news/";
    $newFileName = uniqid() . "-" . strtolower(basename($file["name"]));
    $target_file = $target_dir . $newFileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (isset($_POST["add_news"])) {
        $check = getimagesize($file["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }

    if ($file["size"] > 500000) {
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        return false;
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $newFileName;
        } else {
            return false;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_news'])) {
        if (isset($_POST['news_title']) && isset($_POST['news_content'])) {
            $news_title = $_POST['news_title'];
            $news_content = $_POST['news_content'];
            $image_url = handleFileUpload($_FILES['image_url'], $env);

            if ($image_url) {
                $stmt = $con->prepare("INSERT INTO news (news_title, image_url, news_content) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $news_title, $image_url, $news_content);
                $stmt->execute();
                $stmt->close();
            }
        }
    }
}

include "./model/cms/cms_global.php";

?>