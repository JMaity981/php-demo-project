<?php
error_reporting(0);
ob_start();
session_start();

include '../config.php';
//extract($_POST);
//$filename=$_FILES['imgfile'];
extract($_POST);
//$id=$_GET['id'];
//if( $_SESSION['security_code'] == $_REQUEST['security_code'] && !empty($_SESSION['security_code'] ) )
//{	  
$ext=end(explode(".", $_FILES['imgfile']['name']));
if(($ext=='jpg')||($ext=='JPG') ||($ext=='PNG') ||($ext=='png'))
{
$random=rand(87,1000).time();
$newfile=$random.".".$ext;
$target="../upload/".$newfile;   
move_uploaded_file($_FILES['imgfile']['tmp_name'],$target);
$in=$newfile;
@unlink("../upload/".$old_img);
}
else 
{
	$newfile=$old_img;
}
foreach($avai_color as $a_color)
{
	$available_c.=$a_color.",";
}
echo $query_update="UPDATE `product` SET 
`cat_id` ='$cat_id',
`prod_name` = '$prod_name',
`prod_image`='".$newfile."',
`prod_details`= '$prod_details',
`prod_price` = '$prod_price',
`prod_color`='$prod_color',
`available_color`='".$available_c."',
`feature_prod`='$fet_prod',
`special_prod`='$spe_prod'
 WHERE `prod_id` ='$_REQUEST[prod_id]'"; 

$res_query=mysql_query($query_update);
$prod_id=mysql_insert_id();
	if($res_query)  {
		
		
	/*	for($j=0;$j< count($_FILES['gal_image']['name']);$j++)
			{
				$ext1=end(explode(".", $_FILES['gal_image']['name'][$j]));
				if(($ext1=='jpg')||($ext1=='JPG')||($ext1=='PNG') ||($ext1=='png'))
					 { 
				$random=rand(87,1000).time();
				$newfile1=$random.".".$ext1;
				$target="../1image/".$newfile1;   
				move_uploaded_file($_FILES['gal_image']['tmp_name'][$j],$target);
				  $in=$newfile1;
				$var=mysql_query("INSERT INTO product_image SET prod_id='".$_REQUEST['prod_id']."',image='".$newfile1."'");
			
	 				}
			}*/
header("location:../index.php?module=edit_product&header=product&msg=Update Successfully&prod_id=$_REQUEST[prod_id]");
	}
	
else{
header("location:../index.php?module=edit_product&header=product&msg=product Already Exist&prod_id=$_REQUEST[prod_id]");
}

	
?>

