<?php
require_once '../../db/connection.php';
class dashboard{
	
	public function statusChange(){
		global $conn;
		
		$rowid = $_POST['rowid'];
		$status_value = $_POST['value'];
		
		$quy = "UPDATE `registration` SET `verify_status` = '".$status_value."' WHERE `id` = '".$rowid."'";
		$update = mysqli_query($conn, $quy);
		
		$user_query = "SELECT * FROM `registration` WHERE `id` = '".$rowid."' ";
		$user_connect = mysqli_query($conn, $user_query);
		$user_da = mysqli_fetch_assoc($user_connect);
		if($status_value == 1){
			$status = "Application Varified";
		}else{
			$status = "Application Rejected";
		}
		//$user_data = ['name'=>$user_da['candidate_name'],'status'=>$status,'application_no'=>$user_da['application_no']];

		if($update){
			
			$data = ['res'=>1,'status'=>$status_value];
			
			$url = 'https://api.sendgrid.com/';
			$user = 'saimail';
			$pass = 'SoftAmassIndia!23';
			
			$json_string = array(

			  'to' => array(
				$user_da['email']
			  ),
			  'category' => 'test_category'
			);
			
			$template=file_get_contents(site_url().'varify_email.php');
			$body=strtr($template,array(
				'#name#'=>$user_da['candidate_name'],
				'#status#'=>$status,
				'#application_no#'=>$user_da['application_no']
			));
			$params = array(
				'api_user'  => $user,
				'api_key'   => $pass,
				'x-smtpapi' => json_encode($json_string),
				'to'        => $user_da['email'],
				'subject'   => 'Verify Application',
				'html'      => $body,
				'text'      => 'testing body',
				'from'      => 'noreply@dgsk.co.in',
				'addHeader' => 'From'
				
			  );


			$request =  $url.'api/mail.send.json';

			// Generate curl request
			$session = curl_init($request);
			// Tell curl to use HTTP POST
			curl_setopt ($session, CURLOPT_POST, true);
			// Tell curl that this is the body of the POST
			curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
			// Tell curl not to return headers, but do return the response
			curl_setopt($session, CURLOPT_HEADER, false);
			// Tell PHP not to use SSLv3 (instead opting for TLS)
			curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
			curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

			// obtain response
			$response = curl_exec($session);
			curl_close($session);
			
			/// end mail function
		}else{
			$data = ['res'=>0];
		}
		return $data;
	}
}
if(isset($_POST)){
	$data = dashboard::statusChange();
	echo json_encode($data);
}




