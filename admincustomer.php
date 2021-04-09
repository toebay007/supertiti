<?php include "start.php"; 

    require("orders.php");
    $c = new orders;
    $customer = $c->getFrequentCustomers();

?>


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
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
            <?php if(empty($customer)){  ?>  
                <tr>
                        <td colspan="5"><p class="alert alert-primary text-center" style="width: 100%; height:200px;">No registered customer yet.</p></td>
                </tr>
            <?php  } else{  foreach($customer as $customers){  ?>
               <tr>
                   <td><?php echo $customers['Fullname'];  ?></td>
                   <td><?php echo $customers['Address'];  ?></td>
                   <td><?php echo $customers['emailzs'];  ?></td>
                   <td><?php echo $customers['phoneNo'];  ?></td>
               </tr>
               <?php   }  }   ?>
            </tbody>
        </table>
    </div>
</div>


<?php  include "xyzFooters.php";  ?>