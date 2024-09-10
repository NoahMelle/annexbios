<?php 

$stmt = $con->prepare("SELECT title, url, img_url FROM admin_header_pages_data ORDER BY sort ASC;");
$stmt->bind_result($title, $url, $img_url);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

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
?>