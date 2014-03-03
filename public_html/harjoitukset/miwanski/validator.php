<?
function validate($x)
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

if ($dots < 1 || $atsign == 0)

   echo "<br> This is not a valid email address";
else

   echo "<br> This is a valid email address";
}
?>
