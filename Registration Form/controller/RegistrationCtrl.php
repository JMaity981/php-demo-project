<?php
	require_once('../db/connection.php');
	//echo"<pre>"; 
	//print_r($_GET);
	//die;

	$f_name = $_GET['f_name'];
	$l_name = $_GET['l_name'];
	$depar = $_GET['depar'];
	$email = $_GET['email'];
	$phone = $_GET['c_no'];
	$username = $_GET['u_name'];
	$password = $_GET['psw'];
	$c_password = $_GET['c_psw'];
	$h_id = $_GET['h_id'];

	$errorMessage = [];
	$is_true = false;

	if(strlen($f_name)<51 && $f_name!=NULL){
		$is_true = true;
	}
	else{
		$is_true = false;
		$errorMessage[] = 'Either First name blank or greater than 50 char.';
	}

	if(strlen($l_name)<=50 && $l_name!='') {
		$is_true = true;
	}
	else{
		$is_true = false;
		$errorMessage[] = 'Either Last name blank or greater than 50 char.';
	}

	if($depar!=NULL) {
		$is_true = true;
	}
	else{
		$is_true = false;
		$errorMessage[] = 'Either not choose any department.';
	}

	if(strlen($email)<=50 && $email!='') {
		$is_true = true;
	}
	else{
		$is_true = false;
		$errorMessage[] = 'Either email blank or greater than 50 char.';
	}

	if(strlen($phone)==10) {
		$is_true = true;
	}
	else{
		$is_true=false;
		$errorMessage[] = 'Either your mobile number does not 10 numbers';
	}

	if($password == $c_password && $password!=''){
		$is_true = true;
	}
	else{
		$is_true=false;
		$errorMessage[] = 'Either password blank or Password and Confirm Pasword does not match.';
	}

	if(strlen($username)<=50 && $username!='') {
		$is_true = true;
	}
	else{
		$is_true = false;
		$errorMessage[] = 'Either username blank or greater than 50 char.';
	}

	if ($is_true && sizeof($errorMessage)==0) {
		if($_GET['h_id'] == ''){
			$qry = "INSERT INTO student_details (first_name,last_name,deparment,email,phone_no) VALUES('".$f_name."', '".$l_name."', '".$depar."', '".$email."', '".$phone."')";
			$insert = mysqli_query($conn, $qry);
			$fk_student_id = $conn->insert_id;
			$qry2 = "INSERT INTO login (fk_student_id,user_name,password,is_active) VALUES ('".$fk_student_id."', '".$username."', '".$password."','Y')";
			$insert2 = mysqli_query($conn, $qry2);
		}else{
			$qry3 = "UPDATE student_details SET first_name= '".$f_name."', last_name= '".$l_name."', deparment= '".$depar."', email='".$email."', phone_no= '".$phone."' WHERE id='".$h_id."'";
			$update = mysqli_query($conn, $qry3);
			$qry4 = "UPDATE login SET user_name= '".$username."', password='".$password."' WHERE fk_student_id= '".$h_id."'";
			$update2= mysqli_query($conn, $qry4);
		}
		$errorMessage = [];
	}
	
	echo implode(',', $errorMessage);
?>