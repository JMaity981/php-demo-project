<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);
//$title=addslashes($title);
//$description=addslashes($description);

$query_add="update `content` set `description`='$description' where id='$_REQUEST[id]'";

$res_query=mysql_query($query_add);

header("location:../index.php?module=content&&header=Content&&id=$_REQUEST[id]&msg=Updated successfully");

?>