<?php  
error_reporting(0);
session_start();
if (!isset($_SESSION['staff_name'])) {
    header("location:admin.php");
}
include "abcHeaders.php"; 

$id = $_SESSION['ids'];

?>
