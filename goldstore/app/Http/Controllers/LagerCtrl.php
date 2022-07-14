<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lager;

use DB;
use Response;
class LagerCtrl extends Controller
{
    public function userregistration (){
		$data['main_menu'] = 'mnu_lager';
		$data['sub_menu'] = '';
		$data['breadcrumb'] = [['lager', 'Ledger']];
        return view('lager.Lager')->withData($data);
    }
	/*---------- User Registration -----------*/
	public function addLager (Request $request){
		//print_r($request->all());die;
		
		
		$updateid = $request->hidden_userid;
		$hiddenmbno = $request->hidden_mb_no;
		$mobilenocount = Lager::where('phone_no',$request->phoneno)->count();
		
		//image upload
		$customer_photo = '';
		$imagepath = storage_path('userimage');
		if($request->has('user_photo')){
			$file = $request->file('user_photo');
			$extention = $file->getClientOriginalExtension();
			if($extention == 'jpg' || $extention == 'jpeg' || $extention == 'png'){
				$customer_photo = rand(200,800).'.'.$extention;
				$file->move($imagepath, $customer_photo);
			}else{
				$return['key'] = 'E';
				$return['msg'] = 'You can upload only .jpg , .jpeg , .png file';
				return $return;
			}
		}
		
		if($updateid == ''){
			$userRegArr = [
				'jewelry_name' 		=> $request->jewelry_name,
				'proprietor_name'	=> $request->proprietor_name,
				'phone_no' 			=> $request->phoneno,
				'address' 			=> $request->address,
				'proprietor_image'	=> $customer_photo,
				'gst_number' 		=> $request->gst_number,
				'create_date_time' 	=> date('Y-m-d H:i:s'),
				'is_active' 		=> 'A',
				'is_delete' 		=> 'N',
			];
			if($mobilenocount == 0){
				$adduser = Lager::insert($userRegArr);
				$return['key'] = 'S';
				$return['msg'] = 'Customer successfully added.';
			}else{
				$return['key'] = 'E';
				$return['msg'] = 'Mobile no already exist.';
			}
			
		}else{
			if(!$request->has('user_photo')){
				$customer_photo = $request->hidden_file_name;
			}else{
				unlink("storage/userimage/".$request->hidden_file_name);
			}
			$userUpdateArr = [
				'jewelry_name' 		=> $request->jewelry_name,
				'proprietor_name'	=> $request->proprietor_name,
				'phone_no' 		    => $request->phoneno,
				'address' 			=> $request->address,
				'proprietor_image'	=> $customer_photo,
				'gst_number' 		=> $request->gst_number,
				'update_date_time'	=> date('Y-m-d H:i:s'),
			];
			if($request->hidden_mb_no != $request->phoneno){
				if($mobilenocount == 0){
					$updateuser = Lager::where('id', $updateid)->update($userUpdateArr);
					$return['key'] = 'S';
					$return['msg'] = 'Value successfully updated.';
				}else{
					$return['key'] = 'E';
					$return['msg'] = 'Mobile no already exist.';
				}
			}else{
				$updateuser = Lager::where('id', $updateid)->update($userUpdateArr);
				$return['key'] = 'S';
				$return['msg'] = 'Value successfully updated.';
			}
			
		}
		
		return $return;
	}
	/*------------- User Registration data-table ------------*/
	public function userregistrationAjaxTbl (Request $request){
		// print_r($request->all());die;
		$columns = array('jewelry_name','proprietor_name','phone_no','gst_number');
		
		$data_qury = "SELECT * FROM tbl_lager WHERE is_delete = 'N'";
		$count_qury = "SELECT COUNT(id) FROM tbl_lager WHERE is_delete = 'N'";
		
		$search_qry = '';
		if(!empty($request->input('search.value'))){
			$search = strtoupper($request->input('search.value'));
			$data_qury = "SELECT * FROM tbl_lager WHERE is_delete = 'N' AND (UPPER(jewelry_name) LIKE '%".$search."%' OR UPPER(proprietor_name) LIKE '%".$search."%' OR phone_no LIKE '%".$search."%' OR UPPER(gst_number) LIKE '%".$search."%')";
			$count_qury = "SELECT COUNT(id) FROM tbl_lager WHERE is_delete = 'N' AND (UPPER(jewelry_name) LIKE '%".$search."%' OR UPPER(proprietor_name) LIKE '%".$search."%' OR phone_no LIKE '%".$search."%' OR UPPER(gst_number) LIKE '%".$search."%')";
		}
		$count = DB::select($count_qury.$search_qry);
		$j_decode = json_decode(json_encode($count,true),true);
		$total_data = 0;
		if(count($j_decode) > 0){
			$total_data = $j_decode[0]['COUNT(id)'];
		}
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		$offset = $request->input('start');
		$limit = $request->input('length');
		$final_qry = $data_qury.$search_qry." ORDER BY ".$order." ".$dir." LIMIT ".$limit." OFFSET ".$offset."";
		$GetData = DB::select($final_qry);
		$decode = json_decode(json_encode($GetData , true), true);
		$data = [];
		if(!empty($decode)){
			foreach($decode as $value){
				//print_r($value);die;
				//check active inactive
				switch ($value['is_active']) {
					case "A":
						$status = 'Active';
						$checked = 'checked';
						$color = 'primary';
					break;
					case "I":
						$status = 'Inactive';
						$checked = '';
						$color = 'danger';
					break;
				}
				
				$row = array();
				$row[] = $value['proprietor_name'];
				$row[] = $value['jewelry_name'];
				$row[] = $value['phone_no'];
				$row[] = $value['gst_number'];
				$row[] = '<div class="custom-control custom-switch">
							<input type="checkbox" data-id="'.$value['id'].'" class="custom-control-input change-status" id="'.$value['id'].'" '.$checked.'>
							<label class="custom-control-label" for="'.$value['id'].'"></label>
							<span class="badge badge-'.$color.'">'.$status.'</span>
						</div>';
				$row[] = '<button type="button" class="btn btn-danger btn-sm customer-delete" data-id="'.$value['id'].'">
								<i class="fadeIn animated bx bx-trash-alt"></i>
							</button>
							<button type="button" class="btn btn-primary btn-sm customer-update" data-id="'.$value['id'].'">
								<i class="fadeIn animated bx bx-pencil"></i>
							</button>
							<button type="button" class="btn btn-success btn-sm view-user-details" data-id="'.$value['id'].'">
								<i class="fadeIn animated bx bx-user"></i>
							</button>';
				$data[] = $row;
			}
		}
		$json_data = array(
			"draw" => intval($request->input('draw')),
			"recordsTotal" => intval($total_data),
			"recordsFiltered" => intval($total_data),
			"data" => $data
		);
		return Response::json($json_data);
	}
	/*------------- customer status change ---------------*/
	public function customerStatusChange (Request $request){
		$updateid = $request->id;
		$status = $request->status;
		$statusupdate = Lager::where('id',$updateid)->update(['is_active'=> $status]);
		$return['key'] = 'S';
		$return['msg'] = 'Status has been updated.';
		return $return;
	}
	/*------------- customer delete ------------*/
	public function customerDelete (Request $request){
		$deleteid = $request->id;
		$gold_balence = Lager::where('id', $deleteid)->pluck('gold_balance');
		$cash_balence = Lager::where('id', $deleteid)->pluck('cash_balance');
		if($gold_balence[0] == 0 AND $cash_balence[0] == 0){
			$userdelete = Lager::where('id',$deleteid)->update(['is_delete' => 'Y']);
			$return['key'] = 'S';
			$return['msg'] = 'User has been deleted.';
		}else{
			$return['key'] = 'E';
			$return['msg'] = 'Gold & Cash Balence Not Cleared.';
		}
		return $return;
	}
	/*---------- customer update -------------*/
	public function customerUpdate (Request $request){
		$updateid = $request->id;
		$getupdatedata = Lager::where('id',$updateid)->get()->toArray();
		return $getupdatedata;
	}

	//Get Lager Data
	/*public function getLagerData(Request $request){
        $c_id = $request->customer_id;
        // print_r($c_id);die;
        $lager_data = Lager::where('id',$c_id)->get()->toArray();
        return $lager_data;
    }*/
}
