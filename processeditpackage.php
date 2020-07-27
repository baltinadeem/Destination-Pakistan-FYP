<?php
session_start();
    if($_SESSION['accountType']!='Tour Operator')
    {
     echo "<script>
alert('Please login to the System');
window.location.href='login.html';
</script>";
    }
include("config.php");
 if($_POST){

$name=$_POST['name'];
$desc=$_POST['description'];
$city=$_POST['destinationCity'];
$days=$_POST['noOfDays'];
$price=$_POST['price'];
$cont=$_POST['contactNumber'];
$id=$_POST["id"];

if($name!=null && $desc!=null && $city!=null && $days!=null && $cont!=null && $price!=null && $id!=null )
{

// Create connection
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE `package` SET `name` = '$name', `destinationCity` = '$city', `price` = '$price', `description` = '$desc', `noOfDays` = '$days', `contactNumber` = '$cont' WHERE `package`.`id` = $id";
$last_id = $conn->insert_id;

if ($conn->query($sql) === TRUE) 
{
  header('Location: welcometour.php?update=update');
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