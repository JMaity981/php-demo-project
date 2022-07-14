<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);
extract($_GET);
$id=$_REQUEST[id];
$query_delete="delete from payment_details where id='$id'";
$res_delete=mysql_query($query_delete);
header("location:../index.php?module=payment&header=payment");
?>

