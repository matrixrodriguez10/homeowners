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
    <link rel="stylesheet" href="css/style_employee.css" />
    <title>Work Order Reports</title>
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
          <a class="active_link" href="work_order.php">Maintenance</a>
          <a href="announcement.php">Events</a>
          <a href="invoice.php">Payment</a>
        </div>
      </nav>

<?php require_once 'work_crud.php'; ?>

<?php
  $mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM work") or die($mysqli->error);
  //pre_r($result);
?>

      <main>
        <div class="table_contadiner">	
          <div class="card-header" id="user">
            <p style="float: left; font-size: 30px;">Work Order Reports</p>
            <form  action="#" style=" float: left;">
              
              <input type="search" placeholder="Search.." name="search2" id="myInput" style="width: 350px; height: 40px; margin-left: 50px;">
             <button type="submit" style="margin-left: -5px; height: 40px; width: 30px;"><i class="fa fa-search"></i></button>
            
            </form>
              <button id="myBtn" style="height: 40px; width: 80px; background-color: #fff; color: green; margin-left: 5%; border-radius: 10px;"><b>Create</b></button>
          </div>

<?php
  if(isset($_SESSION['message'])): ?>

  <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    ?>
  </div>
  <?php endif ?>

            <table id="user" style="background-color: white; width: 100%;">
          <thead>  
              <tr> 
                <th style="text-align:left; width: 20%;"><b>Information</b></th>
                <th style="width: 10%;"><b>Category</b></th>
                <th style="width: 40%;"><b>Details</b></th>
                <th style="width: 10%;"><b>Status</b></th>
                <th style="width: 5%;"><b>Action</b></th>
              </tr>
          </thead>

        <tbody id="myTable">  
        <?php
          while ($row = $result->fetch_assoc()): ?>
              <tr>
                  <td style="text-align: left;">
                    <b>Name:</b> <?php echo $row['name']; ?><br>
                    <b>Contact:</b> <?php echo $row['contact']; ?><br>
                    <b style="color: green;"> Date: <?php echo $row['date']; ?> &nbsp; Time: <?php echo $row['time']; ?></b><br>
                    
                    <b>Location:</b> <?php echo $row['location']; ?><br>
                    <b>Email:</b> <?php echo $row['email']; ?><br>
                  </td>
                  <td><?php echo $row['category']; ?></td>
                  <td style="text-align: left; font-size: 12px;">
                      <?php echo $row['description']; ?><br>
                  </td>
                  <td><?php echo $row['status']; ?></td>
                    
                <td>
                    <a href="work_notif.php?mail=<?php echo $row['id']; ?>"><i class="fa fa-envelope" title="Send Notification"></i></a>
                    <a  href="work_order_update.php?edit=<?php echo $row['id']; ?>"><i class="fa fa-edit text-edit" title="Update"></i></a>
                </td>
              </tr>
          <?php endwhile; ?>
          </table>
        </div>
      </main>

      <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content" style="background-color: #0D7F05; margin-top: -50px;">
          <span class="close">&times;</span>
          <p class="sign"><b>CREATE REQUEST MAINTENANCE</b></p>
        </div>
          <form action="work_crud.php" method="post">
              <div class="container_s wow fadeInDown delay-03s">
                <div class="row">
                    <div class="column">
                      <input type="hidden" name="user_id" value="0">
                      <label>Name:</label><span><input type="text" name="name" required=""> </span>
                      <label>Time:</label><span><input type="text" name="time" required=""></span>
                      <label>Contact #:</label><span><input type="text" name="contact" required=""></span>
                      <label>Email:</label><span><input type="text" name="email" required=""></span>
                      <label>Status:</label><span><input type="text" name="status" required=""></span>

                    </div>

                    <div class="column">
                        <label>Date:</label><span><input  type="date" name="date" required=""> </span>
                        <label>Location:</label><span><input  type="text" name="location" required=""></span>
                        <select name="category">
                          <option value="" disabled selected hidden>Category of Request:</option>
                          <option value="House Repair">House Repair</option>
                          <option value="Plumbing">Plumbing</option>
                          <option value="Electrical">Electrical</option>
                          <option value="Other">Other</option>
                        </select><br>                       
                        <label>Description of Request:</label><span><textarea name="description"></textarea> </span>  
                    </div>
                    <button class="button_emp" type="submit" name="save">CREATE</button>
                </div>
              </div>
          </form> 
      </div>


       <!---MODAL IMPORT*--->
      <div id="myModal_import" class="modal_imp">
        <!-- Modal content -->
        <div class="modal-content_imp" style="background-color: #0D7F05;">
          <span class="close_imp">&times;</span>
          <p class="sign"><b>IMPORT FILE</b></p>
        </div>
              <div class="container_imp">
                <form action="#" method="post" enctype="multipart/form-data">
                  <label for="myfile">Select a file:</label>
                  <input type="file" id="myfile" name="myfile"><br><br>
                  <span><input type="submit" style="background-color: #0D7F05; width: 50%;"></span>
                </form>
              </div>
      </div>




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
            <i class="fa fa-wrench"></i>
            <a href="employee_profile.php">Employee Profile</a>
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
          <div class="sidebar__link active_menu_link">
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
          <div class="sidebar__logout">
            <i class="fa fa-power-off"></i>
            <a href="logout.php">Log out</a>
          </div>          
            <!--SIDEBAR ENDS HERE-->
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
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
        var modal_imp = document.getElementById("myModal_import");
        var btn = document.getElementById("myBtn_imp");
        var span = document.getElementsByClassName("close_imp")[0];
        btn.onclick = function() {
          modal_imp.style.display = "block";
        }
        span.onclick = function() {
          modal_imp.style.display = "none";
        }
        window.onclick = function(event) {
          if (event.target == modal) {
            modal_imp.style.display = "none";
          }
        }
    </script>
    <script>
        var modal_imp = document.getElementById("myModal_import");
        var btn = document.getElementById("myBtn_imp");
        var span = document.getElementsByClassName("close_imp")[0];
        btn.onclick = function() {
          modal_imp.style.display = "block";
        }
        span.onclick = function() {
          modal_imp.style.display = "none";
        }
        window.onclick = function(event) {
          if (event.target == modal) {
            modal_imp.style.display = "none";
          }
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
    </script>

  </body>
</html>