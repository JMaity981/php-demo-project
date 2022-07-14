<?php
include('config.php');
include('https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js');
if(isset($_POST['sign_up'])){
	$name = $_POST['name'];
	$target_dir = "upload/";
	$target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
	$gender = $_POST['gender'];
	$date_of_birth = $_POST['dob'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];
	$pin_code = $_POST['pcode'];
	$password = $_POST['password'];
	
	if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
        $profile_pic = basename($_FILES["profile_picture"]["name"]);
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $qry = mysqli_query($con, "INSERT INTO `sign_up`(name, profile_pic, gender, date_of_birth, email, mobile, address, pin_code, password, created_at, updated_at) VALUES('".$name."', '".$profile_pic."','".$gender."','".$date_of_birth."','".$email."', '".$mobile."', '".$address."', '".$pin_code."','".$password."', '".$created_at."', '".$updated_at."')");
        echo "Sign up successfully";
    } else {
    	echo mysqli_error($con);
        echo "Sorry, there was an error uploading your file";
    }
}
?>