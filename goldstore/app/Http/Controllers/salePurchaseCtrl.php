<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalePurchase;
use App\Models\OpeningBalance;
use App\Models\Lager;
use App\Models\Booking;
use App\Models\FundCreditDebit;
use PDF;

class salePurchaseCtrl extends Controller
{
    public function viewSalePurchase(){
		$data['main_menu'] = 'mnu_salepurchase';
        $data['breadcrumb'] = [['sale-purchase', 'Sale Purchase']];

        $sale = SalePurchase::where('type', 'S')->orderBy('id', 'desc')->limit(1)->get()->toArray();
		if(sizeof($sale)>0){
			$data['sale']['sale_rate'] = $sale[0]['sale_rate'];
		} else {
			$data['sale']['sale_rate'] = 0.00;
		}
        $parchase = SalePurchase::where('type', 'P')->orderBy('id', 'desc')->limit(1)->get()->toArray();
		if(sizeof($parchase)>0){
			$data['parchase']['purchase_rate'] = $parchase[0]['purchase_rate'];
		}else{
			$data['parchase']['purchase_rate'] = 0.00;
		}
		$data['lager'] = Lager::get(['proprietor_name','id'])->toArray();
        return view('salePurchase.sale_purchase')->withData($data);
    }

    /*=============onchange get value===========*/
    public function onchangeSalePurchase(Request $request){
        // print_r($request->all());die;
        $option_value = $request->type;
        // print_r($option_value);die;
        $getdata = SalePurchase::where('type', $option_value)->orderBy('id', 'desc')->limit(1)->get()->toArray();
        // print_r($getdata);die;
        if($getdata){
            $return['data'] = $getdata;
            $return['key']='S';
        }else{
            $return['key']='E';
            $return['msg']='There is an error';
        }
        return $return;
    }
    /*==============insert data============*/
    public function insertSalePurchase(Request $request){
        // print_r($request->all());die;
        $get_stock = OpeningBalance::get()->toArray();
        // print_r($get_stock);die;
        $fine_stock = $get_stock[0]['fine_stock'];
        $cash_stock = $get_stock[0]['cash_stock'];
        // $alloy_gold = $get_stock[0]['alloy_gold'];

        if($request->gst_bill == 'on'){
            $gst = 'Y';
        }else{
            $gst = 'N';
        }
        $fk_lager_id = $request->hidden;
        $type = $request->select_type;
        $sale_rate = $request->sale_rate;
        $purchase_rate = $request->purchase_rate;
        $gold_weight = $request->gold;
        $total_amount = $request->t_amount;
        $pay_amount = $request->paid_amount;
        $remarks = $request->remark;
        $is_gst=$gst;

        $get_ledger_balance = Lager::select('cash_balance','gold_balance')->where('id',$fk_lager_id)->get()->toArray();
        $cash_balance = $get_ledger_balance[0]['cash_balance'];
        $gold_balance = $get_ledger_balance[0]['gold_balance'];

        if($request->is_booking!=''){
            $get_booking_rate = Booking::select('sale_rate')->where('id',$request->is_booking)->get()->toArray();
            if($request->select_type=='S'){
                $sale_rate = $get_booking_rate[0]['sale_rate'];
            }else{
                $purchase_rate = $get_booking_rate[0]['sale_rate'];
            }
        }
        $due = $total_amount - $pay_amount;
        if($type == 'S'){
            $fine_stock = $fine_stock - $gold_weight;
            $cash_stock = $cash_stock + $pay_amount;

            $cash_balance -= ($due);

            if($due>0){
                $insert_fund_debit = array(
                    "fk_lager_id"=>$fk_lager_id,
                    "type"=>'C',
                    "amount"=>$due,
                    "transaction_type"=>'D',
                    "remarks"=>$remarks,
                    "created_date_time" => date('Y-m-d H:i:s'),
                    "updated_cash"=>$cash_balance,
                    "updated_gold"=>$gold_balance
                );
            $insert_fund = FundCreditDebit::insertGetId($insert_fund_debit);
            }else if($due<0){
                $insert_fund_credit = array(
                    "fk_lager_id"=>$fk_lager_id,
                    "type"=>'C',
                    "amount"=>abs($due),
                    "transaction_type"=>'C',
                    "remarks"=>$remarks,
                    "created_date_time" => date('Y-m-d H:i:s'),
                    "updated_cash"=>$cash_balance,
                    "updated_gold"=>$gold_balance
                );  
                $insert_fund = FundCreditDebit::insertGetId($insert_fund_credit);
            }
           
        }else if($type == 'P'){
            $fine_stock = $fine_stock + $gold_weight;
            $cash_stock = $cash_stock - $pay_amount;

            $cash_balance += ($due);

            if($due>0){
                $insert_fund_credit_purchase = array(
                    "fk_lager_id"=>$fk_lager_id,
                    "type"=>'C',
                    "amount"=>$due,
                    "transaction_type"=>'C',
                    "remarks"=>$remarks,
                    "created_date_time" => date('Y-m-d H:i:s'),
                    "updated_cash"=>$cash_balance,
                    "updated_gold"=>$gold_balance
                );
                $insert_fund = FundCreditDebit::insertGetId($insert_fund_credit_purchase);
            }else if($due<0){
                $insert_fund_debit_purchase = array(
                    "fk_lager_id"=>$fk_lager_id,
                    "type"=>'C',
                    "amount"=>abs($due),
                    "transaction_type"=>'D',
                    "remarks"=>$remarks,
                    "created_date_time" => date('Y-m-d H:i:s'),
                    "updated_cash"=>$cash_balance,
                    "updated_gold"=>$gold_balance
                );  
                $insert_fund = FundCreditDebit::insertGetId($insert_fund_debit_purchase);
            }
        }

        $insert_data = array(
            "fk_lager_id"=>$fk_lager_id,
            "type"=>$type,
            "sale_rate"=>$sale_rate,
            "purchase_rate"=>$purchase_rate,
            "gold_weight"=>$gold_weight,
            "total_amount"=>$total_amount,
            "pay_amount"=>$pay_amount,
            "remarks" =>$remarks,
            "created_date_time" => date('Y-m-d H:i:s'),
            "is_gst" =>$is_gst,
            "updated_cash" => $cash_balance
        );
        $insert = SalePurchase::insertGetId($insert_data);
        if($insert) { 
            $update_stock = OpeningBalance::where('id', 1)->update(['fine_stock'=> $fine_stock, 'cash_stock'=> $cash_stock]);
            $update_balance = Lager::where('id', $fk_lager_id)->update(['cash_balance'=> $cash_balance, 'updated_balance_time'=> date('Y-m-d H:i:s')]);
            
            if($request->is_booking!=''){
                $update_booking = Booking::where('id', $request->is_booking)->update(['is_deliverd'=> 'Y']);
            }

        }if($update_stock && $update_balance){
            
            $return['key']='S';
            $return['msg']='Successfully Insert';
            $return['id']=$insert;
        }else{
            $return['key']='E';
            $return['msg']='There is an error';
        }
        return $return;
    }
}