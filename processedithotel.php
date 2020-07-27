<?php
session_start();
    if($_SESSION['accountType']!='Hotel Manager')
    {
     echo "<script>
alert('Please login to the System');
window.location.href='login.html';
</script>";
    }
include("config.php");
 if($_POST){
$id=$_POST['id'];
$hname=$_POST['name'];
$desc=$_POST['description'];
$city=$_POST['city'];
$tr=$_POST['noOfRooms'];
$ar=$_POST['noOfAvailableRooms'];
$mxp=$_POST['maxPrice'];
$mnp=$_POST['minPrice'];
$add=$_POST['address'];
$cont=$_POST['contactNumber'];

if($hname!=null && $desc!=null && $city!=null && $tr!=null && $ar!=null && $add!=null && $cont!=null && $mxp!=null && $mnp!=null && $id!=null )
{

// Create connection
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE `hotel` SET `name`='$hname', `address`='$add', `description`='$desc', `city`='$city', `noOfRooms`='$tr', `noOfAvailableRooms`='$ar', `contactNumber`='$cont', `maxPrice`='$mxp', `minPrice`='$mnp' WHERE id=$id";
$last_id = $conn->insert_id;

if ($conn->query($sql) === TRUE) 
{
  header('Location: welcomehotel.php?update=update');
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