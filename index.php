<?php include "abcHeaders.php"; ?>
<?php 

    require("contactsclass.php");
    $cont = new contact;
    $testi = $cont->getTesti();
    $blog = $cont->getBlogs();

?>
                    <?php 
                        if(isset($_GET['login']) && ($_GET['login'] == 'success')){
                            echo'<div class="alert alert-success alert-dismissible fade show">';
                            echo'Logged in Successfully';
                            echo'<button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span></button>';
                            echo'</div>';
                        }
                    ?>
                <?php 
                        if(isset($_GET['login']) && ($_GET['login'] == 'fail')){
                            echo'<div class="alert alert-danger alert-dismissible fade show">';
                            echo'login failed. Check that your details are correctly put';
                            echo'<button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span></button>';
                            echo'</div>';
                        }
                    ?>
<!-- main pic -->
<div class="row mainPic">
    <div class="col-12 mainpics">
        <div class="text-center">
            <h1 class="maintext">
                Superlife Products <br> Best Selling Platform
            </h1>
        </div>
        <div class="text-center mt-4">
            <a href="member.php" class="btnss"><button type="button" class="btnss">Join Us</button></a>
        </div>
    </div>
</div>
<!-- end of main pic -->

<!-- Quick About -->
<div class="row quick">
    <div class="col-md-8 offset-md-2 qAbout text-center">
    <h4>One World One Vision</h4><br>
    <p>SuperLife is the beginning of the New Age of Direct Sales. We aspire to redefine the concept of globalization, revolutionizing the industry of direct sales.<br>
<br>
<strong>Our Vision</strong> – We Aim to Build a Holistic SuperLife Ecosystem Underpinned by Strong Spirit of Integrity and Kindredness, Striving for the Pursuit of Excellence in the Areas of Health and Wealth.<br>
<br>
<strong>Our Mission</strong> – To Improve the Health & Well-Being of Communities by Promoting Scientifically Tested Products While Leveraging a Digital Platform Which Empowers SuperLife Members to Attain Sustainable Wealth by Promoting the Products Globally.</p><br>
    </div>
</div>

<!-- End of Quick About -->

<!-- additional about -->
<div class="row addAbout">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="row addAbout">
            <div class="col-md-3 addAbouts">
                <h3 class="h3 text-center">
                    <p class="text-center iconss"><i class="bi bi-check-square-fill" style="font-size: 3rem; color: green ;"></i></p>
                    <p style="font-size: 1.5rem">Legality</p>
                    <p class="text-center" style="font-size: 1rem">
                    We legalize the business operations in every country.
                    </p>
                </h3>
            </div>
            <div class="col-md-3 addAbouts">
                <h3 class="h3 text-center">
                    <p class="text-center iconss"><i class="bi bi-check-square-fill" style="font-size: 3rem; color: green ;"></i></p>
                    <p style="font-size: 1.5rem">Freedom</p>
                    <p class="text-center" style="font-size: 1rem">
                    Free movement of Super Points around the world                    </p>
                </h3>
            </div>
            <div class="col-md-3 addAbouts">
                <h3 class="h3 text-center">
                    <p class="text-center iconss"><i class="bi bi-check-square-fill" style="font-size: 3rem; color: green ;"></i></p>
                    <p style="font-size: 1.5rem">Payment</p>
                    <p class="text-center" style="font-size: 1rem">
                    Enable various methods of payment to facilitate transactions globally                    </p>
                </h3>
            </div>
            <div class="col-md-3 addAbouts">
                <h3 class="h3 text-center">
                    <p class="text-center iconss"><i class="bi bi-check-square-fill" style="font-size: 3rem; color: green ;"></i></p>
                    <p style="font-size: 1.5rem">Logistics</p>
                    <p class="text-center" style="font-size: 1rem">
                    Efficient logistics management to deliver products anywhere in the world                    </p>
                </h3>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
<!-- end of additional about -->

