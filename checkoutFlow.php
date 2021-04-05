<?php 

    require("orders.php");

    $obj = new orders;

    session_start();
    $userid = $_POST['userid'];
    $ordertotal = $_POST['ordertotal'];
    $productid = $_POST['productid'];
    $productqty = $_POST['productqty'];

    //print_r($productqty);
    $obj->insertCustOrder($userid,$ordertotal,$productid,$productqty);

    $_SESSION['transref'] = mt_rand();
    $trxref = $_SESSION['transref'];
    $obj->insertPayment($trxref, $ordertotal, $_SESSION['orderid']);

   header("location:paystack.php");
?>