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
    <title>Announcements</title>
  </head>
  <body id="body">
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a href="user_profile.php">Management</a>
          <a href="visitors_record.php">Security</a>
          <a href="work_order.php">Maintenance</a>
          <a class="active_link" href="announcement.php">Events</a>
        </div>
      </nav>

<?php
  $mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM announcements") or die($mysqli->error);
  //pre_r($result);
?>

      <main>
        <div class="table_contadiner">	
          <div class="card-header" id="user" style="height: 90px;">
            <p style="float: left; font-size: 40px;">Announcements</p>
          </div>

        </div>

    <style>
    
    #img_div {
      width: 95%;
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
      width: 400px;
      height: 250px;
      
    }

  </style>

  <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td>
                  <?php echo "<div id='img_div'>"; ?>
                  <?php echo "<img src='../admin/images/".$row['image']."' >"; ?> <br>
                  <h2><?php echo $row['agenda']; ?></h2>
                  <?php echo $row['date']; ?> &nbsp;
                  <?php echo $row['time']; ?> <br><br>
                  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['details']; ?>
                  <?php echo "</div>"; ?>
                </td>
              </tr>
    <?php endwhile; ?>
      </main>


      <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content" style="background-color: #0D7F05;">
          <span class="close">&times;</span>
          <p class="sign"><b>CREATE ANNOUNCEMENT</b></p>
        </div>
          <form action="/action_page.php" method="post">
              <div class="create_announcement">
                <div class="row">
                    <div class="column" style="width: 50%;">
                      <div src="#" class="img_emp"><img id="pic" /></div>
                      <div style="margin-left: 20px;"><input type='file'  onchange="readURL(this);" /></div>
                    </div>
                    <div class="column" style="width: 50%;">
                      <label>Agenda:</label><span><input type="text" name="" required=""> </span>
                      <label>Date:</label><span><input type="date" name="" required=""></span>
                      <label>Time:</label><span><input type="time" name="" required=""></span>
                      <label>Details:</label><span><textarea required=""></textarea> </span>
                    </div>
                    <button class="button_emp" type="submit" ><i class="fa fa-floppy-o" aria-hidden="true"></i> CREATE</button>                  
                </div>
              </div>
          </form>
      </div>


      <!---MODAL IMPORT*--->


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
          <div class="sidebar__link">
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
          <div class="sidebar__link active_menu_link">
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
  </body>
</html>