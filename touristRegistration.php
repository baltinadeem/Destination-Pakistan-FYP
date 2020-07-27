<!DOCTYPE html>

<html lang="en">
<head>
 <title>touristRegistration.php.php</title>
</head>
<body>
<?php
include("config.php");
$fname=$_POST['fullname'];
$email=$_POST['email'];
$cnic=$_POST['cnic'];
$age=$_POST['age'];
$pass=$_POST['password2'];
$num=$_POST['number'];
if($fname!=null && $email!=null && $pass!=null && $age!=null && $cnic!=null && $num!=null){

// Create connection
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `tourist` (`id`, `fullname`, `email`,`number`,  `cnic`, `age`, `password`) VALUES (NULL, '$fname', '$email','$num','$cnic', '$age', '$pass');";
$last_id = $conn->insert_id;
session_start();
$_SESSION['id']=$last_id;
if ($conn->query($sql) === TRUE) {
  echo "<script>
alert(' Account Created Sucessfully.Please login to the System');
window.location.href='login.html';
</script>";
} else {
    echo "Error:" . $conn->error;
}

$conn->close();
	}
	else{
	echo "<h2>Incorrect/Incomplete Data Entered.</h2>";
	}
    ?>

</body>
</html>