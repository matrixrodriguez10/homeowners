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
           <li class="active"><a href="announcement.php" class="scroll-link">Announcement </a></li>
           <li><a href="FAQs.php" class="scroll-link">FAQs</a></li>
           <li><a href="officers.php" class="scroll-link">Officers</a></li>
           <li><a href="login.php" class="scroll-link">Login</a></li>
         </ul>
        </div>
      </nav>
    </div>
  </div>
</header>

<div class="jumbotron jum_e" style=" background-image: url(img/small.jpg)"> 
  <div class="text"><h4>Make any ocassion unforgettable.</h4> Community Announcement </div>
</div>

  <style>
    
    #img_div {
      width: 90%;
      padding: 5px;
      margin: 15px auto;
      border: 1px solid #000;
    }

    #img_div:after {
      content:"";
      display: block;
      clear: both;
    }
    img {
      float: left;
      margin: 5px;
      width: 350px;
      height: 210px;
      
    }

  </style>

<?php
  $mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM announcements") or die($mysqli->error);
  //pre_r($result);
?>

<div>
<h2 style="color: black; font-style: bold;">Announcements </h2>
<?php
          while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td>
                  <?php echo "<div id='img_div'>"; ?>
                  <?php echo "<img src='admin/images/".$row['image']."' >"; ?> <br>
                  <h3><?php echo $row['agenda']; ?></h3><br>
                  <?php echo $row['date']; ?> &nbsp;
                  <?php echo $row['time']; ?> <br><br>
                  <?php echo $row['details']; ?>
                  <?php echo "</div>"; ?>
                </td>
              </tr>
            <?php endwhile; ?>

</div>

<footer>
    <div class="footer_bottom"><span>San Antonio Valley 2 Subdivision<br>Contact Us: 091234435 </span> 
          <ul class="social">
            <li><a href="javascript:void(0)" class="fa fa-twitter"></a></li>
            <li><a href="javascript:void(0)" class="fa fa-facebook"></a></li>
            <li><a href="javascript:void(0)" class="fa fa-instagram"></a></li>
            <li><a href="javascript:void(0)" class="fa fa-google-plus"></a></li>
          </ul>
    </div>
</footer>


<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="js/jquery.nav.js"></script> 
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/wow.js"></script> 
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>