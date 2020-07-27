<?php
session_start();
    if($_SESSION['accountType']!='Tourist')
    {
     echo "<script>
alert('Please login to the System');
window.location.href='login.html';
</script>";
    }
include("config.php");
 if($_POST){
$id=$_POST['id'];
$fname=$_POST['fname'];
$email=$_POST['email'];
$age=$_POST['age'];
$num=$_POST['number'];
$pass=$_POST['password2'];


if($fname!=null && $id!=null && $email!=null && $age!=null && $num!=null && $pass!=null )
{

// Create connection
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE `tourist` SET  `fullname` = '$fname', `email` = '$email', `number` = '$num', `cnic` = '$cnic', `age` = '$age', `password` = '$pass' WHERE `tourist`.`id` = '$id';";
$last_id = $conn->insert_id;

if ($conn->query($sql) === TRUE) 
{
  header('Location: touristaccount.php?update=update');
  exit();
} 
else
 {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
  }
  else
  {
  echo "<h2>Incorrect/Incomplete Data Entered.</h2>";
  } 
}
?>