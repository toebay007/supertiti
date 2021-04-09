<?php  include "abcHeaders.php"; ?>
<?php if(!isset($_GET['id'])) {
    header("location:adminOrders.php");
} 
$user = $_GET['user'];
// echo $user;


require("orders.php");
$a = new orders;
$a->getUser($user);
$use = $a->getUser($user);
// print_r($use);
$orderDetails = $a->getOrderDetails($_GET['id']); 

$ordercrudeInfos = $a->getCrudeOrder(($_GET['id'])); 

$paymentcrudeInfos = $a->getCrudePaymentOrder(($_GET['id']));

?>

<div class="col-md-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php" class="breadcrumbs">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="adminOrders.php" class="breadcrumbs">Back to Orders</a></li>
            <li class="breadcrumb-item active" aria-current="page">Orders</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-md-6">
        <form action="process.php" method="POST">
            <div class="row">
                <div class="col-3">Order Status</div>
                
                <div class="col-6">
                    <select name="orderstatus" id="orderstatus" class="form-control">
                        <option value="<?php echo $ordercrudeInfos['orders_status'];  ?>" selected><?php echo $ordercrudeInfos['orders_status']  ?></option>
                        <option value="Received">Received</option>
                        <option value="Delivered">Delivered</option>
                    </select>
                </div>
                
                <div class="col-3"> 
                    <input type="hidden" name="orderid" value="<?php echo $_GET['id']; ?>">
                    <button type="submit" name="statusSave" class="adminbtn">Save</button>
                </div>
           
            </div> 
        </form>
        <div class="row">
            <div class="col-md-4"><a href="mailto:<?php if(empty($use)){} else{ foreach($use as $user){  echo $user['emailzs']; }}  ?>?subject={subject}&body= You placed orders ..."><button class="adminbtn">Send Mail</button></a></div>
         </div>
    </div>
</div>
<div class="row">
    <div class="col-12 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub-total</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                    if(is_array($orderDetails) || is_object($orderDetails)){
                        foreach ( $orderDetails as $detail) {
                    $b = $detail['productPrice'];
                    $c = $detail['orddetails_qty'];
                    $d = $b*$c;

                //echo $detail['orddetails_qty'];
            ?>
                <tr>
                    <td><?php  if(empty($detail['productName'])){echo("<i> <b>Product Deleted </b> </i>");} else{ echo $detail['productName'];} ?></td>
                    <td><?php if(empty($detail['productPrice'])){echo("<i> <b>Product Deleted </b> </i>");} else{ ?> &#8358; <?php echo $detail['productPrice'];} ?></td>
                    <td><?php echo $detail['orddetails_qty']; ?></td>
                    <td>$<?php echo number_format($d,2); ?> </td>
                </tr>
                <?php 
                    } 
                      } ?>
                <tr>
                    <th colspan="3">Total Paid</th>
                    <th>$<?php echo number_format($ordercrudeInfos['orders_amt'],2); ?> </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>




<?php  include "xyzFooters.php";  ?>