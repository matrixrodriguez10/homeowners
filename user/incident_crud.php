<?php

$mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$name = '';
$date = '';
$time = '';
$location = '';
$contact = '';
$category = '';
$description = '';

$user_id = '';

if(isset($_POST['save'])){
	$name = $_POST['name'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$location = $_POST['location'];
	$contact = $_POST['contact'];
	$category = $_POST['category'];
	$description = $_POST['description'];
	
	$user_id = $_POST['user_id'];

	$mysqli->query("INSERT INTO incident (user_id, name, date, time, location, contact, category, description) VALUES ('$user_id', '$name','$date','$time','$location','$contact','$category','$description')") or die($mysqli->error);

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header ("Location: incident_record.php");
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM incident WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header ("Location: incident_record.php");
}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;

	$query = "SELECT * FROM incident WHERE id=?";
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
		$description = $row['description'];
}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$location = $_POST['location'];
	$contact = $_POST['contact'];
	$description = $_POST['description'];

	$mysqli->query("UPDATE incident SET name='$name', date='$date', time='$time', location='$location', contact='$contact', description='$description' WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";

	header("Location: incident_record.php");
}