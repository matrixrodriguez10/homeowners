<?php
session_start();

  $conn = mysqli_connect('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm');

  if($_SERVER['REQUEST_METHOD']=="POST"){

    //something was posted
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $temperature = $_POST['temperature'];
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];


    if (!empty($firstname) && !empty($lastname) && !empty($contact) && !empty($gender) && !empty($email) && !empty($address) && !empty($date) && !empty($temperature) && !empty($q1) && !empty($q2) && !empty($q3) && !empty($q4)) {

        //save to database
        $query = "INSERT Into covid (firstname, lastname, contact, gender, email, address, date, temperature, q1, q2, q3, q4) values('$firstname', '$lastname', '$contact', '$gender', '$email', '$address', '$date', '$temperature', '$q1', '$q2', '$q3', '$q4')";


        mysqli_query($conn, $query);

        header("Location: covidform.php");
        echo "<script>Thank you for submitting!</script>";
        die;
    }
    else {
        echo "Please enter some valid information";

    }
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>covid19 tracker form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style_home.css" rel="stylesheet" type="text/css">
    <style>
      .table-resp {
  border-collapse: collapse;
  margin-left: 1em;
  caption {
    text-align: left;
    width: 95vw; // Screws up table width until positioning below
    // caption-side: top-outside; Firefox-only for now
  }
}

@media (min-width: 768px) { // sm, md, lg 
  .table-resp {
    margin-top: 3em;
    position: relative; // Used below to give position: absolute context
    caption {
      position: absolute; // Fixes table width broken by width: 95vw above
      top: -2em;
      margin-bottom: .75em;
    }
    thead {
      text-align: left;
      background-color: #333;
      color: white;
    }

    td, th {
      padding: .25em .5em;
      &:nth-child(2) {
        border-left: 3px solid #fff;
      }
    }
  }
}

@media (max-width: 767px) /* xs */ {
  thead {
    display: none;
  }
  .table-resp {
    display: block;
    margin-top: 1em;
  }
  td {
    display: block;
  }
  td:first-child {
    font-weight: 700;
    margin-top: .75em;
    margin-bottom: 0;
  }
  td:nth-child(2) {
    margin-top: 0;
  }
}

/* Uninteresting stuff below here */
.wrapper_e td{
  color: black;
  font-weight: bolder;
}

.wrapper_e input[type=text]{
  background-color: #E5E4E2;
  text-align: center;
  border: 1px solid;
}
      
    </style> 
</head>
<body style="background-color: #E5E5E5;">
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
               <li><a href="About us.php" class="scroll-link">About</a></li>
               <li><a href="announcement.php" class="scroll-link">Announcement </a></li>
               <li><a href="FAQs.php" class="scroll-link">FAQs</a></li>
               <li><a href="Officers.php" class="scroll-link">Officers</a></li>
               <li><a href="Login.php" class="scroll-link">Login</a></li>
           </ul>
          </div>
        </nav>
      </div>
    </div>
</header>
  <div class="wrapper_e" style="margin: auto; padding: 10px; background-color: white; width: 80%; margin-top: 20px; margin-bottom: 20px;">
        <form method="post">
          <table class="table-resp" style="margin: auto;">

                <h1 style="color: black; text-align: center;">Covid-19 Tracking Form</h1><br>

                 <tr>
                   <td>Firstname<span><input type="text" name="firstname" required=""></span></td>
                   <td>Lastname<span><input  type="text" name="lastname" required=""></span></td>
                 </tr>
                 <tr>
                   <td>Contact<span><input type="text" name="contact" required=""></span></td>
                   <td>Gender<span><input  type="text" name="gender" required=""></span></td>
                 </tr>
                 <tr>
                   <td>Email<span><input type="text" name="email" required=""></span></td>
                   <td>Address<span><input  type="text" name="address" required=""></span></td>
                 </tr>
                 <tr>
                   <td>Date<span><input type="text" name="date" required=""></span></td>
                   <td>Temperature<span><input  type="text" name="temperature" required=""></span></td>
                 </tr>

                <tr><td><br><label style="color: black;">Questions:</label></td></tr>
                <tr>
                  <td colspan="4">
                   <label style="color: black;">Are you experiencing symptoms og a respiratory of a respiratory infection, such as cough, fever, shortness of breath, or sore throat?</label><br>
                   <span><input style="width: 30%;" type="text" name="q1" placeholder="yes or no" required=""></span>
                  </td>
                </tr>
                <tr>
                  <td colspan="4">
                   <br><label style="color: black;">In the past 14 days, did you interacted with someone who has COVID-19, or us exhibiting COVID-19 symptoms?</label><br>
                   <span><input style="width: 30%;" type="text" name="q2" placeholder="yes or no" required=""></span>
                  </td>
                 </tr>
                  <tr>
                  <td colspan="4">
                   <br><label style="color: black;">Did you travel internationally within the 14 days to countries with sustained COVID-19 transmission?</label> <br>
                   <span><input style="width: 30%;" type="text" name="q3" placeholder="yes or no" required=""></span>
                  </td>
                 </tr>
                 <tr>
                  <td colspan="4">
                   <br><label style="color: black;">Do you live in a community where the risk of COVID-19 is high?</label><br>
                   <span><input style="width: 30%; text-align: center;" type="text" name="q4" placeholder="yes or no" required=""></span>
                  </td>
                 </tr>

                 <tr>
                  <div style="text-align: center;"><td colspan="4"><br><br><input style="background-color: #4CC417; width: 100px; border-radius: 15px; border: none;" type="submit" name="submit" value="SUBMIT"></td></div>
                </tr>
          </table>
      </form>
    </div>
  </body>
</html>