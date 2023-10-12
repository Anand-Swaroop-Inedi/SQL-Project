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
$column = $_POST["column"];
$value = $_POST["value"];
$condition = $_POST["condition"];

// Update record
$sql = "UPDATE $tbname SET $column='$value' WHERE $condition";
if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
