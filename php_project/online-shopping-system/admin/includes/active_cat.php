<?php 
ob_start();
session_start();
include '../config.php';

//$page_id=$_REQUEST[page_id];



//$page_id=$_REQUEST[page_id];


$cat_id=$_REQUEST['cat_id'];
if($_REQUEST[action]=='active')
{


$query="update category set status='1' where cat_id='$cat_id'";
$res=mysql_query($query);
}
if($_REQUEST[action]=='inactive')
{
$query="update category set status='0' where cat_id='$cat_id'";
$res=mysql_query($query);
}
header("location:../index.php?module=category&&header=Category");
?>

