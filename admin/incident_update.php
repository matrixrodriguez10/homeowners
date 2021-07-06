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
    <title>Incident Update</title>
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
          <a class="active_link" href="covid19_tracker.php">SECURITY</a>
          <a href="work_order.php">MAINTENANCE</a>
          <a href="announcement.php">EVENTS</a>
          <a href="invoice.php">Payment</a>
        </div>
      </nav>

<?php require_once 'incident_crud.php'; ?>
<?php
  $mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM incident") or die($mysqli->error);
  //pre_r($result);
?>

      <main>
        <div class="table_container">	
          <div class="card-header" id="user">
            Update Incident
          </div>
          <form action="incident_crud.php" method="post">
              <div class="container_inci">
                <div class="row">
                    <div class="column">
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                      <label>Name:</label><span><input type="text" name="name" required="" value="<?php echo $name; ?>"> </span>
                      <label>Time:</label><span><input type="text" name="time" required="" value="<?php echo $time; ?>"></span>
                      <label>Contact #:</label><span><input type="text" name="contact" required="" value="<?php echo $contact; ?>"></span>
                    </div>

                    <div class="column">
                      <label>Date:</label><span><input type="date" name="date" required="" value="<?php echo $date; ?>"></span>
                      <label>Location:</label><span><input  type="text" name="location" required="" value="<?php echo $location; ?>"></span>
                      <select name="category">
                          <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                          <option value="Environmental Incident">Environmental Incident</option>
                          <option value="Property Damage Incident">Property Damage Incident</option>
                          <option value="Vehicle Incident">Vehicle Incident</option>
                          <option value="Fire Incident">Fire Incident</option>
                          <option value="Other">Other</option>
                        </select>
                      <label>Description of Incident:</label><span><textarea name="description" required=""><?php echo $description; ?></textarea> </span>
                    </div>
                    <button class="button_emp" type="submit" name="update">UPDATE</button>
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
          <div class="sidebar__link">
            <i class="fa fa-user-md"></i>
            <a href="covid19_tracker.php">Covid-19 Tracker</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-male"></i>
            <a href="visitors_record.php">Visitor's Record</a>
          </div>
          <div class="sidebar__link active_menu_link">
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
  </body>
</html>