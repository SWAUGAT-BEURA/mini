<?php

$servername= $_POST["servername"]; 
$username=$_POST["username"]; 
$password=$_POST["password"]; 
$databasename=$_POST["databasename"]; 
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE $databasename";
if ($conn->query($sql) === TRUE) {
  echo '<script>
  alert("Database created succesfully");
  window.location.href="../../index.html";
  </script>';
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();
?>