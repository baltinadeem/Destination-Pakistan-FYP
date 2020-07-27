<?php
session_start();
$id=$_SESSION['id'];
    if(($_SESSION['accountType'])!='Tour Operator')
    {
     echo "<script>
alert('Please login to the System');
window.location.href='login.html';
</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>welcome-Tour Operator</title>
<link href="login.css" rel="stylesheet" type="text/css" media="all" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style="background-image:none">
<div class="row">
<div class="col-md-1">
<div class="sidebar">
  <a class="active" href="welcometour.php">Home</a>
  <a href="addpackage.html">Add Packages</a>
  <a href="touraccount.php">Account</a>
  <a href="notifications.php">Notifications</a>
  <a style="color:red"  href="logout.php">Logout</a>
</div>
</div>
  <div class="col-md-10">
<?php

if(isset($_GET['msg'])){
	echo " <div style='margin-left:200px' class='alert alert-success alert-dismissible'>
    <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Success!</strong> Package added Successfully.
  </div>";
}
$_GET['msg']=null;
if(isset($_GET['update'])){
	echo " <div style='margin-left:200px' class='alert alert-info alert-dismissible'>
    <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Updated!</strong> Package details updated Successfully.
  </div>";
}
$_GET['update']=null;
if(isset($_GET['delete'])){
  echo " <div style='margin-left:200px' class='alert alert-danger alert-dismissible'>
    <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Deleted!</strong> Package Deleted Successfully.
  </div>";
}
$_GET['delete']=null;
?>
<div align="center" class="content">
  <h2><strong>TOUR OPERATOR MANAGEMENT</strong></h2>
  <p>Welcome To Destination Pakistan <br>Dear Tour Operator you are very valuable for us as we treat you as a guest.</p>
  
  <h3>List of Packages you have registered</h3>
   <div class="table-responsive"> 
  <table class="table table-striped" colspan="2" border="2">
   <tr>
    <th>
      Package Name
    </th>
    <th>
     Destination City
      </th>
    
    <th>
     No of Days
    </th>
    <th>
      Price
    </th>
    <th>
      Contact Number
    </th>
    <th>
      Description
    </th>
    <th>
    </th>
    <th>
    </th>
  </tr>
    <?php
    
    include("config.php");
     $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
     if(!$db){
   die("Connection Error");
}
$sql = "SELECT * FROM `Package` where `to_id`=$id";
      $result = mysqli_query($db, $sql);
if(mysqli_num_rows($result)>0)
{
  while($row = mysqli_fetch_assoc($result))
  {
echo "<tr><td>".$row['name']."</td>";
echo "<td>".$row['destinationCity']."</td>";
echo "<td>".$row['noOfDays']."</td>";
echo "<td>".$row['price']."</td>";
echo "<td>".$row['contactNumber']."</td>";
echo "<td>".$row['description']."</td>";
echo "<td><a href='editpackage.php?edit=".$row['id']."' class='btn btn-info'>Edit</a></td>";
echo "<td><a onclick='return deleteMessage()' href='deletepackage.php?delete=".$row['id']."' class='btn btn-danger'>Delete</a></td>";
  }
}
  ?>

  </table>
</div>
</div>
</div>
</div>
</body>
<script type="text/javascript">
    function deleteMessage() {
            if (confirm("Are You Sure You want to Delete.Data will be lossed").valueOf("OK")
                )
            {
            
            return true;
        }

            else
            return false;
     
        }
  
</script>
</html>