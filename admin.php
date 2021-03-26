<?php  include "abcHeaders.php";  ?>

<div class="row">
    <div class="col-12">
        <h4 class="text-center mb-5">
            Welcome To Your Portal Login Page
        </h4>
    </div>
</div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
            <?php 
                    if(isset($_GET['p']) && ($_GET['p'] == 'fail')){
                        echo'<div class="alert alert-danger alert-dismissible fade show text-center">';
                        echo'Login failed. Please check that your details are rightly put';
                        echo'</div>';
                    }
                ?>
        <form action="process.php" method="post" class="mb-4 mt-4">
            <div class="form-floating mb-3">
                <input type="email" name="adminEmail" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="adminPwds" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="d-grid gap-2">
                <button name="adminsubmit" class="adminbtn">Login</button>
            </div>
            <div>
                <p class="mb-3">Forgot password? Click <a href="#">Here</a></p>
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>


<?php  include "xyzFooters.php";   ?>