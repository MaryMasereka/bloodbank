<?php
  
  // Include database file

include 'connection.php';
include 'stock.php';
$dbObj = new Connection();
$con = $dbObj->connect();
$stockObj = new stock();
 $stockObj->setConnection($con);

  // Edit user record
  if(isset($_GET['editid']) && !empty($_GET['editid'])) {
    $editId = $_GET['editid'];

   
	$stock= $stockObj->displyaRecordById($editId);
  }

  // Update Record in user table
  if(isset($_POST['update'])) {

    $stockObj->updateRecord($_POST);
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
  <form action="editstock.php" method="POST">
  <div class="form-group">
    <H2>Update Stock</H2>
    <div class="form-group">
     <label for="email">Blood Group:</label>
      <input type="text" class="form-control" name="ubloodgroup" value="<?php echo $stock['bloodgroup']; ?>" >
    </div>
    <div class="form-group">
      <label for="email">Quantity:</label>
      <input type="text" class="form-control" name="uquantity" value="<?php echo $stock['unitsavailable']; ?>" >
    </div>
    <div class="form-group">
     
      <input type="hidden" class="form-control" name="ustockid" value="<?php echo $stock['id'];?>" >
	  <input type="hidden" class="form-control" name="ubloodbankid" value="<?php echo $stock['bloodbankid'];?>" >
	  
    </div>
    <div class="form-group">
      
      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>