<?php
include("../config.php");
if(!isset($_SESSION['admin_id'])){
	header("Location:index.php");
}
if(isset($_GET["user_id"])){
	$x=$_GET["user_id"];
	$del="DELETE FROM sign_up_user WHERE id=$x";
	if ($con->query($del)==TRUE){
		header("Location:user_details.php");
	}else{
		echo "Error deleting user:".$con->error;
	}
	$con->close();
}
?>