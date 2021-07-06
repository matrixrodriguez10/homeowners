<?php
include("csv_covid.php");
$csv = new csv();
if(isset($_POST['sub'])){
  $csv->import($_FILES['file']['tmp_name']);  
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/style.css" />
    <title>Covid19 Tracker</title>
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
          <a class="active_link" href="covid19_tracker.php">Security</a>
          <a href="work_order.php">Maintenance</a>
          <a href="announcement.php">Events</a>
          <a href="invoice.php">Payment</a>
        </div>
      </nav>

<?php
  $mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM covid") or die($mysqli->error);
  //pre_r($result);
?>

      <main>
        <div>	
          <div class="card-header" id="user">
            <p style="float: left; font-size: 30px;">Covid 19 Tracker</p>
            <form  action="#" style=" float: left;">
              
              <input type="search" placeholder="Search.." name="search2" id="myInput" class="search_field">
             <button type="submit" class="btn_search"><i class="fa fa-search"></i></button>
            
            </form>
            <button class="btn_action"><b>Actions</b></button>
            <div class="dropdown">
              <button class="btn_down"><i class="fa fa-caret-down"></i></button>
              <div class="dropdown-content">
                <button id="myBtn" style="height: 40px; width: 100%; background-color: #fff; color: green; font-size: 18px;"><i class="fa fa-edit"></i> Create</button><br>
                <button id="myBtn_imp" style="height: 40px; width: 100%; background-color: #fff; color: green; font-size: 18px;"><i class="fa fa-file-text"></i> Import</button>
                <form method="post" action="export_covid.php">
                  <button type="submit" name="export" value="Export" style="height: 40px; width: 100%; background-color: #fff; color: green; font-size: 18px;"><i class="fa fa-file"></i> Export</button>
                </form>
                </div>
            </div>
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
                <th style="width: 5%;"><b>ID.</b></th>
                <th><b>Firstname</b></b></th>
                <th><b>Lastname</b></th>
                <th><b>Contact</b></th>
                <th><b>Email</b></th>
                <th><b>Address</b></th>
                <th><b>Date</b></th>
                <th style="width: 10%;"><b>Temperature</b></td>
                <th><b>Action</b></th>
              </tr>
        </thead>
      <tbody id="myTable">

        <?php
          while ($row = $result->fetch_assoc()): ?>
              <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['firstname']; ?></td>
                  <td><?php echo $row['lastname']; ?></td>
                  <td><?php echo $row['contact']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><?php echo $row['date']; ?></td>
                  <td><?php echo $row['temperature']; ?></td>
                <td>
                
                    <a href="covid_crud.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to Delete this info?');"><i class="fa fa-remove text-remove" title="Delete"></i></a>
                </td>
              </tr>
            <?php endwhile; ?>

          </table>
        </div>
      </main>


      <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content" style="background-color: #0D7F05;">
          <span class="close">&times;</span>
          <p class="sign"><b>CREATE FORM</b></p>
        </div>
          <form action="covid_crud.php" method="post">
              <div class="container_s wow fadeInDown delay-03s">
                <div class="row">
                    <div class="column">
                      <label>Firstname:</label><span><input type="text" name="firstname" required> </span>
                      <label>Email:</label><span><input    type="text" name="email" required></span>
                      <label>Gender:</label><span><input type="text" name="gender"></span>
                      <label>Contact #:</label><span><input type="text" name="contact" required></span>
                    </div>

                    <div class="column">
                        <label>Lastname:</label><span><input  type="text" name="lastname" required> </span>
                        <label>Date:</label><span><input type="date" name="date"></span>
                        <label>Temperature:</label><span><input type="text" name="temperature"></span>
                        <label>Adress:</label><span><textarea name="address" required></textarea> </span>  
                    </div>

                    <table>
                      <tr>
                  <td colspan="4">
                   <label style="color: black;">Are you experiencing symptoms og a respiratory of a respiratory infection, such as cough, fever, shortness of breath, or sore throat?</label><br>
                   <span><input style="width: 20%;" type="text" name="q1" placeholder="yes or no"></span>
                  </td>
                </tr>
                <tr>
                  <td colspan="4">
                   <br><label style="color: black;">In the past 14 days, did you interacted with someone who has COVID-19, or us exhibiting COVID-19 symptoms?</label><br>
                   <span><input style="width: 20%;" type="text" name="q2" placeholder="yes or no"></span>
                  </td>
                 </tr>
                  <tr>
                  <td colspan="4">
                   <br><label style="color: black;">Did you travel internationally within the 14 days to countries with sustained COVID-19 transmission?</label> <br>
                   <span><input style="width: 20%;" type="text" name="q3" placeholder="yes or no"></span>
                  </td>
                 </tr>
                 <tr>
                  <td colspan="4">
                   <br><label style="color: black;">Do you live in a community where the risk of COVID-19 is high?</label><br>
                   <span><input style="width: 20%;" type="text" name="q4" placeholder="yes or no"></span>
                  </td>
                 </tr>
                    </table>

                    <button class="button_s" name="save" type="submit" >CREATE</button>
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
                  <input type="file" id="myfile" name="file"><br><br>
                  <span><input type="submit" name="sub" value="Import" style="background-color: #0D7F05; width: 50%;"></span>
                </form>
              </div>
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
          <div class="sidebar__link">
            <i class="fa fa-wrench"></i>
            <a href="Admin_profile.php">Admin Profile</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-file-pdf-o"></i>
            <a href="residency.php">Clearance</a>
          </div>
          <h2>SECURITY</h2>
          <div class="sidebar__link active_menu_link">
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