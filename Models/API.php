<?php


namespace movieList;


class API
{
	public function check_key($key){
		#Validate key is Alpha Numeric
		#Check the DB for the Key
		if(empty($key)){
			throw new \Exception("No API key was provided. ");
		}

		if($key!=getenv('ApiKey')){
			throw new \Exception("The API key you provided is not valid. ");
		}
	}
}