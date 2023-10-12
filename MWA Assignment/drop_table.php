<?php

// Get the database name from the user.
$databaseName = $_POST['dbname'];
$tbname = $_POST['tbname'];
// Connect to the MySQL server.
$hostname='localhost';
$username='root';
$password='';
$conn=mysqli_connect($hostname,$username,$password,$databaseName);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create the database.
$sql = "DROP TABLE $tbname";
if (mysqli_query($conn, $sql)) {
  echo "Table dropped successfully";
} else {
  echo "Error in dropping a Table: " . mysqli_error($conn);
}

// Close the connection.
mysqli_close($conn);
?>