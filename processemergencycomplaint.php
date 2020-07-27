<?php
session_start();
$id=$_SESSION['id'];

    if($_SESSION['accountType']!='Tourist')
    {
     echo "<script>
alert('Please login to the System');
window.location.href='login.html';
</script>";
    }

include("config.php");
$text=NULL;
$file=NULL;
$type="Emergency";




// Create connection
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `complaints` (`id`, `details`, `type`, `tourist_id`, `file`, `time` ) VALUES (NULL, '$text', '$type', '$id', '$file' , current_timestamp() )";


if ($conn->query($sql) === TRUE) {
   header('Location: touristcomplaint.php?msg=success');
	exit();

}

$conn->close();
?>