<?php

namespace movieList;

//Since this is not a docker and is using forge.laravel.com the env are stored in this file
include '.env';

class DB
{
private $mysqli;

	private function connect (){
		$this->mysqli = new mysqli( getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_TABLE'));

		if ($this->mysqli->connect_error) {
			die('Connect Error (' . $this->mysqli->connect_errno . ') '
				. $this->mysqli->connect_error);
		}

		if (mysqli_connect_error()) {
			die('Connect Error (' . mysqli_connect_errno() . ') '
				. mysqli_connect_error());
		}
	}

	private function insert ($table,$array,$types){
		if (!($stmt = $this->mysqli->prepare("INSERT INTO $table VALUES (?)"))) {
			echo "Prepare failed: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
		}
		$id = 1;
		if (!$stmt->bind_param($types, $id)) {
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