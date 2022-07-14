<?php
include('config.php');
if(isset($_POST['submit'])){
	$first_name = $_POST['fname'];
	$middle_name = $_POST['mname'];
	$lirst_name = $_POST['lname'];
	$gender = $_POST['gender'];
	$date_of_birth = $_POST['dob'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];
	$pin_code = $_POST['pcode'];
	$target_dir = "upload/";
	$target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
	if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
        $profile_pic = basename($_FILES["profile_picture"]["name"]);
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $qry = mysqli_query($con, "INSERT INTO `students`(f_name, m_name, l_name, gender, dob, email, mobile, address, pin_code, profile_pic, created_at, updated_at) VALUES('".$first_name."', '".$middle_name."', '".$lirst_name."', '".$gender."','".$date_of_birth."','".$email."', '".$mobile."', '".$address."', '".$pin_code."', '".$profile_pic."', '".$created_at."', '".$updated_at."')");
        echo "Insert successfully";
    } else {
    	echo mysqli_error($con);
        echo "Sorry, there was an error uploading your file";
    }
}
?>