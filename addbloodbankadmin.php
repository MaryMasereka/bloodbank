<?php
// Include database file
include 'bloodbankadmin.php';
include 'connection.php';

$dbObj = new Connection();
$con = $dbObj->connect();

$bloodbankadminObj = new bloodbankadmin();


if($_SESSION["ids"]== ""  ){
      header("Location:login.php");
      }
  // Insert Record 
  if(isset($_POST['submit'])) {
      $bloodbankadminObj ->setConnection($con);
    $bloodbankadminObj->insertData($_POST);
  }
 if(isset($_GET['bloodbankid'])){
     $bloodbankid  = $_GET['bloodbankid'];
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
<?php include'header.php'?>
<div class="container">
<a href="index.php?bloodbank" class="btn-primary" style="float:right;">Home</a>
  <form action="addbloodbankadmin.php" method="POST">
  <div class="form-group">
     <h2>Blood Bank Rep Form</h2>
    </div>
  <div class="form-group">
      <input type="hidden" class="form-control" name="bloodbankid" value="<?php echo $bloodbankid; ?>" required="">
    </div>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
    </div>
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" name="email" placeholder="Enter email" required="">
    </div>
    <div class="form-group">
      <label for="bloodbankadminname">username:</label>
      <input type="text" class="form-control" name="username" placeholder="Enter username" required="">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" name="password" placeholder="Enter password" required="">
    </div>
	
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

