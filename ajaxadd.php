<?php  

    $conn = new mysqli('eu-cdbr-west-03.cleardb.net','bf9d3feb887765','1c337c96','heroku_eddc65853faeb30');
    session_start();
    $action = $_REQUEST['action'];
    @$p_id = trim($_REQUEST['p_id']);

    if($action == 'add'){
        @$quantity = $_REQUEST['quantity'];

        if(!empty($p_id)){
            $query = "SELECT * FROM productszs WHERE products_id ='" . $p_id . "'";
            $rs = $conn->query($query);
            $product_data = $rs->fetch_assoc();

            $productItem = array("p_id" => $product_data['products_id'], "name" => $product_data['productName'], "price" => $product_data['productPrice'], "image" => $product_data['productImg'], "quantity" => $quantity);

            if(isset($_SESSION['product_carts']) && !empty($_SESSION['product_carts'])){
                if(!array_key_exists($product_data['products_id'], $_SESSION['product_carts'])){

                    $_SESSION['product_carts'][$product_data['products_id']] = $productItem;
                }else{
                    $_SESSION['product_carts'][$product_data['products_id']]['quantity'] = $_SESSION['product_carts'][$product_data['products_id']]['quantity'] + $quantity;
                }
            }else{
                $_SESSION['product_carts'][$product_data['products_id']] = $productItem;
            }
        }
    }
    if($action == "delete") {
        unset($_SESSION['product_carts'][$p_id]);
    }
 
    if($action == "empty"){
         unset($_SESSION['product_carts']);
    }
?>
<?php if(!empty($_SESSION['product_carts'])) { ?>
    <table class="table">
            <thead>
                <tr>
                    <th scope="col" colspan="2">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                    <th scope="col">
                        <button type="button" class="btn subss" onclick="empty_cart();">
                            <i class="fas fa-trash-alt" style="color: black;"></i>
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
                            <i class="bi bi-trash" style="font-size: 1.5rem;"></i>
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
                        <form action="checkout.php" method="POST">
                            <?php foreach ($_SESSION['product_carts'] as $productUnit) { ?>
                            <input type="hidden" name="productid[]" value="<?php echo $productUnit['p_id']; ?>">
                            <input type="hidden" name="productqty[]" value="<?php echo $productUnit['quantity']; ?>">
                            <?php } ?>
                            <input type="hidden" name="userid" value="<?php echo $_SESSION['user']; ?>">
                            <input type="hidden" id="proTotal" name="ordertotal" value="<?php echo $total; ?>">
                            <!-- <div id="paypal-payment"> </div> -->
                            <?php  if(!isset($_SESSION['fname'])) { ?>
                               
                               <button class="adminbtn"> <a href="#" data-bs-toggle="modal" data-bs-target="#login" style="color: white; text-decoration:none; border:none; outline:none">Login</a></button>
                                                            
                            <?php  } else{ ?>
                                    <button class="adminbtn">Proceed to Check-out</button>
                            <?php  }   ?>
                        </form>
                    </th>
                </tr>
                            <?php } ?>
            </tbody>
        </table>
                            <?php } else{ ?>
                                <div class="alert alert-primary" role="alert">
                                    No Order has been placed yet
                                </div>
                            <?php } ?>
