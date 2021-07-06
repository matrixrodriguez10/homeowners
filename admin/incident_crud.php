<?php

$mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$name = '';
$date = '';
$time = '';
$location = '';
$contact = '';
$description = '';
$category = '';
$user_id = '';


if(isset($_POST['save'])){
	$name = $_POST['name'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$location = $_POST['location'];
	$contact = $_POST['contact'];
	$description = $_POST['description'];
    $category = $_POST['category'];
    $user_id = $_POST['user_id'];


	$mysqli->query("INSERT INTO incident (user_id, name, date, time, location, contact, category, description) VALUES ('$user_id','$name','$date','$time','$location','$contact','$category','$description')") or die($mysqli->error);

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	//header ("Location: incident_record.php");

	require('fpdf/fpdf.php');
    $name = $_POST['name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    
    $title = 'Incident Report';

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
    $pdf -> Ln(5);
    
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> MultiCell(190, 5, 'Note: Use this form to report accidents, injuries, medical situation, or residents behavior incidents. All physical items related to the incident such as bills, invoices, photograph, and building materials, should be retained in secure location with the chain of custody of those items properly documented.', 0, 0);
    $pdf -> Ln(5);
    //$w = $pdf -> GetStringWidth($description) + 6;
    
    //$pdf -> SetX((170-$w) /2 );
    $pdf -> SetTextColor(255,255,255,1);
    $pdf -> Cell(45, 8, 'Name: ', 1, 0, 'C', true);
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> Cell(145, 8, $name, 1, 1, 'L');
    $pdf -> SetTextColor(255,255,255,1);
    $pdf -> Cell(45, 8, 'Date: ', 1, 0, 'C', true);
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> Cell(48, 8, $date, 1, 0, 'L');
    $pdf -> SetTextColor(255,255,255,1);
    $pdf -> Cell(47, 8, 'Time: ', 1, 0, 'C', true);
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> Cell(50, 8, $time, 1, 1, 'L');
    $pdf -> SetTextColor(255,255,255,1);
    $pdf -> Cell(45, 8, 'Location: ', 1, 0, 'C', true);
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> Cell(145, 8, $location, 1, 1, 'L');
    $pdf -> SetTextColor(255,255,255,1);
    $pdf -> Cell(45, 8, 'Contact: ', 1, 0, 'C', true);
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> Cell(145, 8, $contact, 1, 1, 'L');
    $pdf -> SetTextColor(255,255,255,1);
    $pdf -> Cell(45, 8, 'Category: ', 1, 0, 'C', true);
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
    $pdf -> Ln(5);
    
    // Color of frame, background and text
    

    $pdf->Output();
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
        $category = $row['category'];
		$description = $row['description'];
		$user_id = $row['user_id'];
        
}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$location = $_POST['location'];
	$contact = $_POST['contact'];
    $category = $_POST['category'];
	$description = $_POST['description'];
	$user_id = $_POST['user_id'];
    

	$mysqli->query("UPDATE incident SET user_id='$user_id', name='$name', date='$date', time='$time', location='$location', contact='$contact', category='$category', description='$description' WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";

	header("Location: incident_record.php");

}