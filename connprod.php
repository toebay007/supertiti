<?php

class connoothers{
	protected $conn;			
	function __construct(){
		//session_start();				
		$this->conn = new Mysqli('heroku_eddc65853faeb30','eu-cdbr-west-03.cleardb.net','1c337c96','bf9d3feb887765');
	}
}




?>
