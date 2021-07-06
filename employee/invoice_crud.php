<?php

$mysqli = new mysqli('remotemysql.com', 'J5BJ2ZlQGm', 'FYAvWP4mmz', 'J5BJ2ZlQGm') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$pby = '';
$pto = '';
$date = '';
$description = '';
$amount = '';


if(isset($_POST['save'])){
	$pby = $_POST['pby'];
	$pto = $_POST['pto'];
	$date = $_POST['date'];
	$description = $_POST['description'];
	$amount = $_POST['amount'];


	$mysqli->query("INSERT INTO invoice (pby, pto, date, description, amount) VALUES ('$pby','$pto','$date','$description','$amount')") or die($mysqli->error);

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	//header ("Location: invoice.php");

	require('fpdf/fpdf.php');
    $pby = $_POST['pby'];
    $pto = $_POST['pto'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    
    $title = 'Monthly Payment';

    $pdf = new FPDF();
    $pdf -> Addpage();
    $pdf -> SetTitle($title);

    // Arial bold 15
    $pdf -> SetFont('Arial', 'B', 8);
    $w = $pdf -> GetStringWidth($title) + 6;
    //$pdf -> SetX((210-$w)/2);
    // Color of frame, background and text
    $pdf -> SetDrawColor(221, 221, 221, 1);
    $pdf -> SetFillColor(0, 0, 0, 1);
    $pdf -> SetTextColor(255,255,255,1);
    // Tickness of frame (1mm)
    $pdf -> SetLineWidth(1);
    $pdf -> Cell(100, 8, $title, 1, 0, 'C', true);
    // Line Break
    $pdf -> Ln(8);
    
    
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> Cell(100, 8, 'This is a receipt for paying the monthly due of Homeowners,', 0, 0, 'C');
    $pdf -> Ln(4);
    $pdf -> Cell(100, 8, 'Keep this copy for proof that you are already paid. Thank you..', 0, 0, 'L');
    
    $pdf -> Ln(8);
    //$w = $pdf -> GetStringWidth($description) + 6;
    
    //$pdf -> SetX((170-$w) /2 );
    $pdf -> SetTextColor(255,255,255,1);
    $pdf -> Cell(50, 8, 'Paid By: ', 1, 0, 'C', true);
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> Cell(50, 8, $pby, 1, 1, 'L');
    $pdf -> SetTextColor(255,255,255,1);
    $pdf -> Cell(50, 8, 'Paid To: ', 1, 0, 'C', true);
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> Cell(50, 8, $pto, 1, 1, 'L');
    $pdf -> SetTextColor(255,255,255,1);
    $pdf -> Cell(50, 8, 'Date: ', 1, 0, 'C', true);
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> Cell(50, 8, $date, 1, 1, 'L');
    $pdf -> SetTextColor(255,255,255,1);
    $pdf -> Cell(50, 8, 'Ammount: ', 1, 0, 'C', true);
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> Cell(50, 8, $amount, 1, 1, 'L');
    $pdf -> SetTextColor(255,255,255,1);
    $pdf -> Cell(100, 8, 'Description: ', 1, 1, 'C', true);
    $pdf -> SetTextColor(0,0,0,1);
    $pdf -> Cell(100, 15, $description, 1, 1, 'L');
    
    // Line Break
    $pdf -> Ln(2);

    $pdf -> Cell(100, 4, 'PS: Please Keep this receipt incase there is a problem ', 0, 1, 'C');
    $pdf -> Cell(100, 4, 'regarding to the payment. Thank you!', 0, 0, 'L');
    $pdf->Output();
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM invoice WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header ("Location: invoice.php");
}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;

	$query = "SELECT * FROM invoice WHERE id=?";
	$stmt=$mysqli->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result=$stmt->get_result();
	$row = $result->fetch_assoc();

		$pby = $row['pby'];
		$pto = $row['pto'];
		$date = $row['date'];
		$description = $row['description'];
		$amount = $row['amount'];
		
}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$pby = $_POST['pby'];
	$pto = $_POST['pto'];
	$date = $_POST['date'];
	$description = $_POST['description'];
	$amount = $_POST['amount'];

	$mysqli->query("UPDATE invoice SET pby='$pby', pto='$pto', date='$date', description='$description', amount='$amount' WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";

	header("Location: invoice.php");
}