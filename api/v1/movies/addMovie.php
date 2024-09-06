<?php
require_once './core/db_connect.php';


$data = getMovieData('tt21284218');
processMovie($data);