<?php  include "abcHeaders.php";

    // include configuration file
        include_once 'config.php';

?>


<?php if(!empty($_SESSION['product_carts'])) { ?>
    <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" colspan="2">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
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
                    <td><?php  echo number_format($productUnit['price'],2).' '.PAYPAL_CURRENCY; ?></td>
                    <td><?php  echo number_format($d,2).' '.PAYPAL_CURRENCY; ?></td>
                </tr>
                <?php $total = $total + $d; 
            }?>
                <tr>
                    <th colspan="4">Total</th>
					<th><?php echo number_format($total,2).' '.PAYPAL_CURRENCY;  ?></th>
                </tr>
                <tr>
                    <th>
                                  <!-- Paypal payment form for displaying the buy button -->
                        <form action="<?php echo PAYPAL_URL; ?>" method="POST">
                            
                            <!-- Identify your business so that you can collect the payments -->
                                <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">
                            <!-- Specify a buy now button -->
                                <input type="hidden" name="cmd" value="_xclick">

                            <!-- Specify details about the item -->
                            <input type="hidden" name="item_name" value="<?php echo $productUnit['productName']; ?>">
                            <input type="hidden" name="quantity" value="<?php echo $productUnit['quantity']; ?>">
                            <input type="hidden" name="amount" value="<?php echo $total; ?>">
                            <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">

                            <!-- specify URL -->
                            <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
                            <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
                            <input type="hidden" name="notify_url" value="<?php echo PAYPAL_NOTIFY_URL; ?>">

                             <!-- Display the payment button. -->
                                <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="Buy Now">
                                <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" > 
                </form>
                    </th>
                </tr>
                            <?php } ?>
            </tbody>
        </table>
                            <?php } else{ ?>
                                <p class="alert alert-primary text-center" style="width: 100%; height:500px;">Kindly go back to the <a href="products.php">Product Page</a>  . There's nothing here </p>
                            <?php } ?>


<?php  include "xyzFooters.php";  ?>