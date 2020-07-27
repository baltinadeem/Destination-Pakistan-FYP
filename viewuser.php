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

?>

<!DOCTYPE html>

<html lang="en" >
<head>
  <link href="touristcomplaint.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
    
    <title>view user info</title>

</head>
<body>
<div class="row">
<div class="col-md-1">
<div class="sidebar">
  <a  href="welcomeadmin.php">Home</a>
  <a  href="trackcomplaint.php">Track Complaints</a>
  <a  class="active" href="viewuser.php">User Info</a>
  <a href="adminaccount.php">Account</a>
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
               
                 <h2>User Info </h2>
<br><br>
     <div class="table-responsive"> 
  <table class="table table-striped" colspan="2" border="2">
   <tr>
    <th>
      Tourist ID
    </th>
    <th>
      Full Name
      </th>
      <th>
      Email Address
    </th>
    <th>
      Contact Number
    </th>
    <th>
      CNIC
    </th>
    <th>
    Age
    </th>
   
    
  </tr>
    <?php
    if (isset($_GET['id'])) {
    $tid = $_GET['id'];
    include("config.php");
     $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
     if(!$db){
   die("Connection Error");
}
$sql = "SELECT * FROM `tourist` where `id`='$tid' ";
      $result = mysqli_query($db, $sql);
if(mysqli_num_rows($result)>0)
{
  while($row = mysqli_fetch_assoc($result))
  {
echo "<tr><td>".$row['id']."</td>";
echo "<td>".$row['fullname']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['number']."</td>";
echo "<td>".$row['cnic']."</td>";
echo "<td>".$row['age']."</td>";

  }
}
}
  ?>

  </table>

</div>
        
    </div>

  
</body>
</html>