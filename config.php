<?php  
$user = "";
$orders = ""; 
/*
* Paypal and database configuration
*/

// paypal configuration
define('PAYPAL_ID', 'onyekaotobe@gmail.com'); //Business email
define('PAYPAL_SANDBOX', TRUE); //TRUE OR FALSE

define('PAYPAL_RETURN_URL', 'http://localhost/superlife/supertiti/index.php?payment=successful');
define('PAYPAL_CANCEL_URL', 'http://localhost/superlife/supertiti/index.php?payment=canceled');
define('PAYPAL_NOTIFY_URL', 'http://localhost/superlife/supertiti/ipn.php');
define('PAYPAL_CURRENCY', 'USD');

// Database configuration
define('DB_HOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','supertiti');

// change not required
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");





?>