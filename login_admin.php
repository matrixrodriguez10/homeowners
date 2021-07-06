<?php
session_start();

  include("controllers/function.php");
	include("config/connection.php");

  if($_SERVER['REQUEST_METHOD'] == "POST"){

    //something was posted
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    if (!empty($username) && !empty($password)) {

        //read from database
        $query = "SELECT * FROM admin WHERE username = '$username' limit 1";

        $result = mysqli_query($conn, $query);

        if($result) {
          if($result && mysqli_num_rows($result) > 0) {

            $user_data = mysqli_fetch_assoc($result);
            
            if($user_data['password'] === $password) {

              $_SESSION['user_id'] = $user_data['user_id'];
              header("Location: admin/Dashboard.php");
              die;
            }
          }
        }
        echo "<script>alert('Incorrect Password!');</script>";
    }
    else {
        echo "Please enter some valid information";
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
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
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
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

	<div class="box">
		<form action="#" method="post">
  			<div class="container_l wow bounceInDown">
  				<h2 class="sign">ADMIN SIGN IN </h2>
   			    <label for="uname" ><b>Username:</b></label><br><br>
  	            <input type="text"  name="username" required><br><br>
  	            <label for="psw" ><b>Password:</b></label><br><br>
  	            <input type="password"  name="password" required><br><br><br>        
  	            <button type="submit" class="button_l" value="post">LOGIN</button><br><br><br>
 			  </div>
		</form>	
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