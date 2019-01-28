<?php
	require_once('conn.php');
	if(isset($_GET["gymid"])) {
		$val = $_GET["gymid"];
		$query = "delete from member where ID=$val";
		$result = mysqli_query($link,$query);
		header("location:profile.php?type=member");
	}
	else if(isset($_GET["pid"])) {
		$val = $_GET["pid"];
		$query = "delete from packages where pid=$val";
		$result = mysqli_query($link,$query);
		header("location:profile.php?type=packages");
	}
	else if(isset($_GET["tid"])) {
		$val = $_GET["tid"];
		$query = "delete from images where id=$val";
		$result = mysqli_query($link,$query);
		header("location:profile.php?type=staff");
	}
	else if(isset($_GET["did"])) {
		$val = $_GET["did"];
		$query = "delete from dimages where id=$val";
		$result = mysqli_query($link,$query);
		header("location:profile.php?type=staff");
	}
?>
