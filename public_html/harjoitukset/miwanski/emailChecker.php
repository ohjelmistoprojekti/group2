<?
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
?>
