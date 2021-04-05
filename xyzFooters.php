             <!-- Modal for Login -->
             <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Log In</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet in itaque voluptates labore molestiae ducimus voluptas reprehenderit id consectetur, at ipsa asperiores explicabo hic sint velit deleniti saepe veniam? Atque.
                    </p>
                </div>
                <div class="col-md-3 foot">
                    <h4 class="mt-4">Latest Blog Post</h4>
                        <div class="mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4 mt-4">
                                    <img src="img/tFruit.jpeg" alt="last post" width="100px" height="100px">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class="card-text" style="font-size: 0.9rem;">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        <p class="card-text" style="font-size: 0.7rem;"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-md-3 foot">
                    <h4 class="mt-4">Subscribe to our Newsletter</h4>
                    <p>Please subscribe to our newsletter by entering your email address in the box below</p>  
                    <input type="text" name="sub" id="sub" class="form-control">
                </div>              
                <div class="col-md-3 foot">
                    <h4 class="mt-4">Follow us on Social Media</h4>
                    <p><i class="bi bi-facebook"></i> Facebook</p>
                    <p><i class="bi bi-instagram"></i> instagram</p>
                    <p><i class="bi bi-whatsapp"></i> Whatsapp</p>
                    <p><i class="bi bi-whatsapp"></i> Telegram</p>
                </div>
                <hr width="100%" style="color:grey;" class="mt-4 mb-3">
                <div class="row">
                    <div class="col-md-2 foot text-center text-muted">
                        <small>Superlife Nigeria</small>
                    </div>
                    <div class="col-md-8 foot"></div>
                    <div class="col-md-2 foot text-center text-muted">
                    &copy; copyright 2021 TOG
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
    <div class="modal fade bd-example-modal-lg" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-shopping-basket"></i>  SuperLife Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body cart_data">
                        
                            
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-custom" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>