<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);
$id=$_REQUEST['id'];
$query_delete="delete from color where id='$id'";
$res_delete=mysql_query($query_delete);
header("location:../index.php?module=color&header=Color");
?>


