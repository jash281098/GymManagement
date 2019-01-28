<?php 
    $activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                margin: 0px;
                padding: 0px;
                font-family: 'Roboto', Arial;
            }
            #sidebar{
                width: 200px;
                height: 100%;
                display: block;
                position: relative;
                left: 0px;
                top: 30px;
                float: left;
                background-color: dimgray;
            }
            ul{
                margin: 0px;
                padding: 0px;
            }
            ul li{
                list-style: none;
            }
            .sidebar_links{
                font-size: 16px;
                text-align: center;
                background: #1c1e1f;
                color: white;
                border-bottom: 1px solid #111;
                display: block;
                width: 180px;
                padding: 10px;
                text-decoration: none;
            }
            ul li a.sidebar_links: hover{
                border:1px solid gray;
            }
        </style>
    </head>
    <body>
        <div id=sidebar>
            <ul>
                <li class="<?= ($activePage == 'index') ? 'active':''; ?>"><a class="sidebar_links" href="pack.php">View Packages</a></li>
                <li><a class="sidebar_links" href="trainer.php">View Trainers</a></li>
                <li><a class="sidebar_links" href="dietician.php">View Dieticians</a></li>
            </ul>
        </div>
    </body>
</html>