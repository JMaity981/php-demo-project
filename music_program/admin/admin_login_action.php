<?php
	include("../config.php");
	if(isset($_POST['login'])){
		$qry=mysqli_query($con,"SELECT * FROM admin_login WHERE email='".$_POST['email']."' AND password='".$_POST['password']."'");
		if($data = mysqli_fetch_assoc($qry)){
			$_SESSION['admin_id'] = $data['email'];
			header("location: user_details.php");
		}
		else{
			echo "Email Id and Password are Wrong";
		}	
	}
?>
