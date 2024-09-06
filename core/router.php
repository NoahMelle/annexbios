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

                header("Location: " . $env["BASEURL"] . "cms/vestigingen");
            } else {
                $_SESSION["user"] = [
                    "user_id" => null,
                    "username" => null,
                    "role" => null
                ];
            }

        }
        
        break;
    case 'cms':
        if(!isset($_SESSION["user"]) || $_SESSION["user"]["role"] != 1) {
            header("Location: " . $env["BASEURL"] . "log-in");
        } else {
            switch ($view[1]) {
                case 'vestigingen':
                    if(isset($view[2]) && $view[2] == 'toevoegen') {
                        $template = "cms/addLocation";

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
                                    header("Location: " . $env["BASEURL"] . "cms/vestigingen");
                                }
                            }

                        }
                    } else if(isset($view[2]) && $view[2] == 'wijzig') {
                        if(isset($view[3]) && !empty($view[3]) && validate_integer($view[3])) {
                            $template = "cms/changeLocation";

                            if(isset($_POST["function"]) && validate_integer($_POST["function"]) && isset($_POST["city"]) && !empty($_POST["city"]) && isset($_POST["address"]) && !empty($_POST["address"]) && isset($_POST["postal_code"]) && !empty($_POST["postal_code"]) && isset($_POST["website_link"]) && !empty($_POST["website_link"])) {
                                $function = $_POST["function"]; 
                                $city = mes($_POST["city"]);
                                $address = mes($_POST["address"]);
                                $postal_code = mes($_POST["postal_code"]);
                                $website_link = mes($_POST["website_link"]);
                                
                                $stmt = $con->prepare("UPDATE location_data SET function = ?, city = ?, address = ?, postal_code = ?, website_link = ? WHERE location_id = ?;");
                                $stmt->bind_param("issssi", $function, $city, $address, $postal_code, $website_link, $view[3]);
                                $stmt->execute();
                                $stmt->close();

                                header("Location: " . $env["BASEURL"] . "cms/vestigingen");
                            }
                        } else {
                            header("Location: " . $env["BASEURL"] . "cms/vestigingen");
                        }
                    } else if(isset($view[2]) && $view[2] == 'verwijder') {
                        if(isset($view[3]) && !empty($view[3]) && validate_integer($view[3])) {
                            $template = "cms/deleteLocation";

                            if(isset($_POST["location_id"]) && !empty($_POST["location_id"]) && validate_integer($_POST["location_id"])) {
                                $stmt = $con->prepare("DELETE FROM location_movie_data WHERE location_id = ?;");
                                $stmt->bind_param("i", $_POST["location_id"]);
                                if($stmt->execute()) {
                                    $stmt->close();

                                    $stmt = $con->prepare("DELETE FROM location_tokens WHERE location_id = ?;");
                                    $stmt->bind_param("i", $_POST["location_id"]);
                                    if($stmt->execute()) {
                                        $stmt->close();

                                        $stmt = $con->prepare("DELETE FROM location_data WHERE location_id = ?;");
                                        $stmt->bind_param("i", $_POST["location_id"]);
                                        if($stmt->execute()) {
                                            $stmt->close();
                                            header("Location: " . $env["BASEURL"] . "cms/vestigingen");
                                        }
                                    }
                                }
                            }
                        } else {
                            header("Location: " . $env["BASEURL"] . "cms/vestigingen");
                        }
                    } else {
                        $template = "cms/locations";
                    }
                    $model = "cms/locations";                            
                    break;
                case 'filmladder':
                    if(isset($view[2]) && $view[2] == 'toevoegen') {
                        $template = "cms/addMovieSchedule";

                        if(isset($_POST["movie"]) && validate_integer($_POST["movie"]) && isset($_POST["location"]) && validate_integer($_POST["location"]) && isset($_POST["place_data"]) && validate_integer($_POST["place_data"]) && isset($_POST["play_time"]) && !empty($_POST["play_time"])) {
                            $movie = $_POST["movie"];
                            $location = $_POST["location"];
                            $place_data_count = $_POST["place_data"];
                            $play_time = mes($_POST["play_time"]);

                            $place_data = generatePlaceData($place_data_count);
                            
                            $stmt = $con->prepare("INSERT INTO location_movie_data (movie_id, location_id, place_data, play_time) VALUES (?, ?, ?, ?);");
                            $stmt->bind_param("iiss", $movie, $location, $place_data, $play_time);
                            if($stmt->execute()) {
                                $stmt->close();
                                header("Location: " . $env["BASEURL"] . "cms/filmladder");
                            }

                        }
                    } else if(isset($view[2]) && $view[2] == 'wijzig') {
                        if(isset($view[3]) && !empty($view[3]) && validate_integer($view[3])) {
                            $template = "cms/changeMovieSchedule";

                            if(isset($_POST["movie"]) && validate_integer($_POST["movie"]) && isset($_POST["location"]) && validate_integer($_POST["location"]) && isset($_POST["place_data"]) && validate_integer($_POST["place_data"]) && isset($_POST["play_time"]) && !empty($_POST["play_time"])) {
                                $movie = $_POST["movie"]; 
                                $location = $_POST["location"];
                                $place_data_count = $_POST["place_data"];
                                $play_time = mes($_POST["play_time"]);

                                $place_data = generatePlaceData($place_data_count);
                                
                                $stmt = $con->prepare("UPDATE location_movie_data SET movie_id = ?, location_id = ?, place_data = ?, play_time = ? WHERE location_movie_id = ?;");
                                $stmt->bind_param("iissi", $movie, $location, $place_data, $play_time, $view[3]);
                                if($stmt->execute()) {
                                    $stmt->close();
                                    header("Location: " . $env["BASEURL"] . "cms/filmladder");
                                }
                            }
                        } else {
                            header("Location: " . $env["BASEURL"] . "cms/vestigingen");
                        }
                    } else if(isset($view[2]) && $view[2] == 'verwijder') {
                        if(isset($view[3]) && !empty($view[3]) && validate_integer($view[3])) {
                            $template = "cms/deleteMovieSchedule";

                            if(isset($_POST["current_location_id"]) && !empty($_POST["current_location_id"]) && validate_integer($_POST["current_location_id"])) {                            
                                $stmt = $con->prepare("DELETE FROM location_movie_data WHERE location_movie_id = ?;");
                                $stmt->bind_param("i", $_POST["current_location_id"]);
                                if($stmt->execute()) {
                                    $stmt->close();
                                    header("Location: " . $env["BASEURL"] . "cms/filmladder");
                                }
                            }
                        } else {
                            header("Location: " . $env["BASEURL"] . "cms/filmladder");
                        }
                    } else {
                        $template = "cms/movieSchedule";
                    }
                    $model = "cms/movieSchedule";                
                    break;
                    
                    case 'films':
                        if(isset($view[2]) && $view[2] == 'toevoegen') {
                            $template = "cms/addMovies";
                        } else if(isset($view[2]) && $view[2] == 'wijzig') {
                            if(isset($view[3]) && !empty($view[3]) && validate_integer($view[3])) {
                                $template = "cms/changeMovieSchedule";
    
                                if(isset($_POST["movie"]) && validate_integer($_POST["movie"]) && isset($_POST["location"]) && validate_integer($_POST["location"]) && isset($_POST["place_data"]) && validate_integer($_POST["place_data"]) && isset($_POST["play_time"]) && !empty($_POST["play_time"])) {
                                    $movie = $_POST["movie"]; 
                                    $location = $_POST["location"];
                                    $place_data_count = $_POST["place_data"];
                                    $play_time = mes($_POST["play_time"]);
    
                                    $place_data = generatePlaceData($place_data_count);
                                    
                                    $stmt = $con->prepare("UPDATE location_movie_data SET movie_id = ?, location_id = ?, place_data = ?, play_time = ? WHERE location_movie_id = ?;");
                                    $stmt->bind_param("iissi", $movie, $location, $place_data, $play_time, $view[3]);
                                    if($stmt->execute()) {
                                        $stmt->close();
                                        header("Location: " . $env["BASEURL"] . "cms/filmladder");
                                    }
                                }
                            } else {
                                header("Location: " . $env["BASEURL"] . "cms/vestigingen");
                            }
                        } else if(isset($view[2]) && $view[2] == 'verwijder') {
                            if(isset($view[3]) && !empty($view[3]) && validate_integer($view[3])) {
                                $template = "cms/deleteMovieSchedule";
    
                                if(isset($_POST["current_location_id"]) && !empty($_POST["current_location_id"]) && validate_integer($_POST["current_location_id"])) {                            
                                    $stmt = $con->prepare("DELETE FROM location_movie_data WHERE location_movie_id = ?;");
                                    $stmt->bind_param("i", $_POST["current_location_id"]);
                                    if($stmt->execute()) {
                                        $stmt->close();
                                        header("Location: " . $env["BASEURL"] . "cms/filmladder");
                                    }
                                }
                            } else {
                                header("Location: " . $env["BASEURL"] . "cms/filmladder");
                            }
                        } else {
                            $template = "cms/movies";
                        }
                        $model = "cms/movies";                
                        break;
                default:
                    $template = "cms/cms";
                    $model = "cms/cms";
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