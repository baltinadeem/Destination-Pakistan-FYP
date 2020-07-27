<?php
session_start();
$id=$_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Currency Converter </title>
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
</div>
</div>
</div>
</div>



</body>

</html>