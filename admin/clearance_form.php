<!DOCTYPE html>
<html>
<head>
    <title>Certificate of Residency</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<style>
    @media print {
        .noprint {
        visibility: hidden;
         }
    }
    @page { size: auto;  margin: 1mm; }
</style>
    <body  style="padding-left: 0; padding-top: 0; padding-right: 10%; background: #ccc;">

<?php require_once 'invoice_crud.php'; ?>

<?php
  $mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM invoice WHERE id=$id") or die($mysqli->error);
  //pre_r($result);
?>

        
        <div  style="margin-left: 5px; background: white;">

            <div style="padding: 10px;">  
        <?php
          while ($row = $result->fetch_assoc()): ?>

                <br><br>
                <p style="text-align: center;">Republic of the Philippines<p>
                <p style="text-align: center;">Paranaque City<p>
                <p style="text-align: center;">Municipality of San Antonio Valley 2<p>
                <p style="text-align: center;">Subdivion, Scuat Paranaque City<p>

                <br><br><br>
                <p style="font-size: 30px; margin-left: 28%;"><b>CERTIFICATE OF RESIDENCY</b></p>

                <br><br><br>
                <p style="margin-left: 60px;"><b>TO WHOM IT MAY CONCERN:</b></p>
                <br>
                <p style="margin-left: 140px; margin-bottom:10px;"> This is to certify that <b><?php echo $row['pby']; ?></b>, of legal age, married, Filipino citizen,</p>
                <p style="margin-bottom:10px; margin-left: 60px;"> whose specimen signature appears below, is a <b> PERMANENT RESIDENT </b> of this Barangay</p>
                <p style="margin-left: 60px;"> San Antonio Valley 2, Sucat Paranaque City.</p>

                <br>
                <p style="margin-left: 120px; margin-bottom:10px;">Based on records of this office, He/She has been residing at Barangay San Antonio </p>
                <p style="margin-left: 60px;"> Valley 2 Subdivision, Sucat Paranaque City.</p>

                <br>
                <p style="margin-left: 120px; margin-bottom:10px;">This <b>CERTIFICATE</b> is being issued upon the request at the aboved-named person</p>
                <p style="margin-left: 60px;"> for whatever legal purpose it may serve.</p>

                <br>
                <p style="margin-left: 120px; margin-bottom:10px;">Issued this ____ day of ___________, ________ at San Antonio Valley 2 Subdivision, Sucat</p>
                <p style="margin-left: 60px;"> Paranaque City, Philippines.</p>

                <br><br>
                <p style="margin-left: 55%;"> ___________________________ </p>
                <p style="margin-left: 60%;"> Signatured by: </p>

            <?php endwhile; ?>
            </div>   
        </div>
    <button class="btn btn-primary noprint" id="printpagebutton" onclick="PrintElem('#clearance')">Print</button>
    </body>
    


    <script>
         function PrintElem(elem)
    {
        window.print();
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        //mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        //mywindow.document.write('</head><body class="skin-black" >');
         var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        mywindow.document.write(data);
        //mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();

        printButton.style.visibility = 'visible';
        mywindow.close();

        return true;
    }
    </script>
</html>