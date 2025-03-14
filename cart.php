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
						
						</ul>
						
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
		<div class="container d-flex">
            <div class="container d-flex">
                <div class="row">
					<form action="" method="post">
                    <table class="table table-bordered text-center">
                        
                    <tbody>

                    <?php
                    //php code to display dynamic data
                    global $con;
	$ip_address=getIPAddress();
	$total_price=0;
	$select="select * from `cart_details` where ip_address='$ip_address'";
	$result=mysqli_query($con,$select);
	$num=mysqli_num_rows($result);
	if($num>0)
	{
		echo "<thead style='border-bottom:19em;'>
		<tr>
			<th>product title</th>
			<th>product image</th>
			
			<th>total price</th>

			<th colspan='3'>operation</th>
		</tr>
		</thead>";
	
	while($row=mysqli_fetch_array($result))
	{
		$product_id=$row['product_id'];
		$select_price="select * from `products` where product_id=$product_id";
		$result_price=mysqli_query($con,$select_price);
		while($row_price=mysqli_fetch_array($result_price))
		{
			$product_price=array($row_price['product_price']);
            $product_title=$row_price['product_title'];
            $product_rupee=$row_price['product_price'];
            $product_image1=$row_price['product_image1'];
			$product_value=array_sum($product_price);
			$total_price+=$product_value;
		
        ?>
                    <tr>
                        <td class=" text-center py-7 p-4"><?php echo $product_title ?></td>
                        <td class=" text-center py-7 p-4"><img src="./admin_area/product_images/<?php echo $product_image1 ?>"
                        alt="" class="cart_img"
                         style="width:80px; height:80px;
                        object-fit:contain;">
                        </td>
                

						<?php
						mysqli_report(MYSQLI_REPORT_ERROR);
						try{
						$ip_address=getIPAddress();
						if(isset($_POST['update_cart']))
						{
							$quantity=$_POST['quantity'];
							$update_query="update `cart_details` set quantity=$quantity where 
							ip_address='$ip_address'";
							$result_quantity=mysqli_query($con,$update_query);
							$total_price=$total_price*$quantity;
						}
					}
					catch(mysqli_sql_exception $e)
					{
						error_log($e->_toString());
					}
						?>


                        <td class="text-center p-4 py-9"><?php echo $product_rupee ?>/-</td>
                       
						<td class=" text-center text-light p-4"><a href="cart.php?delete_product=
                    <?php echo $product_id;?>" class="text-light bg-info px-3 mt-4 text-center m-5 py-2
                    text-decoration-none">Remove</a></td>
					<td class=" text-center text-light p-4"><a href="cart.php?plus=
                    <?php echo $product_id;?>" class="text-light bg-info px-3 mt-4 text-center m-5 py-2
                    text-decoration-none">+</a></td>
					<td class=" text-center text-light p-4"><a href="cart.php?minus=
                    <?php echo $product_id;?>" class="text-light bg-info px-3 mt-4 text-center m-5 py-2
                    text-decoration-none">-</a></td>
							
                        </td>
                    </tr>
                    <?php
        }
    }
}
else
{
	echo "<h2 class='text-danger text-center'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Cart is Empty</h2>";
}
                    ?>
                    </tbody>
					
                    </table>
</form>


                    <!--subtotal-->
                    <div class="container d-flex mb-5">



<?php
$ip_address=getIPAddress();
$select="select * from `cart_details` where ip_address='$ip_address'";
$result=mysqli_query($con,$select);
$num=mysqli_num_rows($result);
if($num>0)
{
	echo "<h4>subtotal:<strong class='text-info'>$total_price/-</strong></h4>
	<a href='index.php'><button class='bg-info border-0 px-3 py-2 text-center mx-3'>
		Continue Shopping</button></a>
	<a href='./users_area/checkout.php'><button class='bg-secondary border-0 px-3 py-2 text-center text-light'>
		Checkout</button></a>";
}
else
{
	echo "<a href='index.php'><button class='bg-info border-0 px-3 py-2 text-center mx-3'>
		Continue Shopping</button></a>";
}
						?>



                        
                    </div>
                </div>
            </div>                            
</div>



<?php

							

if(isset($_GET['delete_product']))
{
    $product_id=$_GET['delete_product'];

    $delete="delete from `cart_details` where product_id=$product_id";
    $result=mysqli_query($con,$delete);
    if($result)
    {
        echo "<script>alert('this item is removed from your cart')</script>";
        echo "<script>window.open('cart.php','_self')</script>";
    }
}


if(isset($_GET['plus']))
{
	$product_id=$_GET['plus'];
	$select_price="SELECT `quantity` FROM `cart_details` WHERE product_id=$product_id";
		$result_price=mysqli_query($con,$select_price);
		
					$total_rupee=0;

		while($row_price=mysqli_fetch_array($result_price))
		{
			$quantity1=$row_price['quantity'];
			$quantity2=$quantity1+1;
			$price="SELECT `product_price` FROM `products` WHERE product_id=$product_id";
			$result_product=mysqli_query($con,$price);
			$total_rupee=0;
			while($row_product=mysqli_fetch_array($result_product))
			{
				$rupee=$row_product['product_price'];
				$total_rupee+=$rupee*$quantity2;
				
			}
			

		}


	$update=" UPDATE `cart_details` SET `quantity`=$quantity2 WHERE product_id=$product_id";
	$result_update=mysqli_query($con,$update);
	if($result)
	{
        echo "<script>alert('quantity updated successfully')</script>";
		echo "<script>window.open('cart.php','_self')</script>";
	}
}


?>




        <?php
		include("./includes/footer.php");
		?>


	</div>
	
</body>
</html>
