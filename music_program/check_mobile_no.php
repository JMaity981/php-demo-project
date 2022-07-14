<?php
	include('config.php');
	$mobile = $_POST['mobile'];
	$qry=mysqli_query($con,"SELECT * FROM sign_up_user WHERE mobile='".$_POST['mobile']."' ");
	$data = mysqli_fetch_assoc($qry);
	if ($data==0){
		echo "success";
	}
	else{
		echo "error";
	}
?>