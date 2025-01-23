<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X_UA_compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial scale=1.0">
	<title>E-commerce website using php and mysql</title>


	<!--bootstrap css link -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">


	<!--font awesome link-->



	<!--bootstrap js link-->
	<script rel="stylesheet" href="../js/bootstrap.bundle.min.js" ></script>





	<!-- css file -->
	<link rel="stylesheet" href="style.css">

	<style>
		
		</style>
</head>
<body>

	<!--navbar -->
	<div class="container-fluid p-0">
		<!-- first child -->

		<nav class="navbar navbar-expand-lg bg-secondary">
			<div class="container-fluid p-2">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active text-light" aria-current="page" href="portfolio.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-light" href="#about">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-light" href="register.html">Register</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link text-light" href="login.html">Login</a>
						</li>
						</ul>
						<nav class="navbar navbar-expand-lg">
							<ul class="navbar-nav">
								<li class="nav-item">
									<a href="#skills" class="nav-link" style="color: white;">Skills</a>                        
								</li>
								<li class="nav-item">
									<a href="#contact" class="nav-link" style="color: white;">Contact</a>                        
								</li>
							</ul>
						</nav>
	
				
						
					</div>
				</div>
			</nav>

			<!--image-->
			<div class="row">
				<div class="col-md-5">
					<!--products-->
					<div class="row">
						<div class="col-md-10 mb-8">
							<center>
							<h1 style="color:blue; padding: 15px; margin-top: 170px;">Hi All</h1>
							<h1 style="color:blue; padding: 15px;">Welcome To</h1>
							<h1 style="color:blue; padding: 15px;">My Website</h1>
							</center>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<a href="image.html"><img src="../images/palm tree.jpg" style="height: 700px; width: 60em;"></a>
				</div>
			</div>
			<div class="container mt-5">
            <?php
            if(isset($_GET['skill']))
            {
                include("skills.php");
            }
            if(isset($_GET['contact']))
            {
                include("contact.php");
            }
            if(isset($_GET['about']))
            {
                include("about.html");
            }
            ?>
        </div>
		</div>



		<div id="skills">
		
		
		
				<h2>Skills</h2>
				<ul>
					<li>HTML</li>
					<li>CSS</li>
					<li>javascript</li>
					<li>xml</li>
					<!-- add more skills as needed -->
					</ul><br>
			
					
					<div id="about">
					
		
				<h2>About Me</h2>
				Qualification  : BSc.Computer science<br><BR>
				Extra Coures   : Type writing <br><BR>
				language known : Tamil,English<br><BR><BR><BR>
		
		
		</div>

		<div id="contact">
	
		
					<h2>Contact</h2>
					Email  : <p>arulsheebhaa@gmail.com</p>
					GitHub : <p>github.com / sheebha</p>
					Phone  : <p>8954678398</p>
					insta id : <p>arul_sheebha</p>
					youtube : <p>tigerthejermanshepherd</p>

		
		

		</div>
		

		</div>
	</body>
</html>
		
