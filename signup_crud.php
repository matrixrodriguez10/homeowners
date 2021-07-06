<?php

$id = 0;
$update = false;
$image = '';
$firstname = '';
$lastname = '';
$username = '';
$password = '';
$address = '';
$gender = '';
$bday = '';
$email = '';
$contact = '';

  //if upload button is pressed
  if(isset($_POST['submit'])) {

    //the path to store the upload image
    $target = "../admin/images/users/".basename($_FILES['image']['name']);

    // connect to database
    $conn = mysqli_connect('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm');

    // Get all the submitted data from the form
    $image = $_FILES['image']['name'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $bday = $_POST['bday'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $user_id = random_num(10);
    $sql = "INSERT INTO users (image, firstname, lastname, username, password, bday, gender, contact, email, address) VALUES ('$image', '$firstname', '$lastname', '$username', '$password', '$bday', '$gender', '$contact', '$email', '$address')";
    mysqli_query($conn, $sql);

    
    // Uploaded images into the folder: images
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Event Successfully Posted";
      
      header("Location: login.php");
    //header("Location: login.php");  
    }else{
      $msg = "There was a problem in uploading event";
    }
  }

?>