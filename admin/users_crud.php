<?php

$mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));

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


if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM users WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header ("Location: User.php");
}

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
		$address = $row['address'];
		$gender = $row['gender'];
		$bday = $row['bday'];
		$email = $row['email'];
		$contact = $row['contact'];
}

if (isset($_POST['update'])) {

	$target = "images/users/".basename($_FILES['image']['name']);

	$id = $_POST['id'];
	$image = $_FILES['image']['name'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$bday = $_POST['bday'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];

	$mysqli->query("UPDATE users SET image='$image', firstname='$firstname', lastname='$lastname', username='$username', password='$password', address='$address', gender='$gender', bday='$bday', email='$email', contact='$contact' WHERE id=$id") or die($mysqli->error());

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $_SESSION['message'] = "Record has been updated!";
      header("Location: User.php");
    //header("Location: User.php");  
    }else{
      $_SESSION['msg_type'] = "warning";
      header("Location: User.php");
    }

}

if (isset($_GET['mail'])){
	$id = $_GET['mail'];
	$update = true;

	$query = "SELECT * FROM users WHERE id=?";
	$stmt=$mysqli->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result=$stmt->get_result();
	$row = $result->fetch_assoc();

		$email = $row['email'];
		
}
