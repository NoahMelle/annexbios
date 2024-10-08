<?php 

$allowedPages = $_SESSION['user']['page_permissions'];
$superuser = $_SESSION['user']['superuser'];

if ($superuser) {
    $stmt = $con->prepare("SELECT title, url, img_url FROM admin_header_pages_data ORDER BY sort ASC");
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $stmt = $con->prepare("(SELECT p.title, p.url, p.img_url, p.sort FROM user_page_permission_link up LEFT JOIN admin_header_pages_data p ON p.id = up.page_id WHERE up.user_id = ? UNION SELECT title, url, img_url, sort FROM admin_header_pages_data WHERE title = 'Dashboard') ORDER BY sort ASC");
    $stmt->bind_param("i", $_SESSION['user']['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
}

// Verify CSRF token
function verifyCsrfToken($token) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

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

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data['header_pages'][] = [
            'title' => $row['title'],
            'url' => $row['url'],
            'img_url' => $row['img_url'],
            'active' => $view[1] == $row['url'] ? true : false,
        ];
    }
}

$data['csrf_token'] = generateCsrfToken();
?>