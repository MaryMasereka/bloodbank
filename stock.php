
<?php


class stock{
	private $con;
	
 public function setConnection($conn){
			$this->con= $conn;
		}
  
  
		
		public function insertData($post)
		{
			$bloodgroup = $this->con->real_escape_string($_POST['bloodgroup']);
			$unitsavailable = $this->con->real_escape_string($_POST['unitsavailable']);
			$bloodbankid= $this->con->real_escape_string($_POST['bloodbankid']);
			$systemadminid = $this->con->real_escape_string($_POST['systemadminid']);
			$query="INSERT INTO stock(bloodgroup,unitsavailable,bloodbankid) VALUES('$bloodgroup','$unitsavailable','$bloodbankid')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?stock&&bloodbankid=".$bloodbankid);
			}else{
			    echo "Registration failed try again!";
			}
		}

		// Fetch userrecords for show listing
		public function displayData($bloodbankid)
		{
			
		    $query = "SELECT stock.id as stockid,bloodgroup,unitsavailable,name,phone,address,email  FROM stock INNER JOIN bloodbank on stock.bloodbankid = bloodbank.id
			WHERE bloodbankid = '$bloodbankid' ";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 //echo "No found records";
		    }
		}
		// Fetch userrecords for show listing
		public function displayDataBykeyword($post)
		{
			$bloodgroup = $this->con->real_escape_string($_POST['bloodgroup']);
			$name = $this->con->real_escape_string($_POST['name']);
		    $query = "SELECT * FROM stock INNER JOIN bloodbank on stock.bloodbankid = bloodbank.id where name like '%$name% or bloodgroup like '%$bloodgroup%";
		    $result = $this->con->query($query);
		    if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 //echo "No found records";
		    }
		}

// Update userdata into usertable
		public function updateRecord($postData)
		{
		    $quantity = $this->con->real_escape_string($_POST['uquantity']);
		    $stockid= $this->con->real_escape_string($_POST['ustockid']);
		    
		 
		if (!empty($stockid) && !empty($postData)) {
			$query = "UPDATE stock SET unitsavailable = unitsavailable+'$quantity' WHERE id= '$stockid'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?stock&&bloodbankid=".$_POST['ubloodbankid']);
			}else{
			    echo "Update updated failed try again!";
			}
		    }
			
		}
		
		// Delete userdata from usertable
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM stock WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:index.php?msg3=delete&&stock");
		}else{
			echo "Record does not delete try again";
		    }
		}
		
		// Fetch single data for edit from usertable
		public function displyaRecordById($id)
		{
		    $query = "SELECT * FROM stock WHERE id = '$id'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			//echo "Record not found";
		    }
		}

// Fetch userrecords for show listing
		public function displayBloodBank()
		{
		    $query = "SELECT * FROM bloodbank";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 // echo "No found records";
		    }
		}
		// Up
}

?>