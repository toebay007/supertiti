<?php

class connUser
{
	public $conn;			
	function __construct()
	{
		session_start();				
		$this->conn = new Mysqli('eu-cdbr-west-03.cleardb.net','bf9d3feb887765','1c337c96','heroku_eddc65853faeb30');
	}
}


?>

