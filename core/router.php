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
$cmsLayout = false;

switch ($view[0]) {
    case '':
        $template = "home";
        $model = "home";
        break;
    case 'loguit':
        header("Location: " . $env["BASEURL"] . "log-uit");
        break;
    case 'log-uit':
        session_destroy();
        header("Location: " . $env["BASEURL"]);
        break;
    case 'login':
        header("Location: " . $env["BASEURL"] . "log-in");
        break;
    case 'log-in':
        $template = "login";
        $model = "login";

        break;
    case 'cms':
        if (!isset($_SESSION["user"]) || $_SESSION["user"]["cms_access"] != 1) {
            header("Location: " . $env["BASEURL"] . "log-in");
        } else {
            $cmsLayout = true;
            if (!isset($view[1])) $view[1] = '';
            switch ($view[1]) {
                case '':
                    $template = "cms/cms";
                    $model = "cms/cms";
                    break;
                case 'gebruikers':
                    $template = "cms/users";
                    $model = "cms/users";
                    break;
                case 'vestigingen':
                    if (isset($view[2]) && $view[2] == 'toevoegen') {
                        $template = "cms/addLocation";
                    } else if (isset($view[2]) && $view[2] == 'wijzig') {
                        if (isset($view[3]) && !empty($view[3]) && validate_integer($view[3])) {
                            $template = "cms/changeLocation";
                        } else {
                            header("Location: " . $env["BASEURL"] . "cms/vestigingen");
                        }
                    } else if (isset($view[2]) && $view[2] == 'verwijder') {
                        if (isset($view[3]) && !empty($view[3]) && validate_integer($view[3])) {
                            $template = "cms/deleteLocation";
                        } else {
                            header("Location: " . $env["BASEURL"] . "cms/vestigingen");
                        }
                    } else {
                        $template = "cms/locations";
                    }

                    $model = "cms/locations";
                    break;

                case 'filmladder':
                    if (isset($view[2]) && $view[2] == 'toevoegen') {
                        $template = "cms/addMovieSchedule";
                    } else if (isset($view[2]) && $view[2] == 'wijzig') {
                        if (isset($view[3]) && !empty($view[3]) && validate_integer($view[3])) {
                            $template = "cms/changeMovieSchedule";
                        } else {
                            header("Location: " . $env["BASEURL"] . "cms/vestigingen");
                        }
                    } else if (isset($view[2]) && $view[2] == 'verwijder') {
                        if (isset($view[3]) && !empty($view[3]) && validate_integer($view[3])) {
                            $template = "cms/deleteMovieSchedule";
                        } else {
                            header("Location: " . $env["BASEURL"] . "cms/filmladder");
                        }
                    } else {
                        $template = "cms/movieSchedule";
                    }
                    $model = "cms/movieSchedule";
                    break;

                case 'films':
                    if (isset($view[2]) && $view[2] == 'toevoegen') {
                        $template = "cms/addMovies";
                    } else if (isset($view[2]) && $view[2] == 'wijzig') {
                        if (isset($view[3]) && !empty($view[3]) && validate_integer($view[3])) {
                            $template = "cms/changeMovieSchedule";
                        } else {
                            header("Location: " . $env["BASEURL"] . "cms/vestigingen");
                        }
                    } else if (isset($view[2]) && $view[2] == 'verwijder') {
                        if (isset($view[3]) && !empty($view[3]) && validate_integer($view[3])) {
                            $template = "cms/deleteMovies";
                        } else {
                            header("Location: " . $env["BASEURL"] . "cms/films");
                        }
                    } else {
                        $template = "cms/movies";
                    }
                    $model = "cms/movies";
                    break;
                default:
                    $template = "404";
                    $model = "404";
                    break;
            }
        }
        break;
    case 'api':
        $isApiCall = true;

        switch ($view[2]) {
            case 'movieData':
                $page = "v1/movies/movieData.php";
                break;
            case 'playingMovies':
                $page = "v1/movies/getPlayingMovies.php";
                break;
            case 'reservePlace':
                $page = "v1/movies/reservePlace.php";
                break;
            case 'getnews':
                $page = "v1/news/getnews.php";
                break;
        }
        break;
    default:
        $template = "404";
        $model = "404";
        break;
}