<?php include "start.php"; ?>


<div class="row">
    <div class="col-md-2 adDivs advivs text-center">
        <?php include "sidebar.php"; ?>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-3">
                <button class="adminbtn" id="newsz">New Questions</button>
            </div>
            <div class="col-md-3">
                <button class="adminbtn" id="pend">Pending Questions</button>
            </div>
            <div class="col-md-3">
                <button class="adminbtn" id="resolved">Resolved Questions</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12" id="newQ">
            <h4 class="text-center mt-4 mb-3">Customers Questions</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Customer's Name</th>
                    <th>Email Address</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Asked on</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $con = $cont->getQuestions();
                        $pen = $cont->PendingMessages();
                        $res = $cont->ResolvedMessages();
                ?>
                <?php if(empty($con)){ ?>
                <tr>
                    <td colspan="6"><p class="alert alert-primary text-center" style="width: 100%; height:200px;">No Questions has been asked yet</p></td>
                </tr>
                <?php  } else{ foreach($con as $contact){   ?>
                    <tr>
                        <td><?php echo $contact['namez'] ?></td>
                        <td><?php echo $contact['emailzs'] ?></td>
                        <td><?php echo $contact['subjectsz'] ?></td>
                        <td><?php echo $contact['messagezs'] ?></td>
                        <td><?php echo $contact['asked_on'] ?></td>
                        <td><a href="actions.php?id=<?php echo $contact['id'] ?>"><button class="adminbtn">Details</button></a></td>
                    </tr>
                    <?php   } } ?>
            </tbody>
        </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12 table-responsive" id="pendingQ">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Customer's Name</th>
                            <th>Email Address</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($pen)){ ?>
                            <tr>
                            <td colspan="6"><p class="alert alert-primary text-center" style="width: 100%; height:200px;">No Pending Questions</p></td>
                            </tr>
                        <?php } else{ foreach($pen as $pending){  ?>
                        <tr>
                            <td><?php echo $pending['namez'] ?></td>
                            <td><?php echo $pending['emailzs'] ?></td>
                            <td><?php echo $pending['subjectsz'] ?></td>
                            <td><?php echo $pending['messagezs'] ?></td>
                            <td><?php echo $pending['message_status'] ?></td>
                            <td><a href="actions.php?id=<?php echo $pending['id'] ?>"><button class="adminbtn">Details</button></a></td>
                        </tr>
                        <?php } }  ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12" id="resolvedQ">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Customer's Name</th>
                            <th>Email Address</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(empty($res)){ ?>
                            <tr>
                            <td colspan="6"><p class="alert alert-primary text-center" style="width: 100%; height:200px;">No Resolved Questions</p></td>
                            </tr>
                        <?php } else{ foreach($res as $resolved){  ?>
                        <tr>
                            <td><?php echo $resolved['namez'] ?></td>
                            <td><?php echo $resolved['emailzs'] ?></td>
                            <td><?php echo $resolved['subjectsz'] ?></td>
                            <td><?php echo $resolved['messagezs'] ?></td>
                            <td><?php echo $resolved['message_status'] ?></td>
                            <td><a href="actions.php?id=<?php echo $resolved['id'] ?>"><button class="adminbtn">Details</button></a></td>
                        </tr>
                        <?php } }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php  include "xyzFooters.php";  ?>