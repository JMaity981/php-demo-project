<?php
session_start();
error_reporting(0);
include '../config.php';

if($_GET['val']==0)
$sql=mysql_query('update payment_details set status=1 where id='.$_GET['id']);
else
$sql=mysql_query('update payment_details set status=0 where id='.$_GET['id']);
header("location:../index.php?module=payment&header=payment");

?>