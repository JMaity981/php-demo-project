<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lager;
use App\Models\FundCreditDebit;
use App\Models\OpeningBalance;

class FundCreditDebitCtrl extends Controller
{
    public function fundCreditDebit (){
		$data['main_menu'] = 'mnu_fund_credit_debit';
		$data['breadcrumb'] = [['fund-credit-debit', 'Fund Credit & Debit']];
        $data['lager'] = Lager::get()->toArray();
        return view('fundCreditDebit.fundCreditDebit')->withData($data);
    }

    public function insertFundCreditDebit (Request $request){
        $lager_id = $request->hidden;

        $get_ledger_balance = Lager::select('gold_balance','cash_balance')->where('id',$lager_id)->get()->toArray();
        $gold_balance = $get_ledger_balance[0]['gold_balance'];
        $cash_balance = $get_ledger_balance[0]['cash_balance'];

        $get_stock = OpeningBalance::get()->toArray();
        $new_fine_stock = $get_stock[0]['fine_stock'];
        $new_cash_stock = $get_stock[0]['cash_stock'];
	
        $gold_weight = $request->gold_weight;
        $amount = $request->amount;
       
        // print_r($amount);die;
        if($request->select_gold_cash=='G'){
            if($request->transaction_type=='C'){
                $new_fine_stock += $gold_weight;
                $gold_balance += $gold_weight;
            }else{
                $new_fine_stock -= $gold_weight;
                $gold_balance -= $gold_weight;
            }
        }elseif($request->select_gold_cash=='C'){
            if($request->transaction_type=='C'){
                $new_cash_stock += $amount;
                $cash_balance += $amount;
            }else{
                $new_cash_stock -= $amount;
                $cash_balance -= $amount;

            }
        }
        $insertArr = [
            'fk_lager_id' => $lager_id,
            'type' => $request->select_gold_cash,
            'weight' => $gold_weight,
            'amount' => $amount,
            'transaction_type' => $request->transaction_type,
            'remarks' => $request->remarks,
            'created_date_time' => date('Y-m-d H:i:s'),
            'updated_cash' => $cash_balance,
            'updated_gold' => $gold_balance
        ];
        
        try { 
            $isInsert = FundCreditDebit::insertGetId($insertArr);
            $update_stock = OpeningBalance::where('id', 1)->update(['fine_stock'=> $new_fine_stock, 'cash_stock'=> $new_cash_stock]);
            $update_balance = Lager::where('id', $lager_id)->update(['gold_balance'=> $gold_balance, 'cash_balance'=> $cash_balance, 'updated_balance_time'=> date('Y-m-d H:i:s')]);
            $return = $isInsert && $update_stock && $update_balance ? ['key' => 'S', 'msg' => 'Data Inserted Successfully.', 'id' => $isInsert] : ['key' => 'E', 'msg' => 'Data Can Not Inserted Successfully.'];
        } catch(\Illuminate\Database\QueryException $ex){ 
            $return = ['key' => 'E', 'msg' => $ex->getMessage()];
        }
        return $return;
    }
}
