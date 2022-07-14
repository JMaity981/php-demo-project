
<?php
	require_once('../db/connection.php');
	//echo"<pre>"; 
	//print_r($_POST);
	//print_r($_FILES);
	//die;
	//$count_username = 0;
	//$count_useremail = 0;
	$uid_qry = mysqli_query($conn,"SELECT user_name FROM login WHERE user_name='".$_POST['u_name']."'");
	$email_qry = mysqli_query($conn,"SELECT email FROM student_details WHERE email='".$_POST['email']."'");
	$count_username = mysqli_num_rows($uid_qry);
	$count_useremail = mysqli_num_rows($email_qry);
	if($_POST['h_id'] != ''){
		// $uid_data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT user_name FROM login WHERE fk_student_id='".$_POST['h_id']."'"));
		// $email_data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT email FROM student_details WHERE id='".$_POST['h_id']."'"));
		// if($_POST['u_name']==$uid_data['user_name']){
		// 	$count_username = 0;
		// }
		// if($_POST['email']==$email_data['email']){
		// 	$count_useremail = 0;
		// }
		if($_POST['u_name']==$_POST['h_username']){
		 	$count_username = 0;
		}
		if($_POST['email']==$_POST['h_email']){
			$count_useremail = 0;
		}
	}
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
		$f_name = $_POST['f_name'];
		$l_name = $_POST['l_name'];
		$depar = $_POST['depar'];
		$email = $_POST['email'];
		$phone = $_POST['c_no'];
		$h_id = $_POST['h_id'];
		$profile_photo= '';
		

		if(isset($_POST['u_name']) && isset($_POST['psw']) && isset($_POST['c_psw'])){
			$username = $_POST['u_name'];
			$password = $_POST['psw'];
			$c_password = $_POST['c_psw'];
		} else {
			$username = '';
			$password = '';
			$c_password = '';
		}

		// file upload start
		if(isset($_FILES['profile_pic'])){
			if($_FILES['profile_pic']['name'] != ''){
				$test = explode('.', $_FILES['profile_pic']['name']);
				$extension = end($test);    
				$profile_photo = rand(100,999).'.'.$extension;
			
				$location = '../uploads/'.$profile_photo;
				move_uploaded_file($_FILES['profile_pic']['tmp_name'], $location);
			}
		}

		// file upload end

		if($_POST['h_id'] == ''){
			$profile_pic = basename($_FILES["profile_pic"]["name"]);
			$qry = "INSERT INTO student_details (first_name,last_name,profile_pic,deparment,email,phone_no) VALUES('".$f_name."', '".$l_name."','".$profile_photo."', '".$depar."', '".$email."', '".$phone."')";
			$insert = mysqli_query($conn, $qry);
			$fk_student_id = $conn->insert_id;
			$qry2 = "INSERT INTO login (fk_student_id,user_name,password,is_active) VALUES ('".$fk_student_id."', '".$username."', '".$password."','Y')";
			$insert2 = mysqli_query($conn, $qry2);
			$return['key'] = 'S';
			$return['msg'] = 'Insert sucessfully.';
		}else{
			if(isset($_FILES['profile_pic'])){
				$old_photo= $_POST['h_photo'];
				$path= '../uploads/'.$old_photo;
				unlink($path);
				$qry3 = "UPDATE student_details SET first_name= '".$f_name."', last_name= '".$l_name."', profile_pic='".$profile_photo."', deparment= '".$depar."', email='".$email."', phone_no= '".$phone."' WHERE id='".$h_id."'";
			}else{
				$qry3 = "UPDATE student_details SET first_name= '".$f_name."', last_name= '".$l_name."', deparment= '".$depar."', email='".$email."', phone_no= '".$phone."' WHERE id='".$h_id."'";
			}
			$update = mysqli_query($conn, $qry3);
			if(isset($_POST['u_name']) && isset($_POST['psw']) && isset($_POST['c_psw'])){
				$qry4 = "UPDATE login SET user_name= '".$username."', password='".$password."' WHERE fk_student_id= '".$h_id."'";
				$update2= mysqli_query($conn, $qry4);
			}
			$return['key'] = 'S';
			$return['msg'] = 'Update successfully.';
		}
	}
	echo json_encode($return);
?>