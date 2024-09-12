<?php

// Helper function to generate CSRF token
function generateCsrfToken() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Verify CSRF token
function verifyCsrfToken($token) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

$data = [
    'page_title' => "Nieuws",
    'base_url' => $env['BASEURL'],
    'styles' => ['news.css'],
    'current_url' => $_SERVER['REQUEST_URI'],
    'news' => fetchNews($con),
    'csrf_token' => generateCsrfToken(), // Add CSRF token to data
    'js' => ['news.js']
];

function fetchNews($con) {
    $stmt = $con->prepare("SELECT id, news_title, image_url, news_content FROM news");
    if (!$stmt->execute()) {
        return [];
    }
    $result = $stmt->get_result();
    $stmt->close();

    $news = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $news[] = [
                'id' => $row['id'],
                'news_title' => htmlspecialchars($row['news_title']),
                'image_url' => htmlspecialchars($row['image_url']),
                'news_content' => htmlspecialchars($row['news_content']),
            ];
        }
    }
    return $news;
}

function handleFileUpload($file, $env) {
    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    $target_dir = "./assets/img/news/";
    $newFileName = uniqid() . "-" . bin2hex(random_bytes(8)) . "." . strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    $target_file = $target_dir . $newFileName;
    $uploadOk = 1;

    $mime = mime_content_type($file["tmp_name"]);
    if (!in_array($mime, $allowedMimeTypes)) {
        return false;
    }

    if ($file["size"] > 500000) {
        return false;
    }

    if ($uploadOk && move_uploaded_file($file["tmp_name"], $target_file)) {
        return $newFileName;
    }

    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF Protection check
    if (!verifyCsrfToken($_POST['csrf_token'])) {
        die("Invalid CSRF token.");
    }

    if (isset($_POST['add_news'])) {
        try {
            if (!empty($_POST['news_title']) && !empty($_POST['news_content'])) {
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
            error_log($e->getMessage()); // Log exception
            die("An error occurred while adding news.");
        }
    } elseif (isset($_POST['delete-news-submit'])) {
        $newsId = intval($_POST['delete-news-id']);  // Cast to integer for security

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
            $con->rollback();  // Roll back on failure
            error_log($e->getMessage());
            die("An error occurred while deleting news.");
        }
    } elseif (isset($_POST['edit-news-submit'])) {
        $newsId = intval($_POST['edit-news-id']); // Cast to integer for security
        $existingNewsItem = fetchNewsItemByID($con, $newsId);

        $news_title = sanitizeInput($_POST['edit-news-title']);
        $news_content = sanitizeInput($_POST['edit-news-content']);

        if (!$existingNewsItem) {
            die("News item does not exist.");
        }

        if (!empty($_FILES['edit-image-url']['name'])) {
            $image_url = handleFileUpload($_FILES['edit-image-url'], $env);
            $previousImageUrl = "./assets/img/news/" . $existingNewsItem['image_url'];
            if (file_exists($previousImageUrl)) {
                unlink($previousImageUrl);
            }
        } else {
            $image_url = $existingNewsItem['image_url'];
        }

        try {
            $con->begin_transaction();
            $stmt = $con->prepare("UPDATE news SET news_title = ?, news_content = ?, image_url = ? WHERE id = ?");
            $stmt->bind_param("sssi", $news_title, $news_content, $image_url, $newsId);
            $stmt->execute();
            $stmt->close();
            $con->commit();
            header("Location: " . $_SERVER['REQUEST_URI']);
        } catch (Exception $e) {
            $con->rollback();
            error_log($e->getMessage());
            die("An error occurred while editing news.");
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
