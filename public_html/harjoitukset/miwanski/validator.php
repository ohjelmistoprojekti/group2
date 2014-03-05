<?
	session_start();

	
	// 	Class: validator
	//	Handles:	The user login validation process 
	//				and user authentication and privileges
	class validator
	{
		//	Function:	checkLogin
		//	Handles:	Checks if the user is logged in. If not, 
		//				send back to login with error report
		function checkLogin($priviledges = false)
		{
			if(strlen($_SESSION['username']) == 0)
			{
				$_SESSION['login_failed'] = "How the F**K did u get here without login?? Back to your hole, u scum";
				header('location:login.php');
			}
			
			if($priviledges)
			{
				//Check if the user has priviledges to THIS page/function/functionality
			}
		}
		
		//	Function:	validate
		//	Handles:	Login validating, database connection, comparing,
		//				session data storing and possible error reporting
		//	Requires:	User given username and password
		function validate($user, $pass)
		{
			//	Function:	emailCheck
			//	Handles:	Checks if the user given username is an email
			//	Requires:	User given email
			function emailCheck($x)
			{
				$email = $x;

				$dots = 0;
				$atsign = 0;

				for ($k=0; $k < strlen($email); $k++)
				{
					if ($email[$k] == '@')
					{
						$atsign = 1;
						break;
					}
				}

				for ($k=0; $k < strlen($email); $k++)
				{
					if ($email[$k] == '.')
					{
					  $dots += 1;
					  break;
					}
				}

				if ($dots < 1 || $atsign != 1)
				   return 0;
				else
				   return 1;
			}
			
			if(!emailCheck($user))
			{
				$_SESSION['login_failed'] = "The username is not an email.";
				header('location:login.php');
			}
		
			//Connects to db
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
			
			//Login matches
			if($pw_hash == $userData['password'])
			{
				$_SESSION['login_failed'] = null;
				$_SESSION['username'] = $username;
				header('location:login_success.php');
			}
			//Login Fails
			else
			{
				$_SESSION['login_failed'] = "The username or password is invalid.";				
				header('location:login.php');
			}
			mysql_close($con);
		}
	}
?>