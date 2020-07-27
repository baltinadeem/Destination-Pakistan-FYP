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





// Create connection
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$text= $_POST['textarea'];
$text= mysqli_real_escape_string($conn,$text);
$topic=$_POST['topic'];
$name=$_POST['name'];
$sql = "INSERT INTO `forum` (`id`, `details`, `topicName`, `tourist_id`, `time`, `displayName`) VALUES (NULL, '$text', '$topic', '$id', current_timestamp(), '$name');";


if ($conn->query($sql) === TRUE) {
   header('Location: touristforum.php?msg=posted');
	exit();

}
else{
	echo "error".$conn->error;
}

$conn->close();
?>