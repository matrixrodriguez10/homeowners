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
    <title>Certificate of Residency</title>
  </head>
  <body id="body">
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a class="active_link" href="User_profile.php">Management</a>
          <a href="visitors_record.php">Security</a>
          <a href="work_order.php">Maintenance</a>
          <a href="announcement.php">Events</a>
        </div>
      </nav>

<?php require_once 'residency_crud.php'; ?>

      <main>
        <div class="table_contadiner">	
          <div class="card-header" id="user">
            <p style="float: left; font-size: 30px;">Certificate of Residency</p>
            <form  action="#" style=" float: left;">
              
              <input type="search" placeholder="Search.." name="search2" id="myInput" style="width: 350px; height: 40px; margin-left: 50px;">
             <button type="submit" style="margin-left: -5px; height: 40px; width: 30px;"><i class="fa fa-search"></i></button>
            
            </form>
          <button id="myBtn" class="btn_action"><b>Request Certificate</b></button>
          </div>


            <table id="user" style="background-color: white; width: 100%;">
            <thead>
              <tr>
                
                <th><b>Full Name</b></b></th>
                <th><b>Date</b></th>
                <th><b>Contact No.</b></th>
                <th><b>Email Address</b></th>
                <th><b>Address</b></th>
              </tr>
            </thead>
            <tbody id="myTable">
            <?php
                    $conn = mysqli_connect('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm');
                    $squery = mysqli_query($conn, "SELECT * FROM clearance p left join users r on r.id = p.user_id WHERE r.id = ".$user_data['id']." ");
                     if(mysqli_num_rows($squery) > 0)
                      {
                      while($row = mysqli_fetch_array($squery))
                      {
                       echo '
                          <tr>
                              <td>'.$row['fullname'].'</td>
                              <td>'.$row['date'].'</td>
                              <td>'.$row['contact'].'</td>
                              <td>'.$row['email'].'</td>
                              <td>'.$row['adds'].'</td>
                          </tr>
                          ';

                          }
                      }
                      else{
                        echo '
                          <tr>
                            <td colspan="5" style="text-align: center;">No record found</td>
                          </tr>
                          ';
                      }                            
            ?>

          </table>
        </div>
      </main>

      <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content" style="background-color: #0D7F05; margin-top: -50px;">
          <span class="close">&times;</span>
          <p class="sign"><b>REQUEST CERTIFICATE OF RESIDENCY</b></p>
        </div>
          <form action="residency_crud.php" method="post">
              <div class="container_s">
                <div class="row">
                    <div class="column">
                      <input type="hidden" name="user_id"  value="<?php echo $user_data['id']?>">
                      <label>Full Name:</label><span><input type="text" name="fullname" required=""> </span>
                      <label>Address:</label><span><input type="text" name="adds" required=""> </span>
                      <label>Contact No.:</label><span><input  type="text" name="contact" readonly="" value="<?php echo $user_data['contact']?>"></span>
                    </div>

                    <div class="column">
                        <label>Date:</label><span><input type="date" name="date" required=""></span>
                        <label>Email:</label><span><input  type="text" name="email" readonly="" value="<?php echo $user_data['email']?>"></span>
                    </div>
                    <button class="button_emp" type="submit" name="save">REQUEST</button>
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
          <div class="sidebar__link">
            <i class="fa fa-wrench"></i>
            <a href="User_profile.php">My Profile</a>
          </div>
          <div class="sidebar__link active_menu_link">
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