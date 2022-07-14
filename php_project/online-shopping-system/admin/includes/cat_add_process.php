<?php
error_reporting(0);
ob_start();
session_start();
include '../config.php';
extract($_POST);

$query_add="insert into category SET cat_name='".$cat_name."'";

$res_query=mysql_query($query_add);


header("location:../index.php?module=add_cat&header=Category&msg=submit Successfully");



?>

