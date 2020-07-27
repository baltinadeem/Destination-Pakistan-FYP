<?php
session_start();
    if($_SESSION['accountType']!='Transport Manager')
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
$color=$_POST['color'];

$price=$_POST['price'];
$model=$_POST['model'];
$availability=$_POST['availability'];
$cont=$_POST['contactNumber'];

$id=$_POST['id'];

if($name!=null && $desc!=null && $color!=null && $price!=null && $model!=null && $availability!=null && $cont!=null && $id!=null )
{

// Create connection
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE `vehicle` SET `name` = '$name', `color` = '$color', `model` = '$model', `availability` = '$availability', `description` = '$desc', `price` = '$price', `contactNumber` = '$cont' WHERE `vehicle`.`id` = '$id'";
$last_id = $conn->insert_id;

if ($conn->query($sql) === TRUE) 
{
  header('Location: welcometransport.php?update=update');
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