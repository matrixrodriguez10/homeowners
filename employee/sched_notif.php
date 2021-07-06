<?php 
    
    //email for this system
    //email: sav2subd.pque@gmail.com
    //pass: sanantoniovalley2
    //recovery email: sav2pque@gmail.com

    $result = "";
    $error  = "";
  if(isset($_POST['submit']))
  {
    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    //smtp settings
    $mail->isSMTP(); // send as HTML
    $mail->Host = "smtp.gmail.com"; // SMTP servers
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->Username = "sav2subd.pque@gmail.com"; // Your mail
    $mail->Password = 'sanantoniovalley2'; // Your password mail
    $mail->Port = 587; //specify SMTP Port
    $mail->SMTPSecure = 'tls';                               
    $mail->setFrom($_POST['email'],$_POST['name']);
    $mail->addAddress($_POST['email']);
    $mail->addReplyTo($_POST['email'],$_POST['name']);
    $mail->isHTML(true);
    $mail->Subject='Form Submission:' .$_POST['subject'];
    $mail->Body='<b>Name :'.$_POST['name'].'<br> Email: '.$_POST['email'].'<br>Message: '.$_POST['message'].'</b>';
    if(!$mail->send())
    {
      $error = "Something went worng. Please try again.";
    }
    else 
    {
      $result="Thanks\t" .$_POST['name']. " for contacting us.";
    }
  }

?>

<?php
session_start();
  include("config/connection.php");
  include("controllers/function.php");
  
  $user_data = check_login($conn);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style_employee.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.9.0-web/css/all.css">
    <title>Email Form</title>
  </head>
  <body id="body">
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a href="Dashboard.php">Home</a>
          <a href="User.php">Management</a>
          <a href="covid19_tracker.php">Security</a>
          <a href="work_order.php">Maintenance</a>
          <a href="announcement.php">Events</a>
          <a href="User.php">Collection</a>
        </div>
      </nav>

      <main>
        <div class="card-header" id="user">
            Notification
        </div>
          <table class="table_notif">

            
            <form action="" method="post">

            <h5><?=$result; ?></h5>
            <h5><?=$error; ?></h5>

<?php require_once 'Scheduling_crud.php'; ?>        
<?php
  $mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM scheduling") or die($mysqli->error);
  //pre_r($result);
?>

                <tr>
                  <td colspan="2"><h2>Send Notification</h2></td>
                </tr>
                <tr>
                  <td class="td_notif">From: </td>
                  <td><input type='text' name="name" value="<?php echo 'SAV2'; ?>" required style="border-radius: 50px;"></input></td>
                </tr>
                <tr>
                  <td class="td_notif">To: </td>
                  <td><input type='text' name="email" value="<?php echo $email ?>" required style="border-radius: 50px;"></input></td>
                </tr>
                <tr>
                  <td class="td_notif">Subject: </td>
                  <td><input type='text' name="subject" value="Reservation" required style="border-radius: 50px;"></input></td>
                </tr>
                <tr>
                  <td> </td>
                  <td><textarea class="ta_notif" name="message" placeholder="Compose email..."><?php echo 'Hello, your reservation has been approved... '; ?></textarea></td>
                </tr>
                <tr>
                <td colspan="2"> <input type="submit" name="submit" value="Send" style="width: 25%; background-color: #0D7F05;"></td>  
                </tr>
            </form>     
        </div>                        
          </table>         
      </main>


        <!--SIDE BAR STARTS HER-->
      <div id="sidebar">
        <div class="sidebar__title">
            <h3>Employee, <?php echo $user_data['firstname']; ?>!</h3>
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
        </div>

        <div class="sidebar__menu">
          <div class="sidebar__link ">
            <i class="fa fa-home"></i>
            <a href="Dashboard.php">Dashboard</a>
          </div>
          <h2>MANAGEMENT</h2>
          <div class="sidebar__link">
            <i class="fa fa-users" aria-hidden="true"></i>
            <a href="User.php">Homeowner's Directory</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-user-plus" aria-hidden="true"></i>
            <a href="employees_record.php">Employee List</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-wrench"></i>
            <a href="Admin_profile.php">Admin Profile</a>
          </div>
          <h2>SECURITY</h2>
          <div class="sidebar__link">
            <i class="fa fa-user-md"></i>
            <a href="covid19_tracker.php">Covid-19 Tracker</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-male"></i>
            <a href="visitors_record.php">Visitor's Record</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-address-book"></i>
            <a href="incident_record.php">Incident Reports</a>
          </div>
          <h2>MAINTENANCE</h2>
          <div class="sidebar__link ">
            <i class="fa fa-hand-o-up"></i>
            <a href="work_order.php">Request and Work Orders</a>
          </div>
          <h2>EVENTS</h2>
          <div class="sidebar__link ">
            <i class="fa fa-bullhorn"></i>
            <a href="announcement.php">Announcements</a>
          </div>
          <div class="sidebar__link active_menu_link">
            <i class="fa fa-calendar-check-o"></i>
            <a href="Scheduling.php">Scheduling</a>
          </div>
          <h2>COLLECTION</h2>
          <div class="sidebar__link">
            <i class="fa fa-sticky-note-o"></i>
            <a href="invoice.php">Invoice</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-money"></i>
            <a href="expense.php">Expense</a>
          </div>
          <div class="sidebar__logout">
            <i class="fa fa-power-off"></i>
            <a href="logout.php">Log out</a>
          </div>          
            <!--SIDEBAR ENDS HERE-->
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
  </body>
</html>