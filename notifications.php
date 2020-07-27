<?php
session_start();
  if($_SESSION['id']=='')
    {
     echo "<script>

window.location.href='login.html';
alert('Please login to the System');
</script>";
    }


$_GET['msg']=null;
$id=$_SESSION['id'];
$account=$_SESSION['accountType'];
$email=$_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
<title>notifications</title>
<link href="login.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row">
<div class="col-md-1">
<div class="sidebar">
  <a class="active" href="notifications.php">Notifications</a>
  <a style="color:red"  href="logout.php">Logout</a>
</div>
</div>

<div class="col-md-10">
	<?php
	if(isset($_GET['cleared'])){
  echo " <div  style='margin-left:200px' class='alert alert-info alert-dismissible'>
    <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Success!</strong> All Notifications cleared.
  </div>";
}
?>
	<div class="content">
  <h2>Notifications</h2>
  <hr>
 
  
    <?php
    
    include("config.php");
     $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
     if(!$db){
   die("Connection Error");
}
$sql = "SELECT * FROM `notification` WHERE `to_email`='$email' or `to_id`='$id'";
      $result = mysqli_query($db, $sql);
if(mysqli_num_rows($result)==0){
	echo "<h3 style='color:green;'>No Notifications for You</h3>";
}   
elseif(mysqli_num_rows($result)>0)
{
	?>
	<a  href='clearnotifications.php' class='btn btn-primary' >Clear all Notifications</a>
	<br><br>
	   <div class="table-responsive"> 
  <table class="table table-striped" colspan="2" border="2">
   <tr>
    <th>
      Date and Time
    </th>
    <th>
      From
      </th>
      <th>
      Notice
    </th>
    <th>
    </th>

  </tr>
  <?php

  while($row = mysqli_fetch_assoc($result))
  {
echo "<tr><td>".$row['time']."</td>";
echo "<td>".$row['from_type']."</td>";
echo "<td>".$row['details']."</td>";

echo "<td><a  href='deletenotification.php?delete=".$row['id']."' class='btn btn-danger'>Delete</a></td>";
  }

}
  ?>

  </table>

</div>
</div>
</div>
</div>
</body>
</html>
