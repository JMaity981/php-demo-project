<?php
	include("config.php");
	if(isset($_POST['save'])){
		$user_id = $_POST['hidden_user_id'];
		$old_psw = $_POST['old_psw'];
		$new_psw = $_POST['new_psw'];
		$qry=mysqli_query($con,"SELECT * FROM sign_up_user WHERE id='".$user_id."' AND password='".$old_psw."'");
		if($data = mysqli_fetch_assoc($qry)){
			$sql= UPDATE sign_up_user SET password = '".$new_psw."' WHERE id='".$user_id."';
				if ($conn->query($sql) === TRUE) {
					echo "password changed successfully";
				} else {
					echo "Error updating record: " . $conn->error;
				}
		}
	}
?>