<?php

$mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$image = '';
$fullname = '';
$date = '';
$contact = '';
$email = '';
$adds = '';
$user_id = '';

if(isset($_POST['save'])){
	$fullname = $_POST['fullname'];
	$date = $_POST['date'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$adds = $_POST['adds'];
	$user_id = $_POST['user_id'];

	$mysqli->query("INSERT INTO clearance (user_id, fullname, date, contact, email, adds) VALUES ('$user_id','$fullname','$date','$contact','$email','$adds')") or die($mysqli->error);

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header ("Location: residency.php");
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM clearance WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header ("Location: residency.php");
}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;

	$query = "SELECT * FROM clearance WHERE id=?";
	$stmt=$mysqli->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result=$stmt->get_result();
	$row = $result->fetch_assoc();

		$user_id = $row['user_id'];
		$fullname = $row['fullname'];
		$date = $row['date'];
		$contact = $row['contact'];
		$email = $row['email'];
		$adds = $row['adds'];
}

if (isset($_POST['update'])) {

	$id = $_POST['id'];
	$user_id = $_POST['user_id'];
	$fullname = $_POST['fullname'];
	$date = $_POST['date'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$adds = $_POST['adds'];

	$mysqli->query("UPDATE clearance SET user_id='$user_id', fullname='$fullname', date='$date', contact='$contact', email='$email', adds='$adds' WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";

	header("Location: residency.php");
}