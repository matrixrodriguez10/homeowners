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
$email = '';
$address = '';
$bday = '';
$position = '';


if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM employee WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header ("Location: employees_record.php");
}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;

	$query = "SELECT * FROM employee WHERE id=?";
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
		$email = $row['email'];
		$address = $row['address'];
		$bday = $row['bday'];
		$position = $row['position'];
}

if (isset($_POST['update'])) {

	$target = "images/employee/".basename($_FILES['image']['name']);

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
	$position = $_POST['position'];

	$mysqli->query("UPDATE employee SET image='$image', firstname='$firstname', lastname='$lastname', username='$username', password='$password', contact='$contact', email='$email', address='$address', bday='$bday', position='$position' WHERE id=$id") or die($mysqli->error());

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $_SESSION['message'] = "Record has been updated!";

    	header("Location: employees_record.php");  
    }else{
      $_SESSION['msg_type'] = "warning";
      header("Location: employees_record.php");
    }
}