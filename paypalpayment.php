<?php  include "abcHeaders.php";

    // include configuration file
        include_once 'config.php';

    // include database
        include_once 'dbConnect.php';
?>


<?php if(!empty($_SESSION['product_carts'])) { ?>
    <table class="table table-borderless">
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
                <!-- paypal new new new new button. edit changes and make new areas -->
                <tr>
                    <th>
                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_xclick">
                        <input type="hidden" name="business" value="sb-bcf43o5831815@business.example.com">
                        <input type="hidden" name="lc" value="NG">
                        <input type="hidden" name="item_name" value="Superlife Products">
                        <input type="hidden" name="amount" value="<?php echo $total; ?>">
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="button_subtype" value="services">
                        <input type="hidden" name="no_note" value="1">
                        <input type="hidden" name="no_shipping" value="2">
                        <input type="hidden" name="rm" value="1">
                        <input type="hidden" name="return" value="http://localhost/superlife/supertiti/index.php?payment=successful">
                        <input type="hidden" name="cancel_return" value="http://localhost/superlife/supertiti/index.php?payment=cancel">
                        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
                        <input type="hidden" name="address_override" value="1">
                        <input type="hidden" name="notify_url" value="http://localhost/superlife/supertiti/ipn.php">
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>

                    </th>
                </tr>
                <!-- End of paypal payment new new new new button -->
                            <?php } ?>
            </tbody>
        </table>
                            <?php } else{ ?>
                                <p class="alert alert-primary text-center" style="width: 100%; height:500px;">Kindly go back to the <a href="products.php">Product Page</a>  . There's nothing here </p>
                            <?php } ?>


<?php  include "xyzFooters.php";  ?>