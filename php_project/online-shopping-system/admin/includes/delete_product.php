<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);
extract($_GET);

$prod_id=$_REQUEST['prod_id'];

$query_delete="delete from product where prod_id='$prod_id'";
$res_delete=mysql_query($query_delete);
header("location:../index.php?module=product&header=product");
?>