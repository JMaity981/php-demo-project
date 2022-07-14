<?php
error_reporting(0);
ob_start();
session_start();
include '../config.php';
extract($_POST);
if($_FILES['image1']['name']!="")
{
$image1=$_FILES['image1']['name'];
$folder="../upload/".$image1;
move_uploaded_file($_FILES['image1']['tmp_name'],$folder);
}
else
{
	$image1=$himage1;
}
if($_FILES['image2']['name']!="")
{
$image2=$_FILES['image2']['name'];
$folder2="../upload/".$image2;
move_uploaded_file($_FILES['image2']['tmp_name'],$folder2);
}
else
{
	$image2=$himage2;
}
//echo count($_FILES['gal_image']['name']); die;
$query_update=" UPDATE `banner` SET `image1`='$image1',`image2`='$image2' ,`text`='$text' WHERE `id`='$_REQUEST[id]'";
$res_query=mysql_query($query_update);
echo $res_query;
header("location:../index.php?module=edit_banner&header=banner&msg=submit Successfully&id=$_REQUEST[id]");



?>
