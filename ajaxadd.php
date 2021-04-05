<?php  

    $conn = new mysqli('localhost','root','','supertiti');
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
    <table class="table table-responsive">
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
                    <td> &#8358;<?php  echo number_format($productUnit['price'],2); ?></td>
                    <td> &#8358;<?php  echo number_format($d,2); ?></td>
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
					<th>&#8358; <?php echo number_format($total,2); ?></th>
                </tr>
                <tr>
                    <th>
                        <form action="checkoutFlow.php" method="POST">
                            <?php foreach ($_SESSION['product_carts'] as $productUnit) { ?>
                            <input type="hidden" name="productid[]" value="<?php echo $productUnit['p_id']; ?>">
                            <input type="hidden" name="productqty[]" value="<?php echo $productUnit['quantity']; ?>">
                            <?php } ?>
                            <input type="hidden" name="userid" value="<?php echo $_SESSION['user']; ?>">
                            <input type="hidden" name="ordertotal" value="<?php echo $total; ?>">
                            <button class="btn subss" type="submit">Proceed to Pay</button>
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