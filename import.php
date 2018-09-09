<?php

//Since this is not a docker and is using forge.laravel.com the env are stored in this file
include_once '.env';
include_once './Models/Movies.php';
include_once './Models/API.php';

$apiKey = new \movieList\API();
$movies = New \movieList\Movies();

//Auth the user
try {
	$apiKey->check_key($_GET['ApiKey']);
}catch (\Exception $e) {
	die($e);
}


//GET VARS
$year = preg_replace("/[^A-Za-z0-9 ]/", '',$_GET['year']);

$data = array(
	'primary_release_year' => $year,
	'sort_by' => 'vote_average.desc',
	'api_key' => getenv('MovieApikey')
);

$json = file_get_contents('http://api.themoviedb.org/3/discover/movie?'.http_build_query($data));
$objs = json_decode($json);
foreach($objs->results as $obj){
	$title = substr(preg_replace("/[^A-Za-z0-9 ]/", '', $obj->original_title),0,49);
	$rating = $obj->vote_average/2;
	$length = 0;
	$format='Streaming';
	$movies->create($title,$format,$length,$year,$rating);
}