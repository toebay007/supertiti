<?php 
    session_start();
    if (isset($_SESSION['product_carts'])) {
        echo count($_SESSION['product_carts']);    
    } else {
        echo "0";
    }


?>