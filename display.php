
	
<?php 
   //display stock
   /**if(empty($_SESSION["ids"]) ){
      header("Location:login.php");
      }else{
		  
		  */
    if(isset($_GET['bloodbankrep'])){
        echo "
          <h2>Admin List</h2>
          <a href='addstock.php'class='btn btn-default' style='float:right;'></a>
        <table class='table table-hover'>
        <thead>
             <tr><th>Id</th><th>Name</th><th>Email</th><th>Action</th></tr>
         </thead>
         <tbody>";
          foreach ( $bloodbankadmins as $user) {
          echo  "<tr>
          <td>".$user['id']."</td>
          <td>".$user['bname']."</td>
          <td>".$user['bemail']."</td>
		  <td>".$user['busername']."</td>
          <td>
             <a href='edit.php?editId=".$user['id']. "' style='color:green'>
              <i class='fa fa-pencil' aria-hidden='true'></i></a>&nbsp
            <a href='index.php?udeleteId=".$user['id']."&&user' style='color:red' onclick='confirm('Are you sure want to delete this record')'>
              <i class='fa fa-trash' aria-hidden='true'></i>
            </a>
         </td>
         </tr>";
        
         }
          echo " </tbody>
          </table>";
          }
         
          
          // Display bloodbank
        if(isset($_GET['bloodbank'])){
         
        echo "<a href='addbloodbank.php' class='btn btn-default' style='float:right;'></a>
        <h2>Blood Bank</h2>

        <table class='table table-hover'>
        <thead>
		 <a href='addbloodbank.php' class='btn btn-default' style='float:right;'>Add Bloodbank</a> 
        <tr><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Action</th></tr>
        </thead>
        <tbody>";
        
          foreach ($bloodbanks as $bloodbank) {
              echo  "<tr>
          
          <td style='text-align:left;'>".$bloodbank['name']."</td>
          <td style='text-align:left;'>".$bloodbank['email']."</td>
          <td style='text-align:left;'>".format($bloodbank['phone'])."</td>
          <td style='text-align:left;'>".$bloodbank['address']."</td>
          <td >
            <a href='addbloodbankadmin.php?bloodbankid=".$bloodbank['id']. "' style='color:green'>+<i class='fa fa-user' aria-hidden='true'></i></a>&nbsp
             <a href='editbloodbank.php?editId=".$bloodbank['id']. "' style='color:green'><i class='fa fa-pencil' aria-hidden='true'></i></a>&nbsp
            <a href='index.php?deleteId=".$bloodbank['id']."&&bloodbank' style='color:red' onclick='confirm('Are you sure want to delete this record')'>
              <i class='fa fa-trash' aria-hidden='true'></i>
            </a>
          </td>
        </tr>";
          }
          echo " </tbody>
          </table>";
		  
		  
          } 
          
          // Display bloodbank

          if(isset($_GET['stock'])){
            $bloodbankid=$_GET['bloodbankid'];  
        echo "
          <h2>Stock</h2>
          <div class='form-group'>
          <h3>".$stock['name']."</h>
         
         </div>";
          echo "<a href='addstock.php?bloodbankid=".$bloodbankid." 'class='btn btn-default' style='float:right;'>+Stock</a>
        <table class='table table-hover'>
        <thead>
             <tr><th>Stock Id</th><th>blood group</th><th>Units</th><th>Action</th></tr>
         </thead>
         <tbody>";
		 if(!empty($stocks))
          foreach ($stocks as $stock) {
              echo  "<tr>
          <td>".$stock['stockid']." </td>
          <td>".$stock['bloodgroup']."</td>
          <td>".$stock['unitsavailable']."</td>
          
       
          <td>
             
            <a href='editstock.php?editid=".$stock['stockid']."&&stock' style='color:red' '>
              <i class='fa fa-pencil' aria-hidden='true'></i>  
           <a href='index.php?deleteId=".$stock['stockid']."&&stock' style='color:red' onclick='confirm('Are you sure want to delete this record')'>
              <i class='fa fa-trash' aria-hidden='true'></i>
            </a>
          </td>
        </tr>";
          }
              echo " </tbody>
          </table>";
          }

  if(isset($_GET['search'] )){
      echo 
    '<div class="input-group rounded">
     <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
     aria-describedby="search-addon" />
     <span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
    </span>
  </div>';
        echo "
          <h2>Stock</h2>
        <table class='table table-hover'>
        <thead>
             <tr><th>Id</th><th>bloodgroup</th><th>Units Available</th><th>Bloood Bank</th><th>Address</th><th>Action</th></tr>
         </thead>
         <tbody>";
          foreach ($stocks as $stock) {
              echo  "<tr>
          <td>".$stock['id']." </td>
          <td>".$stock['bloodgroup']."</td>
          <td>".$stock['unitsavailable']."</td>
          <td>".$stock['name']."</td>
          <td>".$stock['address']."</td>
          <td>".$stock['phone']."</td>

          <td>
          <a href='edit.php?editId=".$stock['id']. "'style='color:green'>
              <i class='fa fa-pencil' aria-hidden='true'></i></a>&nbsp
          <a href='edit.php?editId=".$stock['id']. "'style='color:green'>
              <i class='fa fa-pencil' aria-hidden='true'></i></a>&nbsp
           <a href='index.php?deleteId=".$stock['id']."&&stock' style='color:red' onclick='confirm('Are you sure want to delete this record')'>
              <i class='fa fa-trash' aria-hidden='true'></i>
            </a>
          </td>
        </tr>";
          }
              echo " </tbody>
          </table>";
          }  
if (isset($_GET['home'])){
      echo "<h2 style='text-align: center'></h2>
   
       <div class='well' >
       <div class='list-group' style='text-align: center;'>
        
        <h4>Blood Bank Rep Login </h4>
        <a href='login.php' class=''>Please Login</a>
		<br>
		<br><br>
        <h4>System Admin  </h4>
        <a href='systemadminlogin.php' class=''>Please login</a>
		<br>
		
      </div>
   </div>"; 
   
}

  
 
 

?>
      
	  
  