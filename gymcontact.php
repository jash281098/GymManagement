<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Fitness Club-Contact</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="gymcontact.css" media="screen">
    </head>
    
    <body>
        <header>
		<hgroup>
			<img src="wh.png">
			<div class="name">Fitness Club</div>
		</hgroup>

		<ul class="main-nav">    
                    <li><a href="index.php"> HOME </a></li>
                    <li><a href="dietician.php"> SERVICES </a></li>
                    <li><a href="gymT_C.html"> ABOUT </a></li>
                    <li class="active"><a href="gymcontact.php"> CONTACT </a></li>
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
        </header>
        
        <section>
            <div class="getloc">Get Directions(Click image to view in Google Maps)</div><hr>
            <a href="https://www.google.com/maps/dir/''/rk+fitness+club/@19.0533158,72.8065672,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3be7c8c68b1c9657:0xd9c1d1e4395c40db!2m2!1d72.8766077!2d19.053329" target="_blank"><img src="loc.png"></a>
            
            <article>
                <dl>
                    <dt>Site Adddress</dt>
                    <dd>Sterling Apartment, Opposite Jogani Complex V.n East, Vn Purav Marg, Chunabhatti, VN Purav Marg, Sion, Mumbai, Maharashtra, 400022.</dd>
                </dl>
                
                <ul>
                    <dt>Contact</dt>
                    <li><i class="fa fa-phone" style="font-size: 24px; margin-right: 20px;"></i>(+91) 8086758689</li>
                    <li><i class="fa fa-envelope-o" style="font-size: 24px; margin-right: 20px;"></i>aman.valera@somaiya.edu</li>
                    <li><i class="fa fa-clock-o" style="font-size: 24px; margin-right: 20px;"></i>Mon - Fri: 9:00am - 9:00pm</li>
		            <li style="margin-left: 40px;">Sat - Sun: 9:00am - 10:00pm</li>
                </ul>
            </article>
        </section>
    
        <footer>
            <a href="#"><i class="fa fa-facebook-square" style="font-size: 36px;color:darkblue"></i></a>
            <a href="#"><i class="fa fa-twitter-square" style="font-size: 36px;color:deepskyblue"></i></a>
            <a href="#"><i class="fa fa-google-plus-official" style="font-size: 36px;color:red"></i></a>
        </footer>
    </body>
</html>
