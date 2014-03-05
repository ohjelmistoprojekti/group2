<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	include 'emailChecker.php';
	include 'validator.php';
	if($_POST != null)
	{
		$userdata['username'] = $_POST['username'];
		if(emailCheck($userdata['username']) == 0)
		{
			$notemail = '<br><font color = "red" >This is not a valid email address.</font>';
		}
		else
		{
			$userdata['password'] = $_POST['password'];
			if(validator($userdata['username'], $userdata['password']) == 1)
			{
				$loginsuccess 		= '<br><font color = "green" >Login Success!</font>';
			}
			else
			{
				$invalidcredentials = '<br><font color = "red" >Wrong username or password</font>';
			}
		}
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css">
<body>

<!------ <form id='login' action='mysql.php' method='post' accept-charset='UTF-8'>
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
<form id='login' action='login.php' method='post' accept-charset='UTF-8'>
<label for="username">Username:</label>
<input type="text" id="username" name="username">
<label for="password">Password:</label>
<input type="password" id="password" name="password">
<div id="lower">
<input type="submit" value="Login">
</div>
</form>
<?php
print $notemail; 
print $invalidcredentials;
print $loginsuccess;
?>
</div>
</body>
</html>

