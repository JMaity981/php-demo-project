<?php
include('config.php');
if(isset($_POST['sign_up'])){
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$state = $_POST['state'];
	$district = $_POST['district'];
	$pin_code = $_POST['pin_code'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$target_dir = "upload/";
	$target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
	if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
        $profile_pic = basename($_FILES["profile_pic"]["name"]);
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $qry = mysqli_query($con, "INSERT INTO `sign_up_user`(name, gender, profile_pic, dob, state, district, pin_code, mobile, email, password, created_at, updated_at) VALUES( '".$name."', '".$gender."','".$profile_pic."','".$dob."','".$state."','".$district."', '".$pin_code."', '".$mobile."','".$email."','".$password."', '".$created_at."', '".$updated_at."')");
        if($qry){
        	echo "Sign UP successfully";
        }else{
	    	echo mysqli_error($con);
	        echo "Sorry, there was an error uploading your file";
	    }
    }else{
        echo "Sorry, there was an error uploading your file";
    }
}
?>