<?php 
    $data = [
        'page_title' => "AnnexBios Filmladder",
        'base_url' => $env['BASEURL'],
        'styles' => ['movieSchedule.css'],
        'js' => ['movieSchedule.js'],
        'skeleton-loader-amt' => range(1, 6),
        'activeMovieDates' => [],
        'movies' => []
    ];