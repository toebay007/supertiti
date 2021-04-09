<?php  

if(isset($_POST["submit"])){

    require("adminclass.php");

    $obj1 = new Admin;

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $finame = test_input($_POST['finame']);
      $lanames = test_input($_POST['lanames']);
      $emailz = test_input($_POST['emailz']);
      $pwd1 = test_input($_POST['pwdz']);
      $confirmpwd2 = test_input($_POST['pwdzsc']);
      $ponumber = test_input($_POST['ponumber']);

      //print_r($_FILES);

      $obj1->createAdmin($finame,$lanames,$emailz,$pwd1,$confirmpwd2,$ponumber,$_FILES);

}   else if(isset($_POST["adminsubmit"])){

    require("adminclass.php");

    $obj2 = new Admin;

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    $staff_email = test_input( $_POST['adminEmail']);
    $adminPwdz = test_input( $_POST['adminPwds']);

    //echo "$pwdz";
    $obj2->adminLogin($staff_email,$adminPwdz);

}    else if(isset($_POST["submitTestimoney"])){

  require("adminclass.php");

  $obj3 = new Admin;

  function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

  $content = test_input( $_POST['content']);
  $authors = test_input( $_POST['authors']);

  //echo "$pwdz";
  $obj3->createTesti($content,$authors,$_FILES);

}    else if(isset($_POST["submitBlog"])){

  require("adminclass.php");

  $obj4 = new Admin;

  function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


    $topic = test_input( $_POST['topic']);
    $shIntro = test_input( $_POST['shIntro']);
    $content = test_input( $_POST['content']);
  
    //echo "$pwdz";
    $obj4->createBlogs($topic,$shIntro,$content,$_FILES);
  

}    else if(isset($_POST["submitProduct"])){

  require("adminclass.php");

  $obj5 = new Admin;

  function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    $productName = test_input( $_POST['productName']);
    $productShort = test_input( $_POST['productShort']);
    $productPrice = test_input( $_POST['productPrice']);
    $productLong = test_input( $_POST['productLong']);

//echo "$pwdz";
$obj5->createProducts($productName,$productShort,$productPrice,$productLong,$_FILES);

}  else if(isset($_GET["deleteProduct"])){
  $id = $_GET['deleteProduct']; 
  require("productclass.php");
  $obj6 = new product;
 
  //echo "$id";

  // print_r($_FILES);
  // echo $Amount;
   $obj6->deleteProduct($id);

}     else if(isset($_POST["submitProduct"])){

  require("adminclass.php");

  $obj5 = new Admin;

  function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    $productName = test_input( $_POST['productName']);
    $productShort = test_input( $_POST['productShort']);
    $productPrice = test_input( $_POST['productPrice']);
    $productLong = test_input( $_POST['productLong']);

//echo "$pwdz";
$obj5->createProducts($productName,$productShort,$productPrice,$productLong,$_FILES);

}    else if(isset($_POST["submitReg"])){

  require("userclass.php");

  $obj6 = new user;

  function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    $fname = test_input( $_POST['fname']);
    $lname = test_input( $_POST['lname']);
    $pwd1 = test_input( $_POST['pwd1']);
    $pwd2 = test_input( $_POST['pwd2']);
    $phoneNo = test_input( $_POST['phoneNo']);
    $dob = test_input( $_POST['dob']);
    $email = test_input( $_POST['email']);

// echo "$email";
  $obj6->createUser($fname,$lname,$pwd1,$pwd2,$phoneNo,$dob,$email);
}   else if(isset($_POST["submituser"])){

  require("userclass.php");

  $obj7 = new user;

  function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

  $userEmail = test_input( $_POST['userEmail']);
  $userPwd = test_input( $_POST['userPwd']);

  //echo "$pwdz";
  $obj7->userLogin($userEmail,$userPwd);

}   else if(isset($_POST["submitszs"])){

  require("contactsclass.php");

  $obj8 = new contact;

  function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

  $namez = test_input( $_POST['nameszs']);
  $emailzs = test_input( $_POST['emailszs']);
  $subject = test_input( $_POST['subjectszs']);
  $messagezs = test_input( $_POST['messageszs']);

  //echo "$messagezs";
   $obj8->insertMessage($namez,$emailzs,$subject,$messagezs);

}   else if(isset($_POST["messageDetails"])){

  require("contactsclass.php");

  $obj8 = new contact;

  $messagestatus = trim(htmlentities($_POST['messagestatus']));
  $idsa = trim(htmlentities( $_POST['conID']));

  // echo "$messagestatus";
   $obj8->messageUpdate($messagestatus,$idsa);

} else if(isset($_POST["statusSave"])){

  require("orders.php");

  $obj9 = new orders;

        $orderstatus = trim(htmlentities($_POST['orderstatus']));
        $orderid = trim(htmlentities($_POST['orderid']));
 // echo $orderstatus;

       $obj9-> ordersUpdate($orderstatus,$orderid);

}


?>
      
