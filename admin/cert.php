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
            height:27.94cm;
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

<?php require_once 'residency_crud.php'; ?>

<?php
  $mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM clearance WHERE id=$id") or die($mysqli->error);
  //pre_r($result);
?>
      <table class="tbl" cellspacing="20px;">
      <tr>
            <td><img src="images/logo.png" style="width: 100px; height: 100px;"></td>
            <td><span>Republic of the Philippines<br><span>Municipality of San Antonio Valley 2</span> <br><span> Subdivsion Sucat Paranaque City</span></td>
            <td><img src="images/logo_sav2.png" style="width: 100px; height: 100px; border-radius: 50px;"></td>
      </tr>
      </table>

<?php while ($row = $result->fetch_assoc()): ?>

      <br><br><br><br>
       <div style="text-align: center;"><span style="font-size:50px; font-weight:bold;  ">Certificate of Residency</span></div>
       <br><br><br><br>
       <span><b>TO WHOM IT MAY CONCERN:</b></span>
       <br><br><br>
       <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that <u><b><?php echo $row['fullname']; ?></b></u>, of legal age, Filipino citizen, is a <b>PERMANENT RESIDENT</b> of this San Antonio Valley 2 Subdivision, Sucat Paranaque City.</span><br/><br/><br>

       <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Based on records of this office, he/she has been residing at <u><b><?php echo $row['adds']; ?></b></u> San Antonio Valley 2 Subdivision, Sucat Paranaque City.</span> <br/><br/><br>
       <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This <b>CERTIFICATION</b> is being issued upon the request of the above-named person for whatever legal purpose it may serve.</span> <br/><br/><br>
       <span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issued this <b><span id="date"></span></b>, at San Antonio Valley 2 Subdivision, Sucat Paranaque City, Philippines.</span> <br><br><br><br><br><br><br><br>
       
       <div style="text-align: right; margin-right: 20px;">
       <span>__________________</span><br>
       <span>Homeowners Official</span>
       </div>
       <br><br><br><br>
       <span style="font-size: 15px;">**NOTE**<br> Not Valid Without Dry Seal</span><br><br>

<?php endwhile; ?>

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