<?php
   	include('config.php');
   	if(isset($_POST['submit'])){
   		$id = $_POST['hidden_student_id'];
	   	$first_name = $_POST['fname'];
		$middle_name = $_POST['mname'];
		$lirst_name = $_POST['lname'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$address = $_POST['address'];
		$pin_code = $_POST['pcode'];
		$updated_at = date("Y-m-d H:i:s");
		if($_FILES["profile_picture"]["name"] != ""){
			$target_file = $target_dir.basename($_FILES["profile_picture"]["name"]);
			if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
				$profile_pic = basename($_FILES["profile_picture"]["name"]);
			}
		}
		else{
			$profile_pic = $_POST['old_profile_picture'];
		}
		$qry = mysqli_query($con, "UPDATE students SET f_name='".$first_name."',m_name='".$middle_name."', l_name='".$lirst_name."', gender='".$gender."', dob='".$dob."', email='".$email."', mobile='".$mobile."', address='".$address."', pin_code='".$pin_code."', profile_pic='".$profile_pic."', updated_at='".$updated_at."' WHERE id='".$id."'");
		echo "Update Successfully";
   }
?>
