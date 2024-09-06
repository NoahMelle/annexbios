<?php
    include_once './core/db_connect.php';

    $view = '';
    if (!empty($_GET['view'])) {
        $view = htmlspecialchars($_GET['view']);
        $view = str_replace("/", "", $view);
    }

    $page = '';
    $style = '';
    $js = '';
    $isApiCall = false;

    switch($view) {
    case '':
        $page = 'home.php';
        $style = 'home.css';
        $js = 'home.js';
        break;
    case 'apiv1playingMovies':
        $page = 'v1/movies/getPlayingMovies.php';
        $isApiCall = true;
        break;
    case 'apiv1reservePlace':
        $page = 'v1/movies/reservePlace.php';
        $isApiCall = true;
        break;
    case 'apiv1temp':
        $page = 'v1/movies/temp.php';
        $isApiCall = true;
        break;
    default: 
        $page = '404.php';
        $style = '404.css';
        $js = '404.js';
    }

    if($isApiCall) {
        require_once './api/' . $page;
        exit();
    } else {
        require_once './view/' . $page;
    }
?>