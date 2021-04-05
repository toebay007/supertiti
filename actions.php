<?php include "start.php";

if(isset(($_GET['id']))){

    $idsz = $_GET['id'];
     // echo $idsz;
?>
<div class="row">
    <div class="col-md-2 adDivs advivs text-center">
        <?php include "sidebar.php"; ?>
    </div>
    <div class="col-md-10">
    <?php 
            $cont->getMessageStatus($idsz);
            $contact = $cont->getMessageStatus($idsz);
            $consz = $cont->getQuestions();
    ?>
    <form action="process.php" method="POST">
        <div class="form-row">
                <label for="messagestatus" class="col-md-2 col-form-label">Message Status</label>
                <div class="form-group col-md-3">
                    <select name="messagestatus" id="orderstatus" class="form-control">
                        <?php foreach($contact as $contacts){ ?>
                        <option value="<?php echo $contacts['message_status']  ?>" selected><?php echo $contacts['message_status'] ?></option>
                        <?php } ?>
                        <option value="Pending">Pending</option>
                        <option value="Resolved">Resolved</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <input type="hidden" name="conID" value="<?php echo $idsz; ?>">
                    <button type="submit" name="messageDetails" class="adminbtn" style="margin-top: 5px;">Save</button>
                </div>    
            </div>
        </form>
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Send Mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($contact)){ ?>
                            <tr>
                                <td colspan="6"><p class="alert alert-primary text-center" style="width: 100%; height:200px;">If you're seeing this, then this site is broken</p></td>
                            </tr>
                            <?php  } else{ foreach($contact as $contacted){  ?>
                        <tr>
                            <td><?php echo $contacted['namez'] ?></td>
                            <td><?php echo $contacted['emailzs'] ?></td>
                            <td><?php echo $contacted['subjectsz'] ?></td>
                            <td><?php echo $contacted['messagezs'] ?></td>
                            <td><?php echo $contacted['message_status'] ?></td>
                            <td><a href="mailto:<?php echo $contacted['emailzs'] ?>?subject=RE:<?php echo $contacted['subjectsz'] ?>&body={content}"><button class="adminbtn">Send Mail</button></a></td>
                        </tr>
                        <?php  } }    ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>










<?php } else{ ?>

    <p class="text-center alert alert-warning" style="height: 300px;">Actually if you're seeing this, then you got in here through the wrong hole LMAO <br> Kindly click <a href="adminContant.php">Me</a></p>

<?php } ?>
<?php include "xyzFooters.php"; ?>