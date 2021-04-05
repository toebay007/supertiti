<?php
require("admindeets.php");
$admin = new adminDet;
$admin->adminDetails($id);
$adminsdet = $admin->adminDetails($id);

require("contactsclass.php");
$cont = new contact;
$MessageCount = $cont->countMessage();

?>

<?php if(empty($adminsdet)){} else {  foreach($adminsdet as $adminDetails){   ?>

<div class="row">
            <div class="col-12 admdivs">
                <img src="<?php echo  $adminDetails['pPhoto']; ?>" alt="profile picture" width="100px" style="border-radius: 50%;" height="100px">
                <p><a href="home.php"><button class="adminbtn">Admin Dashboard</button></a></span></p>
            </div>
            <div class="col-12 admdivs">
                <a href="adminOrders.php"><button class="adminbtn">Orders</button></a>
            </div>
            <div class="col-12 admdivs">
                <a href="adminProducts.php"><button class="adminbtn">Products</button></a>
            </div>
            <div class="col-12 admdivs">
                <a href="testimony.php"><button class="adminbtn">Testimonials</button></a>
            </div>
            <div class="col-12 admdivs">
                <a href="adminBlogs.php"><button class="adminbtn">Blogs</button></a>
            </div>
            <div class="col-12 admdivs">
                <?php if($MessageCount == 0){ ?>
                    <a href="adminContant.php"><button class="adminbtn">Enquiries <span><?php echo 0; ?></span></button></a>
                <?php } else {  ?>
                <a href="adminContant.php"><button class="adminbtn">Enquiries <span><?php echo  $MessageCount; ?></span></button></a>
                <?php  } ?>
            </div>
            <div class="col-12 admdivs">
                <a href="admincustomer.php"><button class="adminbtn">Customers</button></a>
            </div>
            <div class="col-12 admdivs">
                <a href="register.php"><button class="adminbtn">Create Account</button></a>
            </div>
        </div>
        <?php  }}  ?>