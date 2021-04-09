<?php
// Connect with databases
$mysqli = new mysqli("localhost","root","","supertiti");

// Display error if failed to connect 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}


?>