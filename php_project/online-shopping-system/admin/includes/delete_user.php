<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);
extract($_GET);

$id=$_REQUEST[user_id];

$query_delete="delete from user where user_id='$id'";
$res_delete=mysql_query($query_delete);
header("location:../index.php?module=user&header=User");
?>

