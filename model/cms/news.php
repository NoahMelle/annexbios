<?php

$data = [
    'page_title' => "Nieuws",
    'base_url' => $env['BASEURL'],
    'styles' => ['news.css'],
    'current_url' => $_SERVER['REQUEST_URI'],
    'news' => fetchNews($con),
    'js' => ['news.js']
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
    $target_dir = "./assets/img/news/";
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
        try {
            if (isset($_POST['news_title']) && isset($_POST['news_content'])) {
                $news_title = sanitizeInput($_POST['news_title']);
                $news_content = sanitizeInput($_POST['news_content']);
                $image_url = handleFileUpload($_FILES['image_url'], $env);
    
                if ($image_url) {
                    $stmt = $con->prepare("INSERT INTO news (news_title, image_url, news_content) VALUES (?, ?, ?)");
                    $stmt->bind_param("sss", $news_title, $image_url, $news_content);
                    $stmt->execute();
                    $stmt->close();
                }
            }
            header("Location: " . $_SERVER['REQUEST_URI']);
        } catch (Exception $e) {
        }
    } else if (isset($_POST['delete-news-submit'])) {
        $newsId = $_POST['delete-news-id'];

        $existingNewsItem = fetchNewsItemByID($con, $newsId);

        if ($existingNewsItem) {
            $image_url = "./assets/img/news/" . $existingNewsItem['image_url'];
            if (file_exists($image_url)) {
                unlink($image_url);
            }
        }

        try {
            $con->begin_transaction();
            $stmt = $con->prepare("DELETE FROM news WHERE id = ?");
            $stmt->bind_param("i", $newsId);
            $stmt->execute();
            $stmt->close();
            $con->commit();
            header("Location: " . $_SERVER['REQUEST_URI']);
        } catch (Exception $e) {
        }
    } else if (isset($_POST['edit-news-submit'])) {
        $newsId = $_POST['edit-news-id'];
        $news_title = sanitizeInput($_POST['news-title']);
        $news_content = sanitizeInput($_POST['news-content']);

        try {
            $con->begin_transaction();
            $stmt = $con->prepare("UPDATE news SET news_title = ?, news_content = ? WHERE id = ?");
            $stmt->bind_param("ssi", $news_title, $news_content, $newsId);
            $stmt->execute();
            $stmt->close();
            $con->commit();
            header("Location: " . $_SERVER['REQUEST_URI']);
        } catch (Exception $e) {
        }
    }
}

function fetchNewsItemByID($con, $newsId) {
    $stmt = $con->prepare("SELECT id, news_title, image_url, news_content FROM news WHERE id = ?");
    $stmt->bind_param("i", $newsId);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }

    return null;
}

function sanitizeInput($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

include "./model/cms/cms_global.php";

?>