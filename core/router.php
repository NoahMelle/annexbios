<?php
$view = [];
if (isset($_GET['view'])) {
    $view = mes($_GET['view']);
    $view = explode("/", $view);
} else {
    $view = [''];
}

$page = '';
$style = '';
$js = '';
$isApiCall = false;

switch ($view[0]) {
    case '':
        $template = "home";
        $model = "home";
        break;
    case 'vestegingen':
        if($view[1] == 'toevoegen') {
            $template = "addLocation";
        } else if($view[1] == 'wijzigen') {
            $template = "changeLocation";
        } else if($view[1] == 'verwijderen') {
            $template = "deleteLocation";
        } else {
            $template = "locations";
        }
        $model = "locations";
        
        break;
    case 'api':
        $isApiCall = true;

        switch ($view[2]) {
            case 'playingMovies':
                $page = "v1/movies/getPlayingMovies.php";
                break;
            case 'reservePlace':
                $page = "v1/movies/reservePlace.php";
                break;
        }
        break;
    default:
        $template = "404";
        $model = "404";
        break;
}