<?php



include 'Models/Movies.php';

$movies = new \movieList\Movies();

$movies->create("TEST movie".rand(0,999999) ,"VHS",rand(1,500),rand(1800,2100),rand(1,5));