<?php
session_start();
error_reporting(0);
include("admin/include/config.inc.php");
$db->connect();

$email = $_GET['email'];
$msg = "";
if($_GET['id']!='')
$sql = mysql_query("SELECT * FROM `tbl_registration` WHERE `email` = '$email' and `id`!=".$_GET['id']);
else
$sql = mysql_query("SELECT * FROM `tbl_registration` WHERE `email` = '$email'");
if(mysql_num_rows($sql) > 0)
{
	$msg = "<font face=\"Courier\" size=\"2\" color=\"#FF0000\">Not Available</font>";
}
else
{
	$msg = "<font face=\"Courier\" size=\"2\" color=\"#006600\">Available</font>";
}
echo $msg;
?>