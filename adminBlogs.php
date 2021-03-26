<?php include "start.php";



?>

<div class="row">
    <div class="col-md-2 adDivs advivs text-center">
        <?php include "sidebar.php"; ?>
    </div>
    <div class="col-md-10 adDivs">
        <div class="row">
            <div class="col-md-10 offset-md-1 mt-4 admdivs">
                <div class="row">
                    <div class="col-md-3 admdivs" style="color: black;">
                        <button class="adminbtn" id="addBlog">
                            <h5 class="text-center mt-2">Add Blog Story</h5>
                        </button>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4 admdivs" style="color: black;">
                        <button class="adminbtn" id="viewBlog">
                            <h5 class="text-center mt-2">View uploaded Blogs</h5>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1 mt-4" id="uploadBlogs">
                <h4 class="text-center">Upload Blog for SuperLife Users</h4>
                <?php
                if (isset($_GET['upload']) && ($_GET['upload'] == 'incomplete_data')) {
                    echo '<div class="alert alert-danger alert-dismissible fade show text-center">';
                    echo 'Check that none is empty';
                    echo '</div>';
                }
                ?>
                <?php
                if (isset($_GET['success']) && ($_GET['success'] == 'succesfully_created')) {
                    echo '<div class="alert alert-success alert-dismissible fade show text-center">';
                    echo 'Blog created successfully';
                    echo '</div>';
                }
                ?>
                <?php
                if (isset($_GET['registration']) && ($_GET['registration'] == 'failed')) {
                    echo '<div class="alert alert-danger alert-dismissible fade show text-center">';
                    echo 'Wrong Entry. Try again with correct information';
                    echo '</div>';
                }
                ?>
                <?php
                if (isset($_GET['registration']) && ($_GET['registration'] == 'password_failure')) {
                    echo '<div class="alert alert-danger alert-dismissible fade show text-center">';
                    echo 'Wrong Entry. Check that both are filled correctly';
                    echo '</div>';
                }
                ?>
                <?php
                if (isset($_GET['registration']) && ($_GET['registration'] == 'image_failed')) {
                    echo '<div class="alert alert-danger alert-dismissible fade show text-center">';
                    echo 'Check Image extension properly';
                    echo '</div>';
                }
                ?>
                <?php
                if (isset($_GET['registration']) && ($_GET['registration'] == 'wrong')) {
                    echo '<div class="alert alert-danger alert-dismissible fade show text-center">';
                    echo 'Wrong Entry';
                    echo '</div>';
                }
                ?>
                <form action="process.php" method="post" enctype="multipart/form-data">
                    <div class="form-group mt-4 mb-2 px-4">
                        <label for="authors">
                            Topic
                        </label>
                        <textarea name="topic" id="authorz" class="form-control" cols="10" rows="1"></textarea>
                    </div>
                    <div class="form-group mt-4 px-4">
                        <label for="Pphoto">
                            Upload Picture
                        </label>
                        <input type="file" name="Pphoto" id="Pphoto" class="form-control">
                    </div>
                    <div class="form-group mt-4 mb-2 px-4">
                        <label for="authors">
                            Short Introduction
                        </label>
                        <textarea name="shIntro" id="authors" class="form-control" cols="10" rows="2"></textarea>
                    </div>
                    <div class="form-group mt-4 mb-2 px-4">
                        <label for="content">
                            Contents
                        </label>
                        <textarea name="content" id="content" class="form-control" cols="10" rows="5"></textarea>
                    </div>
                    <div class="form-group mt-4 mb-2 px-4">
                        <button type="submit" name="submitBlog" class="adminbtn">UPLOAD</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1 mt-4 mb-4 table-responsive" id="viewsBlogP">
                <h4 class="text-center">Uploaded Testimony</h4>
                <?php $adminBlogzs = $admin->blogz(); ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Topic</th>
                            <th>Short Description</th>
                            <th>Content</th>
                            <th>Photo</th>
                            <th>Created On</th>
                        </tr>
                    </thead>
                    <?php if (empty($adminBlogzs)) {  ?>
                        <tbody>
                            <tr>
                                <td colspan="4"><p class="alert alert-primary text-center" style="width: 100%; height:200px;">You are yet to upload a testimony. Kindly do so.</p></td>
                            </tr>
                        </tbody>
                 <?php   } else {   foreach ($adminBlogzs as $blogged) { ?>
                        <tbody>
                            <tr>
                                <td><?php echo $blogged['topicz']; ?></td>
                                <td><?php echo $blogged['shrtDesc']; ?></td>
                                <td><?php echo $blogged['contents']; ?></td>
                                <td><img src="<?php echo $blogged['Pphoto']; ?>" alt="" width="150px" height="150px"></td>
                                <td><?php echo $blogged['created']; ?></td>
                            </tr>
                        </tbody>
                    <?php   }
                    } ?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "xyzFooters.php"; ?>