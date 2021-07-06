<?php

$mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$image = '';
$agenda = '';
$date = '';
$time = '';
$details = '';


if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM announcements WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header ("Location: announcement.php");
}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;

	$query = "SELECT * FROM announcements WHERE id=?";
	$stmt=$mysqli->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result=$stmt->get_result();
	$row = $result->fetch_assoc();

		$image = $row['image'];
		$agenda = $row['agenda'];
		$date = $row['date'];
		$time = $row['time'];
		$details = $row['details'];
		
}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$image = $_FILES['image']['name'];
	$agenda = $_POST['agenda'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$details = $_POST['details'];
	

	$mysqli->query("UPDATE announcements SET image='$image', agenda='$agenda', date='$date', time='$time', details='$details' WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";

	header("Location: announcement.php");
}