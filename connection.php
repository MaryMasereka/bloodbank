<?php


class connection {
	
private $servername = "localhost";
private $username = "root";
private $password = "";
private $db = "blood_bank";

// Create connection

function connect(){
return $conn = mysqli_connect($this->servername, $this->username, $this->password,$this->db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
}

}

?>