<?php
  $servername = "localhost";
  $username = "candy";
  $password = "Mysai123#";
  $database = "candy";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //echo "Connected successfully";
?>