<?php  include "abcHeaders.php";  ?>

<div class="col-md-12"> 
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="index.php" class="breadcrumbs">Home</a></li>
                <li class="breadcrumb-item active">Contact Us</li> 
            </ol>
        </nav>
    </div>

    <!-- contact form -->
<div class="row">
    <div class="col-md-10 offset-md-1">
            <?php 
                if(isset($_GET['success']) && ($_GET['success'] == 'message_sent')){
                    echo'<div class="alert alert-success alert-dismissible fade show">';
                    echo'Message sent successfully';
                    echo'<button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span></button>';
                    echo'</div>';
                }
            ?>
            <?php 
                if(isset($_GET['message']) && ($_GET['message'] == 'failed')){
                    echo'<div class="alert alert-danger alert-dismissible fade show">';
                    echo'Message not received, kindly check that you uploading according to each field';
                    echo'<button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span></button>';
                    echo'</div>';
                }
            ?>
            <?php 
                if(isset($_GET['message']) && ($_GET['message'] == 'empty_mail')){
                    echo'<div class="alert alert-danger alert-dismissible fade show">';
                    echo'Check that all fields are complete';
                    echo'<button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span></button>';
                    echo'</div>';
                }
            ?>
        <form action="process.php" method="POST">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>
                                <label for="name">Your Name(required)</label>
                                    <input type="text" name="nameszs" id="name" class="form-control" required>
                                </td>
                        </tr>
                        <tr>
                            <td>
                                    <label for="email">Your Email Address(required)</label>
                                    <input type="email" name="emailszs" id="email" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="subject">Subject</label>
                                <input type="text" name="subjectszs" id="subject" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="texts">Your message</label>
                                <textarea name="messageszs" id="texts" cols="30" rows="10" class="form-control" required></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" name="submitszs" class="btn btn-secondary btn-block">Send</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
           </form>
    </div>
</div>
    <!-- end of contact form -->

<?php  include "xyzFooters.php";  ?>