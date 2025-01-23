<?php
include("../includes/connect.php");
include("../functions/common_function.php");
session_start();
?>
<html>
    <head>
        <title>Admin Dashboard</title>
        <!--bootstrap css link-->
        <link rel="stylesheet" href="../css/bootstrap.min.css"/>
        <!--bootstrap js link-->
        <script defer src="../js/bootstrap.bundle.min.js"></script>
        <!--css file-->
        <link rel="stylesheet" href="./design.css">
    </head>
    <body>
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-ls navbar-light bg-info">
                <div class="container-fluid">
                    <img src="../images/palm tree.jpg" style="height:50;width:50;">
                    <nav class="navbar navbar-expand-lg">
                        <ul class="navbar-nav">
                            <?php
                            if(!isset($_SESSION['admin_name']))
                            {
                                echo "<li class='nav-item'>
                                <a href='' class='nav-link'>Welcome guest</a>                        
                            </li>";
                            }
                            else
                            {
                                echo "<li class='nav-item'>
                                <a href='' class='nav-link'>Welcome ".$_SESSION['admin_name']."</a>                        
                            </li>";
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </nav>
            <h3 class="text-center p-2">Manage Details</h3>
            <div class="row">
                <div class="col-md-12 bg-secondary d-flex p-4">
                    <div>
                        <p class="text-light mt-3 fw-bold text-center"><a href="admin_account.php"
                         class="text-info"><?php echo $_SESSION['admin_name'];?>'s Profile</a></p>
                       
                    </div>
                    <div class="button text-center align-items">
                        <button class="mb-2"><a href="insert_products.php" class="nav-link text-center text-light bg-info my-1 p-2"
                             style="height:40;width:130;">Insert Products</a></button>
                        <button class="mb-2"><a href="index.php?view_products" class="nav-link text-center text-light bg-info my-1 p-2"
                             style="height:40;width:130;">View Products</a></button>
                        <button class="mb-2"><a href="index.php?insert_category" class="nav-link text-center text-light bg-info my-1 p-2"
                             style="height:40;width:140;">Insert Categories</a></button>
                        <button class="mb-2"><a href="index.php?view_category" class="nav-link text-center text-light bg-info my-1 p-2"
                             style="height:40;width:130;">View Categories</a></button>
                        <button class="mb-2"><a href="index.php?insert_brand" class="nav-link text-center text-light bg-info my-1 p-2"
                             style="height:40;width:130;">Insert Brands</a></button>
                        <button class="mb-2"><a href="index.php?view_brand" class="nav-link text-center text-light bg-info my-1 p-2"
                             style="height:40;width:130;">view brands</a></button>
                        <button class="mb-2"><a href="index.php?all_orders" class="nav-link text-center text-light bg-info my-1 p-2" 
                            style="height:40;width:130;">All orders</a></button>
                        <button class="mb-2"><a href="index.php?all_payments" class="nav-link text-center text-light bg-info my-1 p-2" 
                            style="height:40;width:130;">All payments</a></button>
                        <button class="mb-2"><a href="index.php?list_users" class="nav-link text-center text-light bg-info my-1 p-2"
                             style="height:40;width:130;">List users</a></button>
                        <button class="mb-2"><a href="admin_logout.php" class="nav-link text-center text-light bg-info my-1 p-2" 
                            style="height:40;width:130;">Log out</a></button>
                    </div>
                </div>
            </div>
        </div>





        <div class="container mt-5">
            <?php
            if(isset($_GET['insert_category']))
            {
                include("insert_categories.php");
            }
            if(isset($_GET['insert_brand']))
            {
                include("insert_brands.php");
            }
            if(isset($_GET['view_products']))
            {
                include("view_products.php");
            }
            if(isset($_GET['edit_products']))
            {
                include("edit_products.php");
            }
            if(isset($_GET['delete_products']))
            {
                include("delete_products.php");
            }
            if(isset($_GET['view_category']))
            {
                include("view_category.php");
            }
            if(isset($_GET['view_brand']))
            {
                include("view_brand.php");
            }
            if(isset($_GET['edit_category']))
            {
                include("edit_category.php");
            }
            if(isset($_GET['edit_brand']))
            {
                include("edit_brand.php");
            }
            if(isset($_GET['delete_category']))
            {
                include("delete_category.php");
            }
            if(isset($_GET['delete_brand']))
            {
                include("delete_brand.php");
            }
            if(isset($_GET['all_orders']))
            {
                include("all_orders.php");
            }
            if(isset($_GET['delete_orders']))
            {
                include("delete_orders.php");
            }
            if(isset($_GET['all_payments']))
            {
                include("all_payments.php");
            }
            if(isset($_GET['delete_payments']))
            {
                include("delete_payments.php");
            }
            if(isset($_GET['list_users']))
            {
                include("list_users.php");
            }
            if(isset($_GET['delete_users']))
            {
                include("delete_users.php");
            }
            ?>
        </div>







        <!-- last child-->
        <?php
		include("../includes/footer.php");
		?>


    </body>
</html>
