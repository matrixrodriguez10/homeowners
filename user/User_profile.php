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
    <link rel="stylesheet" href="css/style_user.css" />
    <title>Homeowner Profile</title>
  </head>
  <body id="body">
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a class="active_link" href="User_profile.php">Management</a>
          <a href="incident_record.php">Security</a>
          <a href="work_order.php">Maintenance</a>
          <a href="announcement.php">Events</a>
        </div>
      </nav>

      <main>
        <div class="table_container">	
          <div class="card-header" id="user">
            Homeowner Profile
          </div>
              <div class="container_edit">
                <div class="row">
                    <div class="column" style="width: 33.3%;">
                      <div src="#" style="width: 200px; height: 200px; border: 1px; background-color: #ddd; margin-left: 40px;"><img <?php echo "<img src='../admin/images/users/".$user_data['image']."'"; ?>/></div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $user_data['id']; ?>">
                    <div class="column" style="width: 33.3%;">
                      <label>Firstname:</label><span><input type="text" name="" disabled placeholder="<?php echo $user_data['firstname']; ?>"> </span>
                      <label>Contact No.:</label><span><input type="text" name="" disabled placeholder="<?php echo $user_data['contact']; ?>"></span>
                      <label>Email:</label><span><input type="text" name="" disabled placeholder="<?php echo $user_data['email']; ?>"></span>
                    </div>

                    <div class="column" style="width: 33.3%;">
                        <label>Lastname:</label><span><input  type="text" name="" disabled placeholder="<?php echo $user_data['lastname']; ?>"> </span>
                        <label>Birthdate:</label><span><input type="text" name="" disabled placeholder="<?php echo $user_data['bday']; ?>"></span>
          
                    </div>
                    <div style="width: 66.6%; float: right; padding-right: 10px; margin-top: -10px;"><label>Address:</label><span><input type="text" name="" disabled placeholder="<?php echo $user_data['address']; ?>" ></span></div>
                    <button href="user_profile.php?edit=<?php echo $row['id']; ?>" class="button_emp" style="float: right;" type="submit" id="myBtn">UPDATE</button>                  
                </div>
              </div>
        </div>
      </main>

<?php require_once 'user_crud.php'; ?>
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

      <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content modal_emp" >
          <span class="close">&times;</span>
          <p class="sign"><b>CREATE EMPLOYEE</b></p>
        </div>
          <form action="user_crud.php" method="post" enctype="multipart/form-data">
              <div class="create_emp">
                <div class="row">
                  <h2 style="text-align: center;">Homeowner Personal Information</h2><br>
                    <div class="column" style="width: 33.3%;">
                      <div src="#" class="img_emp"><img id="pic" <?php echo "<img src='../admin/images/users/".$user_data['image']."' >"; ?>/></div>
                      <div style="margin-left: 20px;"><input type='file' name="image" onchange="readURL(this);" on /></div>
                    </div>
                    <div class="column" style="width: 33.3%;">
                      <input type="hidden" name="id" value="<?php echo $user_data['id']; ?>">
                      <label>Firstname:</label><span><input type="text" name="firstname" required="" value="<?php echo $user_data['firstname']; ?>"> </span>
                      <label>Contact No.:</label><span><input type="text" name="contact" required="" value="<?php echo $user_data['contact']; ?>"></span>
                      <label>Gender:</label><span><input type="text" name="gender" required="" value="<?php echo $user_data['contact']; ?>"></span>
                      <label>Email:</label><span><input type="text" name="email" required="" value="<?php echo $user_data['email']; ?>"></span>
                      <label>User Name:</label><span><input type="text" name="username" required="" value="<?php echo $user_data['username']; ?>"></span>
                    </div>

                    <div class="column" style="width: 33.3%;">
                        <label>Lastname:</label><span><input  type="text" name="lastname" required="" value="<?php echo $user_data['lastname']; ?>"> </span>
                        <label>Birthdate:</label><span><input type="date" name="bday" required="" value="<?php echo $user_data['bday']; ?>"></span>
                        <label>Address:</label><span><textarea required="" name="address"><?php echo $user_data['address']; ?></textarea></span>
                        <label>Password:</label><span><input type="password" name="password" required="" value="<?php echo $user_data['password']; ?>"></span>

                    </div>
                    <button class="button_emp" name="update" type="submit">UPDATE</button>                  
                </div>
              </div>
          </form> 
      </div>




        <!--SIDE BAR STARTS HER-->
      <div id="sidebar">
        <div class="sidebar__title">
            <h3>User, <?php echo $user_data['firstname']; ?>!</h3>
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
        </div>

        <div class="sidebar__menu">
          <h2>MANAGEMENT</h2>
          <div class="sidebar__link active_menu_link">
            <i class="fa fa-wrench"></i>
            <a href="User_profile.php">My Profile</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-file-pdf-o"></i>
            <a href="residency.php">Clearance</a>
          </div>
          <h2>SECURITY</h2>
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
          <div class="sidebar__logout">
            <i class="fa fa-power-off"></i>
            <a href="logout.php">Log out</a>
          </div>
            <!--SIDEBAR ENDS HERE-->
      </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="js/script.js"></script>
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