<?php
include "config.php";
//echo $_POST['id']; exit();
$sec_query=mysqli_query($con,"SELECT * FROM students WHERE id ='".$_POST['id']."'");
$row=mysqli_fetch_array($sec_query);
echo json_encode($row);
?>