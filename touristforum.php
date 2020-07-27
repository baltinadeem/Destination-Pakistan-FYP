<?php
session_start();
$id=$_SESSION['id'];
    if($_SESSION['accountType']!='Tourist')
    {
     echo "<script>
alert('Please login to the System');
window.location.href='login.html';
</script>";
    }
?>

<!DOCTYPE html>

<html lang="en" >
<head>
  <link href="tourist.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
    
    <title>Tourit Forum</title>

</head>
<body style="background-image: none;">
<div class="row">
<div class="col-md-1">
<div class="sidebar">
  <a  href="welcometourist.php">Home</a>
  <a class="active" href="touristforum.php">Tourist Forum</a>
  <a   href="posttouristforum.php">Post</a>
  <a href="touristaccount.php">Account</a>
  <a href="notifications.php">Notifications</a>
  <a style="color:red"  href="logout.php">Logout</a>
</div>
</div>
<div class="col-md-1">
    </div>
<div class="col-md-9">
   <?php
  if(isset($_GET['msg'])){
  echo " <div  class='alert alert-success alert-dismissible'>
    <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Success!</strong> Your Review Posted Successfully.
  </div>";}

  $_GET['msg']=null;

?>
     
                <h2>Tourist Forum</h2>
                <hr>
                <h4>Amazing experiences and Reviews of our valuable tourist shared with everyone.</h4>
                <hr>
               
 <?php
    
    include("config.php");
     $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
     if(!$db){
   die("Connection Error");
}
$sql = "SELECT * FROM `forum`";
      $result = mysqli_query($db, $sql);
if(mysqli_num_rows($result)>0)
{
  while($row = mysqli_fetch_assoc($result))
  {

   echo"<div class='card'>
  <h5 class='card-header' style='background-color:forestgreen; color:white;'>".$row['displayName']."<p style='text-align: right;'> ".$row['time']." </p> </h5>
  <div class='card-body'>
    <h5 class='card-title'>".$row['topicName']."</h5>
    <p class='card-text'>".$row['details']."</p>
   
  </div>
</div>
<br>
<br>";


  }
}
  ?>


</div>
              
</body>
</html>