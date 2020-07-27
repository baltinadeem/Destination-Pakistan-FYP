<?php
session_start();
    if($_SESSION['accountType']!='Tour Operator')
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
    <title>addpackage.php</title>
</head>
<body>
<?php

include("config.php");


$name=$_POST['name'];
$desc=$_POST['description'];
$city=$_POST['destinationCity'];
$days=$_POST['noOfDays'];
$price=$_POST['price'];
$cont=$_POST['contactNumber'];
$id=$_SESSION["id"];

if($name!=null && $desc!=null && $city!=null && days!=null && $cont!=null && $price!=null && $id!=null )
{

// Create connection
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `package` (`id`, `name`, `destinationCity`, `price`, `description`, `stauts`, `to_id`, `noOfDays`, `contactNumber`) VALUES (NULL, '$name', '$city', '$price', '$desc', '', '$id', '$days', '$cont')";
$last_id = $conn->insert_id;

if ($conn->query($sql) === TRUE) {
	header('Location: welcometour.php?msg=success');
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