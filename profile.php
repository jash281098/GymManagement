<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Profile Description</title>
		<style>
			.card img {
				width: 100%;
				height: 100%;
			}
		
			section {
				margin-top: 40px;
				overflow: hidden;
			}

			.card {
				margin-left : 20px;
				border: 5px solid #eeeeee;
				border-radius: 5px;
				width: 20%;
				float: left;
			}
			
			dt {
				margin-left: 15px;
				font-family: Roboto;
				margin-bottom: 10px;
				font-size: 1.4em;
			}

			dd {
				margin-bottom: 10px;
				font-size: 0.88em;
			}

			button {
				border: 2px solid #cccccc;
				border-radius: 20px;
				margin-right: 30px;
				background: rgb(240 ,240 ,240);
				display: inline-block;
			}
			
			.lists {
				width: 80%;
				margin-left: 350px;
				margin-bottom: 30px;
			}

			hr {
				width: 65%;
				color: #cccccc;
			}

			.main-nav
			{
			    width: 50%;
			    float: right;
			    list-style: none;
			    margin-top: 45px;
			    padding-left: 0px;
			}

			.main-nav li
			{
			    display: inline-block;
			    padding-left: 0px;
			}

			.main-nav li a:hover
			{
			    border: 1px solid black;
			}

			.main-nav li a
			{
			    color: black;
			    text-decoration: none;
			    padding: 5px 20px;
			    font-family: "Roboto", sans-serif;
			    font-size: 15px;
			}

			header {
			 	overflow: hidden;
				background: #eeeeee;
				border: 5px solid #cccccc;
			}

			hgroup {
				width: 50%;
				float: left;
			}

			header img {
				width: 150px;
				height: auto;
				float: left;
			}

			.name {
				font-size: 30px;
				font-family: "Roboto";
				padding-top: 50px;
				padding-bottom: 50px;
				padding-left: 170px;
				margin-top: 0;
			}

			body {
				margin: 0;
			}

			table {
				margin-left: 30%;
				margin-top: 20px;
				border-spacing: 0;			
			}

			td {
				padding: 15px;
				border-bottom: 1px solid #dddddd;
				vertical-align: top;
			}

			p {
				font-size: 1.15em;
			}

			a {
				text-decoration: none;
				color: #235a81;
			}

			a:hover {
				text-decoration: underline;
			}

			input[type="text"] {
				margin-top: 1.5%;
				margin-bottom: 1.5%;
				margin-left: 15%;
				width: 40%;
				padding-top: 0.5%;
				padding-bottom: 0.5%;		
			}

			#SearchBar {
				margin-left: 25%;
			}

			form {
				margin-left: 30%;
			}

			input[type="radio"] {
				margin-top: 2%;
				margin-left: 10%;
				padding-top: 0.5%;
				padding-bottom: 0.5%;		
			}
			
			form input[type="submit"] {
				margin-top: 1%;
				margin-bottom: 1%;
				margin-left: 15%;
				width: 42%;
				color: white;
				background-color: #c9c9;
				padding-top: 0.5%;
				padding-bottom: 0.5%;
			}

			textarea {
				margin-top: 1%;
				margin-bottom: 1%;
				margin-left: 15%;
				width: 41%;
				padding-top: 0.5%;
				padding-bottom: 0.5%;
				font-style: Arial;
			}
			form label {
				margin-left: 15%;
			}
            .addstaff{
                padding-left: 100px
                
            }
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				  $("#SearchBar").on("keyup", function() {
				    var value = $(this).val().toLowerCase();
				    $("#myTable tr").filter(function() {
				      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				    });
				  });

				  $('input[type="radio"]').click(function() {
					var packname = '<br><label>Name</label><br><input type="text" name="name" required>';
					var des = '<br><label>Description</label><br><textarea name="des" required></textarea>';
					var validity = '<br><label>Validity</label><br><input type="text" name="validity" required>';
					var price = '<br><label>Price</label><br><input type="text" name="price" required>';
					var sub = '<br><input type="submit" value="Submit" name="sub">';
					var pack = '<form method="post" action="profile.php?type=packages">' + packname + des + validity + price + sub + '</form>';
					if($('#newPack').prop("checked")) {
						$('table').remove();
						$('#ap').remove();					
						$('#newPack').next().next().after(pack);
					}
					else
						$('#newPack').next().next().next().remove();
				  });
			});
		</script>
	</head>

	<body>
		<header>
			<hgroup>
			    <div class="logo">
				<img src="wh.png">
			    </div>

			    <div class="name">
				Fitness Club
			    </div>
			</hgroup>

			<ul class="main-nav">    
			    <li><a href="index.php"> HOME </a></li>
			    <li><a href="dietician.php"> SERVICES </a></li>
			    <li><a href="gymT_C.php"> ABOUT </a></li>
			    <li><a href="gymcontact.php"> CONTACT </a></li>
			    <li><a href="logout.php">SIGN-OUT</a></li>
			</ul>    

		</header>
		<input type="text" id="SearchBar" placeholder="Search by name">
		<section>
			
			<div class="card">
				<img src='img_avatar.png'>
				<div class="container">
					<dl>
						<dt><?php echo $_SESSION["Name"];?></dt>
						<dd><i class="fa fa-graduation-cap" style="font-size:20px; margin-right: 10px;"></i>K.J. 							Somaiya College of Engineering</dd>
						<dd><i class="fa fa-map-marker" style="font-size:24px; margin-right: 10px;"></i>Mumbai, 						Maharashtra<dd>
					</dl>
				</div>
			</div>
			
			<div class="lists">
				<?php
					if($_SESSION["user_type"] === "member") {
						echo '<a href=""><button><p>Package History</p></button></a>';
					}
					else if($_SESSION["user_type"] === "admin") {
						echo '<a href="profile.php?type=member"><button><p>View Members List</p></button></a>';
						echo '<a href="profile.php?type=staff"><button><p>View Staff List</p></button></a>';
						echo '<a href="profile.php?type=packages"><button><p>View Packages List</p></button></a>';

					}
				?>
			</div>

			<hr>
			<?php
				if($_SESSION["user_type"] === "admin") {
					
					if($_GET["type"] === "member") {
						echo '<dt style="width: 40%;float:left;margin-left: 10%;margin-top: 1%;margin-botom:2%;">Active Members</dt>
							<table>
							<thead>
								<tr>
									<td></td>
									<td>Sr No.</td>
									<td>Id No.</td>
									<td>Name</td>
									<td>Contact</td>
									<td>Age</td>
								</tr>
							</thead><tbody id="myTable">';
						require_once('conn.php');
						$query = "select ID,Name,Email,Contact,Age from member";
						$result = $link->query($query);
						$i = 1;
						while($tuple = mysqli_fetch_assoc($result)) {
							echo	'<tr><td><a href="deleteuser.php?gymid='.$tuple["ID"].'">Delete</a></td>
								     <td>'.$i.'</td>
								     <td>'.$tuple["ID"].'</td>
								     <td>'.$tuple["Name"].'</td>
								     <td>'.$tuple["Contact"].'</td>
								     <td>'.$tuple["Age"].'</td>
								</tr>';
							++$i;
						}		
						echo '</tbody>
						</table>';
					}
					if($_GET["type"] === "packages") {
						echo '<input type="radio" id="newPack" name="sel">Add new Package
						      <input type="radio" name="sel" onclick="location.reload()" checked><label>View Packages</label>';
						
						echo ' <dt id="ap" style="margin-left: 30%;margin-top: 2%;">Active Packages</dt>
							<table>
							<thead>
								<tr>
									<td></td>
									<td>Sr No.</td>
									<td>Id No.</td>
									<td>Name</td>
									<td>Validity(in days)</td>
									<td>Price</td>
								</tr>
							</thead><tbody id="myTable">';
						require_once('conn.php');
						$query = "select * from packages";
						$result = $link->query($query);
						$i = 1;
						while($tuple = mysqli_fetch_assoc($result)) {
							echo	'<tr>
								     <td><a href="deleteuser.php?pid='.$tuple["Pid"].'">Delete</a></td>
								     <td>'.$i.'</td>
								     <td>'.$tuple["Pid"].'</td>
								     <td>'.$tuple["Name"].'</td>
								     <td>'.$tuple["Validity"].'</td>
								     <td>'.$tuple["Price"].'</td>
								</tr>';
							++$i;
						}		
						echo '</tbody>
						</table>';
					}
                    if($_GET["type"] === "staff") {
						echo '<a class="addstaff" href="trainer_input.php"><button><p>Add new Trainer</p></button></a>';
						echo '<a class="addstaff" href="dietician_input.php"><button><p>Add new Dietician</p></button></a>';
			echo '<dt style="width: 40%;float:left;margin-left: 10%;margin-top: 1%;margin-botom:2%;">Active Staff</dt>
							<table>
							<thead>
								<tr>
									<td></td>
									<td>Sr No.</td>
									<td>Id No.</td>
									<td>Name</td>
									<td>Type</td>
								</tr>
							</thead><tbody id="myTable">';
						require_once('conn.php');
						$query = "select * from images";
						$result = $link->query($query);
						$i = 1;
						while($tuple = mysqli_fetch_assoc($result)) {
							echo	'<tr><td><a href="deleteuser.php?tid='.$tuple["id"].'">Delete</a></td>
								     <td>'.$i.'</td>
								     <td>'.$tuple["id"].'</td>
								     <td>'.$tuple["image_text"].'</td>
								     <td>Trainer</td>
								</tr>';
							++$i;
						}
	
						$query = "select * from dimages";
						$result = $link->query($query);
						while($tuple = mysqli_fetch_assoc($result)) {
							echo	'<tr><td><a href="deleteuser.php?did='.$tuple["id"].'">Delete</a></td>
								     <td>'.$i.'</td>
								     <td>'.$tuple["id"].'</td>
								     <td>'.$tuple["image_text"].'</td>
								     <td>Dietician</td>
								</tr>';
							++$i;
						}		
						echo '</tbody>
						</table>';

					}
				}

				else if($_SESSION["user_type"] === "member"){
					echo '	<table>
						<thead>
							<tr>
								<td>Sr No.</td>
								<td>Package Name</td>
								<td>Purchase date</td>
								<td>Validity</td>
							</tr>
						</thead><tbody id="myTable">';
						require_once('conn.php');
						$query = "select * from member m inner join transaction t on m.ID=t.ID where m.ID=".$_SESSION["id"];
						$result = $link->query($query);
						$i = 1;
						while($tuple = mysqli_fetch_assoc($result)) {
							echo	'<tr><td>'.$i.'</td>
								     <td>'.$tuple["Pname"].'</td>
								     <td>'.$tuple["Txn_date"].'</td>
								     <td>'.$tuple["Validity"].'</td>
								</tr>';
							++$i;
						}		
						echo '</tbody>
						</table>';
				}
			?>

		</section>
	</body>
</html>


<?php
	if(isset($_POST["sub"])) {
		require_once('conn.php');
		$name = $_POST["name"];
        $des = $_POST["des"];
		$validity = $_POST["validity"];
		$price = $_POST["price"];

		$query = "insert into packages(Name,Description,Validity,Price) values('$name','$des','$validity','$price')";
		mysqli_query($link,$query);
		mysqli_close($link);
	}
?>
