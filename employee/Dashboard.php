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
    <title>Dashboard</title>
  </head>
  <body id="body" onload=display_ct();>
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a class="active_link" href="Dashboard.php">Home</a>
          <a href="User.php">Management</a>
          <a href="covid19_tracker.php">Security</a>
          <a href="work_order.php">Maintenance</a>
          <a href="announcement.php">Events</a>
          <a href="invoice.php">Payment</a>
        </div>
      </nav>

      <main>
        <div class="main__container" >
          <div style="text-align: right; margin-right: 15px;"><span id='ct'></span></div>
          <!-- MAIN CARDS STARTS HERE -->
          <div class="main__cards">
            <a href="User.php"><div class="card">
              <i class="fa fa-users fa-4x text-lightblue" style="text-align: center;" aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">Homeowners <br>
<?php
      
      $conn = $conn = mysqli_connect('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm');

      $query = "SELECT id FROM users ORDER BY id";
      $query_run = mysqli_query($conn, $query);

      $row = mysqli_num_rows($query_run);

       echo $row ;
?>

                </p>
                <span class="font-bold text-title"></span>
              </div>
            </div></a>

            <a href="employees_record.php"><div class="card">
              <i class="fa fa-user-md fa-4x text-yellow" aria-hidden="true" style="text-align: center;"></i>
              <div class="card_inner">
                <p class="text-primary-p">Covid-19 Tracker<br>
<?php
      
      $conn = $conn = mysqli_connect('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm');

      $query = "SELECT id FROM covid ORDER BY id";
      $query_run = mysqli_query($conn, $query);

      $row = mysqli_num_rows($query_run);

       echo $row ;
?>

                </p>
                <span class="font-bold text-title"></span>
              </div>
            </div></a>

            <a href="invoice.php"><div class="card">
              <i class="fa fa-money fa-4x text-red" style="text-align: center;" aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">Collection <br>

<?php
      error_reporting(0);

      $conn = mysqli_connect('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error());

      $query = "SELECT SUM(amount) As sum FROM invoice";
      $query_result = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_assoc($query_result)) {

          $output =  $row['sum'];
      }

      $sql = "SELECT * FROM invoice";

      $result = mysqli_query($conn, $sql);

?>
                &#8369 <?php echo $output; ?>

                </p>
                <span class="font-bold text-title"></span>
              </div>
            </div></a>

            <a href="expense.php"><div class="card">
              <i class="fa fa-male fa-4x text-green" style="text-align: center;" aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">Visitors <br>

<?php
      
      $conn = $conn = mysqli_connect('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm');

      $query = "SELECT id FROM visitors ORDER BY id";
      $query_run = mysqli_query($conn, $query);

      $row = mysqli_num_rows($query_run);

       echo $row ;
?>

                </p>
                <span class="font-bold text-title"></span>
              </div>
            </div></a>


            </div>

          <!-- MAIN CARDS ENDS HERE -->

          <!-- CHARTS STARTS HERE -->
          <div class="charts">

            <div class="charts__right" style="width: 950px;">
              <div class="charts__right__title">
                <div>
                  <h1>Status Reports</h1>
                  <p>San Antonio Valley 2, Parañaque City </p>
                </div>
              </div>

              <div class="charts__right__cards">
                <a href="incident_record.php"><div class="card3">
                  <h1><i class="fa fa-address-book"></i> Incident Reports</h1><br>
                  <h3>
                    
<?php
      
      $conn = $conn = mysqli_connect('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm');

      $query = "SELECT id FROM incident ORDER BY id";
      $query_run = mysqli_query($conn, $query);

      $row = mysqli_num_rows($query_run);

       echo $row ;
?>

                  </h3>
                </div></a>

                <a href="work_order.php"><div class="card4">
                  <h1><i class="fa fa-hand-o-up"></i> Request Orders</h1><br>
                  <h3>
                    
<?php
      
      $conn = $conn = mysqli_connect('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm');

      $query = "SELECT id FROM work ORDER BY id";
      $query_run = mysqli_query($conn, $query);

      $row = mysqli_num_rows($query_run);

       echo $row ;
?>

                  </h3>
                </div></a>

                <a href="announcement.php" style="text-decoration: none;"><div class="card5">
                  <h1><i class="fa fa-bullhorn"></i> Announcements</h1><br>
                  <h3>

<?php
      
      $conn = $conn = mysqli_connect('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm');

      $query = "SELECT id FROM announcements ORDER BY id";
      $query_run = mysqli_query($conn, $query);

      $row = mysqli_num_rows($query_run);

       echo $row ;
?>

                  </h3>
                </div></a>


                <a href="announcement.php" style="text-decoration: none;"><div class="card6">
                  <h1><i class="fa fa-calendar-check-o"></i> Scheduling</h1><br>
                  <h3>
<?php
      
      $conn = $conn = mysqli_connect('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm');

      $query = "SELECT id FROM scheduling ORDER BY id";
      $query_run = mysqli_query($conn, $query);

      $row = mysqli_num_rows($query_run);

       echo $row ;
?>
                  </h3>
                </div></a>

              </div>
            </div>
          </div>
          <!-- CHARTS ENDS HERE -->
        </div>
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
          <div class="sidebar__link active_menu_link">
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
            <i class="fa fa-money"></i>
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
    <script type="text/javascript"> 
function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
var x = new Date()
document.getElementById('ct').innerHTML = x;
display_c();
 }
</script>
  </body>
</html>