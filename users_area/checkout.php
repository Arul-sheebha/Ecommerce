<?php
include("../includes/connect.php");
session_start();
?>
<html>
    <head>
        <title>ecommerce</title>
        <!--bootstrap css link-->
        <link rel="stylesheet" href="../css/bootstrap.min.css"/>
        <!--bootstrap js link-->
        <script defer src="../js/bootstrap.bundle.min.js"></script>
       
    </head>
    <body>
        <!--navbar-->
        <div class="container-fluid p-0">
            <!--first child-->
            <nav class="navbar navbar-expand-lg bg-info">
                <div class="container-fluid">
                    <img src="./images/images.jpg" alt="" class="logo">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=
                    "#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-light" aria-current="page" href="../index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="../display_all.php">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="user_registration.php">Register</a>
                            </li>
                            
                        </ul>
                        <form class="d-flex" role="search" action="search_products.php" method="get">
                            <input class="form-control me-2" type="search" placeholder="search" aria-label="search" name="search-data">
                            <input type="submit" value="search" class="btn btn-outline-light" name="search-data-product">
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <!--second child-->
            <nav class="navbar navbar-expand-lg bg-secondary">
            <ul class="navbar-nav me-auto">
                            <?php
                            if(!isset($_SESSION['username']))
                            {
                                echo "<li class='nav-item'><a class='nav-link text-light' href='#'>Welcome Guest</a>
                                </li>";
                            }
                            else
                            {
                                echo "<li class='nav-item'><a class='nav-link text-light' href='#'>Welcome ".$_SESSION['username']."</a>
                                </li>";
                            }
                            ?>
                            <?php
                            if(!isset($_SESSION['username']))
                            {
                                echo "<li class='nav-item'><a class='nav-link text-light' href='user_login.php'>Login</a></li>";
                            }
                            else
                            {
                                echo"<li class='nav-item'><a class='nav-link text-light' href='logout.php'>Logout</a></li>";
                            }
                            ?>
                        
            </ul>
            </nav>
        <!--third child-->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communication is at the heart of e-commerce and community</p>
        
        </div>
        <!--fourth child-->
        <div class="row">
            <div class="col-md-12">
                <!--products-->
                <div class="row">
                    <?php
                    if(!isset($_SESSION['username']))
                    {
                        include("user_login.php");
                    }
                    else
                    {
                        include("payment.php");
                    }
                    ?>
                </div>
            </div>
        <!--last child-->
        <div class="bg-info p=3 text-center">
            <p>Designed and Developed by varshini-2023</p>
        </div>
</body> 
</html>


                            