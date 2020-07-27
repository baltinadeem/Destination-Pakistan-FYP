<?php
session_start();
    if($_SESSION['accountType']!='Hotel Manager')
    {
     echo "<script>
alert('Please login to the System');
window.location.href='login.html';
</script>";
    }
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>addhotel.php</title>
</head>
<body>
<?php

include("config.php");


$hname=$_POST['name'];
$desc=$_POST['description'];
$city=$_POST['city'];
$tr=$_POST['noOfRooms'];
$ar=$_POST['noOfAvailableRooms'];
$mxp=$_POST['maxPrice'];
$mnp=$_POST['minPrice'];
$add=$_POST['address'];
$cont=$_POST['contactNumber'];
$id=$_SESSION["id"];

if($hname!=null && $desc!=null && $city!=null && $tr!=null && $ar!=null && $add!=null && $cont!=null && $mxp!=null && $mnp!=null && $id!=null )
{

// Create connection
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `hotel` (`id`, `name`, `description`, `address`, `city`, `noOfRooms`, `noOfAvailableRooms`, `contactNumber`, `status`, `hm_id`, `maxPrice`, `minPrice`) VALUES (NULL, '$hname', '$desc ', '$add', '$city', '$tr', '$ar', '$cont', NULL, '$id','$mxp','$mnp')";
$last_id = $conn->insert_id;

if ($conn->query($sql) === TRUE) {
	header('Location: welcomehotel.php?msg=success');
	exit();
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