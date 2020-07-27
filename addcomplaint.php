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
    
    <title>add tourist Complaints</title>

</head>
<body>
<div class="row">
<div class="col-md-1">
<div class="sidebar">
  <a  href="welcometourist.php">Home</a>
  <a  href="touristcomplaint.php">Complaints</a>
  <a  class="active" href="addcomplaint.php">Add Complaints</a>
  <a href="touristaccount.php">Account</a>
  <a href="notifications.php">Notifications</a>
  <a style="color:red"  href="logout.php">Logout</a>
</div>
</div>
<div class="col-md-1">
    </div>
<div class="col-md-9">
                <h2>Add Complaints</h2>
                <br>
                <label>If you want Emergency Help Just Click below</label>
                <hr>
                <form name="emergency" method="GET" onsubmit=" return emergencyMessage()" action="processemergencycomplaint.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
<input class="btn btn-danger btn-block" type="submit" value="Emeregency Help" />
        </form>

        <hr>
        <h2> Register Complaint </h2>

        If you are facing any issues during your trip just write to us below.
        <br>
        <form name="normal" method="POST" onsubmit=" return notEmpty(this)" action="processtouristcomplaint.php">

        <input type="hidden" name="id" value="<?php echo $id; ?>">

            <textarea class="form-control" rows="8" cols="80" name="textarea" value=""></textarea>
            <br />

      
            <input class="btn btn-primary" type="submit" value="submit" />
        </form>
     
        
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

        function emergencyMessage() {
            if (confirm("Are You Sure You are in Emergency and Need Help immedietly??").valueOf("OK")
                )
            {
            return true;
        }

            else
            return false;
     
        }
 
    </script>
  
</body>
</html>