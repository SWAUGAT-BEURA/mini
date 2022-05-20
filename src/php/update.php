<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "myDB";tablename

$servername= $_POST["servername"]; 
$username=$_POST["username"]; 
$password=$_POST["password"]; 
$dbname=$_POST["dbname"]; 
$category=$_POST["category"]; 
$value=$_POST["cvalue"]; 
$tablename=$_POST["tablename"];
$ucategory=$_POST["ucategory"]; 
$uvalue=$_POST["ucvalue"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE $tablename SET $ucategory='$uvalue' WHERE $category='$value'";
$result = $conn->query($sql);

if (mysqli_query($conn, $sql)) {
  echo '<script>
  alert("Record updated successfully");
  window.location.href="../../index.html";
  </script>';
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

$conn->close();
?>
