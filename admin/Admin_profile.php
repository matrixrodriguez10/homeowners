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
    <title>Admin Profile</title>
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

      <main>
        <div class="table_container">	
          <div class="card-header" id="user">
            Admin Profile
          </div>
              <div class="container_edit">
                <div class="row">
                    <div class="column" style="width: 33.3%;">
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <div src="#" style="width: 200px; height: 200px; border: 1px; background-color: #ddd; margin-left: 40px;"><img <?php echo "<img src='images/admin/".$user_data['image']."'"; ?> ></div>
                      <input type="hidden" name="id" value="<?php echo $user_data['id']; ?>">
                      
                    </div>
                    <div class="column" style="width: 33.3%;">
                      <label>Firstname:</label><span><input type="text" name="" disabled placeholder="<?php echo $user_data['firstname']; ?>"> </span>
                      <label>Contact No.:</label><span><input type="text" name="" disabled placeholder="<?php echo $user_data['contact']; ?>"></span>
                      <label>Email:</label><span><input type="text" name="" disabled placeholder="<?php echo $user_data['email']; ?>"></span>
                    </div>

                    <div class="column" style="width: 33.3%;">
                        <label>Lastname:</label><span><input  type="text" name="" disabled placeholder="<?php echo $user_data['lastname']; ?>"> </span>
                        <label>Birthdate:</label><span><input type="text" name="" disabled placeholder="<?php echo $user_data['bday']; ?>"></span>
                        <label>Position:</label><span><input    type="text" name="" disabled placeholder="<?php echo $user_data['position']; ?>"></span>
                    </div>
                    <div style="width: 66.6%; float: right; padding-right: 10px; margin-top: -10px;"><label>Address:</label><span><input type="text" name="" disabled placeholder="<?php echo $user_data['address']; ?>" ></span></div>
                    <button href="Admin_profile.php?edit=<?php echo $row['id']; ?>" class="button_emp" style="float: right;" type="submit" id="myBtn">UPDATE</button>                  
                </div>
              </div>
        </div>
      </main>

<?php require_once 'admin_crud.php'; ?>

<?php
  $mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM admin") or die($mysqli->error);
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

      <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content modal_emp" >
          <span class="close">&times;</span>
          <p class="sign"><b>UPDATE PROFILE</b></p>
        </div>
          <form action="admin_crud.php" method="post" enctype="multipart/form-data">
              <div class="create_emp">
                <div class="row">
                  <h2 style="text-align: center;">Admin Personal Information</h2><br>
                    <div class="column" style="width: 33.3%;">
                      
                      <div src="#" class="img_emp"><img id="pic" <?php echo "<img src='images/admin/".$user_data['image']."' >"; ?>/></div>
                      <div style="margin-left: 20px;"><input type='file' name="image" onchange="readURL(this);" on /></div>
                    </div>
                    <div class="column" style="width: 33.3%;">
                      <input type="hidden" name="id" value="<?php echo $user_data['id']; ?>">
                      <label>Firstname:</label><span><input type="text" name="firstname" required="" value="<?php echo $user_data['firstname']; ?>"> </span>
                      <label>Username:</label><span><input  type="text" name="username" required value="<?php echo $user_data['username']; ?>"> </span>
                      <label>Contact No.:</label><span><input type="text" name="contact" required="" value="<?php echo $user_data['contact']; ?>"></span>
                      <label>Email:</label><span><input type="text" name="email" required="" value="<?php echo $user_data['email']; ?>"></span>
                    </div>

                    <div class="column" style="width: 33.3%;">
                        <label>Lastname:</label><span><input  type="text" name="lastname" required="" value="<?php echo $user_data['lastname']; ?>"> </span>
                        <label>Password:</label><span><input  type="password" name="password" required value="<?php echo $user_data['password']; ?>"> </span>
                        <label>Birthdate:</label><span><input type="date" name="bday" required="" value="<?php echo $user_data['bday']; ?>"></span>
                        <label>Position:</label><span><input type="text" name="position" required="" value="<?php echo $user_data['position']; ?>"></span>
                    </div>
                    <div class="emp_address"><label>Address:</label><span><input type="text" name="address" required="" value="<?php echo $user_data['address']; ?>"></span></div>
                    <button class="button_emp" name="update" type="submit" >UPDATE</button>                  
                </div>
              </div>
          </form> 
      </div>



  <!--SIDE BAR STARTS HER-->
      <div id="sidebar">
        <div class="sidebar__title">
            <h3>Admin, <?php echo $user_data['firstname']; ?>!</h3>
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
          <div class="sidebar__link active_menu_link">
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
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
  <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
          modal.style.display = "block";
        }
        
        span.onclick = function() {
          modal.style.display = "none";
        }
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
  </script>
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