<?php



include 'Models/Movies.php';

$movies = new \movieList\Movies();

if(!empty($_GET['list'])){
	$movies->getList();
}


/*try{
	$movies->create("TEST movie".rand(0,999999) ,"VHS",rand(1,500),rand(1800,2100),rand(1,5));
	echo 'Insert completed';
} catch (\Exception $e) {
	echo 'Caught exception: ',   $e->getMessage(), "\n";
}*/
