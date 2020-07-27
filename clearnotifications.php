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
    $id = $_SESSION['id'];
    $email = $_SESSION['email'];
     $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
     if(!$db){
   die("Connection Error");
}
$sql = "DELETE FROM `notification` WHERE `to_id` = '$id' or `to_email`='$email'";
      if (mysqli_query($db, $sql)) {
    header("Location:notifications.php?cleared='yes'");
} else {
    echo "Error deleting record: " . mysqli_error($db);
}

mysqli_close($db);


?>
