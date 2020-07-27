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
  <link href="touristcomplaint.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
    
    <title>tourist Complaints</title>

</head>
<body>
<div class="row">
<div class="col-md-1">
<div class="sidebar">
  <a  href="welcometourist.php">Home</a>
  <a  class="active" href="touristcomplaint.php">Complaints</a>
  <a   href="addcomplaint.php">Add Complaints</a>
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
    <strong>Success!</strong> Complaint Registered Sucessfully.
  </div>";}

  $_GET['msg']=null;

?>
                <h2>Tourist Complaint Panel</h2>
                To add Complaint click below<br>
               <a href="addcomplaint.php"> <button class="btn btn-primary">Add Complaints </button> </a>
                 <br><br>
                 <h2>Complaint History </h2>

     <div class="table-responsive"> 
  <table class="table table-striped" colspan="2" border="2">
   <tr>
    <th>
      Complaint ID
    </th>
    <th>
      Type
      </th>
      <th>
      Details
    </th>
    <th>
      Time
    </th>
    <th>
      Actions
    </th>
    
     <th>
     Response
    </th>
    
    
  </tr>
    <?php
    
    include("config.php");
     $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
     if(!$db){
   die("Connection Error");
}
$sql = "SELECT * FROM `complaints` where `tourist_id`='$id' ";
      $result = mysqli_query($db, $sql);
if(mysqli_num_rows($result)>0)
{
  while($row = mysqli_fetch_assoc($result))
  {
echo "<tr><td>".$row['id']."</td>";
echo "<td>".$row['type']."</td>";
echo "<td>".$row['details']."</td>";
echo "<td>".$row['time']."</td>";
echo "<td>".$row['actions']."</td>";
echo "<td>".$row['response']."</td>";


  }
}
  ?>

  </table>

</div>
        
    </div>

  
</body>
</html>