 <?php
 // reading results from user
 
  echo "";
    
    if (isset($_GET['msg1']) == 'insert') {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration added successfully
            </div>";
      } 
    if (isset($_GET['msg2']) == 'update') {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration updated successfully
            </div>";
    }
    if (isset($_GET['msg3']) == 'delete') {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Record deleted successfully
            </div>";
    }
  
    if (isset($_SESSION['ids'])) {
      echo "<div class='alert alert-success  ' style='text-align: center'>
              <div type='button'> 
              <p style='text-align: center>WELCOME ".$_SESSION['name']."</p>  

            </div>
            ";
            
    }
                 // <a href='index.php?bloodbank'><span class='badge badge-secondary'>Blood Banks </span></a>
              //<a href='index.php?stock'><span class='badge badge-secondary'>Blood Stock </span></a>
     // check if the current page is admin then delete from admin if the delete buttong is clicked
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId']) && isset($_GET['admin'])) {
      $deleteId = $_GET['deleteId'];
      $userObj ->deleteRecord($deleteId);
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