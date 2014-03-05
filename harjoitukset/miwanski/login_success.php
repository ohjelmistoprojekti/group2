<?php
	session_start();
	include 'validator.php';
	validator::checkLogin();
	
?>

<html>
<body>
Login Successful
</body>
</html>