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
<html>
<head>

<title>welcome tourist</title>
<link href="tourist.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="row">
<div class="col-md-1">
<div class="sidebar">
  <a class="active" href="welcometourist.php">Home</a>
  <a href="touristaccount.php">Account</a>
  <a href="notifications.php">Notifications</a>
  <a style="color:red"  href="logout.php">Logout</a>
</div>
</div>

<div class="col-md-11">
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
  <div class="content">
  <h2>Tourist Panel</h2>
  <p>Dear Tourist you are very valuable for us as we treat you as a guest.</p>
  
  <h3>Explore Pakistan with our Services</h3>

<br> <br>
  <div class="row">
  <div class="col-sm-6 mb-3 mb-md-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Complaints</h5>
        <p class="card-text">You can Register any complaint and trace it here.</p>
        <a href="touristcomplaint.php" class="btn btn-primary">Register Complaint</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Currency Converter</h5>
        <p class="card-text">You can convert foreign to local(PKR) and local to foreign currencies here.</p>
        <a href="currencyconverter.php" class="btn btn-primary">Convert Now</a>
      </div>
    </div>
  </div>
</div>
<br> <br>
 <div class="row">
  <div class="col-sm-6 mb-3 mb-md-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Search </h5>
        <p class="card-text">You can Search for Hotels, Vehicles, Packages and Destinations here</p>
        <a href="index.html" class="btn btn-primary">Search Page</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Tourist Forum</h5>
        <p class="card-text">Share your experices with other tourist here.</p>
        <a href="touristforum.php" class="btn btn-primary">Go To Tourist Forum</a>
      </div>
    </div>
  </div>
</div>





</div>
</div>
</div>
</div>
</body>

</html>