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

$allowedPages = [];
$isSuperUser = false;

if (isset($_SESSION['user'])) {
    $allowedPages = $_SESSION['user']['page_permissions'];
    $isSuperUser = $_SESSION['user']['superuser'];
}

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
                    if (in_array("Gebruikers", $allowedPages) || $isSuperUser) {

                        if (isset($view[2]) && $view[2] === 'wijzig') {
                            $template = "cms/changeUsers";
                        } else {
                            $template = "cms/users";
                        }
                        $model = "cms/users";
                    } else {
                        header("Location: " . $env["BASEURL"] . "cms");
                        exit;
                    }
                    break;
                case 'vestigingen':
                    if (in_array("Vestigingen", $allowedPages) || $isSuperUser) {
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
                    } else {
                        header("Location: " . $env["BASEURL"] . "cms");
                        exit;
                    }
                    break;
                case 'filmladder':
                    if (in_array("Filmladder", $allowedPages) || $isSuperUser) {
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
                    } else {
                        header("Location: " . $env["BASEURL"] . "cms");
                        exit;
                    }
                    break;

                case 'films':
                    if (in_array("Filmgegevens", $allowedPages) || $isSuperUser) {
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
                    } else {
                        header("Location: " . $env["BASEURL"] . "cms");
                        exit;
                    }
                    break;
                case 'nieuws':
                    if (in_array("Nieuws", $allowedPages) || $isSuperUser) {
                        $template = "cms/news";
                        $model = "cms/news";
                    } else {
                        header("Location: " . $env["BASEURL"] . "cms");
                        exit;
                    }
                    break;
                default:
                    $template = "404";
                    $model = "cms/cms_404";
                    break;
            }
        }
        break;
    case 'api':
        $isApiCall = true;

        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
        
        // Handle OPTIONS requests (preflight)
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            // Return 200 OK status for the preflight request
            http_response_code(200); // This line ensures a 200 OK response
            exit(0); // Stop further processing
        }
        
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