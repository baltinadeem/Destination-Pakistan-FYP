<!DOCTYPE html>

<html lang="en">
<head>
   <meta  content="width=device-width, initial-scale=1.0">
<title>edithotel</title>
<link href="login.css" rel="stylesheet" type="text/css" media="all" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="row">
<?php
session_start();
    if($_SESSION['accountType']!='Tour Operator')
    {
     echo "<script>
alert('Please login to the System');
window.location.href='login.html';
</script>";
    }
include("config.php");

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
     $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
     if(!$db){
   die("Connection Error");
}
$sql = "SELECT * FROM `package` where `id`='$id'";
      $result = mysqli_query($db, $sql);
      $n = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)==1)
{
    
      
$name=$n['name'];
$desc=$n['description'];
$city=$n['destinationCity'];
$days=$n['noOfDays'];
$price=$n['price'];
$cont=$n['contactNumber'];
$id=$n["id"];
}
}
?>

  <div class="col-md-1">
	<div class="sidebar">
  <a  href="welcometour.php" >Home</a>
  <a href="addpackage.html">Add Packages</a>
  <a class="active" href="edithotel.php">Edit Packages</a>
  <a href="touraccount.php">Account</a>
  <a style="color:red"  href="logout.php">Logout</a>
  
</div>
</div>
<div class="col-md-10">
	<div class="content">
	<br>
  <h2 style="margin-left: 100px ">Edit Hotel Details </h2>
 <div style="margin-left:200px" class="login-page" >
        <div class="form">
            <form onsubmit="return check(this)" action="processeditpackage.php" method="post" >
       <input type="hidden" name="id" value="<?php echo $id; ?>">
       Name:
                <input type="text" name="name" value="<?php echo $name; ?>"  required="required"/>

            Destination City:    
                <input type="text" name="destinationCity" value="<?php echo $city; ?>"  required="required"/>
                No of Days:
                <input type="Number" name="noOfDays" value="<?php echo $days; ?>" />
                Price:
                <input type="Number" name="price" value="<?php echo $price; ?>" />
               Contact Number:
                <input type="Number" name="contactNumber" value="<?php echo $cont; ?>" maxlength="12">
                Description:
                <textarea class="content"  name="description" rows="5" cols="35"> <?php echo $desc; ?> </textarea>
              <button class="btn btn-info">Edit Package</button>
                
            </form>
        </div>
    </div>
  </div>
</div>
</div>
<div class="col-md-2">
  </div>
</div>
</body>
<script type="text/javascript">
function check(form)
{
tr= parseInt(form.noOfdays.value);
 ar= parseInt(form.price.value);

if( ( tr< 0) || (ar< 0) )
{
  alert("Enter a positive Number");
  return false;

}
 else{

 return true;
}
 }
</script>
</html>
