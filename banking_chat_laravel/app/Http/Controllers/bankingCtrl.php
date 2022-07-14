<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use DB;
use App\Http\Controllers\Controller;

use App\Models\CustomerDetailsModel;
use App\Models\TransectionModel;
use File;
use Session;

class bankingCtrl extends Controller
{
    public function addCustomerView(){
        return view('add_customer');
    }

    public function addTransectionView(){
        $data = CustomerDetailsModel::get()->toArray();
        return view('add_transection', ['data' => $data]);
    }
    
    public function botChatView(){
        return view('bot_chat');
    }

    public function chatView(){
        return view('chat');
    }

    public function customerDetailsInsert(Request $request){
        // print_r($request->all());die;
        $data = array(
            'name' => $request->name,
            'account_no' => $request->a_no,
            'pan_no' => $request->pan,
            'dob' => $request->dob,
            'account_balance' => $request->ammount
        );
        $reg = CustomerDetailsModel::insert($data);
        if($reg){
            $return['key'] = 'S';
            $return['msg'] = 'Customer Add Successfully.';
        }else{
            $return['key'] = 'E';
            $return['msg'] = 'Customer Add Un-Successfully.';
        }
        return $return;
    }

    public function getNameData(Request $request){
        $c_id = $request->customer_id;
        // print_r($c_id);die;
        $name = CustomerDetailsModel::where('id',$c_id)->pluck('name');
        return $name;
    }

    public function transectionInsert(Request $request){
        // print_r($request->all());die;
        $c_id = $request->customer_id;
        $account_balance = CustomerDetailsModel::where('id',$c_id)->pluck('account_balance');
        $ammount = $request->ammount;
        if($request->entry_type == 'C'){
            $new_account_balance = $account_balance[0] + $ammount;
            $data = array(
                'fk_customer_id' => $c_id,
                'description' => $request->description,
                'credit' => $ammount,
                'balance' => $new_account_balance
            );
        }elseif($request->entry_type == 'D'){
            $new_account_balance = $account_balance[0] - $ammount;
            $data = array(
                'fk_customer_id' => $c_id,
                'description' => $request->description,
                'debit' => $ammount,
                'balance' => $new_account_balance
            ); 
        }
        $transection = TransectionModel::insert($data);
        $a_balance = CustomerDetailsModel::where('id', $c_id)->update(array('account_balance' => $new_account_balance));
        if($transection AND $a_balance){
            $return['key'] = 'S';
            $return['msg'] = 'Updated Balence: '.$new_account_balance.'/-';
        }else{
            $return['key'] = 'E';
            $return['msg'] = 'Transection Not Aded';
        }
        return $return;
    }

    public function chatReply(Request $request){
        $qst = strtoupper($request->chat);
        $h_input = $request->h_input;
        $h_id = $request->h_id;
        if($qst=='HI'||$qst=='HELLO'||$qst=='HY'||$qst=='HLW'||$qst=='HLO'||$qst=='HELL0'){
            $return['qst'] = $qst;
            $return['reply'] = 'Welcome to Axis Bank, Please type your Account number.';
            $return['h_input'] = 'a_no';
            $return['h_id'] = '';    
        }elseif($h_input=='a_no'){
            $c_data = CustomerDetailsModel::select('id')
                            ->where('account_no', $qst)
                            ->get()->toArray();
            if(sizeof($c_data)==0){
                $return['qst'] = $qst;
                $return['reply'] = 'This Account no. is invalid, please retype your perfect Account number.';
                $return['h_input'] = 'a_no';   
                $return['h_id'] = '';    
            }elseif(sizeof($c_data)>0){
                $return['qst'] = $qst;
                $return['reply'] = 'Please type your PAN number.';
                $return['h_input'] = 'pan'; 
                $return['h_id'] = $c_data[0]['id'];    
            }  
        }elseif($h_input=='pan'){
            $c_data = CustomerDetailsModel::select('id','pan_no')
                            ->where('id', $h_id)
                            ->get()->toArray();
            if($c_data[0]['pan_no']!=$qst){
                $return['qst'] = $qst;
                $return['reply'] = 'This Pan no. is not match, please retype your perfect PAN number.';
                $return['h_input'] = 'pan';   
                $return['h_id'] = $c_data[0]['id'];    
            }else{
                $return['qst'] = $qst;
                $return['reply'] = 'Please type your Date of Birth (yyyy-mm-dd).';
                $return['h_input'] = 'dob'; 
                $return['h_id'] = $c_data[0]['id'];    
            }
        }elseif($h_input=='dob'){
            $c_data = CustomerDetailsModel::select('id','dob')
                            ->where('id', $h_id)
                            ->get()->toArray();
            if($c_data[0]['dob']!=$qst){
                $return['qst'] = $qst;
                $return['reply'] = 'This Date is not match, please retype your perfect Date of Birth.';
                $return['h_input'] = 'dob';   
                $return['h_id'] = $c_data[0]['id'];    
            }else{
                $return['qst'] = $qst;
                $return['reply'] = 'Press 1 for view Account Balance, Press 2 for show last 10 Transection.';
                $return['h_input'] = 'press'; 
                $return['h_id'] = $c_data[0]['id'];    
            }
        }elseif($h_input=='press'){
            $c_data = CustomerDetailsModel::select('id','account_balance')
                            ->where('id', $h_id)
                            ->get()->toArray();
            if($qst=='1'){
                $return['qst'] = $qst;
                $return['reply'] = 'Total Account Balace: Rs. '.$c_data[0]['account_balance'].'/-';
                $return['h_input'] = 'press';   
                $return['h_id'] = $c_data[0]['id'];    
            }elseif($qst=='2'){
                $t_data = TransectionModel::where('fk_customer_id', $h_id)
                                            ->orderBy('date_time', 'desc')
                                            ->limit(10)
                                            ->get()
                                            ->toArray();
                $return['qst'] = $qst;
                $return['reply'] = $t_data;
                $return['h_input'] = 'press'; 
                $return['h_id'] = $c_data[0]['id'];    
            }else{
                $return['qst'] = $qst;
                $return['reply'] = 'Press 1 or 2.';
                $return['h_input'] = 'press'; 
                $return['h_id'] = $c_data[0]['id'];    
            }
        }else{
            $return['qst'] = $qst;
            $return['reply'] = 'I can not Understand';
            $return['h_input'] = '';
            $return['h_id'] = '';
        }
        return $return; 
    }

    public function chatSearch(Request $request){
        // print_r($request->all());die;
        $question = $request->question;
        $a_no = $request->a_no;
        $pan = $request->pan;
        $dob = $request->dob;
        $c_data = CustomerDetailsModel::select('id','account_balance')
                            ->where('account_no', $a_no)
                            ->where('pan_no', $pan)
                            ->where('dob', $dob)
                            ->get()->toArray();
        if(sizeof($c_data)==0){
            $return['key'] = 'E';
            $return['msg'] = 'Account Details does not match';
        }elseif($question=='B'){
            $return['key'] = 'B';
            $return['a_balance'] = $c_data[0]['account_balance'];
        }elseif($question=='T'){
            $t_data = TransectionModel::where('fk_customer_id', $c_data[0]['id'])
                                        ->orderBy('date_time', 'desc')
                                        ->limit(10)
                                        ->get()->toArray();
            $return['key'] = 'T';
            $return['t_data'] = $t_data;
        }
        return $return;
    }
}