<?php
  require_once '../../core/db_connect.php';
?>

<!doctype html>
<html>

<head>
    <title>AnnexBios API Documentatie</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="module" src="https://cdn.zudoku.dev/latest/main.js" crossorigin></script>
    <link rel="stylesheet" href="https://cdn.zudoku.dev/latest/style.css" crossorigin />

</head>

<body>
    <!--<div data-api-url="https://annexbios.nickvz.nl/api-config.yaml"></div>-->
    <div data-api-url="<?= $env['BASEURL'] ?>/api/api-config.yaml"></div>

    <style>
    body>div>header>div>div>div.flex>a>div>span {
        display: none;
    }
    </style>
</body>

</html>