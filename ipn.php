<?php

// Include configuration file
include_once 'config.php';

// Include database connection file
include_once 'dbConnect.php';
/*
* Read POST data
* reading posted data directly from $_POST causes serialization
* issues with array data in POST
* reading raw post data from input stream instead
*/
$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$myPost = array();
foreach ($raw_post_array as $keyval){
    $keyval = explode('=',$keyval);
    if(count($keyval) == 2)
     // Since we do not want the plus in the datetime string to be encoded to a space, we manually encode it.
     if ($keyval[0] === 'payment_date') {
        if (substr_count($keyval[1], '+') === 1) {
            $keyval[1] = str_replace('+', '%2B', $keyval[1]);
        }
    }
        $myPost[$keyval[0]] = urldecode($keyval[1]);
}

// read the post from paypal system and add 'cmd'
$req = 'cmd=_notify-validate';
$get_magic_quotes_exists = false;
if(function_exists('get_magic_quotes_gpc')){
    $get_magic_quotes_exists = true;
}
foreach ($myPost as $key => $value){
    if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1){
        $value = urlencode(stripslashes($value));
    } else{
        $value =urlencode($value);
    }
    $req .= "&$key=$value";
}

/*
* Post IPN data back to paypal to validate the IPN data is genuine
* Without this step anyone can fake IPN data
*/
$paypalURL = PAYPAL_URL;
$ch = curl_init($paypalURL);
if ($ch == false) {
    return false;
}
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSLVERSION, 6);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);

// Set TCP timeout to 30 seconds
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: PHP-IPN-Verification-Script'));
$res = curl_exec($ch);

/*
*Inspect IPN Validation result and act accordingly
* Split response headers and payload, a better way to strcmp
*/

if ( ! ($res)) {
    $errno = curl_errno($ch);
    $errstr = curl_error($ch);
    curl_close($ch);
    throw new Exception("cURL error: [$errno] $errstr");
}

$info = curl_getinfo($ch);
$http_code = $info['http_code'];
if ($http_code != 200) {
    throw new Exception("PayPal responded with http code $http_code");
}

curl_close($ch);

// $tokens = explode("\r\n\r\n", trim($res));
// $res = trim(end($tokens));
// if (strcmp($res, "VERFIED") == 0 || strcasecmp($res, "VERIFIED") == 0){

//     // Retrieve transaction info from paypal
//     $item_number = $_POST['item_number'];
//     $txn_id      = $_POST['txn_id'];
//     $payment_gross  = $_POST['mc_gross'];
//     $currency_code  = $_POST['mc_currency'];
//     $payment_status = $_POST['payment_status'];

//     //  Check if Transaction data exists with the same TXN ID
//     $prevPayment = $mysqli->query("SELECT payment_id from Payments where txn_id ='".$txn_id."'");
//     if($prevPayment->num_rows > 0){
//         exit();
//     }else {
//         // Insert transaction into database;
//         $insert = $mysqli->query("INSERT INTO payments SET payment_status = 'success' WHERE txn_id = $txn_id");
//     }
// }

// Check if PayPal verifies the IPN data, and if so, return true.
if ($res == self::VALID) {
    return true;
} else {
    return false;
}







?>