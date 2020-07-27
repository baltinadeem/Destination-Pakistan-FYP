<!DOCTYPE html>

<html lang="en">
<head>
   <meta  content="width=device-width, initial-scale=1.0">
<title>edithotel</title>
<link href="login.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
include("config.php");

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
     $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
     if(!$db){
   die("Connection Error");
}
$sql = "SELECT * FROM `hotel` where `id`='$id'";
      $result = mysqli_query($db, $sql);
      $n = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)==1)
{
    
      
          $name=$n['name'];
          $address=$n['address'];
          $city=$n['city'];
          $noOfRooms=$n['noOfRooms'];
          $noOfAvailableRooms=$n['noOfAvailableRooms'];
          $maxPrice=$n['maxPrice'];
          $minPrice=$n['minPrice'];
          $contactNumber=$n['contactNumber'];
          $description=$n['description'];
}
}

?>

	<div align="top"class="sidebar">
  <a  href="welcomeHotel.php" >Home</a>
  <a href="addhotel.html">Add Hotels</a>
  <a class="active" href="edithotel1.php">Edit Hotels</a>
  
  <a href="#relatedwebsite.html">Related Websites</a>
</div>

	<div class="content">
	<br>
  <h2 style="margin-left: 100px ">Edit Hotel Details </h2>
 <div style="margin-left:200px" class="login-page" >
        <div class="form">
            <form onsubmit="return check(this)" action="processedithotel.php" method="post" >
       <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="text" name="name" value="<?php echo $name; ?>" required="required"/>

                <input type="text" name="address" value="<?php echo $address; ?>"  required="required"/>
                <input type="text" name="city" value="<?php echo $city; ?>"  required="required"/>
                <input type="Number" name="noOfRooms" value="<?php echo $noOfRooms; ?>" />
                <input type="Number" name="noOfAvailableRooms" value="<?php echo $noOfAvailableRooms; ?>" />
                <input type="Number" name="maxPrice" value="<?php echo $maxPrice; ?>" />
                <input type="Number" name="minPrice" value="<?php echo $minPrice; ?>" />
                <input type="tel" name="contactNumber" value="<?php echo $contactNumber; ?>">
                <textarea class="content" value="<?php echo $description; ?>" name="description" rows="5" cols="35"></textarea>
              <button class="btn btn-info">Edit Hotel</button>
                
            </form>
        </div>
    </div>
  </div>
</body>
<script type="text/javascript">
function check(form)
{
if( (form.noOfRooms.value < 0) || (form.noOfAvailableRooms.value < 0) || (form.maxPrice.value < 0) || (form.minPrice.value < 0) )
{
  alert("Enter a positive Number");
  return false;

}
else if (form.noOfRooms.value < form.noOfAvailableRooms.value)
  {
    alert("Total Number of Rooms can not be less than No of Available Rooms");
    return false;
  }
  else if(form.maxPrice.value < form.minPrice.value)
  {
    alert("Maximum Price can not be less than Minimum Price");
    return false;
  }
 return true;
 }
</script>
</html>
