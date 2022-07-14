<?php
require_once '../db/connection.php';

class Cheackstatus{
	
	public function cheack_status(){
		global $conn;
		$data=array();
		$appli_no = $_POST['appli_no'];
		$query = "SELECT `candidate_name`,`photo`,`verify_status` FROM `registration` WHERE `application_no` = '".$appli_no."' ";
		$querydata = mysqli_query($conn, $query);
		$cheack = mysqli_fetch_assoc($querydata);
		$count = mysqli_num_rows($querydata);
		
		if($count == 0){
			$data = ['res'=>1];
		}else{
			if($cheack['verify_status'] == 0){
				$data = ['res'=>0,'status'=>2, 'name'=>$cheack['candidate_name'], 'photo'=>$cheack['photo'], 'appli_no'=>$appli_no, 'msg'=>"Your Application is Under review"];
			}else if($cheack['verify_status'] == 1){
				$data = ['res'=>0,'status'=>1, 'name'=>$cheack['candidate_name'], 'photo'=>$cheack['photo'], 'appli_no'=>$appli_no, 'msg'=>"Your Application is verified"];
			}else {
				$data = ['res'=>0,'status'=>0, 'name'=>$cheack['candidate_name'], 'photo'=>$cheack['photo'], 'appli_no'=>$appli_no, 'msg'=>"Your Application is rejected"];
			}
		}
		
		return $data;
	}
}
if(isset($_POST)){
	$data = Cheackstatus::cheack_status();
	echo json_encode($data);
}




