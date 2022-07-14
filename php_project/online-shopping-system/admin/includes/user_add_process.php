<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);
if( $_SESSION['security_code'] == $_REQUEST['security_code'] && !empty($_SESSION['security_code'] ) )
{
$query_sel_u="select * from user where email='$email'";
$res_sel_u=mysql_query($query_sel_u);
$row=mysql_num_rows($res_sel_u);
if($row<=0){

$query_add="INSERT INTO `user` (
`username`,
`password`,
`email`
)
VALUES (
'$username', '$password', '$email')";
$res_query=mysql_query($query_add);
header("location:../index.php?module=user&header=User&msg=Register Successfully");
}
else{
header("location:../index.php?module=add_user&header=User&msg=Email Already Exist");
}
}
?>

