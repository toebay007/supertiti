<?php

session_start();


if (isset($_SESSION['staff_name'])) {
	session_unset($_SESSION['staff_name']);
	session_destroy();

}
	
 header("location:admin.php");


?>