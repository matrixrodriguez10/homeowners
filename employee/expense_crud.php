<?php

session_start();

$mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$category = '';
$payment = '';
$dpay = '';

if(isset($_POST['save'])){
	$category = $_POST['category'];
    $payment = $_POST['payment'];
    $dpay = $_POST['dpay'];


	$mysqli->query("INSERT INTO expense (category, payment, dpay) VALUES ('$category','$payment','$dpay')") or die($mysqli->error);

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header ("Location: expense.php");
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM expense WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header ("Location: expense.php");
}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;

	$query = "SELECT * FROM expense WHERE id=?";
	$stmt=$mysqli->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result=$stmt->get_result();
	$row = $result->fetch_assoc();

		$category = $row['category'];
		$payment = $row['payment'];
		$dpay = $row['dpay'];
		
}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$category = $_POST['category'];
	$payment = $_POST['payment'];
	$dpay = $_POST['dpay'];

	$mysqli->query("UPDATE expense SET category='$category', payment='$payment', dpay='$dpay' WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";

	header("Location: expense.php");
}