<html>
<head>
</head>
<body>
<?PHP
class userValidation {
	private $defaultLogin = 'etunimi.sukunimi@abc.fi'; // "tietokannassa"
	private $defaultPassword = 'pellepeloton112'; //"tietokannassa"

	public function Validate() {
	$username = $_POST['username'];
			$salt = 'abg4';
					$pw_hashed = hash('sha256' ,$salt.$defaultPassword);					
	
		if (filter_var($username, FILTER_VALIDATE_EMAIL) && 
			($username == $this->defaultLogin) && ($username !=NULL) &&($pw_hashed == hash('sha256', $salt.$_POST['password'])) {
				echo 'Well done, Viljami.';
			else
				echo 'Ketuiks män.';
		}
	}
}
?>
</body>
</html>
