<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\OpeningBalance;

use App\Models\Mlogin;
use Carbon\Carbon;

class OpeningBalanceCtrl extends Controller
{
    public function openingBalance (){
		$data['main_menu'] = 'mnu_opening_balance';
		$data['sub_menu'] = '';
		$data['breadcrumb'] = [['opening-balance', 'Opening Balance']];
        return view('openingBalance.openingBalance')->withData($data);
    }
	/*================ add opening balance =================*/
	public function addOpeningBalance (Request $request){
		$h_name= $request->h_name;
		$date = Carbon::now();

		$stockArr =[
			'alloy_parchan' => $request->parchanalloy,
			'alloy_gold' 	=> $request->goldalloy,
			'fine_stock'	=> $request->finegold,
			'cash_stock'	=> $request->cashamaount,
			'updated_date_time' => $date
		];
		if($h_name == ""){
			$addstock = OpeningBalance::insert($stockArr);
			if($addstock){
				$return['key'] = 'S';
				$return['msg'] = 'Stock added Successfully.';
			}else{
				$return['key'] = 'E';
				$return['msg'] = 'Stock not Added.';
			}
		}else{
			$getbatchno = OpeningBalance::get()->toArray();
			$incriment = ($getbatchno[0]['batch_no'])+1;
			$updateArr = [
				'alloy_parchan' => $request->parchanalloy,
				'alloy_gold' 	=> $request->goldalloy,
				'batch_no' 		=> $incriment,
			];
			$updatestock = OpeningBalance::where('id', $h_name)->update($updateArr);
		    if($updatestock){
				$return['key'] = 'S';
				$return['msg'] = 'Stock update Successfully.';
			}
			else{
				$return['key'] = 'E';
				$return['msg'] = 'There is an error.';
			}
		}
		return $return;
    }
	/*======================= Get opening balance ==============*/
	public function getOpeningBalance (){
		$return['rowcount'] = OpeningBalance::count();
		$data = OpeningBalance::get()->toArray();
		$return['html'] = view('openingBalance.renderOpeningBalanceList')->withData($data)->render();
		return $return;
	}
	public function openingBalanceEdit(Request $request){
		// print_r($request->all());die;
		$password= $request['password'];
		$encode_password = base64_encode($password);
		// print_r($encode_password);die;
		$password_qry = Mlogin::where('opening_balance_psw', $encode_password)->get(['id'])->toArray();
		$countrow = count($password_qry);

		if($countrow > 0){
		 $qry = OpeningBalance::get()->toArray();
		 $data['qry']= $qry;
		 $data['id']= $password_qry;
         $data['key'] = 'S';
		}else{
			$data['key'] = 'E';
			$data['msg']= 'Please Enter valid password.';
		}
		return $data;
    }
}
