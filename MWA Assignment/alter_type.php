<?php

// Get the database name from the user.
$databaseName = $_POST['dbname'];
$tbname = $_POST['tbname'];
$cmname1 = $_POST['cmname1'];
$type1=$_POST['type1'];
// Connect to the MySQL server.
$hostname='localhost';
$username='root';
$password='';
$conn=mysqli_connect($hostname,$username,$password,$databaseName);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create the database.
$sql = "ALTER TABLE $tbname MODIFY COLUMN $cmname1 $type1";
if (mysqli_query($conn, $sql)) {
  echo "Altered the type of column successfully";
} else {
  echo "Error in altering the type of column: " . mysqli_error($conn);
}

// Close the connection.
mysqli_close($conn);
?>