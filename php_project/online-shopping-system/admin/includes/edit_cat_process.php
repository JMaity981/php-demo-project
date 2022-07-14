<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);
extract($_GET);

//if( $_SESSION['security_code'] == $_REQUEST['security_code'] && !empty($_SESSION['security_code'] ) )
//{

 $query_update="UPDATE `category` SET 
`cat_name` ='$cat_name'
 WHERE `cat_id` ='$_REQUEST[cat_id]'";
$res_query=mysql_query($query_update);

if($res_query)
{
header("location:../index.php?module=edit_cat&header=Category&msg=Update Successfully&cat_id=$_REQUEST[cat_id]");
}
else{
header("location:../index.php?module=edit_cat&header=City&msg=Category Already Exist&cat_id=$_REQUEST[cat_id]");
}

?>

