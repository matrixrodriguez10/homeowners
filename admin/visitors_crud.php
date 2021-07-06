<?php

$mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$name = '';
$date = '';
$time = '';
$contact = '';
$relation = '';
$homename = '';



if(isset($_POST['save'])){
	$name = $_POST['name'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$contact = $_POST['contact'];
	$relation = $_POST['relation'];
	$homename = $_POST['homename'];


	$mysqli->query("INSERT INTO visitors (name, date, time, contact, relation, homename) VALUES ('$name','$date','$time','$contact','$relation','$homename')") or die($mysqli->error);

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header ("Location: visitors_record.php");
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM visitors WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header ("Location: visitors_record.php");
}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;

	$query = "SELECT * FROM visitors WHERE id=?";
	$stmt=$mysqli->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result=$stmt->get_result();
	$row = $result->fetch_assoc();

		$name = $row['name'];
		$date = $row['date'];
		$time = $row['time'];
		$contact = $row['contact'];
		$relation = $row['relation'];
		$homename = $row['homename'];
		
}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$contact = $_POST['contact'];
	$relation = $_POST['relation'];
	$homename = $_POST['homename'];

	$mysqli->query("UPDATE visitors SET name='$name', date='$date', time='$time', contact='$contact', relation='$relation', homename='$homename' WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";

	header("Location: visitors_record.php");
}