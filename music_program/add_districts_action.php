<?php
include('config.php');
	if (isset($_POST['submit'])){
		$state_id=$_POST['state'];
		$dist_name=$_POST['dist_name'];
		$qry = mysqli_query($con, "INSERT INTO `districts`(fk_state_id,district_name) VALUES('".$state_id."','".$dist_name."')");
	}
?>