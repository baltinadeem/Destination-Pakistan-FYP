<!DOCTYPE html>

<html lang="en">
<head>
   <meta  content="width=device-width, initial-scale=1.0">
<title>editvehicle</title>
<link href="login.css" rel="stylesheet" type="text/css" media="all" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="row">
<?php
session_start();
    if($_SESSION['accountType']!='Transport Manager')
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
$sql = "SELECT * FROM `vehicle` where `id`='$id'";
      $result = mysqli_query($db, $sql);
      $n = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)==1)
{
    
      
          
$name=$n['name'];
$desc=$n['description'];
$color=$n['color'];

$price=$n['price'];
$model=$n['model'];
$availability=$n['availability'];
$cont=$n['contactNumber'];

}
}

?>

  <div class="col-md-1">
	<div class="sidebar">
  <a  href="welcometransport.php" >Home</a>
  <a href="addvehicle.html">Add Hotels</a>
  <a class="active" href="editvehicle.php">Edit Hotels</a>
  <a href="transportaccount.php">Account</a>
  <a style="color:red"  href="logout.php">Logout</a>
  
</div>
</div>
<div class="col-md-10">
	<div class="content">
	<br>
  <h2 style="margin-left: 100px ">Edit Vehicle Details </h2>
 <div style="margin-left:200px" class="login-page" >
        <div class="form">
            <form onsubmit="return check(this)" action="processeditvehicle.php" method="post" >
       <input type="hidden" name="id" value="<?php echo $id; ?>">
         Vehicle Name:
                <input type="text" name="name" value="<?php echo $name; ?>"  required="required"/>

             Vehicle Color:  <input type="text" name="color" value="<?php echo $color; ?>"  required="required"/>
             Vehicle Model:
                <input type="Number" name="model" value="<?php echo $model; ?>"  maxlength="4" required="required"/>
                Availability:
                <input type="text" name="availability" value="<?php echo $availability; ?>" />
                Price:
                <input type="Number" name="price" value="<?php echo $price; ?>" />
                Contact Number:
                <input type="Number" name="contactNumber" value="<?php echo $cont; ?>">
                <textarea class="content" placeholder="Hotel Description" name="description" rows="5" cols="35"><?php echo $desc; ?>
              </textarea>
              <button class="btn btn-primary">Edit Vehicle</button>
                
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
tr= parseInt(form.noOfRooms.value);
 ar= parseInt(form.noOfAvailableRooms.value);
 mxp=parseInt(form.maxPrice.value);
 mnp=parseInt(form.minPrice.value);
if( ( tr< 0) || (ar< 0) || (mxp < 0) || (mnp < 0) )
{
  alert("Enter a positive Number");
  return false;

}
else if (tr < ar)
  {

    alert("Total Number of Rooms can not be less than No of Available Rooms");
    return false;
    
  }
  else if(mxp < mnp)
  {
    
    alert("Maximum Price can not be less than Minimum Price");
    return false;
    
  }else{

 return true;
 }
}
</script>
</html>
