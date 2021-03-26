<?php

class connAdmin
{
	public $conn;			
	function __construct()
	{
		session_start();				
		$this->conn = new Mysqli('localhost','root','','supertiti');
	}
}


?>

