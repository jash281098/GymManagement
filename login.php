<?php
	session_start();
	if(!empty($_SESSION))
		header("location:index.php");
?>
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
       <link rel="stylesheet" href="sign-in.css" type="text/css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                    <li><a href="index.php"> HOME </a></li>
                    <li><a href="dietician.php"> SERVICES </a></li>
                    <li><a href="gymT_C.html"> ABOUT </a></li>
                    <li><a href="gymcontact.php"> CONTACT </a></li>
                    <li class="active"><a href=""> SIGN IN </a></li> 
                </ul>
            </div>
        </header>
            
        <section>
            <div class="box">   
                <form action="login.php" method="post">
                    <div class="imgcontainer">
                        <img src="avatar.png" alt="Avatar" class="avatar">
                    </div>
                    <div class="container">
                        <label for="uname"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username or email" name="uname" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" id="ps" required>
                        <button type="submit" id="login" name="login">Login</button>
                        
                        
                    </div>
                    
                </form>
                
                <a href="sign-up.php"><button id="signup">Don't have an account?, Sign-up</button></a>
            </div>
        </section>
    </body>
</html>



<?php

	if( isset($_POST["login"]) )
	{
		require_once('conn.php');
		$email = $_POST["uname"];
		$pass = $_POST["psw"];

		function search($data) {
			global $email,$pass,$link;
			$query = "select ID,Name,Email,Password from $data where email='$email'";
			$result = $link->query($query);
			$tuple = mysqli_fetch_assoc($result);
			
			if( $email === $tuple["Email"] && $pass === $tuple["Password"] ) {
				session_start();
				$_SESSION["Name"] = $tuple["Name"];
				$_SESSION["user_type"] = $data;
				$_SESSION["id"] = $tuple["ID"];
				header("refresh:0.3;url='index.php'");
			}
			else
				return true;

			return false;	
		}

		$notaMember = search("member");
		
		if($notaMember) {
			$notaAdmin = search("admin");
			if($notaAdmin)
				echo '<script>alert("Invalid login credentials")</script>';
		}
		$link->close();
	}
?>
