<?php

$servername = "localhost";
$database = "pizza_db";
$username = "root";
$password = "";

  // Connect to the MySQL server
  $conn = mysqli_connect($servername, $username, $password, $database);
  
  // Check the connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>