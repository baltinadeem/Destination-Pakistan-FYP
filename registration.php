<!DOCTYPE html>

<html lang="en">
<head>
  
    <title>Registration.php</title>
</head>
<body>
<?php
$user=$_POST['accountType'];
switch ($user)
{
case "Tourist":
header("Location:touristRegistration.html");
break;
case "Tour Operator":
header("Location:tourRegistration.html");
break;
case "Transport Manager":
header("Location:transportRegistration.html");
break;
case "Hotel Manager":
header("Location:hotelRegistration.html");
break;
case "Admin":
header("Location:adminRegistration.html");
break;
default:
header("Location:registration.html");
}
 ?>

</body>
</html>