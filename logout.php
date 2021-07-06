<?php

session_start();

	if(isset($_SESSION['username_id'])){

		unset($_SESSION['user_id']);
	}

	header("Location: ../home/login.php");
	die;