<?php

$mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$firstname = '';
$lastname = '';
$contact = '';
$gender = '';
$email = '';
$address = '';
$date = '';
$temperature = '';
$q1 = '';
$q2 = '';
$q3 = '';
$q4 = '';


if(isset($_POST['save'])){
	$firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $temperature = $_POST['temperature'];
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];

	$mysqli->query("INSERT INTO covid (firstname, lastname, contact, gender, email, address, date, temperature, q1, q2, q3, q4) VALUES ('$firstname', '$lastname', '$contact', '$gender', '$email', '$address', '$date', '$temperature', '$q1', '$q2', '$q3', '$q4')") or die($mysqli->error);

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header ("Location: covid19_tracker.php");
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM covid WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header ("Location: covid19_tracker.php");
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
	$id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$bday = $_POST['bday'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];

	$mysqli->query("UPDATE users SET firstname='$firstname', lastname='$lastname', username='$username', password='$password', address='$address', gender='$gender', bday='$bday', email='$email', contact='$contact' WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";

	header("Location: User.php");
}