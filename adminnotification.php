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

<title>Admin Notification</title>
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

<div class="col-md-5">
<?php

if(isset($_GET['msg'])){
  echo " <div style='margin-left:200px' class='alert alert-success alert-dismissible'>
    <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Success!</strong> Notice send Successfully.
  </div>";
}
$_GET['delete']=null;
?>
  <div class="content">
  
  
  <h3>Send Notifications to Users.</h3>
<br> <br>
         
            <form   onsubmit="return check(this)" action="processadminnotification.php" method="post">
              Select Account Type of the User:
              <br>
               <input class="form-control" list="accountType" name="accountType" placeholder="Select Account Type" required="required">
               <datalist id="accountType">
    <option value="Tourist">
    <option value="Admin">
    <option value="Hotel Manager">
    <option value="Tour Operator">
    <option value="Transport Manager">
  </datalist>
               <br> <hr>

              Enter email of User:
              <br> 
              
                <input class="form-control" type="email" name="email" placeholder="Email"  />
               <br> 
              <h2 style="color: blue;"> OR</h2>
                 <br>
                User ID:
                <input class="form-control" type="number" name="tid" placeholder="id of User" />
              <br><hr>
           
                Detail Notifiaction:
          <textarea class="form-control" rows="8" cols="80" name="textarea" placeholder="Your notice goes here..." required="required"></textarea>
          <br>
  <button class='btn btn-primary'>Send Notice</button>
                
            </form>
        





</div>
</div>
</div>
</div>
</body>
<script type="text/javascript">
  function check(form){
if(form.email.value =='' && form.id.value =='')
{  
  alert("Enter either Email or id of the User")
  return false;
}
else{
  return true;
  }
}
</script>
</html>