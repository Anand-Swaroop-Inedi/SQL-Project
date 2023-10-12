<?php
$servername = "localhost";
$username = "root";
$password = "";
$databaseName = $_POST['dbname'];
$tbname = $_POST['tbname'];
// Create connection
$conn = mysqli_connect($servername, $username, $password,$databaseName);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$condition = $_POST["condition"];

// Update record
$sql = "DELETE FROM $tbname WHERE $condition";
if (mysqli_query($conn, $sql)) {
  echo "Records deleted successfully";
} else {
  echo "Error in deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
