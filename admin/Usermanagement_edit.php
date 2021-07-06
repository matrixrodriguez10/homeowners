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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/style.css" />
    <title>User Management Edit</title>
  </head>
  <body id="body">
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a href="Dashboard.php">Home</a>
          <a class="active_link" href="User.php">Management</a>
          <a href="covid19_tracker.php">Security</a>
          <a href="work_order.php">Maintenance</a>
          <a href="announcement.php">Events</a>
          <a href="invoice.php">Payment</a>
        </div>
      </nav>

<?php require_once 'users_crud.php'; ?>
<?php
  $mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM users") or die($mysqli->error);
  //pre_r($result);
?>

  <style>
        
    img {
      float: left;
      margin: 0;
      width: 200px;
      height: 200px;
      
    }
  </style>

      <main>
        <div class="table_container">	
          <div class="card-header" id="user">
            Update User
          </div>
          <form action="users_crud.php" method="post" enctype="multipart/form-data">
              <div class="container_edit">
                <div class="row">
                  <h2 style="text-align: center;">Homeowner Personal Information</h2><br>
                    <div class="column" style="width: 33.3%;">
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <div src="#" style="width: 200px; height: 200px; border: 1px; background-color: #ddd; margin-left: 20px;"><img id="pic" <?php echo "<img src='images/users/".$row['image']."' >"; ?> /></div>
                      <div style="margin-left: 20px;"><input type='file' name="image" onchange="readURL(this);" on /></div>
                    </div>
                    <div class="column" style="width: 33.3%;">
                      <label>Firstname:</label><span><input type="text" name="firstname" required value="<?php echo $firstname; ?>"> </span>
                      <label>Birthdate:</label><span><input type="date" name="bday" required value="<?php echo $bday; ?>"></span>
                      <label>Email:</label><span><input type="text" name="email" required value="<?php echo $email; ?>"></span>
                      <label>Contact No. :</label><span><input type="text" name="contact" required value="<?php echo $contact; ?>"></span>
                      <label>Username :</label><span><input type="text" name="username" required value="<?php echo $username; ?>"></span>
                    </div>

                    <div class="column" style="width: 33.3%;">
                        <label>Lastname:</label><span><input  type="text" name="lastname" required value="<?php echo $lastname; ?>"> </span>         
                        <label>Gender:</label><span><input    type="text" name="gender" required value="<?php echo $gender; ?>"></span>
                        <label>Address:</label><span><textarea required name="address"><?php echo $address; ?></textarea></span>
                        <label>Password:</label><span><input type="Password" name="password" required value="<?php echo $password; ?>"></span>
                    </div>
                    <button class="button_emp" name="update" type="submit" >Update</button>                  
                </div>
              </div>
          </form> 
        </div>
      </main>


        <!--SIDE BAR STARTS HER-->
      <div id="sidebar">
        <div class="sidebar__title">
            <h3>Admin</h3>
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
          <div class="sidebar__link active_menu_link">
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
          <div class="sidebar__link">
            <i class="fa fa-file-pdf-o"></i>
            <a href="residency.php">Clearance</a>
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
          <div class="sidebar__link">
            <i class="fa fa-calendar-check-o"></i>
            <a href="Scheduling.php">Scheduling</a>
          </div>
          <h2>PAYMENT</h2>
          <div class="sidebar__link">
            <i class="fa fa-sticky-note-o"></i>
            <a href="invoice.php">Collection</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-money"></i>
            <a href="Xpense.php">Expense</a>
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
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>
         function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#pic')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
  </script>
  </body>
</html>