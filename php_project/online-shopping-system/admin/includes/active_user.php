<?php 
ob_start();
session_start();
include '../config.php';

//$page_id=$_REQUEST[page_id];



//$page_id=$_REQUEST[page_id];


$id=$_REQUEST[user_id];
if($_REQUEST[action]=='active')
{


$query="update user set status='1' where user_id='$id'";
$res=mysql_query($query);
}
if($_REQUEST[action]=='inactive')
{
$query="update user set status='0' where user_id='$id'";
$res=mysql_query($query);
}
header("location:../index.php?module=user&&header=User");
?>
