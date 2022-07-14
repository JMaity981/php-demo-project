<?php
error_reporting(0);
ob_start();
session_start();
include '../config.php';
extract($_POST);
$image1=$_FILES['image1']['name'];
$image2=$_FILES['image2']['name'];
$folder="../upload/".$image1;
$folder2="../upload/".$image2;
if(move_uploaded_file($_FILES['image1']['tmp_name'],$folder))
{
if(move_uploaded_file($_FILES['image2']['tmp_name'],$folder2))
{
//echo count($_FILES['gal_image']['name']); die;
  

$query_add="INSERT INTO `banner` SET `image1`='".$image1."',`image2`='".$image2."' ,`text`='".$text."'";
$res_query=mysql_query($query_add);
echo $res_query;
header("location:../index.php?module=add_banner&header=banner&msg=submit Successfully");

}
}