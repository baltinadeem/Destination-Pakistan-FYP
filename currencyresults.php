<?php
session_start();
$id=$_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
<title>welcomeCurrency Converter </title>
<link href="tourist.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="row">
<div class="col-md-1">
<div class="sidebar">
  <a  class="active" href="currencyconverter.php">Currency Converter</a>
  <a href="notifications.php">Notifications</a>
  <a style="color:red"  href="logout.php">Logout</a>
</div>
</div>

<div class="col-md-11">

<form action="currencyresults.php" method="post">
  <div class="content">
  <h2>Currency Converter</h2>
<br> <br>
  <div class="row">
  <div class="col-sm-6 mb-3 mb-md-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Local to Foreign</h5>
        <label>Select Currency</label>
           <input list="currency1" name="currency1" value="">
           <br>
  <datalist id="currency1">  
    <option value="Dollar">US Dollar</option>
    <option value="Pond">UK Pond</option>
    <option value="Yuan">Chinese Yuan</option>
    <option value="Rial">Saudi Rial</option>
    <option value="Dinaar">Kuwaiti Dinaar</option>
  </datalist>

  <br>
  OR Enter Manually Foreign Currency Rate: <input type="number" name="fcurRate1">
  <br><hr>
  <label>
  Enter Amount in PKR </label>
  <input type="number" name="amount1">
  <br>
        <button  class="btn btn-primary">Convert Now </button>

      </div>
    </div>
  </div>


 <div class="col-sm-6 mb-3 mb-md-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Foreign to Local</h5>
        <label>Select Currency</label>
        <input list="currency2" name="currency2" value="">
  <datalist id="currency2">  
    <option value="Dollar">US Dollar</option>
    <option value="Pond">UK Pond</option>
    <option value="Yuan">Chinese Yuan</option>
    <option value="Rial">Saudi Rial</option>
    <option value="Dinaar">Kuwaiti Dinaar</option>
  </datalist>
  <br><br>
  OR Enter Manually Foreign Currency Rate: <input type="number" name="fcurRate2">
  <br><hr>
  <label>
  Enter Amount (Foreign) </label>
  <input type="number" name="amount2" >
  <br>
        <button class="btn btn-primary">Convert Now </button>
      </div>
    </div>
  </div>

</div>
</form>
<br>
<h3> Results:</h3>
<?php
$cur0=$_POST['currency1'];
switch($cur0){
  case "Dollar":
  $cur1=165;
  break;
  case "Pond":
  $cur1=211;
  break;
  case "Rial":
  $cur1=44;
  break;
  case "Yuan":
  $cur1=23;
  break;
  case "Dinaar":
  $cur1=538;
  break;
}

$curr=$_POST['currency2'];
switch($curr){
  case "Dollar":
  $cur2=165;
  break;
  case "Pond":
  $cur2=211;
  break;
  case "Rial":
  $cur2=44;
  break;
  case "Yuan":
  $cur2=23;
  break;
  case "Dinaar":
  $cur2=538;
  break;
}
if($_POST['fcurRate1']!=null)
$cur1=$_POST['fcurRate1'];

$am1=$_POST['amount1'];

if($_POST['fcurRate2']!=null)
$cur2=$_POST['fcurRate2'];
$am2=$_POST['amount2'];

if($am1==null && $am2==null){

  echo "<h5 style='color:red;'>Please Enter Amount</h4>";
}
else if($_POST['currency1']!=null && $_POST['fcurRate1']!=null){
   echo "<h5 style='color:red;'>Please either Select Currency or Enter Manually Foreign Rate.</h4>";
}
else if($_POST['currency2']!=null && $_POST['fcurRate2']!=null){
   echo "<h5 style='color:red;'>Please either Select Currency or Enter Manually Foreign Rate.</h4>";
}
else if($am1!=null){
  echo "Foreign Rate is ".round($am1/$cur1,2)." of local Rate ".$am1." PKR";
}
else if($am2!=null){
  echo "Local Rate is ".round($am2 * $cur2,2)." PKR of Foreign Rate ".$am2;
}

?>

</div>
</div>
</div>
</div>



</body>

</html>