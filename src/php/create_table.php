<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "myDB";

$servername= $_POST["servername"]; 
$username=$_POST["username"]; 
$password=$_POST["password"]; 
$dbname=$_POST["dbname"]; 
// $dbname=$_POST["dbname"]; 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo '<script>
  alert("Table MyGuests created successfully");
  window.location.href="../../index.html";
  </script>';
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>