<!-- Register -->
<div class="row">
    <div class="col-md-1 regs"></div>
    <div class="col-md-5 regs">
        <img src="img/fBusiness.jpeg" alt="business image" width="100%" height="400px" class="imgs">
    </div>
    <div class="col-md-5 regs">
        <h4>SuperLife Nigeria - Local <br> Business summit</h4>
        <div>
            <ol>
                <li> Attend our next Free Awareness Seminar</li>
                <li> Learn about the borderless business</li>
                <li> Operating Both Locally and Internationally</li>
                <li> Improve your Immune system and health on everyside</li>
                <li> Proven helath benefical products</li>
                <li> Financial freedom opportunity</li>
            </ol>
        </div>
        <div class="mt-4">
            <button class="btnss">Register Now</button>
        </div>
    </div>
    <div class="col-md-1 regs"></div>
</div>

<!-- end registration -->

<!-- stc Video -->
    <div class="row">
        <div class="col-12 vids">
        <iframe width="100%" height="500px" src="https://www.youtube.com/embed/BmWgcZIZsdA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
<!-- end of stc video -->

<!-- testimonial -->
    <div class="row">
        <div class="col-12 text-center testi">
            <h4 class="text-center" style="font-size: 1rem;"> Words on the Street</h4>
            <p style="font-size: 2rem;">Our Clients views</p>
        </div>
    </div>
<!-- testimonial header -->
<!-- testimonial body -->
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <?php if(empty($testi)){ ?>  
                <div class="col-md-4 regs">
                    <h6 class="h3 text-center">
                        <img src="img/fFruit.jpeg" alt="clients" width="100px" height="100px" class="testImg">
                        <br><br>
                        <p class="text-muted" style="font-size: 1rem; font-style: normal;">Testimonies would be uploaded shortly please bear with us</p>
                        <p><strong>supertiti.life</strong></p>
                        <span class="text-muted"  style="font-size: 1rem;">Admin</span>
                    </h6>
                </div>
            <?php } else{ foreach($testi as $testimony){  ?>
                <div class="col-md-4 regs">
                    <h6 class="h3 text-center">
                        <img src="<?php echo $testimony['Pphoto'] ?>" alt="<?php echo $testimony['authors']; ?> testimony" width="100px" height="100px" class="testImg">
                        <br><br>
                        <p class="text-muted" style="font-size: 1rem; font-style: normal;"><?php echo $testimony['content'] ?></p>
                        <span class="text-muted"  style="font-size: 1rem;"><?php echo $testimony['authors'] ?></span>
                    </h6>
                </div>
            <?php  } } ?>
        </div>
    </div>
</div>
<!-- end of testimonial -->
<!-- Blog -->
<div class="row">
    <div class="col-12 text-center testi">
            <h4 class="text-center" style="font-size: 1rem;"> Get updated</h4>
            <p style="font-size: 2rem;">Blogs</p>
        </div>
    </div>
<!-- Blog header -->
<!-- Blog body -->
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <?php if(empty($blog)){ ?>  
                <div class="col-md-4 regs">
                    <div class="card">
                        <img src=".../" class="card-img-top" alt="...">
                        <div class="card-body">
                        <p class="card-text"><small class="text-muted">No upload</small></p>
                            <h5 class="card-title">No title</h5>
                            <p class="card-text">Nothing has been uploaded yet</p>
                        </div>
                    </div>
                </div>
            <?php } else{ foreach( $blog as $blogs){ ?>
                <div class="col-md-4 regs">
                    <div class="card">
                        <img src="<?php echo $blogs['Pphoto'] ?>" class="card-img-top" alt="<?php echo $blogs['topicz'] ?>">
                        <div class="card-body">
                        <p class="card-text"><small class="text-muted">Uploaded on <?php echo $blogs['created'] ?> || By Admin</small></p>
                            <h5 class="card-title"><?php echo $blogs['topicz'] ?></h5>
                            <p class="card-text"><?php echo $blogs['shrtDesc'] ?></p>
                        </div>
                        <div>
                            <span class="px-4 text-muted"><a href="blog.php?id=<?php echo $blogs['id'] ?>">Read more >>></a></span></div>
                    </div>
                </div>
            <?php   }}  ?>
        </div>
    </div>
</div>
<!-- End of Blog -->
<?php  include "xyzFooters.php"; ?>