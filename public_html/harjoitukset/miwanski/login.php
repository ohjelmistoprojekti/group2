<html>
<body>
<form id='login' action='login.php' method='post' accept-charset='UTF-8'>
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
<?
	include 'validator.php';
	include 'saltEnc.php';
	if($_POST != null)
	{
		$userdata['username'] = $_POST['username'];
		validate($userdata['username']);
		$userdata['password'] = $_POST['password'];
		echo "<pre>";
		print_r($userdata);
		saltEnc($userdata['password']);
		echo "</pre>";
	}
?>
</body>
</html>

