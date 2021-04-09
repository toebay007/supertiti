<?php  include "abcHeaders.php";

$user = $_SESSION['idzz'];
// echo $user;
require("orders.php");
$a = new orders;
$a->getUser($user);
$use = $a->getUser($user);

?>
<div class="row">
  <div class="col-md-10 offset-md-1 mb-4 mt-3 table-responsive">
        <form action="paymentPayPal.php" method="POST">
            <?php if(!empty($_SESSION['product_carts'])) { ?>
                <h3>Billing Address</h3>
                <?php  if(empty($use)){}else{  foreach($use as $user) { ?>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                    <input type="text" class="form-control" id="fname" name="firstname" value="<?php  echo $user['fullname']; ?>" placeholder="<?php  echo $user['fullname']; ?>" disabled>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email"><i class="fa fa-envelope"></i> Email</label>
                    <input type="text" class="form-control" id="email" name="emailzs" value="<?php  echo $user['emailzs']; ?>" placeholder="<?php  echo $user['emailzs']; ?>" disabled>
                  </div>
                </div>
                <?php  } }  ?>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                    <input type="text" id="adr" class="form-control" name="addressez" placeholder="542 W. 15th Street" required>
                  </div>
                  
                  <div class="form-group col-md-4">
                    <label for="city"><i class="fa fa-institution"></i> City</label>
                    <input type="text" id="city" class="form-control" name="cityez" placeholder="New York" required>
                  </div>
                  
                  <div class="form-group col-md-4">
                    <label for="state">State</label>
                    <input type="text" id="state" class="form-control" name="statesz" placeholder="NY" required>
                  </div>
                 
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="zip">Zip</label>
                    <input type="text" id="zip" class="form-control" name="zipez" placeholder="10001" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="zip">Country</label>
                    <input type="text" id="country" class="form-control" name="countryez" placeholder="United State of America" required>
                  </div>
                </div>
                <?php }else{} ?>
      
<?php if(!empty($_SESSION['product_carts'])) { ?>
    <table class="table table-borderless">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" colspan="2">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                    <th scope="col">
                        <button type="button" class="btn subss" onclick="empty_cart();">
                            <i class="fas fa-trash-alt "></i>
                            Empty Cart
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($_SESSION['product_carts'])) {$total = 0;
                        foreach($_SESSION['product_carts'] as $productUnit){
                            $b = $productUnit["price"];
                            $c = $productUnit["quantity"];
                            $d = $b*$c;
                             ?>
                <tr>
                    <td><img class='img-reponsive' height='100px' alt="<?php  echo $productUnit['name']; ?>" src='<?php echo $productUnit['image']  ?>'></td>
                    <td><?php  echo $productUnit['name']; ?></td>
                    <td><?php  echo $productUnit['quantity']; ?></td>
                    <td> $<?php  echo number_format($productUnit['price'],2); ?></td>
                    <td> $<?php  echo number_format($d,2); ?></td>
                    <td>
                        <button class="btn subss" onclick="remove_cart('<?php echo $productUnit['p_id']; ?>')">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                    </td>
                </tr>
                <?php $total = $total + $d; 
            }?>
                <tr>
                    <th colspan="4">Total</th>
					<th>$<?php echo number_format($total,2); ?></th>
                </tr>
                <tr>
                    <th>
                            <?php foreach ($_SESSION['product_carts'] as $productUnit) { ?>
                       
                            <input type="hidden" name="productid[]" value="<?php echo $productUnit['p_id']; ?>">
                            <input type="hidden" name="productqty[]" value="<?php echo $productUnit['quantity']; ?>">
                            <?php } ?>
                            <input type="hidden" name="userid" value="<?php echo $_SESSION['idzz']; ?>">
                            <input type="hidden" id="proTotal" name="ordertotal" value="<?php echo $total; ?>">
                            <!-- <div id="paypal-payment"> </div> -->
                            <button type="submit" name="paypalpayment" class="adminbtn">Proceed to Payment</button>
                        </form>
                    </th>
                </tr>
                            <?php } ?>
            </tbody>
        </table>
                            <?php } else{ ?>
                                <p style="width: 100%; height: 500px" class="alert alert-primary text-center" role="alert">
                                    No Order has been placed yet
                                </p>
                            <?php } ?>
    </form>
  </div>
</div>

<?php  include "xyzFooters.php"; ?>