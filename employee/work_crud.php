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
$category = '';
$description = '';
$status = '';
$user_id = '';

if(isset($_POST['save'])){
	$name = $_POST['name'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$location = $_POST['location'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$category = $_POST['category'];
	$description = $_POST['description'];
	$status = $_POST['status'];
	$user_id = $_POST['user_id'];

	$mysqli->query("INSERT INTO work (user_id, name, date, time, location, contact, email, category, description, status) VALUES ('$user_id','$name','$date','$time','$location','$contact', '$email','$category','$description','$status')") or die($mysqli->error);

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	//header ("Location: work_order.php");

	require('fpdf/fpdf.php');
    $name = $_POST['name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    
    $title = 'Work & Maintenance Request Form';

    $pdf = new FPDF();
    $pdf -> Addpage();
    $pdf -> SetTitle($title);

    // Arial bold 15
    $pdf -> SetFont('Arial', 'B', 11);
    $w = $pdf -> GetStringWidth($title) + 6;
    //$pdf -> SetX((210-$w)/2);
    // Color of frame, background and text
    $pdf -> SetDrawColor(221, 221, 221, 1);
    $pdf -> SetFillColor(0, 0, 0, 1);
    $pdf -> SetTextColor(255,255,255,1);
    // Tickness of frame (1mm)
    $pdf -> SetLineWidth(1);
    $pdf -> Cell(0, 8, $title, 1, 1, 'C', true);
    // Line Break
    $pdf -> Ln(3);
    
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> Cell(200, 8, 'This form shows the scheduled request maintenance in their location, this form is created by the ', 0, 0, 'C');
    $pdf -> Ln(5);
    $pdf -> Cell(200, 8, 'homeowners officials, if request is still not notice please show this form to the officials to take action', 0, 0, 'L');
    $pdf -> Ln(5);
    $pdf -> Cell(200, 8, 'and to be able to do the requested work. Thank you..', 0, 0, 'L');
    
    $pdf -> Ln(10);

    //$w = $pdf -> GetStringWidth($description) + 6;

    //$pdf -> SetX((170-$w) /2 );
    $pdf -> SetTextColor(255,255,255,1);
    $pdf -> Cell(45, 8, 'Name: ', 1, 0, 'L', true);
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> Cell(145, 8, $name, 1, 1, 'L');
    $pdf -> SetTextColor(255,255,255,1);
    $pdf -> Cell(45, 8, 'Date: ', 1, 0, 'L', true);
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> Cell(48, 8, $date, 1, 0, 'L');
    $pdf -> SetTextColor(255,255,255,1);
    $pdf -> Cell(47, 8, 'Time: ', 1, 0, 'L', true);
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> Cell(50, 8, $time, 1, 1, 'L');
    $pdf -> SetTextColor(255,255,255,1);
    $pdf -> Cell(45, 8, 'Location: ', 1, 0, 'L', true);
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> Cell(145, 8, $location, 1, 1, 'L');
    $pdf -> SetTextColor(255,255,255,1);
    $pdf -> Cell(45, 8, 'Contact: ', 1, 0, 'L', true);
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> Cell(145, 8, $contact, 1, 1, 'L');
    $pdf -> SetTextColor(255,255,255,1);
    $pdf -> Cell(45, 8, 'Category: ', 1, 0, 'L', true);
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> Cell(145, 8, $category, 1, 1, 'L');
    
    // Line Break
    $pdf -> Ln(5);

    // Color of frame, background and text
    $pdf -> SetDrawColor(221, 221, 221, 1);
    $pdf -> SetFillColor(0, 0, 0, 1);
    $pdf -> SetTextColor(255,255,255,1);
    $pdf -> Cell(0, 8, 'Description', 1, 1, 'C', true);
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> MultiCell(0, 10, $description, 1, 1, false);
    // Line Break
    $pdf -> Ln(2);
    
    $pdf -> Cell(200, 4, 'PS: Please keep this form safe until the requested work is done. Thank you!', 0, 1, 'L');
    

    $pdf->Output();
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM work WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header ("Location: work_order.php");
}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;

	$query = "SELECT * FROM work WHERE id=?";
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
		$category = $row['category'];
		$description = $row['description'];
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
	$category = $_POST['category'];
	$description = $_POST['description'];
	$status = $_POST['status'];
	$user_id = $_POST['user_id'];


	$mysqli->query("UPDATE work SET user_id='$user_id', name='$name', date='$date', time='$time', location='$location', contact='$contact', email='$email', category='$category', description='$description', status='$status' WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";

	header("Location: work_order.php");

}

if (isset($_GET['mail'])){
	$id = $_GET['mail'];
	$update = true;

	$query = "SELECT * FROM work WHERE id=?";
	$stmt=$mysqli->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result=$stmt->get_result();
	$row = $result->fetch_assoc();

		$email = $row['email'];
		
}