<?php
// Connect with databases
$mysqli = new mysqli('eu-cdbr-west-03.cleardb.net','bf9d3feb887765','1c337c96','heroku_eddc65853faeb30');

// Display error if failed to connect 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}


?>
