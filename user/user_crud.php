<?php

$mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$image = '';
$firstname = '';
$lastname = '';
$username = '';
$password = '';
$contact = '';
$bday = '';
$email = '';
$address = '';


if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;

	$query = "SELECT * FROM users WHERE id=?";
	$stmt=$mysqli->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result=$stmt->get_result();
	$row = $result->fetch_assoc();

		$image = $row['image'];
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$username = $row['username'];
		$password = $row['password'];
		$contact = $row['contact'];
		$bday = $row['bday'];
		$email = $row['email'];
		$address = $row['address'];
}

if (isset($_POST['update'])) {

	$target = "../admin/images/users/".basename($_FILES['image']['name']);

	$conn = mysqli_connect('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm');

	$id = $_POST['id'];
	$image = $_FILES['image']['name'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$bday = $_POST['bday'];
	

	$mysqli->query("UPDATE users SET image='$image', firstname='$firstname', lastname='$lastname', username='$username', password='$password', contact='$contact', email='$email', address='$address', bday='$bday' WHERE id=$id") or die($mysqli->error());

	header("Location: User_profile.php"); 
	
	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $_SESSION['message'] = "Record has been updated!";

    	header("Location: User_profile.php");  
    }else{
      $_SESSION['msg_type'] = "There was a problem in uploading evenet";
    }
}