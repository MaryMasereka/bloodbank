

<?php

  // Include database file
include 'user.php';
include 'connection.php';
$userObj = new user();
$dbObj = new Connection();
$con = $dbObj->connect();
$userObj ->setConnection($con);

  // login
  if(isset($_POST['submit'])) {
    $userObj ->login($_POST);
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
<body>

<?php include'header.php'?>

<div class="container" style="background-image: url('logo.jpg')">
<p>System Admin Login</p>
<h3>Login</h3>
   <form action="systemadminlogin.php" method="POST">
    <div class="form-group">
      <label for="username">username :</label>
      <input type="username" class="form-control" name="username" placeholder="username" required="">
    </div>
    <div class="form-group">
      <label for="text">Password :</label>
      <input type="password" class="form-control" name="password" placeholder="*********" required="">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="submit">
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

