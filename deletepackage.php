<?php
session_start();

 if(($_SESSION['accountType'])!='Tour Operator')
    {

     echo "<script>
alert('Please login to the System');
window.location.href='login.html';
</script>";
    }
include("config.php");

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
     $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
     if(!$db){
   die("Connection Error");
}
$sql = "DELETE FROM `package` WHERE `package`.`id` = '$id'";
      if (mysqli_query($db, $sql)) {
    header("Location:welcometour.php?delete='deleted'");
} else {
    echo "Error deleting record: " . mysqli_error($db);
}

mysqli_close($db);
}

?>
