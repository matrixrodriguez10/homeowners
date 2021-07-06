<?php

//$host = "localhost";
//$dbUsername = "root";
//$dbPassword = "";
//$dbname = "capstonedb";

	$host = "remotemysql.com";
	$dbUsername = "J5BJ2ZlQGm";
	$dbPassword = "FYAvWP4mmz";
	$dbname = "J5BJ2ZlQGm";

	if(!$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbname))
	{
		die("failed to connect!");
	}

?>