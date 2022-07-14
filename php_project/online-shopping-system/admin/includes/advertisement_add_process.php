<?php
error_reporting(0);
ob_start();
session_start();
include '../config.php';
$filename=$_FILES['image'];
extract($_POST);
	$ext=end(explode(".", $_FILES['image']['name']));
if(($ext=='jpg')||($ext=='JPG')||($ext=='png')||($ext=='PNG')||($ext=='GIF')||($ext=='gif'))
     { 
$random=rand(87,1000).time();
$newfile=$random.".".$ext;
$target="../upload/".$newfile;   
move_uploaded_file($_FILES['image']['tmp_name'],$target);
 $in=$newfile;
$query_add="UPDATE `advertisement` SET `image`='".$newfile."'";
$res_query=mysql_query($query_add);
header("location:../index.php?module=add_advertisement&header=Advertisement&msg=submit Successfully");

	 }
	 
	 
	 
