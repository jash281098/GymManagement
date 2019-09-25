<?php
    if(isset($_POST["submit"])) {
        require_once('conn.php');

        //Retrieving form data
        $name = $_POST["first"] . " " . $_POST["last"];
        $contact = $_POST["contact"];
        $email = $_POST["email"];
        $pass = $_POST["password"];

        $gender = $_POST["gender"];
        $height = $_POST["height"];
        $weight = $_POST["weight"];

        $dob = $_POST["dob"];
        $age = $_POST["age"];
        $address = $_POST["add"] . "," . $_POST["city"] . "," . $_POST["state"];

        $query = "insert into member(Name , Address, Email, Password, Contact, DOB, Age, Gender, Height, Weight) 				 			  	values('$name','$address','$email','$pass','$contact','$dob','$age','$gender','$height','$weight')";

        $add = mysqli_query($link,$query);
       	header("refresh:0.2,url='index.php'");
        mysqli_close($link);
  	}
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
        <title>Sign-up</title>
        <link href="sign-up.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	$(document).ready(function() {
            
                $('#contact_first').on('input', function() {
					var input=$(this);
					var is_name=input.val();
                    var re=/^[A-Za-z]+$/
                    var isonlyalpha=re.test(is_name);
                    if(isonlyalpha&&is_name.length>2)
				   {input.removeClass("invalid").removeClass("add").addClass("valid");}
                    else{input.removeClass("valid").removeClass("add").addClass("invalid");}
                });
            
            
                $('#contact_last').on('input', function() {
					var input=$(this);
					var is_name=input.val();
                    var re=/^[A-Za-z]+$/
                    var isonlyalpha=re.test(is_name);
                    if(isonlyalpha&&is_name.length>2)
				   {input.removeClass("invalid").addClass("valid");}
                    else{input.removeClass("valid").addClass("invalid");}
                });
            
                $('#contact_num').on('input', function() {
					var input=$(this);
					var is_con=input.val();
                    var re=/^\d{10}$/;
                    var is_con_len=re.test(is_con);
					if(is_con.length==10){input.removeClass("invalid").addClass("valid");}
                    else{input.removeClass("valid").addClass("invalid");}
                });
            
            				<!--Email must be an email -->
				$('#contact_email').on('input', function() {
					var input=$(this);
					var re = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
					var is_email=re.test(input.val());
					if(is_email){input.removeClass("invalid").removeClass("add").addClass("valid");}
					else{input.removeClass("valid").removeClass("add").addClass("invalid");}
				});
            
            
                 $('#contact_passw').on('input', function() {
					var input=$(this);
					var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
					var is_passw=re.test(input.val());
					if(is_passw){input.removeClass("invalid").removeClass("add").addClass("valid");}
					else{input.removeClass("valid").removeClass("add").addClass("invalid");}
				});
            
                 $('#contact_height').on('input', function() {
					var input=$(this);
					var is_con=input.val();
                    var re=/^\d{10}$/;
                    var is_con_len=re.test(is_con);
					if(is_con.length<4){input.removeClass("invalid").addClass("valid");}
                    else{input.removeClass("valid").addClass("invalid");}
                });
            
                $('#contact_weight').on('input', function() {
					var input=$(this);
					var is_con=input.val();
                    var re=/^\d{10}$/;
                    var is_con_len=re.test(is_con);
					if(is_con.length<4){input.removeClass("invalid").addClass("valid");}
                    else{input.removeClass("valid").addClass("invalid");}
                });
            
            $("#contact_submit button").submit(function(event){
            	event.preventDefault();
				var form_data=$("#contact").serializeArray();
				var error_free=true;
				for (var input in form_data){
					var element=$("#contact_"+form_data[input]['name']);
					console.log(element);
					var valid=element.hasClass("valid");
					var error_element=$("span", element.parent());
					if (!valid){error_element.removeClass("error").addClass("error_show"); error_free=false;}
					else{error_element.removeClass("error_show").addClass("error");}
					
				}
				if (!error_free){
					event.preventDefault(); 
				}
				else{
					this.Submit();
					alert('No errors: Form will be submitted');
				}
			});
              
        });
	</script>
    </head>
    
    <body style=" background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('pic1.jpg'); background-size: cover; position: relative" >
        <div class="background-image"></div>

        <div class="form"> 
        <form action="sign-up.php" method="post"> 
           <fieldset><legend>Sign-up</legend>
               
            <div class="name">
            <label>Name:</label><br>
            <input type="text" id="contact_first" name="first" class="first" placeholder="First" required maxlength="19">
            <input type="text" id="contact_last" name="last" class="last" placeholder="Last" required maxlength="20">
	    <br><small id="msgname"></small><span class="error">error</span>
            </div>

             <div class="contact">
            <label>Contact:</label><br>
            <input type="number" name="contact" id="contact_num" required>
	    <span class="error">error</span>
            </div> 

            <div class="Email">
            <label>Email-Id:</label><br>
            <input type="email" name="email" id="contact_email" placeholder="name@example.com" required>
	    <span class="error">error</span>
            </div>

            <div class="pass">
            <label>Password:</label><br>
            <input type="password" id="contact_passw" name="password" required>
	    <span class="error">Enter min 7 char 1 uppercase lower</span>
            </div>

	    <div class="dob">
            <label>Date of Birth:</label>
	        <label id="age">Age:</label><br>
            <input type="date" id="dob" name="dob" required>
            <input type="number" id="agec" name="age">
            </div>

            <div class="user">
                <label class="s">Gender:</label>





            <input type="radio" name="gender" value="Male" class="m">Male 
            <input type="radio" name="gender" value="Female" class="f">Female   
                    <input type="radio" name="gender" value="Other" class="o">Other</div>



            <div class="ht">
            <label>Height(cm):</label><br>
	    <input type="number" id="contact_height" name="height" required><span class="error">error</span>
            </div>   

            <div class="wt">
            <label>Weight(kg):</label><br>
	    <input type="number" id="contact_weight" name="weight" required>
            </div>



            <div class="ha">
            <label>Address:</label><br>
            <input type=text class="add" placeholder="Street Address" name="add" required> <br>
            <input type="text" class="city" placeholder="city" name="city" required>
            <select class="sel" name="state">
                <option>State</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Gujrat">Gujarat</option>
                </select>
            </div>

            <input type="submit" id="contact_submit button" class="btn" value="Submit" name="submit">

        </fieldset>
        </form>
        </div>
    </body>
</html>


