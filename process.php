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
  require("admindeets.php");
  $obj6 = new adminDet;
 
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

}

?>