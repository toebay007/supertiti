<?php  

require("connuser.php");
	/**
	 * Admin function
	 */
	class user extends connUser{

        function createUser($fname,$lname,$pwd1,$pwd2,$phoneNo,$dob,$email){
            if(!$fname || !$lname || !$pwd1 || !$pwd2 || !$phoneNo || !$dob || !$email){
                header("location: user_register.php?reg=incomplete_input");
            }
            else if($pwd1 === $pwd2){
                $encrypted = md5($pwd1); 
    
                $sql = "INSERT INTO user SET
                    fnamesz = '$fname',
                    lnamesz = '$lname',
                    pwd1s    =   '$encrypted',
                    phoneNo    =   '$phoneNo',
                    emailzs  =   '$email',
                    dob =   '$dob'";
    
                    $id = $this->conn->insert_id;
    
                   $result = $this->conn->query($sql);
                    if($result == true){
                        header("location:index.php?reg=successful");
                    } else{
                        header("location:user_register.php?reg=failed");
                    }
            } else{
                header("location:user_register.php?reg=password_failed");
            }
        }


        function userLogin($userEmail,$userPwd){

            $encrypted = md5($userPwd);

            $sql= "SELECT * FROM user WHERE emailzs = '$userEmail' AND pwd1s = '$encrypted' LIMIT 1";

            $result = $this->conn->query($sql);

                // var_dump($result);
         if ($result->num_rows > 0) { //==1 valid details
           
            $deets = $result->fetch_assoc();
            
            $_SESSION['idzz'] = $deets['id'];
            $_SESSION['fname'] = $deets['fnamesz'];
            $_SESSION['lname'] = $deets['lnamesz'];
            $_SESSION['email'] = $deets['emailzs'];
            

            header("location:index.php?login=success");
        
        } else {
            header ("location:index.php?login=fail");
        }


        }







    }



    ?>