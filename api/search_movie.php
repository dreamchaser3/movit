<?php
require_once("api_function.php");

$movie_name = $_POST['movie_name'];

$results = search_movie($movie_name);
echo $results;
?>