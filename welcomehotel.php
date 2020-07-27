<?php
session_start();
$id=$_SESSION['id'];
    if($_SESSION['accountType']!='Hotel Manager')
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

<title>welcome-HotelManager</title>
<link href="login.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style="background-image:none">
<div class="row">
<div class="col-md-1">

<div class="sidebar">
  <a class="active" href="welcomehotel.php">Home</a>
  <a href="addHotel.html">Add Hotels</a>
  <a href="hotelaccount.php">Account</a>
  <a href="notifications.php">Notifications</a>
  <a style="color:red"  href="logout.php">Logout</a>
</div>
</div>
  <div class="col-md-10">

<div align="center" class="content">
  <?php

if(isset($_GET['msg'])){
  echo " <div style='margin-left:200px' class='alert alert-success alert-dismissible'>
    <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Success!</strong> Hotel added Successfully.
  </div>";
}
$_GET['msg']=null;
if(isset($_GET['update'])){
  echo " <div style='margin-left:200px' class='alert alert-info alert-dismissible'>
    <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Updated!</strong> Hotel details updated Successfully.
  </div>";
}
$_GET['update']=null;
if(isset($_GET['delete'])){
  echo " <div style='margin-left:200px' class='alert alert-danger alert-dismissible'>
    <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Deleted!</strong> Hotel Deleted Successfully.
  </div>";
}
$_GET['delete']=null;
?>
  <h2><strong>HOTEL MANAGEMENT</strong></h2>
  <p>Welcome To Destination Pakistan <br>Dear Hotel Manager you are very valuable for us as we treat you as a guest.</p>
  
  <h3>List of Hotels you have registered</h3>
   
   <div class="table-responsive"> 
  <table class="table table-striped" colspan="2" border="2">
   <tr>
    <th>
      Hotel Name
    </th>
    <th>
      Address
      </th>
      <th>
      City
    </th>
    <th>
      Total Rooms
    </th>
    <th>
      Available Rooms
    </th>
    <th>
      Maximum Price
    </th>
    <th>
      Minimum Price
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
$sql = "SELECT * FROM `hotel` where `hm_id`='$id'";
      $result = mysqli_query($db, $sql);
if(mysqli_num_rows($result)>0)
{
  while($row = mysqli_fetch_assoc($result))
  {
echo "<tr><td>".$row['name']."</td>";
echo "<td>".$row['address']."</td>";
echo "<td>".$row['city']."</td>";
echo "<td>".$row['noOfRooms']."</td>";
echo "<td>".$row['noOfAvailableRooms']."</td>";
echo "<td>".$row['maxPrice']."</td>";
echo "<td>".$row['minPrice']."</td>";
echo "<td>".$row['contactNumber']."</td>";
echo "<td>".$row['description']."</td>";
echo "<td><a href='edithotel.php?edit=".$row['id']."' class='btn btn-info'>Edit</a></td>";
echo "<td><a onclick='return deleteMessage()' href='deletehotel.php?delete=".$row['id']."' class='btn btn-danger'>Delete</a></td>";
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
            if (confirm("Are You Sure You want to Delete Data will be lossed").valueOf("OK")
                )
            {
            
            return true;
        }

            else
            return false;
     
        }
  
</script>
</html>