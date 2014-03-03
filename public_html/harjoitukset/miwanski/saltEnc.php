<?
function saltEnc($x)
{
$password = $x;

$salt = 'GottaMineSomeSalt';
$pw_hash = md5($salt.$password);
echo "<br> Before MD5: ";
print ($salt.$password);
echo "<br> After MD5: ";
print ($pw_hash);
}
?>