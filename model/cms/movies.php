<?php $data = [
    'page_title' => "AnnexBios Films",
    'base_url' => $env['BASEURL'],
    'styles' => ['movies.css'],
    "movies" => [],
];

$stmt = $con->prepare("SELECT movie_id, imdb_id, title  FROM movie_data;");
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $data["movies"][] = [
        "database_id" => $row["movie_id"],
        "imdb_id" => $row["imdb_id"],
        "title" => $row["title"]
    ];
}