<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lager;
use App\Models\SerialNo;
use App\Models\ExchangeSample;
use App\Models\Exchange;
use App\Models\OpeningBalance;
use App\Models\FundCreditDebit;
use DB;



class RecivedCtrl extends Controller
{
    public function recived (){
		$data['main_menu'] = 'mnu_recived';
		$data['sub_menu'] = '';
		$data['breadcrumb'] = [['recived', 'Received']];
		$data['serialno'] = SerialNo::get()->toArray();
		$data['lager'] = Lager::get()->where('is_active','A')->where('is_delete','N')->toArray();
		//echo'<pre>';print_r($data['lager']);die;
        return view('recived.recived')->withData($data);
    }

	//add sample & wait
	public function addSampleWait(Request $request){
		// print_r($request->all());die;
		if($request->hidden_lager_id == '0' && $request->customer_name == ''){
			$return['key'] = 'E';
			$return['msg'] = 'Please Select Ledger or Type Customer Name';
		}else{
			$exchange_sample_array = [];
			$exchangearray = [];
			// $weight = 0;
			foreach ($request['samplename'] as $key => $value) {
				$goldweight = $request['gold_weight'][$key];
					//exchange sample array
				$exchange_sample_array[] = [
					'sl_no' => $request->hiddenserialno,
					'fk_lager_id' => $request->hidden_lager_id,
					'customer_name' => $request->customer_name,
					'sample_name' => $value,
					'weight' => $goldweight,
					'created_date_time' => date('Y-m-d H:i:s')
				];
				// $weight += $goldweight;
			}
			$insert_exchange_sample = ExchangeSample::insert($exchange_sample_array);
			
			if($insert_exchange_sample){
				$getserialno = SerialNo::get()->toArray();
				$incriment = ($getserialno[0]['serial_no'])+1;
				$updateserialno = DB::table('tbl_serial_no')->update(['serial_no' => $incriment]);
				$return['serialno'] = SerialNo::get()->toArray();
			}
			$return['key'] = 'S';
			$return['msg'] = 'Value successfully added.';
			$return['serial_no'] = $request->hiddenserialno;
		}
		return $return;
	}
	public function addPurity (Request $request){
		//print_r($request->all());die;
		
		//---------- update tbl exchange tbl (new) ----------//
		$updateid = $request->id;
		$purity = $request->purity;
		$servicecharge = $request->servicecharge;
		if(($request->paid) != ''){
			$paidstatus = $request->paid;
		}else{
			$paidstatus = 'D';
		}
		
		$exchangeupdate = DB::table('tbl_exchange_sample')->where('id',$updateid)->update(['purity' => $purity , 'service_charge' => $servicecharge , 'paid_status'=> $paidstatus]);
		
        $get_stock = OpeningBalance::select('cash_stock')->get()->toArray();
        $cash_stock = $get_stock[0]['cash_stock'];

        $get_ledger_id = ExchangeSample::select('fk_lager_id')->where('id',$updateid)->get()->toArray();
		$ledger_id = $get_ledger_id[0]['fk_lager_id'];

		if($paidstatus == 'D' && $servicecharge!='' && $ledger_id!=0 && $purity!=''){
			$get_ledger_balance = Lager::select('cash_balance','gold_balance')->where('id',$ledger_id)->get()->toArray();
			$cash_balance = $get_ledger_balance[0]['cash_balance'];	
			$gold_balance = $get_ledger_balance[0]['gold_balance'];

			$cash_balance -= ($servicecharge);

			$insert_fund_debit = array(
				"fk_lager_id"=>$ledger_id,
				"type"=>'C',
				"amount"=>$servicecharge,
				"transaction_type"=>'D',
				"remarks"=>"Service Charge Due",
				"created_date_time" => date('Y-m-d H:i:s'),
				"updated_cash"=>$cash_balance,
				"updated_gold"=>$gold_balance
			);
			$insert_fund = FundCreditDebit::insertGetId($insert_fund_debit);
            $update_ledger = Lager::where('id', $ledger_id)->update(['cash_balance'=> $cash_balance,'updated_balance_time'=>date('Y-m-d H:i:s')]);

		}elseif($paidstatus == 'P' && $servicecharge!=''){
			$cash_stock += $servicecharge;
            $update_stock = OpeningBalance::where('id', 1)->update(['cash_stock'=> $cash_stock]);
		}
		
		$return['key'] = 'S';
		$return['msg'] = 'Successfully added.';
		return $return;
	}
	//get sample list
	public function getSampleList(){
		//get tbl exchange sample
		//$data['getexchangesample'] = ExchangeSample::where('service_charge', '=', NULL, 'OR', 'purity', '=', NULL)->get()->toArray();
		$data['getexchangesample'] = ExchangeSample::where('service_charge', '=', NULL)
													->orWhere('purity', '=', NULL)->get()->toArray();
		//print_r($data);die;
		$return['html'] = view('recived.renderSampleList')->withData($data)->render();
		return $return;
	}
	public function insertExchange(Request $request){
		// print_r($request->all());die;
        $lager_id = $request->hidden;

		$alloy_weight = $request->alloy_weight;
        $purity = $request->purity;
        $fine_gold = $request->fine_gold;

        $get_stock = OpeningBalance::get()->toArray();
        $alloy_parchan = $get_stock[0]['alloy_parchan'];
        $alloy_gold = $get_stock[0]['alloy_gold'];
		$fine_stock = $get_stock[0]['fine_stock'];
		$batch_no = $get_stock[0]['batch_no'];

		$alloy_parchan += $alloy_weight;
		$alloy_gold += $fine_gold;
		$fine_stock -= $fine_gold;

        $insertArr = [
            'fk_lager_id' => $lager_id,
            'alloy_weight' => $alloy_weight,
            'purity' => $purity,
            'fine_gold_weight' => $fine_gold,
			'batch_no' => $batch_no,
            'created_date_time' => date('Y-m-d H:i:s')
        ];
        
        try { 
            $isInsert = Exchange::insertGetId($insertArr);
            $update_stock = OpeningBalance::where('id', 1)->update(['alloy_parchan'=> $alloy_parchan,'alloy_gold'=> $alloy_gold,'fine_stock'=> $fine_stock]);
            $return = $isInsert && $update_stock ? ['key' => 'S', 'msg' => 'Data Inserted Successfully.', 'id' => $isInsert] : ['key' => 'E', 'msg' => 'Data Can Not Inserted Successfully.'];
        } catch(\Illuminate\Database\QueryException $ex){ 
            $return = ['key' => 'E', 'msg' => $ex->getMessage()];
        }
        return $return;
    }
}
