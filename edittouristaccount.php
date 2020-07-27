<?php
session_start();
    if((!isset($_SESSION['id']))&&($_SESSION['acountType']!='Tourist'))
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
<title>Edit Tourist Account</title>
<link href="login.css" rel="stylesheet" type="text/css" media="all" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="row">
<div class="col-md-1">
<div class="sidebar">
 <a  href="welcometourist.php">Home</a>
  <a  href="touristaccount.php">Account</a>
  <a class="active" href="edittouristaccount.php">Edit Account</a>
  <a style="color:red"  href="logout.php">Logout</a>
</div>
</div>
  <div class="col-md-10">

<div align="center" class="content">
  
  
  <h3>Edit Your Account Details</h3>
  
    
  
  
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
  
$fname=$row['fullname'];
$email=$row['email'];
$age=$row['age'];
$pass=$row['password'];
$cnic=$row['cnic'];
$num=$row['number'];

}
}else
{
	echo "Login Error";
}


?>
 <div class="form">
            <form onsubmit="return check(this)" action="processeditttouristaccount.php" method="post" >
       <input type="hidden" name="id" value="<?php echo $id; ?>">
          Full Name:
                <input type="text" name="fname" value="<?php echo $fname; ?>" required="required"/>
          Email:
                <input type="email" name="email" value="<?php echo $email; ?>"  required="required"/>
          CNIC:
          <input type="text" name="cnic" value="<?php echo $cnic; ?>" required="required">
          Age:<input type="Number" name="age" value="<?php echo $age; ?>" required="required"/>
          Contact Number:
          <input type="number" name="number" value="<?php echo $num; ?>" required="required"/>
          Password:
          <input type="password" name="password1" value="<?php echo $pass; ?>" required="required"/>
          Confirm Password:      
          <input type="password" name="password2" value="<?php echo $pass; ?>" required="required">
          
            <button type='submit'>Edit Account </button>    
            </form>


</div>
</div>
</div>
</body>
<script>
            function check(form) {
                password1 = form.password1.value;
                password2 = form.password2.value;
                age = form.age.value;
               

                p1len = password1.length;
                if (age < 1){
                  alert("\nPlease Enter a valid Age")
                    return false;
                }
               
                // If password not entered 
               else if (password1 == '')
                    alert("Please enter Password");

                // If confirm password not entered 
                else if (password2 == '')
                    alert("Please enter confirm password");

                // If Not same return False.     
                
                 else if (p1len < 8){
                  alert("\nPlease Choose a Strong password atleast 8 characters");
                    return false;
                }
                else if (password1 != password2) {
                    alert("\nPassword did not match: Please try again...");
                    return false;
                }
                

                // If same return True. 
                else {
                    
                    return true;
                }
            } 
            
        </script>
</html>