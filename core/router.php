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
        if(isset($view[1]) && $view[1] == 'toevoegen') {
            $template = "addLocation";

            if(isset($_POST["city"]) && !empty($_POST["city"]) && isset($_POST["address"]) && !empty($_POST["address"]) && isset($_POST["postal_code"]) && !empty($_POST["postal_code"]) && isset($_POST["website_link"]) && !empty($_POST["website_link"])) {
                $city = mes($_POST["city"]);
                $address = mes($_POST["address"]);
                $postal_code = mes($_POST["postal_code"]);
                $website_link = mes($_POST["website_link"]);
                
                $stmt = $con->prepare("INSERT INTO location_data (city, address, postal_code, website_link) VALUES (?, ?, ?, ?);");
                $stmt->bind_param("ssss", $city, $address, $postal_code, $website_link);
                $stmt->execute();
                $stmt->close();

                header("Location: " . $env["BASEURL"] . "vestegingen");
            }
        } else if(isset($view[1]) && $view[1] == 'wijzig') {
            if(isset($view[2])) {
                $template = "changeLocation";
            } else {
                header("Location: " . $env["BASEURL"] . "vestegingen");
            }
        } else if(isset($view[1]) && $view[1] == 'verwijderen') {
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