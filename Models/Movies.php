<?php

namespace movieList;


class Movies
{

	private $allowedFormats = array( “VHS”, “DVD”, “Streaming”);

	/**
	 * Use this function to make a movie entry
	 *
	 * @param $title  varChar 1 - 50
	 * @param $format enum( “VHS”, “DVD”, “Streaming”)
	 * @param $length int 0-500
	 * @param $year   int 1800 - 2100
	 * @param $rating int 1-5
	 */
	public function create($title,$format,$length,$year,$rating){

		$this->validate_title($title);
		$this->validate_movie_format($format);
		$this->validate_length($length);
		$this->validate_year($year);
		$this->validate_rating($rating);

		if (!($stmt = $this->mysqli->prepare("INSERT INTO `movieList`.`movies` (`title`, `format`, `lenght`, `year`, `rating`) 
													VALUES (?, ?, ?, ?, ?);"))) {
			echo "Prepare failed: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
		}

		if (!$stmt->bind_param("ssiii",$title,$format,$length,$year,$rating)) {
			echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}

		if (!$stmt->execute()) {
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
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

	private function validate_title($title){
		if(strlen ($title)>50){
			throw new Exception("The length of the title is grater than 50. ");
		}

		if(strlen ($title)==0){
			throw new Exception("You need a title. ");
		}

		if(strlen ($title)>50){
			throw new Exception("The length of the title can not be longer than 50 characters. ");
		}

		if(!preg_match('/^[a-zA-Z0-9,\':?]+$/', $title)){
			throw new Exception("Please only uses letters numbers and , ' : ? ");
		}
		#Title [text; length between 1 and 50 characters]
	}

	private function validate_movie_format($format){
		#b. Format [text; allowable values “VHS”, “DVD”, “Streaming”]
		if (!in_array($format, $this->allowedFormats)) {
			throw new Exception("This is not an allowed format. ");
		}
	}

	private function validate_length($length){
		#c. Length [time; value between 0 and 500 minutes]
		if(strlen ($length)>500){
			throw new Exception("The length of the film can not be grater than 500 minutes. ");
		}
		if(!preg_match('/^[0-9]+$/', $length)){
			throw new Exception("Please only uses numbers. ");
		}

	}

	private function validate_year($year){
		#d. Release Year [integer; value between 1800 and 2100]
		if($year<1800 || $year>2100){
			throw new Exception("The year can not be less than 1800 or grater than 2100. ");
		}

		if(!preg_match('/^[0-9]+$/', $year)){
			throw new Exception("Please only uses numbers. ");
		}
	}

	private function validate_rating($rating){
		#e. Rating [integer; value between 1 and 5]
		if($rating<1 || $rating>5){
			throw new Exception("The year can not be less than 1 or grater than 5. ");
		}

		if(!preg_match('/^[0-9]+$/', $rating)){
			throw new Exception("Please only uses numbers. ");
		}

	}











}