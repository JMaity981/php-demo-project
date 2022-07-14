<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);
$image1=time().$_FILES['image1']['name'];
$folder="../upload/".$image1;
move_uploaded_file($_FILES['image1']['tmp_name'],$folder);

$var="INSERT INTO color SET clour_name='".$clour_name."',color_image='$image1'";
mysql_query($var);
header("location:../index.php?module=add_color&header=Color&msg=submit Successfully");

?>