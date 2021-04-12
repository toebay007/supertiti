             <!-- Modal for Login -->
            <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Log In</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="process.php" method="POST">
                            <div class="form-group">
                                <input type="email" class="form-control" id="userEmail" aria-describedby="emailHelp" placeholder="Enter Email" name="userEmail" required>
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="userPwd" placeholder="Password" name="userPwd" autocomplete="current-password" required>
                            </div>
                            <div>
                                <span style="color: rgb(51, 69, 151);">Don't have an account?<a href="user_register.php" class="readB" style="color: rgb(51, 69, 151);"><u> Sign up</u></a> </span>
                            </div>
                            <button type="submit" name="submituser" class="adminbtn">Login</button>
                        </form>                
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="row foot">
                <div class="col-md-3 foot">
                    <h4 class="mt-4">About SuperLife Products</h4>
                    <p class="mt-3 mb-3">
                    SUPER LIFE Plant Based Stem Cell Company, is a multi billion dollars industry with the newest innovations on plant stem cell. The company’s health products are capable of regenerating any cell in the body and are capable of renewing the skin stem cell. The other thing that is mind blowing about SUPER LIFE is her COMPENSATION PLAN.                    </p>
                </div>
                <div class="col-md-3 foot">
                <?php 
                        $bink = $cont->linkBlogsRead(); ?>
                        <?php if(empty($bink)){}  else{ foreach( $bink as $blinklogs ){ ?>
                        <h4 class="mt-4">Latest Blog Post</h4>
                            <div class="mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4 mt-4">
                                        <img src="<?php echo $blinklogs['Pphoto'];  ?>" alt="<?php echo $blinklogs['topicz'];  ?>" width="100px" height="100px">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <p class="card-text" style="font-size: 0.9rem;"><?php $pos=strpos($blinklogs['shrtDesc'], ' ', 100); echo substr($blinklogs['shrtDesc'],0,$pos); ?></p>
                                            <a href="blog.php?id=<?php echo $blinklogs['id'];  ?>">
                                                <p style="color: white; border:none; outline:none; text-decoration:none;"><i>Read More >>></i></p></a>
                                            <p class="card-text" style="font-size: 0.7rem;"><small class="text-muted"><?php echo $blinklogs['created'];  ?></small></p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } }  ?>
                </div>
                <div class="col-md-3 foot">
                    <h4 class="mt-4">Subscribe to our Newsletter</h4>
                    <p>Please subscribe to our newsletter by entering your email address in the box below</p>  
                    <input type="text" name="sub" id="sub" class="form-control">
                    <img src="img/payment.png" alt="payment" width="50%" height="50px">
                </div>              
                <div class="col-md-3 foot">
                    <h4 class="mt-4">Follow us on Social Media</h4>
                    <a href="https://www.facebook.com/Super-Titilola-102281345310792/"><p style="color: white; border:none; outline:none; text-decoration:none;"><i class="bi bi-facebook"></i> Facebook</p></a>
                    <a href="https://www.instagram.com/titilola_ogunsakin/"><p style="color: white; border:none; outline:none; text-decoration:none;"><i class="bi bi-instagram"></i> instagram</p></a>
                    <a href="https://wa.me/+353862521470/"><p style="color: white; border:none; outline:none; text-decoration:none;"><i class="bi bi-whatsapp"></i> Whatsapp</p></a>
                    <a href="sms:{+353-86-252-1470}?body={content}"><p style="color: white; border:none; outline:none; text-decoration:none;"><i class="bi bi-chat-left-text"></i> SMS</p></a>
                </div>
                <hr width="100%" style="color:grey;" class="mt-4 mb-3">
                <div class="row">
                    <div class="col-md-2 foot text-center text-muted">
                        <span>
                            <abbr style="text-decoration:none;" title="This is a Public Disclaimer: (1) This site does not belong to / represents Superlife company. (2) Products and any uploads on this site, the owners do not claim authenticity or ownership of them. (3) The product itself does not curre diseases, it empowers the body to do its own healing. Remember, Good health is expensive but it is worth spending on. (4) Your health is important to us. Please consult your Doctor or other qualified health care professional before usinf this product.(5) The information, materials and services contained on this site are provided to you on a “as is”, and “as available” basis. We do not warrant or guarantee the accuracy or completeness of this information, statements, contents or materials, and expressly disclaim any liability for any errors, omissions and/or inaccuracies in this information, statements, contents and materials. SuperLifeWorld.com shall endeavor its best but is not obliged to correct any inaccuracies, errors, omissions or typographical errors in the information posted to this Web Site, and such information including information on pricing and availability of goods may be changed, amended or updated without notice.(6) To the maximum extent permitted by law, we disclaim liability for any damages including, without limitation, direct or indirect, special, incidental, compensatory, exemplary or consequential damages, losses or expenses, including without limitation lost or misdirected orders, lost profits, lost registrations, lost goodwill, or lost or stolen programs or other data, however caused and under any theory of liability arising out of or in connection with

