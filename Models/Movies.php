<?php

namespace movieList;


class Movies
{

	public function create(){
		#takes input
		#Validate input
		#Store input

	}

	public function get($id){
		#validate id
		#Select movie list for the info
	}

	public function update(){

	}

	public function delete(){

	}

	public function getList($order="ASC"){

	}

	private function validate_title(){
		#Title [text; length between 1 and 50 characters]
	}

	private function validate_movie_format(){
		#b. Format [text; allowable values “VHS”, “DVD”, “Streaming”]
	}

	private function validate_length(){
		#c. Length [time; value between 0 and 500 minutes]
	}

	private function validate_year(){
		#d. Release Year [integer; value between 1800 and 2100]
	}

	private function validate_rating(){
		#e. Rating [integer; value between 1 and 5]
	}











}