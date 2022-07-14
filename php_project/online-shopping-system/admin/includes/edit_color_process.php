<?php
ob_start();
session_start();
include '../config.php';
extract($_POST);

//if( $_SESSION['security_code'] == $_REQUEST['security_code'] && !empty($_SESSION['security_code'] ) )
//{

if($_FILES['image1']['name']!="")
{
$image1=time().$_FILES['image1']['name'];
$folder="../upload/".$image1;
move_uploaded_file($_FILES['image1']['tmp_name'],$folder);
@unlink("../upload/".$himage1);
}
else
{
	$image1=$himage1;
}

 $query_update="UPDATE `color` SET 
`clour_name` ='$clour_name',
`color_image` ='$image1'
 WHERE `id` ='$_REQUEST[id]'";
$res_query=mysql_query($query_update);

if($res_query)
{
header("location:../index.php?module=edit_color&header=Color&msg=Update Successfully&id=$_REQUEST[id]");
}
else{
header("location:../index.php?module=edit_color&header=Color&msg=Color Already Exist&id=$_REQUEST[id]");
}

?>

