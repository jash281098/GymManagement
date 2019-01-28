<?php
	$pid = $_GET["pid"];
	$pname = $_GET["pname"];
	$vd = $_GET["valid"];
	session_start();
	$id = $_SESSION["id"];
	$tdate = date('Y/m/d');

	require_once('conn.php');
	$query = "insert into transaction values('$id','$pid','$pname','$tdate','$vd')";
	mysqli_query($link,$query);

	header('location:profile.php');
?>
