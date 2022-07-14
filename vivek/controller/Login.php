<?php
require_once '../db/connection.php';

class Login{
	
	public function loginAdmin(){
		global $conn;
	
		$user_name = $_POST['email'];
		$password = $_POST['password'];
		
		$quy = "SELECT * FROM `admin` WHERE `user_name` = '".$user_name."' AND `password` = '".$password."' ";
		
		$log = mysqli_query($conn, $quy);
		$result = mysqli_fetch_assoc($log);
		$total = mysqli_num_rows($log);
	

		if($total == 0){
			$data = ['res'=>1];
		}else{
			$data = ['res'=>0];
			$_SESSION["login_id"] = $result['id'];
		}
		return $data;
	}
}
if(isset($_POST)){
	$data = Login::loginAdmin();
	echo json_encode($data);
}




