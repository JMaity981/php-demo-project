<?php
error_reporting(0);
ob_start();
session_start();
include '../config.php';//$db->connect("mysql");
$id=$_POST['id'];
$sql=mysql_query("delete from product_image where id=".$id);

//echo 'hello';