<?php
session_start();
    if(($_SESSION['id'])=='')
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
$sql = "DELETE FROM `notification` WHERE `notification`.`id` = '$id'";
      if (mysqli_query($db, $sql)) {
    header("Location:notifications.php?delete='deleted'");
} else {
    echo "Error deleting record: " . mysqli_error($db);
}

mysqli_close($db);
}

?>
