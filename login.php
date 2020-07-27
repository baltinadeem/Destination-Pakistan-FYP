<?php
   include("config.php");
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if(!$db){
   die("Connection Error");
}
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myemail = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $account = mysqli_real_escape_string($db,$_POST['accountType']);

      $sql = "SELECT * FROM `$account` WHERE email = '$myemail' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
        
         $_SESSION['id'] = $row['id'];
         $_SESSION['accountType']=$account;
         $_SESSION['email']=$row['email'];
          switch ($account)
                  {
case "Tourist":
header("Location:welcometourist.php");
break;
case "Tour Operator":
header("Location:welcometour.php");
break;
case "Transport Manager":
header("Location:welcometransport.php");
break;
case "Hotel Manager":
header("Location:welcomehotel.php");
break;
case "Admin":
header("Location:welcomeadmin.php");
break;
}

      }
      else {
         $error = "Your Login Name or Password is invalid";
		 echo $error;
      }
   }
   
?>