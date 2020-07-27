<?php
session_start();
    if((!isset($_SESSION['id']))||($_SESSION['accountType']!='Tour Operator'))
    {
     echo "<script>
alert('Please login to the System');
window.location.href='login.html';
</script>";
    }
?>
<html>
<head>
<meta  content="width=device-width, initial-scale=1.0">
<title>Hotel-Manager Account</title>
<link href="login.css" rel="stylesheet" type="text/css" media="all" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="row">
<div class="col-md-1">
<div class="sidebar">
 <a  href="welcometour.php">Home</a>
  <a  href="addpackage.html">Add Packages</a>
  <a class="active" href="touraccount.php">Account</a>
  <a style="color:red"  href="logout.php">Logout</a>
</div>
</div>
  <div class="col-md-10">
  <?php
     if(isset($_GET['update'])){
  echo " <div style='margin-left:200px' class='alert alert-info alert-dismissible'>
    <a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <strong>Updated!</strong> Account details updated Successfully.
  </div>";
$_GET['update']=null;
    }
  
?>
<div align="center" class="content">
  
  
  <h3>Your Account Details</h3>
  
    <?php
   
    if(isset($_SESSION['id']))
    {
    	$id=$_SESSION['id'];
    	$account=$_SESSION['accountType'];
    
    include("config.php");
     $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
     if(!$db){
   die("Connection Error");
}
$sql = "SELECT * FROM `$account` where `id`='$id'";
      $result = mysqli_query($db, $sql);
      $row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)==1)
{
  
echo "Full Name:".$row['fullname']."<br>";
echo "Email:".$row['email']."<br>";
echo "CNIC:".$row['cnic']."<br>";
echo "Age:".$row['age']."<br>";
echo"<a href='edittouraccount.php'> <button type='submit' class='btn btn-info'>Edit Account Details </button> </a>";


}
}else
{
	echo "Login Error";
}


?>



</div>
</div>
</div>
</body>
</html>