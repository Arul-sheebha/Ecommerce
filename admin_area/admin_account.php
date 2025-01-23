<!--admin_area-->
<!--admin_account.php-->
<?php
include("../includes/connect.php");
include("../functions/common_function.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!--bootstrap css link-->
     <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <!--bootstrap js link-->
    <script defer src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!--second child-->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-secondary">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <?php
                if(!isset($_SESSION['admin_name']))
                {
                    echo "<li class='nav-item'>
                    <a class='nav-link text-light' href='#'>Welcome Admin</a>
                    </li>";
                }
                else
                {
                    echo "<li class='nav-item'>
                    <a class='nav-link text-light' href='#'>Welcome ".$_SESSION['admin_name']."</a>
                    </li>";
                }
                ?>
            </ul>
        </nav>
    </div>
    <!--third child-->
    <div class="bg-light">
			<h3 class="text-center">Hidden Store</h3>
			<p class="text-center">Communications is at the heart of e-commerce and community</p>
		</div><br><br>
    <!--fourth child-->
    <div class="row">
        <div class="col-md-2 col-yl-53">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="#" class="nav-link text-center text-light bg-info" aria_current="page">
                        <h4>your profile</h4>
                    </a>
                </li>
                <?php
                $admin_name=$_SESSION['admin_name'];
                $user_image="select * from `admin_table` where admin_name='$admin_name'";
                $user_image=mysqli_query($con,$user_image);
                $fetch=mysqli_fetch_assoc($user_image);
                $user_image=$fetch['admin_name']
                ?>
                <li class="nav-item">
                    <a href="admin_account.php?edit_account" class="nav-link text-center text-light bg-secondary">
                        Edit Account
                    </a>
                </li>
                <li class="nav-item">
                    <a href="admin_account.php?delete_account" class="nav-link text-center text-light bg-secondary">
                        Delete Account
                    </a>
                </li>
                <li class="nav-item">
                    <a href="admin_logout.php" class="nav-link text-center text-light bg-secondary">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-10 align-items-center text-center">
            <?php
            if(isset($_GET['edit_account']))
            {
                include('edit_account.php');
            }
            if(isset($_GET['delete_account']))
            {
                include('delete_account.php');
            }
            ?>
        </div>
    </div>
    <!--last child-->
    <?php
		include("../includes/footer.php");
		?>
</body>
</html>