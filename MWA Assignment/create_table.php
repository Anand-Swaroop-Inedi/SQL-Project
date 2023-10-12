<?php
// Create a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$databaseName = $_POST['dbname'];
$tbname = $_POST['tbname'];

$conn = new mysqli($servername, $username, $password, $databaseName);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the column names and data types from the HTML form
$column_names = $_POST["column_names"];
$data_types = $_POST["types"];

// Create the CREATE TABLE statement
$sql = "CREATE TABLE $tbname (";
$columns = explode(",", $column_names);
$data_types = explode(",", $data_types);
for ($i = 0; $i < count($columns); $i++) {
  $sql .= $columns[$i] . " " . $data_types[$i] . ", ";
}
$sql = substr($sql, 0, -2) . ")";

// Execute the CREATE TABLE statement
if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection to the MySQL database
$conn->close();
?>
