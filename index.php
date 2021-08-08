<?php

  // Include database file
  include 'bloodbankadmin.php';
  include 'phonefomart.php';
  include 'bloodbank.php';
  include 'stock.php';
    include 'connection.php';
   $bloodbankid ="";
  // declare the id and bloodbankadmin name of the current bloodbankadmin
  if(isset($_SESSION['ids'])){
  $admin = $_SESSION['ids'];
  }
  // declare and intialize object
  $dbObj = new Connection();
  $con = $dbObj->connect();
// initialize stock
  $stockObj = new stock();
  $stockObj ->setConnection($con);
  
 
  // declare and initialise bloodbank
  $bloodbankObj = new bloodbank($con);
  $bloodbankObj ->setConnection($con);
  $bloodbanks = $bloodbankObj->displayData(); 
  if(isset($_GET['bloodbankid'])){
    $bloodbankid = $_GET['bloodbankid'];
    $bloodbank = $bloodbankObj->displyaRecordById($bloodbankid);
   $stocks = $stockObj->displayData($bloodbankid); 
  }
  
  
  // declare and initialise bloodbankadmin
  $bloodbankadminObj = new bloodbankadmin();
  $bloodbankadminObj ->setConnection($con);
  if(isset($_GET['bloodbankrep'])){
    $id = $_GET['bloodbankrep'];
    $bloodbankadmins = $bloodbankadminObj->displyaRecordById($id);
  }


  // check if the current page is admin then delete from admin if the delete buttong is clicked
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId']) && isset($_GET['admin'])) {
      $deleteId = $_GET['deleteId'];
      $bloodbankadminObj ->deleteRecord($deleteId);
  }
  // check if the current page is stock then delete stock if the delete button is clicked
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId']) && isset($_GET['stock'])) {
      $deleteId = $_GET['deleteId'];
      $stockObj ->deleteRecord($deleteId);

   }
     // check if the sele 
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId']) && isset($_GET['bloodbank'] ) ){
      $deleteId = $_GET['deleteId'];
      $bloodbankObj->deleteRecord($deleteId);
      
  }
 
  if(isset($_GET['search'])) {
    $stocks = $stockObj->displayDataBykeyword($_POST);
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
<body style="background-image: url('logo.jpeg'); background-repeat: no-repeat;">
<?php include'header.php'?>
<div class="container">
  <?php include'action.php';
  //if( $_SESSION["ids"]==""){
      //header("Location:login.php");
 // }
  
  ?>
  <?php include'display.php'?>
  


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php   
        if(isset($_GET['stock'])){
              if(empty($_SESSION["ids"]) ){
      header("Location:login.php");
      }
        echo "
          <p2>Reserved Blood</p2>
    
        <table class='table table-hover'>
        <thead>
             <tr><th>Id</th><th>blood group</th><th>Units</th><th>Bloood Bank<th>Action</th></tr>
         </thead>
         <tbody>";
          foreach ($stocks as $stock) {
              echo  "<tr>
          <td>".$stock['stockid']." </td>
          <td>".$stock['bloodgroup']."</td>
          <td>".$stock['unitsavailable']."</td>
          <td>".$stock['name']."</td>

          

          <td>
         <a href='edit.php?editId=".$stock['stockid']. "'style='color:green'>
        <i class='fa fa-pencil' aria-hidden='true'></i></a>&nbsp
         <a href='index.php?deleteId=".$stock['stockid']."&&stock' style='color:red' onclick='confirm('Are you sure want to delete this record')'>
              <i class='fa fa-trash' aria-hidden='true'></i>
            </a>
          </td>
        </tr>";
          }
              echo " </tbody>
          </table>";
          }
 ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Checkout</button>
      </div>
    </div>
  </div>
</div>
</div>
<script src="myscript.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>




