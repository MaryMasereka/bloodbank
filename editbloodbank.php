<?php
  
  // Include database file
  include 'bloodbank.php';
  
  $dbObj = new Connection();
  $con = $dbObj->connect();

   $bloodbankObj = new bloodbank();
	 $bloodbankObj ->setConnection($con);
  // Edit bloodbankadmin record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];

   $bloodbankObj ->setConnection($con);
    $bloodbankadmin= $bloodbankObj->displyaRecordById($editId);
  }

  // Update Record in bloodbankadmin table
  if(isset($_POST['update'])) {
    $bloodbankObj ->updateRecord($_POST);
  }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Blood Bank Tracking System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<?php include'header.php'?>
<div class="container">
  <form action="editbloodbank.php" method="POST">
      <div class="form-group">
      <h2>Edit Blood Bank</h2>
      
    </div>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="uname" value="<?php echo $bloodbankadmin['name']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" name="uemail" value="<?php echo $bloodbankadmin['email']; ?>" required="">
    </div>
    <div class="form-group">
      <label for="bloodbankadminname">Address:</label>
      <input type="text" class="form-control" name="upaddress" value="<?php echo $bloodbankadmin['address']; ?>" required="">
    </div>
	<div class="form-group">
      <label for="bloodbankadminname">Phone:</label>
      <input type="text" class="form-control" name="upphone" value="<?php echo $bloodbankadmin['phone']; ?>" required="">
    </div>
    <div class="form-group">
      <input type="hidden" name="id" value="<?php echo $bloodbankadmin['id']; ?>">
      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
    </div>
	
	<div class="form-group">
      
      <input type="hidden" class="form-control" name="systemadminid" value=" <?php echo $_SESSION["id"] ?>" required="">
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script s