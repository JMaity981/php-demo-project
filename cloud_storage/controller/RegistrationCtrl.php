
<?php
	require_once('../db/connection.php');
	$uid_qry = mysqli_query($conn,"SELECT user_name FROM resistration WHERE user_name='".$_POST['u_name']."'");
	$email_qry = mysqli_query($conn,"SELECT email FROM resistration WHERE email='".$_POST['email']."'");
	$count_username = mysqli_num_rows($uid_qry);
	$count_useremail = mysqli_num_rows($email_qry);

	if($count_username > 0 && $count_useremail > 0){
		$return['key'] = 'E';
		$return['msg'] = 'User Id & Email Already Exists.';
	}
	else if($count_username > 0){
		$return['key'] = 'E';
		$return['msg'] = 'User Name Already Exists.';
	}else if($count_useremail > 0){
		$return['key'] = 'E';
		$return['msg'] = 'Email Id Already Exists.';
	}else{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$username = $_POST['u_name'];
		$password = $_POST['psw'];
		$package = $_POST['package'];
		
		$qry = "INSERT INTO resistration (name, email, user_name, password, package_id) VALUES ('".$name."', '".$email."','".$username."', '".$password."', '".$package."')";
		$insert = mysqli_query($conn, $qry);
		if($insert)	{
			$return['key'] = 'S';
			$return['msg'] = 'Resistration Sucessfully.';
		}else{
			$return['key'] = 'E';
			$return['msg'] = 'Resistration is Not Completed.';
		}
	}
	echo json_encode($return);
?>