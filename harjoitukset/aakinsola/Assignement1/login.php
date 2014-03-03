<!DOCTYPE HTML>
<html>
   <body>
	<title>Simple Login Form</title>
	<div><p> Please complete the form below </p>
	<form action="welcome.php" method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
	Username:  <input type = "text" username = "email"><br>
	Password: <input type = "password" name = "pwd"><br>
	<input type = "submit" value = "Enter">
	</form>
	</div> 
   </body>
</html>
