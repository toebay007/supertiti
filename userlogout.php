<?php

session_start();


if (isset($_SESSION['idzz'])) {
	session_unset($_SESSION['idzz']);
	session_destroy();

}
	
 header("location:index.php");


?>