<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);
$id='$_REQUEST[id]';
//$title=addslashes($title);
$message=addslashes($message);
$query_add="update `cancel` set `message`='$message',`date`='$date', time='$time' where id='$_REQUEST[id]'";
$res_query=mysql_query($query_add);
header("location:../index.php?module=cancel&&header=cancel&&id=$_REQUEST[id]&msg=Updated successfully");
?>