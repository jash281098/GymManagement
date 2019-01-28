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
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                margin: 0;
                padding: 0;
                top: 50%;
                background: url(images/Background/inputback1.jpg);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: right-top;
                font-family: 'Roboto', Arial;
                font-size: 20px;
            }

            .input-container{
                width: 320px;
                height: 420px;
                background: rgba(0,0,0,0.5);
                color: #fff;
                top: 50%;
                left: 75%;
                position: absolute;
                transform: translate(-55%,-50%);
                box-sizing: border-box;
                padding: 70px 30px;
            }

            h2{
                margin: 0;
                padding: 0 0 20px;
                text-align: center;
                font-size: 22px;
            }
            label{
            }
            input[type=text]{
                margin-top: 10px;
                width: 200px;   
                height: 25px;
                border-radius: 7px;
                padding-left: 5px;
            }
            button{
                height: 40px;
                width: 150px;
                margin-top: 5px;
                color: white;
                background: green;
                border: 2px solid green;
                border-radius: 3px;
                font-weight: 200;
            }
            button:hover{
                background: #68d35f;
                border: 2px solid #68d35f;
            }
        </style>
    </head>
    <body>
        <div class='input-container'>
            <h2>Enter following for Trainer</h2>
            <form method="POST" action="trainer.php" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                <div>
                  <p>Photo:<input type="file" name="image" required></p>
                </div>
                <label>Trainer's Name:</label>
                <div>
                  <p><input type= text name="image_text" placeholder="Enter the Trainer's name..." required>  </p>
                </div>      
                <div>
                    <button type="submit" name="upload">POST</button>
                </div>
            </form>
        </div>
    </body>
</html>