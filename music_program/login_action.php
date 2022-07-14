<?php
	include('config.php');
	if(isset($_POST['login'])){
		$qry=mysqli_query($con,"SELECT * FROM sign_up_user WHERE mobile='".$_POST['mobile']."' AND password='".$_POST['password']."'");
		$data = mysqli_fetch_assoc($qry);
		$_SESSION['username'] = $data["name"];
		$_SESSION['user_id'] = $data["id"];
		
		header("location:index.php");
	}
?>

