<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>My Gym</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<style>
			body {
				margin: 0px;
			}

			footer {
				background: #888888;
			}

			section {
				font-family: 'Arial';
				width: 65%;
				margin-left: auto;
				margin-right: auto;
				padding: 5px;
			}

			.left {
				width: 60%;
				float: left;
			}
			
			.middle {
				width: 40%;
				margin-left: auto;
				margin-right: auto;
			}

			dt {
				margin-bottom: 10px;
				color: white;
			}

			dd {
				margin-bottom: 5px;
				margin-left: 50px;
			}

			a {
				text-decoration: none;
				color: white;
			}
			
			a:hover {
				text-decoration: underline;
			}
		</style>
	</head> 

	<body>
		<header>   

			<div class="row">
				<div class="logo">
				<img src="wh.png">
				</div>

				<div class="name">
				Fitness Club
				</div>

			<ul class="main-nav">    
			    <li class="active"><a href="index.php"> HOME </a></li>
			    <li><a href="dietician.php"> SERVICES </a></li>
			    <li><a href="gymT_C.php"> ABOUT </a></li>
			    <li><a href="gymcontact.php"> CONTACT </a></li>
			    <li>
			    <?php 
				  session_start(); 
				  if(isset($_SESSION["Name"])) {
					if($_SESSION["user_type"] === "admin")
						echo '<a href="profile.php?type=member">'.$_SESSION["Name"].'</a>';
					else
						echo '<a href="profile.php">'.$_SESSION["Name"].'</a>';
				  }
				  else
				  	echo '<a href="login.php">SIGN-IN</a>';
			    ?></li> 
			</ul>    

			</div>

			<div class="hero">
			<h1>work hard, play hard</h1>

			<div class="button">
			    <a href="pack.php" class="btn btn-one"> View Packages</a>
			    <a href="trainer.php" class="btn btn-two"> View Trainers</a>    
			</div>    

			</div>

		</header> 

		<footer>
				<section>
					<dl class="left">
						<dt>About Gym</dt>
							<dd><a href="gymPP.html">Privacy Policy</a></dd>
							<dd><a href="gymT_C.php">Terms and Conditions</a></dd>
							<dd><a href="gymFAQ.html">FAQ</a></dd>
						
					</dl>

					<dl class="middle">
						<dt>Social</dt>
							<dd><a href="">Facebook</a></dd>
							<dd><a href="">Twitter</a></dd>
							<dd><a href="">Google+</a></dd>
					</dl>
				</section>
		</footer>
	</body>    
</html>
