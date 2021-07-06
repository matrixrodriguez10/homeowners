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
    <title>Incidents Records</title>
  </head>
  <body id="body">
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a href="User_profile.php">Management</a>
          <a class="active_link" href="incident_record.php">Security</a>
          <a href="work_order.php">Maintenance</a>
          <a href="announcement.php">Events</a>
        </div>
      </nav>

      <main>
        <div class="table_contadiner">	
          <div class="card-header" id="user">
            <p style="float: left; font-size: 30px;">Incident Records</p>
            <form  action="#" style=" float: left;">
              <input type="search" id="myInput" placeholder="Search.." name="search2" style="width: 350px; height: 40px; margin-left: 50px;">
             <button type="submit" style="margin-left: -5px; height: 40px; width: 30px;"><i class="fa fa-search"></i></button>
            </form>
              <button id="myBtn" class="btn_action"><b>Create</b></button>
          </div>
            <table id="user" style="background-color: white; width: 100%;">
              <thead>
              <tr>

                
                <th style="width: 25%;"><b>Information</b></b></th>
                <th style="width: 15%;"><b>Category</b></th>
                <th><b>Description</b></th>
                <th><b>Date</b></th>
                <th><b>Time</b></th>
                

                

              </tr>
              </thead>
              <c:forEach items="${list}" var="in">
              <tbody id="myTable"> 
              <?php
                    $conn = mysqli_connect('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm');
                    $squery = mysqli_query($conn, "SELECT * FROM incident p left join users r on r.id = p.user_id WHERE r.id = ".$user_data['id']." ");
                     if(mysqli_num_rows($squery) > 0)
                      {
                      while($row = mysqli_fetch_array($squery))
                      {
                       echo '
                          <tr>
                              <td style="text-align: left;">
                                <b>Name:</b> '.$row['name'].'<br>
                                <b>Contact:</b> '.$row['contact'].'<br>
                                <b>Location:</b> '.$row['location'].'
                              </td>
                              <td>'.$row['category'].'</td>
                              <td style="text-align: left;">'.$row['description'].'</td>
                              <td>'.$row['date'].'</td>
                              <td>'.$row['time'].'</td>
                              
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
              </c:forEach>
          </table>
        </div>
      </main>


      <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content" style="background-color: #0D7F05; margin-top: -50px;">
          <span class="close">&times;</span>
          <p class="sign"><b>CREATE INCIDENT REPORT</b></p>
        </div>
          <form action="incident_crud.php" method="post">
              <div class="container_s wow fadeInDown delay-03s">
                <div class="row">
                    <div class="column">
                      <input type="hidden" name="user_id"  value="<?php echo $user_data['id']?>">
                      <label>Name:</label><span><input type="text" name="name" required=""> </span>
                      <label>Time:</label><span><input type="text" name="time" required=""></span>
                      <label>Contact #:</label><span><input type="text" name="contact" readonly="" value="<?php echo $user_data['contact']?>"></span>
                      
                    </div>

                    <div class="column">
                      <label>Date:</label><span><input type="date" name="date" required=""></span>
                      <label>Location:</label><span><input  type="text" name="location" required=""></span>
                        <select name="category">
                          <option value="" disabled selected hidden>Category of Incident:</option>
                          <option value="Environmental Incident">Environmental Incident</option>
                          <option value="Property Damage Incident">Property Damage Incident</option>
                          <option value="Vehicle Incident">Vehicle Incident</option>
                          <option value="Fire Incident">Fire Incident</option>
                          <option value="Other">Other</option>
                        </select><br><br>
                      <label>Description of Incident:</label><span><textarea name="description" required=""></textarea> </span>

                    </div>
                    <button class="button_emp" name="save" type="submit" >CREATE</button>
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
                <form action="/action_page.php">
                  <label for="myfile">Select a file:</label>
                  <input type="file" id="myfile" name="myfile"><br><br>
                  <span><input type="submit" style="background-color: #0D7F05; width: 50%;"></span>
                </form>
              </div>
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
          <div class="sidebar__link">
            <i class="fa fa-file-pdf-o"></i>
            <a href="residency.php">Clearance</a>
          </div>
          <h2>SECURITY</h2>
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