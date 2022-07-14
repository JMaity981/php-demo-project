<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "template";

  //Domain Adress
  $base_url = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://'.$_SERVER['HTTP_HOST'].'/admindashboard';

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //echo "Connected successfully";
?>