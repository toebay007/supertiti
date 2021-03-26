<?php include "start.php"; ?>


<div class="row">
    <div class="col-md-2 adDivs advivs text-center">
        <?php include "sidebar.php"; ?>
    </div>
    <div class="col-md-10">
        <h4 class="text-center mt-4 mb-3">Total Number of Customers</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Customer's Name</th>
                    <th>Email Address</th>
                    <th>Address</th>
                    <th>Total Number of Orders</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5"><p class="alert alert-primary text-center" style="width: 100%; height:200px;">No registers customer yet.</p></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<?php  include "xyzFooters.php";  ?>