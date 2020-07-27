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
    <title>hotelRegistration.php</title>
</head>
<body>
<?php
include("config.php");


$name=$_POST['name'];
$desc=$_POST['description'];
$color=$_POST['color'];

$price=$_POST['price'];
$model=$_POST['model'];
$availability=$_POST['availability'];
$cont=$_POST['contactNumber'];
$id=$_SESSION["id"];

if($name!=null && $desc!=null && $color!=null && $price!=null && $model!=null && $availability!=null && $cont!=null && $id!=null )
{

// Create connection
$conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `vehicle` (`id`, `name`, `color`, `model`, `status`, `availability`, `tm_id`, `description`, `price`, `contactNumber`) VALUES (null, '$name', '$color', '$model', '', '$availability', '$id', '$desc', '$price', '$cont')";
$last_id = $conn->insert_id;

if ($conn->query($sql) === TRUE) {
	header('Location: welcometransport.php?msg=success');
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