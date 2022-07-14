<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mlogin;
use Cookie;
use DB;

class LoginCtrl extends Controller
{
    public function login (){
        return view('login');
    }
    public function loginauth (Request $request){
		//print_r($request->all());die;
		
        $userid = $request->loginemail;
		$password = base64_encode($request->loginpassword);
		$currentdate = date('Y-m-d');
		
		$currentdatetime = date('Y-m-d H:i:s');
		$count = Mlogin::where('user_name',$userid)->where('password',$password)->count();
		
		if($count > 0){
				//get login user data
			$loginuserdata = Mlogin::where('user_name',$userid)->where('password',$password)->get()->toArray();
			$decodeexpdate = base64_decode($loginuserdata[0]['licence_key']);
			if(strtotime($currentdate) <= strtotime($decodeexpdate)){
				$request->session()->put('is_login', true);
				$request->session()->put('username', $userid);
				
				$updatelogindatetime = Mlogin::where('user_name',$userid)->update(['last_login' => $currentdatetime]);
				
				if($request->has('remember_me')){
					Cookie::queue('username', $userid);
					Cookie::queue('password', $request->loginpassword);
				}
				$return['key'] = 'S';
				$return['msg'] = 'Login Successful.';
				$return['url'] = url('lager');
			}else{
				$return['key'] = 'E';
				$return['msg'] = 'Your licence has-been expire, Renew your licence. Plese contact your software provider';
			}
		}else{
			$return['key'] = 'E';
			$return['msg'] = 'Credential not match.';
		}
		return $return;
    }
    public function cngPsw (Request $request){
		// print_r($request->all());die;
        $get_psw_tbl_data = Mlogin::get()->toArray();
        $get_old_psw = $get_psw_tbl_data[0]['password'];
		$old_psw = base64_encode($request->old_psw);
		// print($get_old_psw);die;
		if($get_old_psw!=$old_psw){
			$return['key'] = 'E';
			$return['msg'] = 'Your Old Password Does not Match.';
		}else{
			$new_psw = base64_encode($request->con_new_psw);
			$update_psw = Mlogin::where('id', 1)->update(array('password' => $new_psw));
			if($update_psw){
				$return['key'] = 'S';
				$return['msg'] = 'Your Password Successfully Changes.';
			}else{
				$return['key'] = 'E';
				$return['msg'] = 'Your Password Not Changes.';
			}
		}
		return $return;
	}
}
