
<?php
 session_start();


class bloodbankadmin{
	
	
private $con;


		// Database Connection 
		public function setConnection($conn){
			$this->con= $conn;
		}
		
		public function insertData($post)
		{
			$name = $this->con->real_escape_string($_POST['name']);
			$email = $this->con->real_escape_string($_POST['email']);
			$username = $this->con->real_escape_string($_POST['username']);
			$password = $this->con->real_escape_string($_POST['password']);
			$bloodbankid = $this->con->real_escape_string($_POST['bloodbankid']);
			
			$query="INSERT INTO bloodbankadmin (name,email,username,password,bloodbankid)
			VALUES('$name','$email','$username','$password','$bloodbankid')";
			$sql = $this->con->query($query);
			$last_id = $conn->insert_id;
			if ($sql==true) {
			    header("Location:index.php?bloodbankrep=".$bloodbankid);
			}else{
			    echo "Registration failed try again";
			}
		}

		// Fetch userrecords for show listing
		public function displayData()
		{
		    $query = "SELECT * FROM bloodbankadmin";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 echo "No found records";
		    }
		}


// Fetch userrecords for show listing
		public function login($post)
		{
			//$_SESSION["id"]=="";
	        $username = $this->con->real_escape_string($_POST['username']);
	        $password = $this->con->real_escape_string($_POST['password']);
		    $query = "SELECT * FROM bloodbankadmin where  username = '$username' and password = '$password'";
		    $result = $this->con->query($query);
		   if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		          $_SESSION["ids"] = $row['id'];
				  $_SESSION["name"] = $row['name'];
	              header("Location: index.php?stock&&bloodbankid=".$row['bloodbankid']);
		    }
			 return $data;
		    }else{
			 echo "No found records".$password;
		    }
		}

// Update userdata into usertable
		public function updateRecord($postData)
		{
		    $name = $this->con->real_escape_string($_POST['uname']);
		    $email = $this->con->real_escape_string($_POST['uemail']);
		    $username = $this->con->real_escape_string($_POST['upname']);
		    $id = $this->con->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE bloodbankadmin SET name = '$name', email = '$email', username = '$username' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?msg2=update&&admin");
			}else{
			    echo "Registration updated failed try again!";
			}
		    }
			
		}
		
		// Delete userdata from usertable
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM bloodbankadmin WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:index.php?msg3=delete");
		}else{
			echo "Record does not delete try again";
		    }
		}
		
		// Fetch single data for edit from usertable
		public function displyaRecordById($id)
		{
		   		    $query = "SELECT bloodbankadmin.id as id, bloodbankadmin.name as bname,bloodbankadmin.email as bemail,bloodbankadmin.username as busername
					FROM bloodbankadmin  INNER JOIN bloodbank on 
					bloodbank.id =bloodbankadmin.bloodbankid WHERE bloodbankadmin.bloodbankid= '$id' ";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 echo "No found records";
		    }
		}

		// Up
}

?>