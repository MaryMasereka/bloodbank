
<?php

class bloodbank{
	
	private $con;

		public function setConnection($conn){
			$this->con= $conn;
		}
  
  
 
		public function insertData($post)
		{
			$name = $this->con->real_escape_string($_POST['name']);
			$email = $this->con->real_escape_string($_POST['email']);
			$address = $this->con->real_escape_string($_POST['address']);
			$phone= $this->con->real_escape_string($_POST['phone']);
			$systemadminid = $this->con->real_escape_string($_POST['$systemadminid']);
			$query="INSERT INTO bloodbank(name,email,phone,address,systemadminid) VALUES('$name','$email','$phone','$address','$systemadminid')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?msg1=insert&&bloodbank");
			}else{
			    echo "Registration failed try again!";
			}
		}

		// Fetch userrecords for show listing
		public function displayData()
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

// Update blood bank records
		public function updateRecord($postData)
		{
		    $name = $this->con->real_escape_string($_POST['uname']);
		    $email = $this->con->real_escape_string($_POST['uemail']);
		    $id = $this->con->real_escape_string($_POST['id']);
		    $phone = $this->con->real_escape_string($_POST['upphone']);
	        $address = $this->con->real_escape_string($_POST['upaddress']);
            $systemadminid = $this->con->real_escape_string(md5($_POST['$systemadminid']));
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE bloodbank SET name = '$name', 
			email = '$email', phone ='$phone',address = '$address' ,systemadminid='$systemadminid' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?msg2=update&&bloodbank");
			}else{
			    echo "Registration updated failed try again!";
			}
		    }
			
		}
		
		// Delete blood bank record
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM bloodbank WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:index.php?msg3=delete&&bloodbank");
		}else{
			echo "Record does not delete try again";
		    }
		}
		
		// Fetch single data for edit from usertable
		public function displyaRecordById($id)
		{
		    $query = "SELECT * FROM bloodbank WHERE id = '$id'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			//echo "Record not found";
		    }
		}

		// Up
}

?>