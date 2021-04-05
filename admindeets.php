<?php

require("connothers.php");

class adminDet extends connOthers{

    function adminDetails($id){
        $sql = "SELECT concat(fnamez,' ',lname)as fullnames, pPhoto, emailz FROM adminreg where id = $id";

        $result = $this->conn->query($sql);
        $items = [];
        if ($result->num_rows > 0){
            while ( $row = $result->fetch_assoc()){
                $items[] = $row;
            }
            return $items;
    }

    }

    function testi(){
        $sql = "SELECT * FROM testimon";
        $result = $this->conn->query($sql);
        $items = [];
        if ($result->num_rows > 0){
            while ( $row = $result->fetch_assoc()){
                $items[] = $row;
            }
            return $items;
        }
    }

    function blogz(){
        $sql = "SELECT * FROM blogs";
        $result = $this->conn->query($sql);
        $items = [];
        if ($result->num_rows > 0){
            while ( $row = $result->fetch_assoc()){
                $items[] = $row;
            }
            return $items;
        }
    }
}


?>