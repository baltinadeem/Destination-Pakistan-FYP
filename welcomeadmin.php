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
<html>
<head>

<title>welcome admin</title>
<link href="tourist.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="row">
<div class="col-md-1">
<div class="sidebar">
  <a class="active" href="welcomeadmin.php">Home</a>
  <a href="adminaccount.php">Account</a>
  <a href="notifications.php">Notifications</a>
  <a style="color:red"  href="logout.php">Logout</a>
</div>
</div>

<div class="col-md-11">
  <div class="content">
  <h2>Admin Panel</h2>
  <p>All tools needed to manage all tourist and other users.</p>
  
  <h3>Admin Servies</h3>

<br> <br>
  <div class="row">
  <div class="col-sm-6 mb-3 mb-md-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Complaints</h5>
        <p class="card-text">View and resolve tourist complaints.</p>
        <a href="trackcomplaint.php" class="btn btn-primary">Track Complaint</a>
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
        <p class="card-text">Manage the tourist forum </p>
        <a href="admintouristforum.php" class="btn btn-primary">Go To Tourist Forum</a>
      </div>
    </div>
  </div>
</div>
<br> <br>
 <div class="row">
  <div class="col-sm-6 mb-3 mb-md-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Generate Notificatoins </h5>
        <p class="card-text">Send Notifications to users manually</p>
        <a href="adminnotification.php" class="btn btn-primary">Notification Page</a>
      </div>
    </div>
  </div>

  



</div>
</div>
</div>
</div>
</body>

</html>