<?
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>

<fieldset >
<legend>Login</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>

<label for='username' >Username:</label>
<input type='text' name='username' id='username' maxlength="50" />

<label for='password' >Password:</label>
<input type='password' name='password' id='passowrd' maxlength="50" />

<input type='submit' name='Submit' value='Submit' />
</fieldset>
</form>
-->

	<div id="container">       
		<form id='login' action='login_check.php' method='post' accept-charset='UTF-8'>
			<label for="username">Username:</label>
			<input type="text" id="username" name="username">

			<label for="password">Password:</label>
			<input type="password" id="password" name="password">
			<div id="lower">
			<input type="submit" value="Login">
			</div>
		</form>
		<?php
			//Just in case if something went wrong
			if(strlen($_SESSION['login_failed']) > 0)
			{
				echo "<font color='red'>".$_SESSION['login_failed']."</font>";;
			}
		?>
	</div>

</body>
</html>

