<?php

$mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$name = '';
$date = '';
$time = '';
$location = '';
$contact = '';
$email = '';
$status = '';
$user_id = '';

if(isset($_POST['save'])){
	$name = $_POST['name'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$location = $_POST['location'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$status = $_POST['status'];
	$user_id = $_POST['user_id'];

	$mysqli->query("INSERT INTO scheduling (user_id, name, date, time, location, contact, email, status) VALUES ('$user_id', '$name','$date','$time','$location','$contact','$email','$status')") or die($mysqli->error);

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header ("Location: Scheduling.php");
}