i) use of this site, or inability to see this site by any party; or
ii) any failure or performance, error, omission, interruption, defect, delay in operation or transmission; or
iii) line or system failure or the introduction of a computer virus, or other technical sabotage, even if we or our employees or representatives are advised of the possibility or likelihood of such damages, losses or expenses. ">DISCLAIMER</abbr>
                        </span> 
                    </div>
                    <div class="col-md-8 foot"></div>
                    <div class="col-md-2 foot text-center text-muted">
                    <small>Superlife products sold by Titilola</small> &copy; copyright 2021 TOG
                    </div>
                </div>
            </div>
            
        </footer>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script type="text/javascript" src="styles.js"></script>
        <script>
                function add_cart(p_id=""){
                    var quantity = $(".quantity"+p_id).val();
                    $.ajax({
                        type:"post",
                        url: 'ajaxadd.php',
                        data:{action:'add',p_id:p_id,quantity:quantity},
                        success:function(result){
                            $('.cart_data').html(result);
                            cartCount();
                        }
                    });

                }

                add_cart();

                function cartCount(){
                    $.ajax({
                        type: "post",
                        url: "ajax2.php",
                        success:function (result){
                            $('#countNo').html(result);
                        }
                    });
                }

                function remove_cart(p_id){
                    $.ajax({
                        type: "post",
                        url: "ajaxadd.php",
                        data:{action:'delete',p_id:p_id},
                        success:function(result){
                            $('.cart_data').html(result);
                            cartCount();
                        }
                    });
                }

                function empty_cart(){
                    $.ajax({
                        type: "post",
                        url: "ajaxadd.php",
                        data:{action:'empty'},
                        success:function(result){
                            $('.cart_data').html(result);
                            cartCount();
                        }
                    })
                }
        </script>
                <!-- Modal -->
                <!-- Modal -->
<div class="modal fade bd-example-modal-xl cartzz" id="exampleModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-shopping-basket"></i>  SuperLife Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body cart_data table-responsive">
                            
                                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-custom" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    <!-- <script src="https://www.paypal.com/sdk/js?client-id=AQNqaaXoPQVcTcH8uJGXfEcUp4wPBHkUyadl8f_ml6z_cZALM0gV6LdCp76ZLXf4vIYQQy1gWsbsfdVD&disable-funding=credit,card"></script>
   
    <script>
    // window.onload = function() {
     window.price = document.getElementById("proTotal").value;
//     //console.log(price);
// };
paypal.Buttons({
    style : {
        color:'blue',
        shape:'pill'
    },
    createOrder: function(data, actions){
        return actions.order.create({
            purchase_units:[{
                amount:{
                    value: window.price
                }
            }]
        })
    },
    onApprove:function(data, actions){
        return actions.order.capture().then(function (details){
            //console.log(details)
            window.location.replace("http://localhost/superlife/supertiti/products.php?payment=successful")
        })
    },
    onCancel:function(data,actions){
        window.location.replace("http://localhost/superlife/supertiti/products.php?payment=failed")
    }
}).render('#paypal-payment');
    </script> -->
    </body>
</html>