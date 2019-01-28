<!DOCTYPE HTML>
<html>
    <head>
        <style>
            header {
                overflow: hidden
            }

            hgroup {
                width: 45%;
                float: left;
            }

            header img {
                width: 150px;
                height: auto;
                float: left;
                margin-top: 0;
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
                background: white;
                margin: 0;
                position: relative;
            }

            header {
                background: #eeeeee;
                border: 5px solid #cccccc;
            }

            a {
                margin-right: 10px;
            }
            .main-nav
            {
                width: 55%;
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

            .main-nav li.active a
            {
                border-bottom: 2px solid black;

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

        </style>
    </head>
    <body>
        <header>
            <hgroup>
			<img src="wh.png">
			<div class="name">Fitness Club</div>
            </hgroup>
        <?php 
            $activePage = basename($_SERVER['PHP_SELF'], ".php");
        ?>
        

		<ul class="main-nav">    
                    <li class="<?= ($activePage == 'index') ? 'active':''; ?>"><a href="index.php">HOME</a></li>
                    <li class="<?= ($activePage == 'dietician' || 'trainer' || 'package') ? 'active':''; ?>"><a href="dietician.php"> SERVICES </a></li>
                    <li class="<?= ($activePage == 'gymT_C') ? 'active':''; ?>"><a href="gymT_C.php"> ABOUT </a></li>
                    <li class="<?= ($activePage == 'gymcontact') ? 'active':''; ?>"><a href="gymcontact.php"> CONTACT </a></li>
                    <li class="<?= ($activePage == '') ? 'active':''; ?>">
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
		    ?></a></li>  
		</ul>
        </header>
    </body>
</html>
