<?php
 session_start();
  // Include database file
include 'stock.php';
include 'bloodbank.php';
include 'connection.php';
$dbObj = new Connection();
$con = $dbObj->connect();
$stockObj = new stock();
$stockObj  ->setConnection($con);
  // Insert Record 
  if(isset($_POST['submit'])) {
    $stockObj->insertData($_POST);
  }
$bloodbankObj = new bloodbank();
$bloodbankObj ->setConnection($con);
 if(isset($_GET['bloodbankid'])){
 $bloodbankid = $_GET['bloodbankid'];
  $bloodbank = $bloodbankObj->displyaRecordById($bloodbankid);
  $bloodbankname= $bloodbank['name'];
 
 }
  

?>
<!DOCTYPE html>
<html lang="en">
 <title>Blood Bank Tracking System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<?php include'header.php';

if(empty($_SESSION["ids"]) ){
      header("Location:login.php");
      }
      ?>

<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?search">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addbloodbank.php">Blood Bank</a>
      </li>
      
      
    </ul>
  </div>
</nav>


  <form action="addstock.php" method="POST">
  <div class="form-group">
      <label for="password">Blood Bank  ID:</label>
            
      <?php 
// get bloodbank recrods
 $bloodbank = $bloodbankObj->displyaRecordById($bloodbankid);

if(isset($_GET['bloodbankid'])){
$bloodbankid =$_GET['bloodbankid'];

$lists = $stockObj ->displayData($bloodbankid);
}
 ?>
<input type="hidden" name="bloodbankid" value="<?php echo $bloodbankid; ?>">
 <input type="text" name="bloodbankname" value="<?php echo $bloodbankname; ?>">

    </div>

  <div class="form-group">
  <label for="bloodgroup">Blood Groupd:</label>
  <select name="bloodgroup" id="bloogroup">
  <option value="A+">A+</option>
  <option value="B+">B+</option>
  <option value="AB+">AB+</option>
  <option value="O+">0+</option>
  <option value="A-">A-</option>
  <option value="B-">B-</option>
  <option value="0-">O-</option>
  <option value="AB-">AB-</option>
</select>
    </div>
    <div class="form-group">
      <label for="units">Units Available:</label>
      <input type="text" class="form-control" name="unitsavailable" placeholder="Enter units" required="">
    </div>
    

    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

