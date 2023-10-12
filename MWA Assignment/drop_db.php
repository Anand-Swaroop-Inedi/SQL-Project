<?php
// Get the database name from the user.
$databaseName = $_POST['dbname'];
// Connect to the MySQL server.
$hostname='localhost';
$username='root';
$password='';
$conn=mysqli_connect($hostname,$username,$password);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create the database.
$sql = "DROP DATABASE $databaseName";
if (mysqli_query($conn, $sql)) {
  echo "DataBase dropped successfully";
} else {
  echo "Error in dropping a DataBase: " . mysqli_error($conn);
}

// Close the connection.
mysqli_close($conn);
?>