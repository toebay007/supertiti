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
    <form action="contacts.php" method="POST">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>
                                <label for="name">Your Name(required)</label>
                                    <input type="text" name="names" id="name" class="form-control">
                                </td>
                        </tr>
                        <tr>
                            <td>
                                    <label for="email">Your Email Address(required)</label>
                                    <input type="email" name="emails" id="email" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="subject">Subject</label>
                                <input type="text" name="subjects" id="subject" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="texts">Your message</label>
                                <textarea name="messages" id="texts" cols="30" rows="10" class="form-control"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" name="submit" class="btn btn-secondary btn-block">Send</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
           </form>
    </div>
</div>
    <!-- end of contact form -->

<?php  include "xyzFooters.php";  ?>