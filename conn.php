<?php
	require_once('settings.php');
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	if(!$link)
		echo "ERROR:  " . mysqli_connect_error();
?>
