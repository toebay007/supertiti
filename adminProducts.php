<?php include "start.php"; ?>

<div class="row">
    <div class="col-md-2 adDivs advivs text-center">
        <?php include "sidebar.php"; ?>
    </div>
    <div class="col-md-10 admdivs" style="color:black;">
        <div class="row">
            <div class="col-md-10 offset-md-1 admdivs">
                <div class="row">
                    <div class="col-md-3 admdivs" id="newP">
                        <button class="adminbtn">Create a new Product</button>
                    </div>
                    <div class="col-md-3 admdivs" id="viewP">
                        <button class="adminbtn">View Products</button>
                    </div>
                    <div class="col-md-3 admdivs" id="deleteP">
                        <button class="adminbtn">Delete Product</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1 admdivs" style="color:black;" id="newProduct">
                <form action="process.php" method="post" enctype="multipart/form-data" class="formFonts">
                    <h4 class="text-center">Create Product</h4>
                    <?php 
                        if(isset($_GET['success']) && ($_GET['success'] == 'succesfully_created')){
                            echo'<div class="alert alert-success alert-dismissible fade show">';
                            echo'Products created successfully';
                            echo'<button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span></button>';
                            echo'</div>';
                        }
                    ?>
                    <?php 
                        if(isset($_GET['registration']) && ($_GET['registration'] == 'failed')){
                            echo'<div class="alert alert-danger alert-dismissible fade show">';
                            echo'Failed to create product';
                            echo'<button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span></button>';
                            echo'</div>';
                        }
                    ?>
                    <?php 
                        if(isset($_GET['registration']) && ($_GET['registration'] == 'price_is_a_number')){
                            echo'<div class="alert alert-danger alert-dismissible fade show">';
                            echo'Price must be numbers with no character like ,.*() or alphabets';
                            echo'<button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span></button>';
                            echo'</div>';
                        }
                    ?>
                    <?php 
                        if(isset($_GET['registration']) && ($_GET['registration'] == 'image_failed')){
                            echo'<div class="alert alert-danger alert-dismissible fade show">';
                            echo'Could not upload to database';
                            echo'<button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span></button>';
                            echo'</div>';
                        }
                    ?>
                    <?php 
                        if(isset($_GET['registration']) && ($_GET['registration'] == 'wrong')){
                            echo'<div class="alert alert-danger alert-dismissible fade show">';
                            echo'Check that all fields are field correctly';
                            echo'<button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span></button>';
                            echo'</div>';
                        }
                    ?>
                        <div class="form-row">
                            <div class="form-group col-12 px-4">
                                <label for="products">Products Name</label>
                                <input type="text" class="form-control" placeholder="Name of products" name="productName" required>
                            </div>
                         </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 px-4">
                                <label for="products">Products Short Description</label>
                                <input type="text" class="form-control" placeholder="Short Description" name="productShort" required>
                            </div>
                            <div class="form-group col-md-6 px-4">
                                <label for="productPrice">Product Price</label>
                                <input type="text" name="productPrice" id="productPrice" class="form-control">
                            </div>
                        </div>
                        <div class="form-row"> 
                            <div class="form-group col-md-6 px-4">
                                <label for="productLong">Product Detailed Description</label>
                                <textarea name="productLong" id="productLong" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-md-6 px-4">
                                <label for="products">Products Photo</label>
                                <input type="file" class="form-control" placeholder="Short Description" name="productImg" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 px-4">
                                <button type="submit" name="submitProduct" class="adminbtn">Upload Product</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1 mt-3 table-responsive" id="viewProducts">
                <h4 class="text-center mt-2 mb-2">View Uploaded Products</h4>
                    <?php  require("productclass.php");
                            $pro = new product;

                    ?>
                <?php $adminProduct = $pro->products(); ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product short description</th>
                            <th>Product Description</th>
                            <th>Product Price</th>
                            <th>Product Picture</th>
                        </tr>
                    </thead>
                    <?php if(empty($adminProduct)){ ?>
                        <tbody>
                            <tr>
                                <td colspan="5"><p class="alert alert-primary text-center" style="width: 100%; height:200px;">You are yet to upload a Product. Kindly do so.</p></td>
                            </tr>
                        </tbody>
                   <?php  } else {  foreach($adminProduct as $products){?>
                    <tbody>
                        <tr>
                            <td><?php echo $products['productName']; ?></td>
                            <td><?php echo $products['productShort']; ?></td>
                            <td><?php echo $products['productLong']; ?></td>
                            <td>&#8358;<?php echo number_format($products['productPrice'],2); ?></td>
                            <td><img src="<?php echo $products['productImg']; ?>" alt="<?php echo $products['productName']; ?>" width="150px" height="150px"></td>
                        </tr>
                    </tbody>
                    <?php  } }  ?>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1 table-responsive" id="deleteProduct">
                    <h4 class="text-center mt-3 mb-2">Delete a Product</h4>
                    <?php 
                        if(isset($_GET['delete']) && ($_GET['delete'] == 'success')){
                            echo'<div class="alert alert-success alert-dismissible fade show">';
                            echo'Product Deleted successfully';
                            echo'<button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span></button>';
                            echo'</div>';
                        }
                    ?>
                    <?php $adminProduct = $pro->products(); ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product short description</th>
                            <th>Product Description</th>
                            <th>Product Price</th>
                            <th>Product Picture</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php if(empty($adminProduct)){ ?>
                        <tbody>
                            <tr>
                                <td colspan="6"><p class="alert alert-primary text-center" style="width: 100%; height:200px;">You are yet to upload a Product. Kindly do so.</p></td>
                            </tr>
                        </tbody>
                   <?php  } else {  foreach($adminProduct as $products) { ?>
                    <tbody>
                        <tr>
                            <td><?php echo $products['productName']; ?></td>
                            <td><?php echo $products['productShort']; ?></td>
                            <td><?php echo $products['productLong']; ?></td>
                            <td>&#8358;<?php echo number_format($products['productPrice'],2); ?></td>
                            <td><img src="<?php echo $products['productImg']; ?>" alt="<?php echo $products['productName']; ?>" width="150px" height="150px"></td>
                            <td><a href="process.php?deleteProduct=<?php echo $products['products_id']; ?>"><button class="adminbtn">Delete Product</button></a></td>
                        </tr>
                    </tbody>
                    <?php  } }  ?>
                </table>
            </div>
        </div>
    </div>
</div>


<?php  include "xyzFooters.php";  ?>