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
    
    <title>Track Complaints</title>

</head>
<body>
<div class="row">
<div class="col-md-1">
<div class="sidebar">
  <a  href="welcomeadmin.php">Home</a>
  <a  href="trackcomplaint.php">Track Complaints</a>
  <a  class="active" href="resolvecomplaint.php">Resolve Complaints</a>
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
               
                 <h3>Complaint:</h3>

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
    Tourist ID
    </th>
    <th>
    </th>
   
    
  </tr>
    <?php
    
    include("config.php");
    if (isset($_GET['id'])) {
    $cid = $_GET['id'];
     $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
     if(!$db){
   die("Connection Error");
}
$sql = "SELECT * FROM `complaints` where `id`=$cid";
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
echo "<td>".$row['tourist_id']."</td>";
echo "<td><a href='viewuser.php?id=".$row['tourist_id']."' class='btn btn-info'>View User info</a></td>";


  }
}
}
  ?>

  </table>

</div>
<br>
    <h3> Resolve above Complaint: </h3> 
    <br>
     <form  method="POST" action="processresolvecomplaint.php">

        <input type="hidden" name="id" value="<?php echo $cid; ?>">

            <textarea class="form-control" rows="8" cols="80" name="textarea" required="required"></textarea>
            <br>
            Modidy Action field:<br>
            <input class="form-control" placeholder="Submitted" name="action" type="text" maxlength="30" required="required">
            <br />
            <input class="btn btn-primary" type="submit" value="submit" />
        </form>
       <br> <br> 
        
    </div>  
    </div>

  
</body>
</html>