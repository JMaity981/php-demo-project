<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);
if( $_SESSION['security_code'] == $_REQUEST['security_code'] && !empty($_SESSION['security_code'] ) )
{
$query_sel_u="select * from user where email='$email' and id!='$_REQUEST[id]'";
$res_sel_u=mysql_query($query_sel_u);
$row=mysql_num_rows($res_sel_u);



if($row<=0){



echo $query_update="UPDATE `user` SET `username` = '$username',
`password` = '$password',
`email` = '$email' WHERE `user_id` ='$_REQUEST[user_id] '";


$res_query=mysql_query($query_update);


header("location:../index.php?module=edit_user&header=user&msg=Update Successfully&id=$_REQUEST[user_id]");
}
else{
header("location:../index.php?module=edit_user&header=user&msg=Email Already Exist&id=$_REQUEST[user_id]");
}

}
?>

