<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>hotelRegistration.php</title>
</head>
<body>

<?php
include("config.php");
$fname=$_POST['fullname'];
$email=$_POST['email'];
$cnic=$_POST['cnic'];
$age=$_POST['age'];
$pass=$_POST['password2'];

if($fname!=null && $email!=null && $pass!=null && $age!=null && $cnic!=null )
{

// Create connection
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `hotel manager` (`id`, `fullname`, `email`, `password`, `cnic`, `age`) VALUES (NULL, '$fname', '$email', '$pass', '$cnic', '$age')";
$last_id = $conn->insert_id;
if ($conn->query($sql) === TRUE) {
 
	echo "<script>
alert(' Account Created Sucessfully.Please login to the System');
window.location.href='login.html';
</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	}
	else{
	echo "<h2>Incorrect/Incomplete Data Entered.</h2>";
	}
    ?>

</body>
</html>