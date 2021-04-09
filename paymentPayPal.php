<?php

if(isset($_POST["paypalpayment"])){
  
  require("orders.php");

  $obj1 = new orders;

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      session_start();

      $userid = $_POST['userid'];
      $addressez = test_input($_POST['addressez']);
      $cityez = test_input($_POST['cityez']);
      $statesz = test_input($_POST['statesz']);
      $zipez = test_input($_POST['zipez']);
      $countryez = test_input($_POST['countryez']);

      
    // print_r($userid);
     $obj1->deliveryAddress($userid,$addressez,$cityez,$statesz,$zipez,$countryez);


// Above code is handling the passage of user address for delevery into the database
    // 
    // 
    // code below sends data into the customerorder table
    $userid = $_POST['userid'];
    $ordertotal = $_POST['ordertotal'];
    $productid = $_POST['productid'];
    $productqty = $_POST['productqty'];

    $obj1->insertCustOrder($userid,$ordertotal,$productid,$productqty);

    $_SESSION['transref'] = mt_rand();
    $trxref = $_SESSION['transref'];
    $ordertotal = $_POST['ordertotal'];

  //  print_r($ordertotal);

    $obj1->insertPayment($trxref, $ordertotal, $_SESSION['orderid']);


    header("location:paypalpayment.php");

    }



    
?>