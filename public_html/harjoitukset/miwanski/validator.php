<?
	$invalidcredentials;
	$loginsuccess;
	function validator($user, $pass)
	{
		$con = mysql_connect("10.177.3.206", "miwanski", "doofLLAB2601");
		$db_select = mysql_select_db("Group2", $con);
		$username = $user;
		$pw = $pass;
		$salt = 'oprj';
		$pw_hash = sha1($salt.$pw);
		$sql = "SELECT * FROM members
				WHERE email = '$username'";
		$result = mysql_query($sql, $con);

		$userData = mysql_fetch_array($result, MYSQL_ASSOC);
		if($pw_hash == $userData['password'])
		{
			return 1;
			// header('Location: home_success.php');
		}
		else
		{
			return 0;
		}
		mysql_close($con);
	}
	
	
?>