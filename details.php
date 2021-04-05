<?php 

    include "abcHeaders.php";
    if(isset(($_GET['id']))){

    $id = $_GET['id'];
    require("productclass.php");
    $pro = new product;
    $pro->productsDetails($id);
    $produ = $pro->productsDetails($id);

?>
<div class="row mt-3 mb-4">
        <?php foreach($produ as $product){ ?>
    <div class="col-md-7 detailss">
        <div class="row">
            <center>
                <img src="<?php echo $product['productImg']; ?>" alt="<?php echo $product['productName']; ?>" class="proDetail">
            </center>
        </div>
    </div>
    <div class="col-md-5 detailss">
        <center>
        <h5><?php echo $product['productName']; ?></h5>
        <div>
        <span class="price">&#8358;<?php echo number_format($product['productPrice'],2); ?></span>
        </div>
        <div class="form-group">
            <label for="quantity"> </label>
                <input type="number" name="quantity" value="1" min="1" id="quantity" class="form-control quantity<?php echo $product['products_id']; ?>">
        </div> 
        <div class="text-center readB">
           <?php if(isset($_SESSION['user'])){?> <a id="myWish" href="wishlist.php?product=<<?php echo $product['productName']; ?>&id=<?php echo $product['products_id']; ?>&user=<?php echo $_SESSION['user']; ?>" style="color:black"><p><u><i>Save to wishlist</i></u></p></a> <?php } else{ ?> <a href="#" data-bs-toggle="modal" data-bs-target="#login" style="color:black"><u><i>Login to save Product</i></u></a>  <?php  }?>
        </div>
        <div class="form-group">
                <button class="cartADDS" id="cartsAdd" onclick="add_cart('<?php echo $product['products_id']; ?>')">Add to cart</button>
        </div>
        <p>Description</p>
        <span>
        <?php echo $product['productLong']; ?> 
        </span>
        </center>
    </div>
    <?php } ?>
</div>





<?php  }else{ ?>



<?php } ?>
<?php include "xyzFooters.php"; ?>