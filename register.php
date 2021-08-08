<?php
// Include database file
include 'User.php';
include 'connection.php';
$userObj = new User();
$dbObj = new Connection();
$con = $dbObj->connect();
$userObj ->setConnection($con);

if($_SESSION["ids"]== ""  ){
      header("Location:login.php");
      }
  // Insert Record in customer table
  if(isset($_POST['submit'])) {
      
    $userObj->insertData($_POST);
  }
 if(isset( $id = $_GET['id'])){
     $id =  $id = $_GET['id'];
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
<a href="index.php" class="btn-primary" style="float:right;">Home</a>
  <form action="add.php" method="POST">
  <div class="form-group">
      <input type="hidden" class="form-control" name="bloodbankid" value="" required="">
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
      <label for="username">Username:</label>
      <input type="text" class="form-control" name="username" placeholder="Enter username" required="">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="text" class="form-control" name="password" placeholder="Enter password" required="">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

