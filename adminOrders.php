<?php include "start.php"; 
require("orders.php");
$a = new orders;

$orderCount = $a->countOrders();
$histroy = $a->getOrderHistory();
$orderInfos = $a->getOrder();
$fre = $a->getFrequentOrder();
// print_r($fre);



?>

<div class="row">
    <div class="col-md-2 adDivs advivs text-center">
        <?php include "sidebar.php"; ?>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-3">
                <button class="adminbtn" id="orders">
                <?php  echo $orderCount; ?> Orders
                </button>
            </div>
            <div class="col-md-3">
                <button class="adminbtn" id="ordersH">
                    Order history
                </button>
            </div>
            <div class="col-md-3">
                <button class="adminbtn" id="ordersFre">
                    Frequent Customers
                </button>
            </div>
        </div>
        <!-- Buttons for change in orders -->
        <div class="row">
            <div class="col-12 table-responsive" id="ordertable">
                <h5 class="text-center">Orders</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Customer Address</th>
                            <th>Payment Status</th>
                            <th>Ordered on</th>
                            <th>Order Status</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($orderInfos)){
                 foreach($orderInfos as $orderInfo){
             ?>
                        <tr>
                            <td><?php echo $orderInfo['Fullnames'] ?></td>
                            <td><?php echo $orderInfo['Address'] ?></td>
                            <td><?php echo $orderInfo['payment_status'] ?></td>
                            <td><?php echo $orderInfo['orders_date'] ?></td>
                            <td><?php echo $orderInfo['orders_status'] ?></td>
                            <td><a href="adminOrderDetails.php?id=<?php echo $orderInfo['orders_id'] ?>&user=<?php echo $orderInfo['id'] ?>"><button class="adminbtn">View Order Details</button></a></td>
                        </tr>
                        <?php } } else{ ?>
                        <tr>
                            <td colspan="6"><p style="width: 100%; height: 500px" class="alert alert-primary text-center" role="alert">
                                    No Order has been placed yet
                                </p></td>
                        </tr>
                         <?php }  ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Section for button history -->
        <div class="row">
            <div class="col-md-12 table-responsive" id="orderHistory">
                <h5 class="text-center">Orders History</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Fullname</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Date Ordered</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($histroy)){ ?>
                        <tr>
                            <td colspan="6"><p style="width: 100%; height: 500px" class="alert alert-primary text-center" role="alert">
                                    No Customer History recorded
                                </p></td>
                        </tr>
                         <?php } else{ foreach ($histroy as $his){ ?>
                    <tr>
                        <td><?php echo $his['fullname'] ?></td>
                        <td><?php echo $his['phoneNo'] ?></td>
                        <td><?php echo $his['Address'] ?></td>
                        <td><?php echo $his['orders_date'] ?></td>
                        <td><?php echo $his['payment_status'] ?></td>
                        <td><?php echo $his['orders_status'] ?></td>
                    </tr>
                    <?php } } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Section for frequent customers -->
        <div class="row">
            <div class="col-md-12 table-responsive" id="orderFrequency">
                <h5 class="text-center">Frequent Customers</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Fullname</th>
                            <th>Address</th>
                            <th>Phone Numbers</th>
                            <th>Total Number of Orders</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(empty($fre)){ ?> 
                        <tr>
                            <td colspan="4"><p style="width: 100%; height: 500px" class="alert alert-primary text-center" role="alert">
                                    No Frequent customer
                                </p></td>
                        </tr>
                    <?php } else{
                            foreach( $fre as $freqency) { ?>
                    <tr>
                        <td><?php echo $freqency['fullname'] ?></td>
                        <td><?php echo $freqency['Address'] ?></td>
                        <td><?php echo $freqency['phoneNo'] ?></td>
                        <td><?php echo $freqency['COUNT(customerorders.orders_id)'] ?></td>
                    </tr>
                    <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "xyzFooters.php"; ?>