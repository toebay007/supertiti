
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            SuperLife Family
        </title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"> 
        <link href="fontawesome/css/all.css" rel="stylesheet"><link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet"> 
        <link rel="preconnect" href="https://fonts.gstatic.com"><link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Katibeh&family=Montserrat+Alternates&family=Tangerine:wght@700&display=swap" rel="stylesheet"><meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container-fluid">
            <!-- Beginning of Navigation -->
            <div class="row firstNav">
                <div class="col-md-6 col-sm-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    <span class="navSpan"> Ireland, Worldwide </span>
                    &nbsp; &nbsp;
                    <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                            <span class="navSpan">+234-(0)-1234-123-1234</span>
                        </span>
                </div>
                <div class="col-md-2 col-sm-6">

                </div>
                <div class="col-md-3 col-xs-4 text-center">
                    <i class="bi bi-facebook" style="margin-right: 15px;"></i>
                    <i class="bi bi-instagram" style="margin-left: 15px; margin-right: 25px;"></i>
                    <i class="bi bi-whatsapp" style="margin-left: 15px; margin-right: 25px;"></i>
                    <i class="bi bi-cart-plus" style="margin-left: 25px; font-size: 1.25rem;"></i>
                                <span class="badge badge-light" style="height:1rem;" id="countNo">
                                <?php if(isset($_SESSION['product_cart'])){ 
                                    echo count($_SESSION['product_cart']); 
                                }else{ 
                                    echo 0;} ?></span>
                                </button>
                </div>
            </div>
            <div class=" row secondNav">
                <div class="col-md-12 col-sm-12 mainLogo">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="index.php"><img class="im" src="img/super.png" alt="superlife" width="150px" height="30px"></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav newCSS">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="about.php">
                                        About
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="products.php">
                                        Our Products
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="member.php">
                                        Become a Member
                                    </a>
                                </li>
                            <li class="nav-item">
                                <a class="nav-link" href="blog.php">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contacts.php">Contacts</a>
                            </li>
                            <li>
                                
                                    <!-- <span><a href="logoutUser.php">Logout</a></span>/ -->
                            </li>

                            <?php  if(isset($_SESSION['ids'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Log Out</a>
                                </li>
                            <?php  } else{}   ?>

                             </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- End of Navigation -->