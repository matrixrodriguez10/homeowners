<?php
session_start();
include("controllers/function.php");

  $msg = "";
  //if upload button is pressed
  if(isset($_POST['submit'])) {

    //the path to store the upload image
    $target = "admin/images/users/".basename($_FILES['image']['name']);

    // connect to database
    $conn = mysqli_connect('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm');

    // Get all the submitted data from the form
    $image = $_FILES['image']['name'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $bday = $_POST['bday'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $user_id = random_num(10);
    $sql = "INSERT INTO users (user_id, image, firstname, lastname, username, password, bday, gender, contact, email, address) VALUES ('$user_id','$image', '$firstname', '$lastname', '$username', '$password', '$bday', '$gender', '$contact', '$email', '$address')";
    mysqli_query($conn, $sql);

    // Uploaded images into the folder: images
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Event Successfully Posted";

      header("Location: login.php");
    //header("Location: User.php");  
    }else{
      $msg = "There was a problem in uploading event";
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <title>SAN ANTONIO VALLEY 2 SUBDIVISION</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style_home.css" rel="stylesheet" type="text/css"> 
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css"> 
    <link href="css/animate.css" rel="stylesheet" type="text/css">
</head>

  <body>
    <header id="header_wrapper">
        <div class="container">
            <div class="header_box">
                <div class="logo">San Antonio Valley 2</div>
	              <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                  <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
                  </button>
                </div>
	              <div id="main-nav" class="collapse navbar-collapse navStyle">
			              <ul class="nav navbar-nav" id="mainNav">
			                 <li><a href="index.php" class="scroll-link">Home</a></li>
			                 <li><a href="about Us.php" class="scroll-link">About</a></li>
			                 <li><a href="announcement.php" class="scroll-link">Announcement </a></li>
			                 <li><a href="FAQs.php" class="scroll-link">FAQs</a></li>
                       <li><a href="officers.php" class="scroll-link">Officers</a></li>
			                 <li class="active"><a href="login.php" class="scroll-link">Login</a></li>
			              </ul>
                </div>
	              </nav>
            </div>
        </div>
    </header>

    <div class="top_cont_outer_s" >
	      <div class="box_s">
		      <form action="signup.php" method="post" enctype="multipart/form-data">
  			      <div class="container_s wow fadeInDown delay-03s">
  				      <h2 class="sign">CREATE AN ACCOUNT </h2>
   			        <div class="row">
  					        <div class="column">
    				          <label>Firstname:</label><span><input type="text" name="firstname" required=""> </span>
   					          <label>Username:</label><span><input type="text" name="username" required=""></span>
   					          <label>Birthdate:</label><span><input type="date" name="bday" required=""></span><br>
   					          <label>Email:</label><span><input    type="text" name="email" required=""></span>
   					          <label>Contact #:</label><span><input type="text" name="contact" required=""></span>
                       <input type="hidden" name="size" value="1000000">
                       <label>Image: </label><input type='file' name="image" >
 					          </div>

  					        <div class="column">
    				            <label>Lastname:</label><span><input  type="text" name="lastname" required=""> </span>
   					            <label>Password:</label><span><input  type="Password" name="password" required=""></span>
    				            <label>Gender:</label><span><input  type="text" name="gender" required=""></span>
    				            <label>Adress:</label><span><textarea name="address" required=""></textarea></span>  
  			            </div>
                    <button class="button_s" type="submit" name="submit" value="submit">REGISTER</button>
                </div>
				      </div>
		      </form>	
	      </div>
    </div>

<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="js/jquery.nav.js"></script> 
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/wow.js"></script> 
<script type="text/javascript" src="js/custom.js"></script>

 </body>
</html>