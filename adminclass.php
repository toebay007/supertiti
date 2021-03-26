<?php  

require("connAdmins.php");
	/**
	 * Admin function
	 */
	class Admin extends connAdmin{

        function createAdmin($finame,$lanames,$emailz,$pwd1,$confirmpwd2,$ponumber,$targetFilePath){
            $targetDir = "adminPhoto/";
            $fileName = basename($_FILES["pPhoyo"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                //determine permitted array
                    $allowTypes = array('jpg','png','svg','jpeg','gif','pdf','JPG');
                        //if array is present or present
                    if(in_array($fileType, $allowTypes)){
                         //upload  picture to image folder
                         if(move_uploaded_file($_FILES["pPhoyo"]["tmp_name"], $targetFilePath)){
                            // insert into database
                            if(!$finame || !$lanames || !$emailz || !$pwd1 || !$confirmpwd2 || !$ponumber){
                                header("location:register.php?registration=incomplete_data");
                            } else if($pwd1 === $confirmpwd2 && strlen($pwd1) >= 6){
                                 $encrypted = md5($pwd1);
                               // echo $pwd1,$pwd2;
                                $sql = "INSERT INTO adminreg SET
                                    fnamez = '$finame',
                                    lname = '$lanames',
                                    emailz = '$emailz',
                                    passwrds = '$encrypted',
				                    pPhoto = '$targetFilePath',
                                    ponumber = '$ponumber'";
                
                                $id = $this->conn->insert_id;
                
                                $result = $this->conn->query($sql);
                
                                if($result == true){
                                    header("location:register.php?success=succesfully_created");
                                } else{
                                    header("location:register.php?registration=failed");
                                }
                
                            } else{
                                // echo $pwd1,$pwd2;
                                 header("location:register.php?registration=password_failure");
                            }

                         } else{
                            header("location:register.php?registration=image_failed");
                        }

                    }else{
                        header("location:register.php?registration=wrong");
                    }
        }
    
    
        function adminLogin($staff_email,$adminPwdz){

            $encrypted = md5($adminPwdz);

            $sql= "SELECT * FROM adminreg WHERE emailz = '$staff_email' AND passwrds = '$encrypted' LIMIT 1";

            $result = $this->conn->query($sql);

                // var_dump($result);
         if ($result->num_rows > 0) { //==1 valid details
           
            $deets = $result->fetch_assoc();
            
            $_SESSION['ids'] = $deets['id'];
            $_SESSION['staff_name'] = $deets['fnamez'];
            $_SESSION['staff_lname'] = $deets['lname'];
            $_SESSION['images'] = $deets['pPhoto'];
            

            header("location:home.php?p=success");
        
        } else {
            header ("location:admin.php?p=fail");
        }


        }


        function createTesti($content,$authors,$targetFilePath){
            $targetDir = "testiPicture/";
            $fileName = basename($_FILES["Pphoto"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                //determine permitted array
                    $allowTypes = array('jpg','png','svg','jpeg','gif','pdf','JPG');
                        //if array is present or present
                    if(in_array($fileType, $allowTypes)){
                         //upload  picture to image folder
                         if(move_uploaded_file($_FILES["Pphoto"]["tmp_name"], $targetFilePath)){
                            // insert into database
                            if(!$content || !$authors){
                                header("location:testimony.php?upload=incomplete_data");
                            } else if($content && $authors){
                                $sql = "INSERT INTO testimon SET
                                    content = '$content',
                                    authors = '$authors',
				                    Pphoto = '$targetFilePath'";
                
                                $id = $this->conn->insert_id;
                
                                $result = $this->conn->query($sql);
                
                                if($result == true){
                                    header("location:testimony.php?success=succesfully_created");
                                } else{
                                    header("location:testimony.php?registration=failed");
                                }
                
                            } else{
                                // echo $pwd1,$pwd2;
                                 header("location:testimony.php?registration=password_failure");
                            }

                         } else{
                            header("location:testimony.php?registration=image_failed");
                        }

                    }else{
                        header("location:testimony.php?registration=wrong");
                    }
        }



    
        function createBlogs($topic,$shIntro,$content,$targetFilePath){
            $targetDir = "blogsPicture/";
            $fileName = basename($_FILES["Pphoto"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                //determine permitted array
                    $allowTypes = array('jpg','png','svg','jpeg','gif','pdf','JPG');
                        //if array is present or present
                    if(in_array($fileType, $allowTypes)){
                         //upload  picture to image folder
                         if(move_uploaded_file($_FILES["Pphoto"]["tmp_name"], $targetFilePath)){
                            // insert into database
                            if(!$content || !$shIntro || !$topic){
                                header("location:adminBlogs.php?upload=incomplete_data");
                            } else if($content && $topic){
                                $sql = "INSERT INTO blogs SET
                                    topicz = '$topic',
                                    contents = '$content',
                                    shrtDesc = '$shIntro',
				                    Pphoto = '$targetFilePath'";
                
                                $id = $this->conn->insert_id;
                
                                $result = $this->conn->query($sql);
                
                                if($result == true){
                                    header("location:adminBlogs.php?success=succesfully_created");
                                } else{
                                    header("location:adminBlogs.php?registration=failed");
                                }
                
                            } else{
                                // echo $pwd1,$pwd2;
                                 header("location:adminBlogs.php?registration=password_failure");
                            }

                         } else{
                            header("location:adminBlogs.php?registration=image_failed");
                        }

                    }else{
                        header("location:adminBlogs.php?registration=wrong");
                    }
        }



    
        function createProducts($productName,$productShort,$productPrice,$productLong,$targetFilePath){
            $targetDir = "productsPicture/";
            $fileName = basename($_FILES["productImg"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                //determine permitted array
                    $allowTypes = array('jpg','png','svg','jpeg','gif','pdf','JPG');
                        //if array is present or present
                    if(in_array($fileType, $allowTypes)){
                         //upload  picture to image folder
                         if(move_uploaded_file($_FILES["productImg"]["tmp_name"], $targetFilePath)){
                            // insert into database
                            if(!$productName || !$productShort || !$productPrice|| !$productLong){
                                header("location:adminProducts.php?upload=incomplete_data");
                            } else if($productPrice > 1){
                                $sql = "INSERT INTO productszs SET
                                    productName = '$productName',
                                    productShort = '$productShort',
                                    productPrice = $productPrice,
                                    productLong = '$productLong',
				                    productImg = '$targetFilePath'";
                
                                $id = $this->conn->insert_id;
                
                                $result = $this->conn->query($sql);
                
                                if($result == true){
                                    header("location:adminProducts.php?success=succesfully_created");
                                } else{
                                    header("location:adminProducts.php?registration=failed");
                                }
                
                            } else{
                                // echo $pwd1,$pwd2;
                                 header("location:adminProducts.php?registration=price_is_a_number");
                            }

                         } else{
                            header("location:adminProducts.php?registration=image_failed");
                        }

                    }else{
                        header("location:adminProducts.php?registration=wrong");
                    }
        }




    
    }


?>