<?php
	session_start();
	include 'validator.php';

	validator::validate($_POST['username'], $_POST['password']);
	
?>