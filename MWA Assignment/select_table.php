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
$sql = "SELECT * FROM $tbname";

// Execute the SQL query.
$result = mysqli_query($conn, $sql);

// Check if the query was successful.
if ($result) {

  // Initialize the HTML table.
  echo "<table border='1'>";

  // Iterate over the results and print each row in the table.
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    foreach ($row as $column_name => $value) {
      echo "<td> $value </td>";
    }
    echo "</tr>";
  }

  // Close the HTML table.
  echo "</table>";
} else {
  echo "Error fetching rows from table: " . mysqli_error($conn);
}
// Close the connection.
mysqli_close($conn);
?>