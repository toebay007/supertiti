<?php
// Connect with databases
$mysqli = new mysqli('heroku_eddc65853faeb30','eu-cdbr-west-03.cleardb.net','1c337c96','bf9d3feb887765');

// Display error if failed to connect 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}


?>
