<?php
  // Create database connection
$db = mysqli_connect("localhost", "root", "", "gym");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
    <link rel="stylesheet" href="trainer.css" type="text/css">
</head>
<body>
    <header>
        <?php include 'main_nav.php';?>
    </header>
    <div>
        <?php include 'sidebar.php';?>
    </div>
<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<div class='trainer_image'><img src='images/".$row['image']."' ></div>";
      	echo "<p class='trainer_name'>".$row['image_text']."</p>";
      echo "</div>";
    }
  ?>
</div>
    <!--<div>
        <a href="trainer_input.php">INPUT TRAINERS</a>
    </div> --> 
</body>
</html>