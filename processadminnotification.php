<?php
session_start();
$id=$_SESSION['id'];

    if($_SESSION['accountType']!='Admin')
    {
     echo "<script>
alert('Please login to the System');
window.location.href='login.html';
</script>";
    }

include("config.php");





// Create connection
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$text= $_POST['textarea'];
$text= mysqli_real_escape_string($conn,$text);
$taccount=$_POST['accountType'];
$email=$_POST['email'];
$tid=$_POST['tid'];
$sql = "INSERT INTO `notification` (`id`, `from_type`, `to_type`, `from_id`, `to_id`, `to_email`, `time`, `details`) VALUES (NULL, 'admin', '$taccount', '$id', '$tid', '$email', current_timestamp(), '$text');";


if ($conn->query($sql) === TRUE) {
   header('Location: adminnotification.php?msg=posted');
	exit();

}
else{
	echo "error".$conn->error;
}

$conn->close();
?>