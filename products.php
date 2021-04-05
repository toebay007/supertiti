<?php include "abcHeaders.php"; ?>
<?php 
    require("productclass.php");
    $produc = new product; 

     $productDis = $produc->products();

?>
    <div class="col-md-12"> 
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="index.php" class="breadcrumbs">Home</a></li>
                <li class="breadcrumb-item active">Products</li> 
            </ol>
        </nav>
    </div>

    <!-- shop products -->
    <div class="row">
        <div class="col-md-10 offset-md-1 products">
         <div class="row">
            <?php if(empty($productDis)) {} else { foreach($productDis as $product){  ?>
                <div class="col-md-3 col-sm-6 prods">
                <div class="item">
                        <div class="pad15">
                        <div class="col-12 text-center">
                                <img src="<?php echo $product['productImg']; ?>" class="proImg" alt="product">
                            </div>
                            <div class="col-12">
                                <p class="pros">
                                    <b>
                                    <?php echo $product['productName']; ?>
                                    </b>
                                </p>
                            </div>
                            <div class="pros">
                                <p>
                                    <b>
                                    &#8358;<?php echo number_format($product['productPrice'],2);?>
                                    </b>
                                </p>
                            </div>
                            <div class="text-center">
                                <p><input type="number" style="max-width: 50px" value="1" min="1" class="form-control-inline quantity<?php echo $product['products_id']; ?>"></p>
                            </div>
                            <div class="col-12" style="text-align: center;">
                                <a href="details.php?product=<?php echo $product['productName']; ?>&id=<?php echo $product['products_id']; ?>"> <button class="btn-block prodbtnn"> View Details</button> </a>
                            </div>
    
                            <div class="col-12" style="text-align: center;">
                                <button type="button" class="cartADDS" id="cartsAdd" onclick="add_cart('<?php echo $product['products_id']; ?>')"> Add to Cart</button>
                            </div>
                        </div>
                    </div> 
                </div>
            <?php } }  ?>
            </div>
        </div>
    </div>
    <!-- end of products -->

<?php include "xyzFooters.php";  ?>