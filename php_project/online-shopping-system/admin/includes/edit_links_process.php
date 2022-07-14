<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);



//$title=addslashes($title);




//$description=htmlentities($description);

$query_add="update `links` set `title`='$title' ,`description`='$description' , `url`='$url' where id='$_REQUEST[id]'";

$res_query=mysql_query($query_add);

header("location:../index.php?module=edit_links&&header=Links&id=$_REQUEST[id]&msg1=Updated successfully");




?>