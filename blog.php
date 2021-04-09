<?php  include "abcHeaders.php"; 

    $link = $cont->linkBlog();
    $bink = $cont->linkBlogsRead();

    if(isset(($_GET['id']))){

    $id2z = $_GET['id'];
    // echo $id;

    $cont->readBlog($id2z);
    $blog = $cont->readBlog($id2z);
    // print_r($blog);

?>

    <div class="col-md-12"> 
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="index.php" class="breadcrumbs">Home</a></li>
                <li class="breadcrumb-item active">Blog</li> 
            </ol>
        </nav>
    </div>
    
    <!-- heading -->
    <div class="row">
        <div class="col-md-10 offset-md-1 abtH text-center">
            <h4 class="abtHe">BLOG</h4>
        </div>
    </div>
    <!-- end of header -->

    <!-- List of Already Posted Blogs -->
    
    <div class="row">
        <div class="col-md-10">
            <?php if(empty($blog)){ ?>  
                <p class="text-center alert alert-warning" style="height: 300px;">Actually hope you don't mind, we are yet to upload any news yet... <br>
                Abeg no vex, just chill <br> Kindly choose any of the links beside me or click <a href="index.php">Me</a></p>
            <?php } else{ foreach( $blog as $blogs ){ ?>
            <div class="text-center">
                <img src="<?php echo $blogs['Pphoto'];  ?>" alt="<?php echo $blogs['topicz'];  ?>" class="mt-4 mb-2 blogImg">
            </div>
            <h2 class="text-center"><?php echo $blogs['topicz'];  ?></h2>
            <p><?php echo nl2br($blogs['contents']); ?></p>
            <?php } }  ?>
        </div>
        <div class="col-md-2">
            <div class="row">
                <div class="col-12 card">
                    <h5 class="text-center">Related News</h5>
                    <?php if(empty($link)){  ?>   
                        <p class="text-muted mt-4 mb-3">
                            No News has been Uploaded yet <br>
                            kindly bear with Us.
                        </p>    
                    <?php } else{ foreach( $link as $Liblogs ){ ?>
                    <p class="text-center"><a href="blog.php?id=<?php echo $Liblogs['id'];  ?>"><?php echo $Liblogs['topicz'];  ?></a></p>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>
<?php   } else{ ?>  
    
    <div class="row">
            <div class="col-md-12"> 
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="index.php" class="breadcrumbs">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li> 
                    </ol>
                </nav>
            </div>
    </div>
        <!-- heading -->
    <div class="row">
        <div class="col-md-10 offset-md-1 abtH text-center">
            <h4 class="abtHe">BLOG</h4>
        </div>
    </div>
    <!-- end of header -->
    <div class="row">
        <div class="col-md-10">
                    <?php if(empty($bink)){ ?>  
                        <p class="text-center alert alert-warning" style="height: 300px;">Actually hope you don't mind, we are yet to upload any news. <br> Kindly go back by clicking <a href="index.php">Me</a></p>
                    <?php } else{ foreach( $bink as $blinklogs ){ ?>
                    <div class="text-center">
                        <img src="<?php echo $blinklogs['Pphoto'];  ?>" alt="<?php echo $blinklogs['topicz'];  ?>" class="mt-4 mb-2 blogImg">
                    </div>
                    <h2 class="text-center"><?php echo $blinklogs['topicz'];  ?></h2>
                    <p><?php echo nl2br($blinklogs['contents']); ?></p>
                    <?php } }  ?>
        </div>
        <div class="col-md-2">
            <div class="row">
                <div class="col-12 card">
                    <h5 class="text-center">Related News</h5>
                    <?php if(empty($link)){  ?>   
                        <p class="text-muted mt-4 mb-3">
                            No News has been Uploaded yet <br>
                            kindly bear with Us.
                        </p>    
                    <?php } else{ foreach( $link as $Liblogs ){ ?>
                    <p class="text-center"><a href="blog.php?id=<?php echo $Liblogs['id'];  ?>"><?php echo $Liblogs['topicz'];  ?></a></p>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>    



<?php  } ?>
    
<?php  include "xyzFooters.php"; ?>