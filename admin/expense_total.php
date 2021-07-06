<!DOCTYPE html>
<html>
<head>
      <title></title>
<style>
      @media print {
  @page {
    margin-top: 0;
    margin-bottom: 0;
  }
  body  {
    padding-top: 1rem;
    padding-bottom: 1rem;
  }
}

      .paper{
            width: 21.59cm; 
            height: 12.59cm;
            background-color: white; 
            margin: auto; 
            padding:20px; 
            border: 10px solid #cccc;

      }
      span{
            font-size: 20px;
      }
      .tbl, .tbl span {
            margin: auto; 
            font-size: 20px; 
            text-align: center;
      }
</style>
</head>
<body>



<div style="text-align: right;"><input style="cursor: pointer;" id="printpagebutton" type="button" value="Print Certificate" onclick="printpage()"/></div>
<div class="paper">


      <table class="tbl" cellspacing="20px;">
      <tr>
            
            <td><span>San Antonio Valley 2<br><span>Expense Report</span> <br><span>For The Month Ended</span></td>
            
      </tr>
      </table>

      <br><br>
      <label style="margin-left: 5%;">Expense</label> 
      
      <br>
      <label style="margin-left: 10%;">Date:</label> <u><span id="date"></span></u>
      <br><br>
      <table style="margin-left: 15%; width:100%;">
      <?php
            $mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM expense") or die($mysqli->error);

          while ($row = $result->fetch_assoc()): ?>
              <tr>         
                  <td style="margin-left: 10%; width: 50%;"><?php echo $row['category']; ?></td>
                  <td style="margin-left: 10%; width: 50%;">&#8369 <?php echo $row['payment']; ?></td>   
              </tr>
          <?php endwhile; ?>
      
            <tr>
                  <td></td>
                  <td>__________</td>
            </tr>
      <?php
            include("config/connection.php");
            error_reporting(0);

            $query = "SELECT SUM(payment) As sum FROM expense";
            $query_result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($query_result)) {
                  $output =  $row['sum'];
            }

            $sql = "SELECT * FROM expense";
            $result = mysqli_query($conn, $sql);
      ?>
            <tr>
                  <td style="padding-left: 25%;">Total: </td>
                  <td>&#8369 <?php echo $output; ?></td>
            </tr>
      </table>
</div>




</body>
<script>
    function printpage() {
        var printButton = document.getElementById("printpagebutton");
        printButton.style.visibility = 'hidden';
        window.print()
        printButton.style.visibility = 'visible';
    }
</script>
<script>
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
</script>
</html>