<?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
      $conn = mysqli_connect('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm');  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=covid_record.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('firstname', 'lastname', 'contact', 'gender', 'email', 'address', 'date', 'temperature', 'q1', 'q2', 'q3', 'q4'));  
      $query = "SELECT * from covid ORDER BY id DESC";  
      $result = mysqli_query($conn, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  