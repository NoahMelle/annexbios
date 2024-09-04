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

        if(isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"])) {
            $username = mes($_POST["username"]);
            $password = mes($_POST["password"]);

            $stmt = $con->prepare("SELECT user_id, username, password, role FROM user_data WHERE username = ?;");
            $stmt->bind_param("s", $username);
            $stmt->bind_result($user_id, $username, $db_password, $role);
            $stmt->execute();
            $stmt->fetch();
            $stmt->close();

            if(password_verify($password, $db_password)) {
                $_SESSION["user"] = [
                    "user_id" => $user_id,
                    "username" => $username,
                    "role" => $role
                ];

                header("Location: " . $env["BASEURL"] . "vestigingen");
            } else {
                $_SESSION["user"] = [
                    "user_id" => null,
                    "username" => null,
                    "role" => null
                ];
            }

        }
        
        break;
    case 'vestigingen':
        if(!isset($_SESSION["user"]) || $_SESSION["user"]["role"] != 1) {
            header("Location: " . $env["BASEURL"] . "log-in");
        } else {
            if(isset($view[1]) && $view[1] == 'toevoegen') {
                $template = "addLocation";

                if(isset($_POST["function"]) && validate_integer($_POST["function"]) && isset($_POST["city"]) && !empty($_POST["city"]) && isset($_POST["address"]) && !empty($_POST["address"]) && isset($_POST["postal_code"]) && !empty($_POST["postal_code"]) && isset($_POST["website_link"]) && !empty($_POST["website_link"])) {
                    $function = $_POST["function"];
                    $city = mes($_POST["city"]);
                    $address = mes($_POST["address"]);
                    $postal_code = mes($_POST["postal_code"]);
                    $website_link = mes($_POST["website_link"]);
                    
                    $stmt = $con->prepare("INSERT INTO location_data (function, city, address, postal_code, website_link) VALUES (?, ?, ?, ?, ?);");
                    $stmt->bind_param("issss", $function, $city, $address, $postal_code, $website_link);
                    if($stmt->execute()) {
                        $stmt->close();

                        $last_id = $con->insert_id;
                        
                        $stmt = $con->prepare("INSERT INTO location_tokens (location_id, token) VALUES (?, ?);");
                        $stmt->bind_param("is", $last_id, generate_token());
                        if($stmt->execute()) {
                            $stmt->close();
                            header("Location: " . $env["BASEURL"] . "vestigingen");
                        }
                    }

                }
            } else if(isset($view[1]) && $view[1] == 'wijzig') {
                if(isset($view[2]) && !empty($view[2]) && validate_integer($view[2])) {
                    $template = "changeLocation";

                    if(isset($_POST["function"]) && validate_integer($_POST["function"]) && isset($_POST["city"]) && !empty($_POST["city"]) && isset($_POST["address"]) && !empty($_POST["address"]) && isset($_POST["postal_code"]) && !empty($_POST["postal_code"]) && isset($_POST["website_link"]) && !empty($_POST["website_link"])) {
                        $function = $_POST["function"]; 
                        $city = mes($_POST["city"]);
                        $address = mes($_POST["address"]);
                        $postal_code = mes($_POST["postal_code"]);
                        $website_link = mes($_POST["website_link"]);
                        
                        $stmt = $con->prepare("UPDATE location_data SET function = ?, city = ?, address = ?, postal_code = ?, website_link = ? WHERE location_id = ?;");
                        $stmt->bind_param("issssi", $function, $city, $address, $postal_code, $website_link, $view[2]);
                        $stmt->execute();
                        $stmt->close();

                        header("Location: " . $env["BASEURL"] . "vestigingen");
                    }
                } else {
                    header("Location: " . $env["BASEURL"] . "vestigingen");
                }
            } else if(isset($view[1]) && $view[1] == 'verwijder') {
                if(isset($view[2]) && !empty($view[2]) && validate_integer($view[2])) {
                    $template = "deleteLocation";

                    if(isset($_POST["location_id"]) && !empty($_POST["location_id"]) && validate_integer($_POST["location_id"])) {
                        $stmt = $con->prepare("DELETE FROM location_movie_data WHERE location_id = ?;");
                        $stmt->bind_param("i", $_POST["location_id"]);
                        if($stmt->execute()) {
                            $stmt->close();
                            
                            $stmt = $con->prepare("DELETE FROM location_data WHERE location_id = ?;");
                            $stmt->bind_param("i", $_POST["location_id"]);
                            if($stmt->execute()) {
                                $stmt->close();
                                header("Location: " . $env["BASEURL"] . "vestigingen");
                            }
                        }
                    }
                } else {
                    header("Location: " . $env["BASEURL"] . "vestigingen");
                }
            } else {
                $template = "locations";
            }
            $model = "locations";
            
            break;
        }
    case 'filmladder':
        $template = "movieSchedule";
        $model = "movieSchedule";
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
        }
        break;
    default:
        $template = "404";
        $model = "404";
        break;
}