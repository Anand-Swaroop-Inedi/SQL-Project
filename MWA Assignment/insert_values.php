<?php
// Create a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$databaseName = $_POST['dbname'];
$tbname = $_POST['tbname'];
$conn = new mysqli($servername, $username, $password,$databaseName);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the column names from the HTML form
$column_names = $_POST["column_names"];
$column_names=explode(',',$column_names);
// Get the values from the HTML form
$values = $_POST["values"];
$values=explode(',', $values);
// Create the INSERT INTO statement
$sql = "INSERT INTO $tbname (";
foreach ($column_names as $column_name) {
  $sql .= $column_name . ", ";
}
$sql = substr($sql, 0, -2) . ") VALUES (";
foreach ($values as $value) {
  $sql .= "'" . $value . "', ";
}
$sql = substr($sql, 0, -2) . ")";

// Execute the INSERT INTO statement
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection to the MySQL database
$conn->close();
?>
