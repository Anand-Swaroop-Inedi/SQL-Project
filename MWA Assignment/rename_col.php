<?php
$databaseName = $_POST['dbname'];
$tbname = $_POST['tbname'];
$cmname1 = $_POST['cmname1'];
$cmname2 = $_POST['cmname2'];
// Connect to the MySQL server.
$hostname='localhost';
$username='root';
$password='';
$conn=mysqli_connect($hostname,$username,$password,$databaseName);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "ALTER TABLE $tbname CHANGE COLUMN $cmname1 $cmname2 VARCHAR(255) ";
if (mysqli_query($conn, $sql)) {
  echo "Renamed column successfully";
} else {
  echo "Error in renaming column: " . mysqli_error($conn);
}

// Close the connection.
mysqli_close($conn);
?>