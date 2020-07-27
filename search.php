<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="login.css" rel="stylesheet" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="background-color: black">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand"  href="index.html"><i>(dpk)</i><b>Destination Pakistan</b></a>
            </div>
            <ul class="nav navbar-nav">
                <li ><form style="margin-top:3.5% "class="form-inline" action="search.php" required="yes">
    <input class="form-control mr-sm-2" name="valueToSearch"type="text" placeholder="Search">
    <button class="btn btn-success" type="submit">Search</button></form></li>
            
            </ul>
                
            
            
  </form></li>
            <ul class="nav navbar-nav navbar-right">
      <li><a href="registration.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </nav>
        </div>
    </ul>

<body>
<?php
include("config.php");
$valueToSearch=$_GET['valueToSearch'];
$noresults=0;
if($valueToSearch!=null)
{
 $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
     if(!$db){
   die("Connection Error");
}



$sql = "SELECT * FROM `hotel` WHERE CONCAT(`name`,`address`,`city`,`description`)LIKE '%".$valueToSearch."%'order by `name`";
      $result = mysqli_query($db, $sql);
      
      

if(mysqli_num_rows($result)>0)
{
  while($row = mysqli_fetch_assoc($result))
  {
    echo"
   <div class='panel panel-default'style='margin-left:2% ;max-width: 80%'>
  <h5 class='panel-heading'>".$row['name']."<p style='text-align: right;'>Hotel</p></h5>
  <div class='panel-body'>
    <h5 class='card-title'>City: ".$row['city']."</h5>
    <p class='card-text'>Address: ".$row['address']."</p>
    <p class='card-text'>Available Rooms ".$row['noOfAvailableRooms']."</p>
    <p class='card-text'>Price Range : ".$row['minPrice']." Rupees to ".$row['maxPrice']." Rupees</p>
    <p class='card-text'>Contact Number: ".$row['contactNumber']."</p>
    <p class='card-text'>Details:<br>".$row['description']."</p>
    
  </div>
</div>  "; 
}
}
else{
  $noresults++;
}
$sql2= "SELECT * FROM `vehicle` WHERE CONCAT(`name`,`description`)LIKE '%".$valueToSearch."%'order by `name`";
$result2 = mysqli_query($db, $sql2);
if(mysqli_num_rows($result2)>0)
{
  while($row2 = mysqli_fetch_assoc($result2))
  {
    echo"
   <div class='panel panel-default'style='margin-left:2% ;max-width: 80%'>
  <h5 class='panel-heading'>".$row2['name']."<p style='text-align: right;'>Vehicle</p></h5>
  <div class='panel-body'>
    <h5 class='card-title'>Color: ".$row2['color']."</h5>
    <p class='card-text'>Model: ".$row2['model']."</p>
    <h5 class='card-title'>Availibility: ".$row2['availability']."</h5>
    <h5 class='card-title'>Price: ".$row2['price']." Rupess Per Hour</h5>
    <p class='card-text'>Contact Number: ".$row2['contactNumber']."</p>
    <p class='card-text'>Details:<br>".$row2['description']."</p>
    
  </div>
</div>  "; 
}
}
else{
$noresults++;
}
$sql3= "SELECT * FROM `package` WHERE CONCAT(`name`,`destinationCity`,`description`)LIKE '%".$valueToSearch."%'order by `name`";
$result3 = mysqli_query($db, $sql3);
if(mysqli_num_rows($result3)>0)
{
  while($row3 = mysqli_fetch_assoc($result3))
  {
    echo"
   <div class='panel panel-default'style='margin-left:2% ;max-width: 80%'>
  <h5 class='panel-heading'>".$row3['name']."<p style='text-align: right;'>Package</p></h5>
  <div class='panel-body'>
    <h5 class='card-title'>Destination City : ".$row3['destinationCity']."</h5>
    <h5 class='card-title'>Duration : ".$row3['noOfDays']." days</h5>
    <h5 class='card-title'>Price: ".$row3['price']." Rupees</h5>
    <p class='card-text'>Contact Number: ".$row3['contactNumber']."</p>
    <p class='card-text'>Details:<br>".$row3['description']."</p>
    
  </div>
</div>  "; 
}
}
else{
  $noresults++;
}
if($noresults==3){
  echo"<strong> No Results Found </strong>";
}
}
else{
  echo"<strong> Enter Some values To Search </strong>";
}
?>
    
  </body>
</html>

  

