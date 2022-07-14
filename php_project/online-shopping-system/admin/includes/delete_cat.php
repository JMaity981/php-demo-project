<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);
extract($_GET);

$cat_id=$_REQUEST['cat_id'];

$query_delete="delete from category where cat_id='$cat_id'";
$res_delete=mysql_query($query_delete);
header("location:../index.php?module=category&header=Category");
?>


