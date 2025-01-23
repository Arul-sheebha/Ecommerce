<?php
include("./includes/connect.php");
include("./functions/common_function.php");
session_start();
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X_UA_compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial scale=1.0">
	<title>E-commerce website using php and mysql</title>


	<!--bootstrap css link -->
	<link rel="stylesheet" href="./css/bootstrap.min.css">


	<!--font awesome link-->



	<!--bootstrap js link-->
	<script rel="stylesheet" href="./js/bootstrap.bundle.min.js" ></script>





	<!-- css file -->
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<!--navbar -->
	<div class="container-fluid p-0">
		<!-- first child -->

		<nav class="navbar navbar-expand-lg bg-info">
			<div class="container-fluid p-3">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-light" href="display_all.php">Products</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-light" href="./users_area/user_registration.php">Register</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-light" href="contact.html">Contact</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-light" href="cart.php">Cart<sup><?php cart_item();?></sup></a>
						</li>

							<li class="nav-item">
							<a class="nav-link text-light" href="#">Total Price: <?php total_cart_price()?>/-</a>
							</li>
						</ul>
						<form class="d-flex" role="search" action="search_products.php" method="get">
							<input class="form-control me-2" type="search" placeholder="search" aria-label="search" name="search_data">
							<input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
						</form>
					</div>
				</div>
			</nav>





<!--calling cart function-->
<?php
			cart();
			?>








		<!-- second child -->
		<nav class="navbar navbar-expand-lg bg-secondary">
			<ul class="navbar-nav me-auto">
			<?php
						if(isset($_SESSION['username']))
						{
							echo "<li class='nav-item'>
							<a class='nav-link text-light' href='#'>Welcome ".$_SESSION['username']."</a>
							</li>";
						}
						else
						{
							echo "<li class='nav-item'>
							<a class='nav-link text-light' href='#'>Welcome Guest</a>
							</li>";
						}
						?>


<?php
						if(isset($_SESSION['username']))
						{
							echo "<li class='nav-item'>
							<a class='nav-link text-light' href='./users_area/logout.php'>Logout</a>
							</li>";
						}
						else
						{
							echo "<li class='nav-item'>
							<a class='nav-link text-light' href='./users_area/login.php'>Login</a>
							</li>";
						}
						?>
			</ul>
		</nav>

		<!-- third child -->
		<div class="bg-light">
			<h3 class="text-center">Hidden Store</h3>
			<p class="text-center">Communications is at the heart of e-commerce and community</p>
		</div><br><br>

		<!--fourth child-->
		<div class="row">
			<div class="col-md-10">
				<!--products-->
				<div class="row">



				<?php
				get_all_products();
				get_unique_categories();
				get_unique_brands();
				?>



                </div>
            </div>
            <div class="col-md-2 bg-secondary p-0">
                <!--brands to be displayed-->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>Delivery Brands</h4>
                        </a>
                    </li>




					<?php
					getbrand();
					?>





                   
                </ul>
                <!--categories to be displayed-->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>Categories</h4>
                        </a>
                    </li>



					<?php
					getcategories();
					?>





                    
                </ul>
            </div>



        <?php
		include("./includes/footer.php");
		?>


	</div>
</body>
</html>
