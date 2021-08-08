
<?php
 session_start();


class User{
	
	
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
			$query="INSERT INTO bloodbankrep(name,email,username,password) VALUES('$name','$email','$username','$password')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?msg1=insert&&page=admin");
			}else{
			    echo "Registration failed try again!";
			}
		}

		// Fetch userrecords for show listing
		public function displayData()
		{
		    $query = "SELECT * FROM bloodbankrep";
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
			// $_SESSION["id"]=="";
	        $username = $this->con->real_escape_string($_POST['username']);
	        $password = $this->con->real_escape_string($_POST['password']);
		    $query = "SELECT * FROM systemadmin where  username = '$username' and password = '$password'";
		    $result = $this->con->query($query);
		   if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		          $_SESSION["ids"] = $row['id'];
				  $_SESSION["name"] = $row['name'];
				  // reddirect to index.php and accessing bloodbank page
	              header("Location: index.php?bloodbank");
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
		    $query = "DELETE FROM bloodbankrep WHERE id = '$id'";
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
		    $query = "SELECT * FROM bloodbankrep WHERE id = '$id'";
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