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
$res=$_POST['textarea'];
$act=$_POST['action'];
$cid=$_POST['id'];
     $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
     if(!$db){
   die("Connection Error");
}
$sql = "UPDATE `complaints` SET `actions` = '$act', `response` = '$res' WHERE `complaints`.`id` = '$cid';";

if (mysqli_query($db, $sql)) {
 header('Location: trackcomplaint.php?resolve=yes');
  exit();
} else {
  echo "Error updating record: " . mysqli_error($db);
}

  ?>

 
  
</body>
</html>