<!DOCTYPE html>
<html>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-148732250-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-148732250-1');
</script>

	<style>
		.packace-container {
    height: 550px;
    width: 80%;
    margin: 0 15%;
}

.intro {
    margin-top: 35px;
    text-align: center;
    font-family: sans-serif, Arial;
    margin-bottom: 40px;
}

h2 {
    margin-top: 15px;
    font-size: 30px;
    line-height: 1.5;
    font-family: "Poppins", Arial, sans-serif;
    font-weight:900;
    text-transform: uppercase;
    text-align: center;
}

p {
    margin-top: 10px;
    font-family: "Poppins", Arial, sans-serif;
    font-size: 20px;
    line-height: 1.5;
    color: gray;
    text-align: center;
}

.package-info {
    float: left;
    margin: 4%;
    height: 300px;
    width: 25%;
    background-color: #edf3ff;
    margin-top: 15px;
    text-align: center;
    font-family: sans-serif, Arial;
}

button {
	font-size: 1.2em;
	font-family: Arial;
	background-color: blue;
	color: white;
	padding: 3%;	
	width: 50%;
	border-radius: 10px;
}

	</style>
</head>
<body>
<header>
        <?php include 'main_nav.php';?>
   </header>
<div>
        <?php include 'sidebar.php';?>
   </div>
<div class="packace-container">
            <div class="row">
                <div class="intro">
                <h2>Our Packages</h2>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a           small line of blind text by the name</p>
                </div>
        </div>
        <div class="row">
	    <?php
	    require_once('conn.php');
	    $query = 'select * from packages';
	    $result = mysqli_query($link,$query);
	    while($tuple = mysqli_fetch_assoc($result)) {
		echo '<div class="package-info">';
                echo '<h3>'.$tuple["Name"].'</h3>';
                echo  '<p class="beg-pack">'.$tuple["Description"].'</p>';
                echo '<p class="beg-validy">Price:Rs.'.$tuple["Price"].'<br>Validity : '.$tuple["Validity"] .' Days</p>';

				  //session_start(); 
				  if(isset($_SESSION["Name"])) {
					if($_SESSION["user_type"] === "member")
						echo '<a href=transact.php?pid='.$tuple["Pid"].'&pname='.$tuple["Name"].'&valid='.$tuple["Validity"].'><button>Buy</button></a>';
				  }
				  else
				  	echo '<a href="login.php"><button>Apply</button></a>';
		echo '</div>';
	    }
	    ?>
        </div>
    </div>
</body>
</html>
