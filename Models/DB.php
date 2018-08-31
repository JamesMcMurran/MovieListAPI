<?php

namespace movieList;

//Since this is not a docker and is using forge.laravel.com the env are stored in this file
include '.env';

class DB
{
private $mysqli;


	function __construct()
	{
		$this->connect();
	}

	/**
	 *
	 */
	private function connect (){
		$this->mysqli = new \mysqli( getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_TABLE'));

		if ($this->mysqli->connect_error) {
			die('Connect Error (' . $this->mysqli->connect_errno . ') '
				. $this->mysqli->connect_error);
		}

		if (mysqli_connect_error()) {
			die('Connect Error (' . mysqli_connect_errno() . ') '
				. mysqli_connect_error());
		}
	}

	/**
	 * @param $title
	 * @param $format
	 * @param $length
	 * @param $year
	 * @param $rating
	 */
	public function insertMovie ($title,$format,$length,$year,$rating){
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

	private function update (){

	}

	/**
	 * This function is used for finding out what
	 */
	private function createTypeArray(){

	}

	/**
	 * Keep it clean and close it out when done
	 */
	public function __destruct() {
		$this->mysqli->close();
	}
}