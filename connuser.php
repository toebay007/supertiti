<?php

class connUser
{
	public $conn;			
	function __construct()
	{
		session_start();				
		$this->conn = new Mysqli('localhost','root','','supertiti');
	}
}


?>

