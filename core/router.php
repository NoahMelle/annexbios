<?php

$view = '';
if (!empty($_GET['view'])) {
    $view = mes($_GET['view']);
    $view = str_replace("/", "", $view);
}

switch ($view) {
    case '':
        $template = "home";
        $model = "home";
        break;
    case 'products':
        $template = "products";
        $model = "products";
        break;

    default:
        $template = "404";
        $model = "404";
        break;
}
