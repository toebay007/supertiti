<?php

require("connContact.php");

class contact extends connContact{

    function insertMessage($namez,$emailzs,$subject,$messagezs){
        if(!$namez || !$emailzs || !$subject|| !$messagezs){
            header("location:contacts.php?upload=incomplete_data");
        } else if(!empty($emailzs)){
            $sql = "INSERT INTO questions SET
                namez = '$namez',
                emailzs = '$emailzs',
                subjectsz = '$subject',
                messagezs = '$messagezs'";

            $id = $this->conn->insert_id;

            $result = $this->conn->query($sql);

            if($result == true){
                header("location:contacts.php?success=message_sent");
            } else{
                header("location:contacts.php?message=failed");
            }

        } else{
            // echo $pwd1,$pwd2;
             header("location:contacts.php?message=empty_mail");
        }
    }

    function getQuestions(){
        $sql = "SELECT * FROM questions WHERE message_status IS NULL";
        $result = $this->conn->query($sql);
        $items = [];
        if ($result->num_rows > 0){
            while ( $row = $result->fetch_assoc()){
                $items[] = $row;
            }
            return $items;
        }
    }

    function getMessageStatus($idsz){
        $sql = "SELECT * FROM questions WHERE id =  $idsz";
        
        $result = $this->conn->query($sql);
        $items = [];
        if ($result->num_rows > 0){
            while ( $row = $result->fetch_assoc()){
                $items[] = $row;
            }
            return $items;
        }
    }

    function messageUpdate($messagestatus,$idsa){
        $sql = "UPDATE questions SET message_status = '$messagestatus' WHERE id = '$idsa'";

        $result = $this->conn->query($sql);
        header("location:adminContant.php?id=$idsa");

    }

    function ResolvedMessages(){
        $sql = "SELECT * FROM questions WHERE message_status = 'Resolved'";
        $result = $this->conn->query($sql);
        $items = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $items[] = $row;
            }
            return $items;
        }
    }

    function PendingMessages(){
        $sql = "SELECT * FROM questions WHERE message_status = 'Pending'";
        $result = $this->conn->query($sql);
        $items = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $items[] = $row;
            }
            return $items;
        }
    }


    function countMessage(){
        $sql = "SELECT * FROM questions WHERE message_status IS NULL";
        $result = $this->conn->query($sql);

        $items = [];
        if($result->num_rows > 0){
            while($rows = $result->fetch_assoc()){
                $items[] = $rows;
            }
            return count($items);
        }
    }



// THis section Handles all fucntions for Testimonies. Thank you

function getTesti(){
    $sql = "SELECT * FROM testimon order by rand() LIMIT 3";
    $result = $this->conn->query($sql);
    $items = [];
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $items[] = $row;
        }
        return $items;
    }
}

// THis section Handles all fucntions for BLogs. Thank you



function getBlogs(){
    $sql = "SELECT * FROM blogs order by rand() LIMIT 3";
    $result = $this->conn->query($sql);
    $items = [];
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $items[] = $row;
        }
        return $items;
    }
}


function readBlog($id2z){
    $sql = "SELECT * FROM blogs WHERE id =  $id2z";
    
    $result = $this->conn->query($sql);
    $items = [];
    if ($result->num_rows > 0){
        while ( $row = $result->fetch_assoc()){
            $items[] = $row;
        }
        return $items;
    }
}


function linkBlog(){
    $sql = "SELECT * FROM blogs order by id DESC";
    $result = $this->conn->query($sql);
    $items = [];
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $items[] = $row;
        }
        return $items;
    }
}









}

?>