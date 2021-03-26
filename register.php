<?php include "start.php"; ?>

<div class="row">
    <div class="col-md-2 adDivs advivs text-center">
        <?php include "sidebar.php"; ?>
    </div>
    <div class="col-md-10 adDivs">
        <h4 class="text-center">Create New Account</h4>
        <form action="process.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Firstname</label>
                <input type="text" name="finame" class="form-control" value="">
            </div> 
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lanames" class="form-control" value="">
            </div> 
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Upload Profile Picture</label>
                    <input type="file" name="pPhoyo" class="form-control">
                </div> 
                <div class="form-group col-md-6">
                    <label>Emails</label>
                    <input type="text" name="emailz" class="form-control" value="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="password" name="pwdz" class="form-control" value="">
                </div>   
                <div class="form-group col-md-6">
                    <label>Confirm Password</label>
                    <input type="password" name="pwdzsc" class="form-control" value="">
                </div>
            </div>
            <div class="form-group col-md-6 px-1">
                <label>Phone Number</label>
                <input type="number" name="ponumber" class="form-control" value="">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="adminbtn" value="Submit" onclick="confirm('Are you sure you want to create a new admin?')";>
            </div>
        </form>
    </div>
</div>

<?php  include "xyzFooters.php";  ?>