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
    <title>Announcements</title>
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
          <a href="work_order.php">Maintenance</a>
          <a class="active_link" href="announcement.php">Events</a>
          <a href="invoice.php">Payment</a>
        </div>
      </nav>

      <main>
        <div class="table_contadiner">	
          <div class="card-header" id="user">
            <p style="float: left; font-size: 30px;">Announcements</p>
            <form  action="#" style=" float: left;">
              
              <input type="search" placeholder="Search.." name="search2" id="myInput" style="width: 350px; height: 40px; margin-left: 50px;">
             <button type="submit" style="margin-left: -5px; height: 40px; width: 30px;"><i class="fa fa-search"></i></button>
            
            </form>
              <button id="myBtn" style="height: 40px; width: 80px; background-color: #fff; color: green; margin-left: 5%; border-radius: 10px;"><b>Create</b></button>
          </div>
<?php
  $mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM announcements") or die($mysqli->error);
  //pre_r($result);
?>

<?php
  if(isset($_SESSION['message'])): ?>

  <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    ?>
  </div>
  <?php endif ?>

    <style>
        
    #img_div {
      width: 70%;
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
      width: 320px;
      height: 180px;
      
    }

    </style>

            <table id="user" style="background-color: white; width: 100%;">
          <thead>
              <tr style="background-color: #ccc;">
                <th><h3>Details</h3></th>
                <th><h3>Action</h3></th>
              </tr>
          </thead>

        <tbody id="myTable">
        <?php
          while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td>
                  
                  <?php echo "<img src='images/".$row['image']."' >"; ?>
                  <h3><?php echo $row['agenda']; ?></h3><br>
                  <?php echo $row['date']; ?> &nbsp;
                  <?php echo $row['time']; ?> <br><br>
                  <?php echo $row['details']; ?>

                </td>
                <td colspan="2">
                  <a href="Announcement_edit.php?edit=<?php echo $row['id']; ?>"><i class="fa fa-edit text-edit" title="Update"></i></a>
                  
                  <a href="announcement_crud.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to Delete this info?');"><i class="fa fa-remove text-remove" title="Delete"></i></a></a>
                </td>
              </tr>
            <?php endwhile; ?>
          </table>
        </div>
      </main>

<?php
  
  $msg = "";
  //if upload button is pressed
  if(isset($_POST['upload'])) {

    //the path to store the upload image
    $target = "images/".basename($_FILES['image']['name']);

    // connect to database
    $conn = mysqli_connect('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm');

    // Get all the submitted data from the form
    $image = $_FILES['image']['name'];
    $agenda = $_POST['agenda'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $details = $_POST['details'];

    $sql = "INSERT INTO announcements (image, agenda, date, time, details) VALUES ('$image', '$agenda', '$date', '$time', '$details')";
    mysqli_query($conn, $sql);

    // Uploaded images into the folder: images
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Event Successfully Posted";

      //header("Location: announcement.php");
    }else{
      $msg = "There was a problem in uploading evenet";
    }
  }

?>

      <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content" style="background-color: #0D7F05;">
          <span class="close">&times;</span>
          <p class="sign"><b>CREATE ANNOUNCEMENT</b></p>
        </div>
          <form action="announcement.php" method="post" enctype="multipart/form-data">
              <div class="create_announcement">
                <div class="row">
                    <div class="column" style="width: 50%;">
                      <div src="#" class="img_emp"><img id="pic" /></div>
                      <input type="hidden" name="size" value="1000000">
                      <div style="margin-left: 20px;"><input type='file' name="image" onchange="readURL(this);" /></div>
                    </div>
                    <div class="column" style="width: 50%;">
                      <label>Agenda:</label><span><input type="text" name="agenda"> </span>
                      <label>Date:</label><span><input type="text" name="date"></span>
                      <label>Time:</label><span><input type="text" name="time"></span>
                      <label>Details:</label><span><textarea name="details"></textarea> </span>
                    </div>
                    <button class="button_emp" type="submit" name="upload" value="Upload"><i class="fa fa-floppy-o" aria-hidden="true"></i> CREATE</button>                  
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
          <div class="sidebar__link active_menu_link">
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