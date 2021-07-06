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

	$mysqli->query("INSERT INTO scheduling (user_id, name, date, time, location, contact, email, status) VALUES ('$user_id','$name','$date','$time','$location','$contact','$email','$status')") or die($mysqli->error);

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header ("Location: Scheduling.php");
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM scheduling WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header ("Location: Scheduling.php");
}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;

	$query = "SELECT * FROM scheduling WHERE id=?";
	$stmt=$mysqli->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result=$stmt->get_result();
	$row = $result->fetch_assoc();

		$name = $row['name'];
		$date = $row['date'];
		$time = $row['time'];
		$location = $row['location'];
		$contact = $row['contact'];
		$email = $row['email'];
		$status = $row['status'];
		$user_id = $row['user_id'];
}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$location = $_POST['location'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$status = $_POST['status'];
	$user_id= $_POST['user_id'];

	$mysqli->query("UPDATE scheduling SET user_id='$user_id', name='$name', date='$date', time='$time', location='$location', contact='$contact', email='$email', status='$status' WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";

	header("Location: Scheduling.php");
}

if (isset($_GET['mail'])){
	$id = $_GET['mail'];
	$update = true;

	$query = "SELECT * FROM scheduling WHERE id=?";
	$stmt=$mysqli->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result=$stmt->get_result();
	$row = $result->fetch_assoc();

		$email = $row['email'];
		
}
