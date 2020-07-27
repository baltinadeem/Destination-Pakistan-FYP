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

<html lang="en" >
<head>
  <link href="tourist.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
    
    <title>POST on Tourit Forum</title>

</head>
<body>
<div class="row">
<div class="col-md-1">
<div class="sidebar">
  <a  href="welcometourist.php">Home</a>
  <a  href="touristforum.php">Tourist Forum</a>
  <a  class="active" href="posttouristforum.php">Post</a>
  <a href="touristaccount.php">Account</a>
  <a href="notifications.php">Notifications</a>
  <a style="color:red"  href="logout.php">Logout</a>
</div>
</div>
<div class="col-md-1">
    </div>
<div class="col-md-9">
                <h2>Post on Tourist Forum</h2>
                <br>
                <label>Share your experiences with other tourist with dpk.</label>
          <br>
        
        <form  method="POST" onsubmit=" return notEmpty(this)" action="processposttouristforum.php">
Topic:
<br>
         <input class="form-control" type="text" name="topic" required="required">
    <br>   
    Name to Display:
    <input class="form-control" type="text" name="name" required="required">   
       Details:
          <textarea class="form-control" rows="8" cols="80" name="textarea" value="" required="required"></textarea>
            <br />

            <br /><br />
            <input class="btn btn-primary" type="submit" value="submit" />
        </form>
       <br> <br> 
        
    </div>
    <script>
        function notEmpty(form) {
           
            txt = form.textarea.value;
            fil = form.file.value;
            if (txt =='' && fil =='')
            {
                alert("Text and File both cannot be Empty")
                return false;
            }
            else {
                return true;
                 }
        }

       
 
    </script>
  
</body>
</html>