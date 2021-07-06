<?php  
      //export.php  
 if(isset($_POST["export"]))  
 {  
      $conn = mysqli_connect('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm');  
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=employee_list.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('user_id' ,'username', 'password', 'firstname', 'lastname', 'contact', 'email', 'address', 'bday', 'position', 'image'));  
      $query = "SELECT * from employee ORDER BY id DESC";  
      $result = mysqli_query($conn, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  