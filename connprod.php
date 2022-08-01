<?php

class connoothers{
	protected $conn;			
	function __construct(){
		//session_start();				
		$this->conn = new Mysqli('localhost','eu-cdbr-west-03.cleardb.net','1c337c96','heroku_eddc65853faeb30');
	}
}




?>
