<?php

require("connprod.php");

class product extends connoothers{


    function products(){
        $sql = "SELECT * FROM productszs";
        $result = $this->conn->query($sql);
        $items = [];
        if ($result->num_rows > 0){
            while ( $row = $result->fetch_assoc()){
                $items[] = $row;
            }
            return $items;
        }
    }

    
    function productsDetails($id){
        $sql = "SELECT * FROM productszs WHERE products_id =  $id";
        
        $result = $this->conn->query($sql);
        $items = [];
        if ($result->num_rows > 0){
            while ( $row = $result->fetch_assoc()){
                $items[] = $row;
            }
            return $items;
        }
    }

    function deleteProduct($id){
        $sql = "DELETE productszs FROM productszs Where products_id = $id";
        $result = $this->conn->query($sql);
      //  $items = [];
        if ($result == true){
          //var_dump($result);
           header("location:adminProducts.php#deleteProduct?delete=success");
        }else{
        header("location:adminProducts.php#deleteProduct?delete=failed");
        }
    }



}