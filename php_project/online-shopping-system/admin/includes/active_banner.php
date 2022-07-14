<?php 
ob_start();
session_start();
include '../config.php';

//$page_id=$_REQUEST[page_id];



//$page_id=$_REQUEST[page_id];


$id=$_REQUEST['id'];
if($_REQUEST[action]=='active')
{


$query="update banner set status='1' where id='$id'";
$res=mysql_query($query);
}
if($_REQUEST[action]=='inactive')
{
$query="update banner set status='0' where id='$id'";
$res=mysql_query($query);
}
header("location:../index.php?module=banner&&header=Banner");
?>

