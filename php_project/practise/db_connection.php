<?php
$server="localhost";
$user_name="root";
$password="";
$dbname="registration";
$conn = mysqli_connect($server,$user_name,$password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
