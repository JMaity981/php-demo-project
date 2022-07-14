<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);
$pass=MD5($password);

$qur_service="update `users` SET uname='$f_name' , pass='$pass', `fname`='$fname', `lname`='$lname',`email`='$email',`paypal`='$paypal' where id='$_REQUEST[id]'";

$res_service=mysql_query($qur_service);

header("location:../index.php?module=add_admin_user&header=Manage Account&&id=$_REQUEST[id]");

?>
