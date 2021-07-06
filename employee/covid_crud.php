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
