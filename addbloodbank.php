<?php
 session_start();
  // Include database file
  include 'bloodbank.php';
  if(empty($_SESSION["ids"]) ){
      header("Location:login.php");
      }
  $dbObj = new Connection();
  $con = $dbObj->connect();

  $bloodbankObj = new bloodbank();
	 $bloodbankObj ->setConnection($con);
  // Insert Record 
  if(isset($_POST['submit'])) {
    $bloodbankObj->insertData($_POST);
  }

?>
<!DOCTYPE html>
<html lang="en">
<head><title>Blood Group Tracking System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body style="background-image: url('logo.jpeg'); background-repeat: no-repeat;">

<?php 
include'header.php';

?>

<div class="container" style="background-image: url('logo.jpeg'); background-repeat: no-repeat;">
<h3>Add New Blood Bank</h3>
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
  <form action="addbloodbank.php" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
    </div>
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" name="email" placeholder="Enter email" required="">
    </div>
    <div class="form-group">
      <label for="text">Address:</label>
      <input type="text" class="form-control" name="address" placeholder="Enter address" required="">
    </div>
    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="text" class="form-control" name="phone" placeholder="Enter phone" required="">
    </div>
	<div class="form-group">
      
      <input type="hidden" class="form-control" name="systemadminid" value=" <?php echo $_SESSION["id"] ?>" required="">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

