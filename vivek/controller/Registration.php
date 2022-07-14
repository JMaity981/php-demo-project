<?php
require_once '../db/connection.php';

class Registration{
	
	public function registrationUser(){
		global $conn;
		$data=array();
		$emailAddress='';
		$email_query = "SELECT email FROM `registration` WHERE `email` = '".$_POST['email']."' ";
		$email_connect = mysqli_query($conn, $email_query);
		$email_counts = mysqli_fetch_assoc($email_connect);
		$emailAddress=$email_counts['email'];
		
		if($emailAddress !=""){
			$data = array('res'=>2);
		}else{
			$appli_query = "SELECT `application_no` FROM `registration` ORDER BY id DESC LIMIT 1";
			$appli = mysqli_query($conn, $appli_query);
			$result = mysqli_fetch_assoc($appli);
			if($result['application_no'] != ''){
				$application_no = $result['application_no'] +1;
			}else{
				$application_no = '1000000000';
			}
			
			//print_r($_FILES);
			//die;
			
			if(isset($_FILES['photo'])){
			    if($_FILES['photo']['size'] > 10485760) { //10 MB (size is also in bytes)
			        $data = array('res'=>3);
			    } else {
			        $upload_path = '../view/public/uploaded_img/';
			
					$img=$_FILES['photo'];
					$rand_img = rand(1111,9999);
					$path = $_FILES['photo']['name'];
					$ext = pathinfo($path, PATHINFO_EXTENSION);
					$img_name=$rand_img.'.'.$ext;
					move_uploaded_file($img['tmp_name'],$upload_path.$img_name);

					$date = date('Y-m-d',strtotime(str_replace("/","-", $_POST['dob'])));
					$cerated_date = date("Y-m-d H:i:s");
					
					try{
						$quy = "INSERT INTO `registration` (`state`,`district`,`candidate_name`,`father_name`,`dob`,`photo`,`permanent_address`,`pin_code`,`office_address`,`mobile`,`email`,`aadhar`,`create_date`,`application_no`)VALUES ('".$_POST['state']."','".$_POST['district']."','".$_POST['candidatename']."','".$_POST['fathername']."','".$date."','".$img_name."','".$_POST['permanentaddress']."','".$_POST['pincode']."','".$_POST['officeaddress']."','".$_POST['mobile']."','".$_POST['email']."','".$_POST['aadhaar']."','".$cerated_date."','".$application_no."')";
						
						$insert = mysqli_query($conn,$quy);
						$data = array('res'=>0,'msg'=>'success','application_no'=>$application_no);
					}catch(Exception $e){
						$data = array('res'=>1,'msg'=>'success');
					}
			    }
			}
			
		}
		return $data;
	}
}
if(isset($_POST)){
	$data = Registration::registrationUser();
	echo json_encode($data);
}




