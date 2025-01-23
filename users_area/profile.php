<!--users_area-->
<!--profile.php-->
<?php
include("../includes/connect.php");
include("../functions/common_function.php");
session_start();
?>
<html>
    <head>
        <title>Welcome <?php echo $_SESSION['username'] ?></title>
        <!--bootstrap css link-->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <!--bootstrap js link-->
        <script defer src="../js/bootstrap.bundle.min.js"></script>
        <!--css file-->
        <link rel="stylesheet" href="../design.css">
        <!--font awesome link-->
        
        <style>

        </style>
    </head>
    <body>
        <!--navbar-->
        <div class="container-fluid p-0">
            <!--first child-->
            <nav class="navbar navbar-expand-lg bg-info">
                <div class="container-fluid">
                    <img src="../images/images.jpg" alt="" class="logo">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                     aria-controls="navbarSupprtedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-center text-light" aria-current="page" href="../index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-center text-light" href="../display_all.php">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-center text-light" href="profile.php">My Account</a>
                            </li>
                           
                        </ul>
                        <form class="d-flex" role="search" action="..search_products.php" method="get">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" 
                              name="search_data">
                              <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                        </form>
                    </div>
                </div>
            </nav>
        </div>

        <!--calling cart function-->
        <?php
        
        ?>

        <!--seconed child-->
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg bg-secondary">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                    if(!isset($_SESSION['username']))
                    {
                        echo "<li class='nav-item text-center text-light'> 
                        <a class='nav-link text-center text-light' href='#'>Welcome Guest</a></li>";
                    }
                    else
                    {
                        echo "<li class='nav-item text-center text-light'> 
                        <a class='nav-link text-center text-light' href='#'>Welcome ".$_SESSION['username']."</a></li>";
                    }
                    ?>
                    <?php
                    if(!isset($_SESSION['username']))
                    {
                        echo "<li class='nav-item'><a class='nav-link text-center text-light' href='user_login.php'>Login</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>

        <!--third child-->
        <div class="text-center btn-outine-light">
            <h3>Hidden Store</h3>
            <p>Communications is at the heart of e-commerce and community</p>
        </div>

        <!--fourth child-->
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-center text-light bg-info" aria-current="page" href="#">
                            <h4>Your profile</h4></a>

                            <?php
                            $username=$_SESSION['username'];
                            $user_image="select * from user_table where username='$username'";
                            $user_image=mysqli_query($con,$user_image);
                            $fetch=mysqli_fetch_array($user_image);
                            $user_image=$fetch['user_image'];
                            echo "<li class='nav-item'><a class='nav-link text-center text-light bg-secondary hi' aria-current='page' href='#'>
                            <img style='width:200px; height:150px; object-fit:contain; display:block; margin:auto;' src='./user_images/$user_image'>
                            </a></li>";
                            ?>
                            <li class="nav-item">
                                <a class="nav-link text-center text-light bg-secondary" aria-current="page"
                                 href="profile.php">
                                    Pending Orders</a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link text-center text-light bg-secondary" aria-current="page" 
                                href="profile.php?edit_account"
                                >Edit Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-center text-light bg-secondary" aria-current="page" 
                                href="profile.php?my_orders
                                    ">My Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-center text-light bg-secondary" aria-current="page" 
                                href="profile.php?delete">
                                    Delete Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-center text-light bg-secondary" aria-current="page" 
                                href="logout.php">
                                    Logout</a>
                            </li>
                </ul>
            </div>
            <div class="col-md-10 align-items-center text-center">
                <?php
                get_user_order_details();
                 if(isset($_GET['edit_account']))
                 {
                    include('edit_account.php');
                 }
                 if(isset($_GET['my_orders']))
                 {
                    include('my_orders.php');
                 }
                 if(isset($_GET['delete']))
                 {
                    include('delete.php');
                 }
                 ?>
            </div>
        </div>
                <!--last child-->
                <div class="bg-info p-3 text-center">
                    <p>Designed and Developed by Arul Sheebha and Thanga Varshini - 2023</p>
                </div>
    </body>
</html>



          