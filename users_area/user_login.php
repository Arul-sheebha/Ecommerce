<!--users_area-->
<!--user_login.php-->
<?php
include("../includes/connect.php");
include("../functions/common_function.php");
@session_start();
?>
<html>
<head>
	<title>user_login</title>
	<!--bootstrap css link-->
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<!--bootstrap js link-->
	<script defer src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<h2 class="text-center mb-3 p-3">User Login</h2><br>
		<div class="row d-flex align-items-center justify-content-center m-2">
			<div class="col-lg-12 col-xl-6">
				<form action="" method="post" enctype="multipart/form-data">
					<!--username-->
					<div class="form-outline">
						<label for="user_username" class="form-label mb-2">username</label>
						<input type="text" name="user_username" id="user_username" placeholder="Enter your username"
						 class="form-control mb-4" autocomplete="off"
						  required="required" style="width:650px;">
					</div>
					<!--password-->
					<div class="form-outline">
						<label for="user_password" class="form-label mb-2">password</label>
						<input type="password" name="user_password" id="user_password" 
						placeholder="Enter your password" class="form-control mb-4" autocomplete="off"
						  required="required" style="width:650px;">
					</div>
					<div>
						<input type="submit" name="user_login" value="login" class="bg-info mb-2" 
						style="border:0;width:90;height:40;">
					</div>
					<div>
					<p class="small fw-bold">Don't have an account?<a href="user_registration.php"
					 class="text-danger">Register</a></p>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
<?php
if(isset($_POST['user_login']))
{
	$user_username=$_POST['user_username'];

	$user_password=$_POST['user_password'];
	$select_query="select * from `user_table` where username='$user_username'";
	$result_query=mysqli_query($con,$select_query);
	$row_num=mysqli_num_rows($result_query);
	$row_data=mysqli_fetch_assoc($result_query);
	$ip_address=getIPAddress();
	$select="select * from `cart_details` where ip_address='$ip_address'";
	$result=mysqli_query($con,$select);
	$row=mysqli_num_rows($result);
	if($row_num>0)
	{
		$_SESSION['username']=$user_username;
		if(password_verify($user_password,$row_data['user_password']))
		{
			if($row_num==1 and $row==0)
			{
				$_SESSION['username']=$user_username;
				echo "<script>alert('Login Successfully')</script>";
				echo "<script>window.open('profile.php','_self')</script>";
			}
			else
			{
				$_SESSION['username']=$user_username;
				echo "<script>alert('Login Successfully')</script>";
				echo"<script>alert('you have items in your cart')</script>";
				echo "<script>window.open('payment.php','_self')</script>";
			}
		}
		else
		{
			echo "<script>alert('Invalid Credentials')</script>";
		}
	}
		
	else
	{
		echo "<script>alert('Invalid Credentials')</script>";
	}
}
?>