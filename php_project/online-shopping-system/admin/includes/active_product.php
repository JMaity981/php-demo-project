<?php 
ob_start();
session_start();
include '../config.php';

//$page_id=$_REQUEST[page_id];



//$page_id=$_REQUEST[page_id];


$prod_id=$_REQUEST['prod_id'];
if($_REQUEST[action]=='active')
{


$query="update product set status='1' where prod_id='$prod_id'";
$res=mysql_query($query);
}
if($_REQUEST[action]=='inactive')
{
$query="update product set status='0' where prod_id='$prod_id'";
$res=mysql_query($query);
}
header("location:../index.php?module=product&&header=product");
?>



