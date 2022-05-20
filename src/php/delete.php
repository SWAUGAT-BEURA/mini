<?php
$servername= $_POST["servername"]; 
$username=$_POST["username"]; 
$password=$_POST["password"]; 
$dbname=$_POST["dbname"]; 
$category=$_POST["category"]; 
$value=$_POST["cvalue"]; 
$tablename=$_POST["tablename"]; 
// Create connection tablename
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "DELETE FROM $tablename WHERE $category='$value'";

if ($conn->query($sql) === TRUE) {
  echo '<script>
  alert("Record deleted successfully");
  window.location.href="../../index.html";
  </script>';
} else {
  echo "Error deleting record: " . $conn->error;
}


$conn->close();
?>