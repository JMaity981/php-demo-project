<?php
include "config.php";
if(!empty($_POST['mobile_no'])){
	$ins_qry=mysqli_query($con,"UPDATE `sign_up_user` SET `mobile`='".$_POST['mobile_no']."' WHERE id='".$_SESSION['user_id']."'" );
	if($ins_qry){
		echo "success";
	}else{
		echo "error";
	}
}