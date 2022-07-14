<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;
use App\Models\BookingNo;
use App\Models\Exchange;
use App\Models\ExchangeSample;
use App\Models\FundCreditDebit;
use App\Models\Lager;
use App\Models\OpeningBalance;
use App\Models\SalePurchase;
use App\Models\SerialNo;
use DB;
use Response;
use PDF;



class StatementCtrl extends Controller
{
    public function statement (){
		$data['main_menu'] = 'mnu_satement';
		$data['breadcrumb'] = [['statement', 'Statement']];
		$data['lager'] = Lager::get()->toArray();
        return view('statement.statement')->withData($data);
    }

    /*=========== for deu-deposit-statment view ============*/
     public function partyDeuDeposit(){
        $data['main_menu'] = 'mnu_satement';
		$data['sub_menu'] = 'mnu_deu_deposite_statement';
		$data['breadcrumb'] = [['party-deu-deposit', 'Statement'],['party-deu-deposit','Due and Deposit Statement']];
		$data['lager'] = Lager::where('is_active','A')->where('is_delete','N')->get()->toArray();
        return view('statement.partydeudepositstatment')->withData($data);
     }
	//=========== Money Due Deposit tbl ============//
	public function moneyDueDeposit(Request $request){
		//print_r($request->all());die;
	   $ledger_id = $request->ledger_id;
	   $columns = array('created_date_time','remarks','amount','amount','updated_cash','updated_cash');

	   $daterange = explode('-', $request->daterange);

	   $expstartdate = explode('/', $daterange[0]);
	   $startDate = trim($expstartdate[2]).'-'.trim($expstartdate[1]).'-'.trim($expstartdate[0]) .' 00:00:00';

	   $expenddate = explode('/', $daterange[1]);
	   $endDate = trim($expenddate[2]).'-'.trim($expenddate[1]).'-'.trim($expenddate[0]).' 23:59:59';

	   $total_data = 0;
	   $data = [];

	   $where = '';
	   $whereraw = '';
	   if($ledger_id != ''){
		   $where = " AND fk_lager_id = '".$ledger_id."'";

		   $qry = "SELECT created_date_time, remarks, transaction_type, amount, updated_cash  FROM tbl_fund_credit_debit WHERE type = 'C' AND created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $where  $whereraw ORDER BY created_date_time ASC";

			$total_row = DB::select("SELECT COUNT(*) as total_record FROM tbl_fund_credit_debit WHERE type = 'C'  AND created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $where  $whereraw");

			$j_decode = json_decode(json_encode($total_row,true),true);
			
			if(sizeof($j_decode) > 0 && $j_decode[0]['total_record'] != 0){ 
				$total_data = $j_decode[0]['total_record'];
				$qry = "SELECT created_date_time, remarks, transaction_type, amount, updated_cash  FROM tbl_fund_credit_debit WHERE type = 'C' AND created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $where  $whereraw ORDER BY created_date_time ASC";
			}else{
				$total_data = 0;
				$qry = "SELECT created_date_time, remarks, transaction_type, amount, updated_cash  FROM tbl_fund_credit_debit WHERE type = 'C' $where ORDER BY created_date_time DESC LIMIT 1";
			}
			$GetData = DB::select($qry);
			$decode = json_decode(json_encode($GetData , true), true);
			if(!empty($decode)){
				foreach($decode as $value){
					$expdate = explode(' ', $value['created_date_time']);
					$date = date("d/m/Y", strtotime($expdate[0]));
					$transaction_type = $value['transaction_type'];
					$amount = $value['amount'];
					$updated_cash = $value['updated_cash'];
					$row = array();
					$row[] = $date;
					$row[] = $value['remarks'];
					$row[] = ($transaction_type == 'C') ?  $amount :  '';
					$row[] = ($transaction_type == 'D') ?  $amount :  '';
					$row[] = ($updated_cash < 0) ? '-' : '+';
					$row[] = abs($updated_cash);
					$data[] = $row;
				}
			}
	   }
	   
	   $json_data = array(
		   "draw" => $request->input('draw'),
		   "recordsTotal" => $total_data,
		   "recordsFiltered" => $total_data,
		   "data" => $data
	   );
	   return Response::json($json_data);
   }
	//=========== Gold Due Deposit tbl ============//
	public function goldDueDeposit(Request $request){
		$ledger_id = $request->ledger_id;
		$columns = array('created_date_time','remarks','weight','weight','updated_gold','updated_gold');

		$daterange = explode('-', $request->daterange);

		$expstartdate = explode('/', $daterange[0]);
		$startDate = trim($expstartdate[2]).'-'.trim($expstartdate[1]).'-'.trim($expstartdate[0]) .' 00:00:00';

		$expenddate = explode('/', $daterange[1]);
		$endDate = trim($expenddate[2]).'-'.trim($expenddate[1]).'-'.trim($expenddate[0]).' 23:59:59';

		$total_data = 0;
		$data = [];
		$where = '';
		$whereraw = '';
		if($ledger_id != ''){
			$where = " AND fk_lager_id = '".$ledger_id."'";
			$total_row = DB::select("SELECT COUNT(*) as total_record FROM tbl_fund_credit_debit WHERE type = 'G' AND created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $where $whereraw");

			$j_decode = json_decode(json_encode($total_row,true),true);
			if(sizeof($j_decode) > 0 && $j_decode[0]['total_record'] != 0){
				$total_data = $j_decode[0]['total_record'];
				$qry = "SELECT created_date_time, remarks, transaction_type, weight, updated_gold  FROM tbl_fund_credit_debit WHERE type = 'G' AND created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $where  $whereraw ORDER BY created_date_time ASC";
			}else{
				$total_data = 0;
				$qry = "SELECT created_date_time, remarks, transaction_type, weight, updated_gold  FROM tbl_fund_credit_debit WHERE type = 'G' $where ORDER BY created_date_time DESC LIMIT 1";
			}

			$GetData = DB::select($qry);
			$decode = json_decode(json_encode($GetData , true), true);
			if(!empty($decode)){
				foreach($decode as $value){
					$expdate = explode(' ', $value['created_date_time']);
					$date = date("d/m/Y", strtotime($expdate[0]));
					$transaction_type = $value['transaction_type'];
					$gold = $value['weight'];
					$updated_gold = $value['updated_gold'];
					$row = array();
					$row[] = $date;
					$row[] = $value['remarks'];
					$row[] = ($transaction_type == 'C') ?  $gold :  '';
					$row[] = ($transaction_type == 'D') ?  $gold :  '';
					$row[] = ($updated_gold < 0) ? '-' : '+';
					$row[] = abs($updated_gold);
					$data[] = $row;
				}
			}
		}
		// if(!empty($request->input('search.value'))) {
		// 	$search = strtoupper($request->input('search.value'));
		// 	$whereraw = " AND (UPPER(jewelry_name) LIKE '%".$search."%')";
		// }
		//$orderBy = "ORDER BY ". $columns[$request->input('order.0.column')] ." " .$request->input('order.0.dir');

		// $limitOffset = " LIMIT ".$request->input('length')." OFFSET ".$request->input('start')."";

		
		$json_data = array(
			"draw" => $request->input('draw'),
			"recordsTotal" => $total_data,
			"recordsFiltered" => $total_data,
			"data" => $data
		);
		return Response::json($json_data);
	}

    /*========= tounch statement =========*/
    public function touchStatment(){
        $data['main_menu'] = 'mnu_satement';
		$data['sub_menu'] = 'mnu_touch_statement';
		$data['breadcrumb'] = [['touch-statment', 'Statement'],['touch-statment','Tounch Statement']];
        $data['lager'] = Lager::where('is_active','A')->where('is_delete','N')->get()->toArray();
        return view('statement.touchstatment')->withData($data);
    }
	 //========= tounch tbl ==============//
	public function tounch (Request $request){
		//print_r($request->all());die;
		$ledger_id = $request->ledger_id;
		$columns = array('tbl_exchange_sample.created_date_time','tbl_exchange_sample.sl_no','tbl_lager.jewelry_name','tbl_lager.proprietor_name','tbl_exchange_sample.sample_name','tbl_exchange_sample.alloy_weight','tbl_exchange_sample.purity','tbl_exchange_sample.service_charge','tbl_exchange_sample.service_charge');

		$daterange = explode('-', $request->daterange);

		$expstartdate = explode('/', $daterange[0]);
		$startDate = trim($expstartdate[2]).'-'.trim($expstartdate[1]).'-'.trim($expstartdate[0]) .' 00:00:00';

		$expenddate = explode('/', $daterange[1]);
		$endDate = trim($expenddate[2]).'-'.trim($expenddate[1]).'-'.trim($expenddate[0]).' 23:59:59';

		$where = '';
		$whereraw = '';
		if($ledger_id != ''){
			$where = " AND tbl_exchange_sample.fk_lager_id = '".$ledger_id."'";
		}
		if(!empty($request->input('search.value'))) {
			$search = strtoupper($request->input('search.value'));
			$whereraw = " AND (UPPER(tbl_lager.proprietor_name) LIKE '%".$search."%' OR UPPER(tbl_lager.jewelry_name) LIKE '%".$search."%' OR tbl_exchange_sample.sl_no LIKE '%".$search."%' OR tbl_exchange_sample.weight LIKE '%".$search."%' OR  tbl_exchange_sample.purity LIKE '%".$search."%' OR tbl_exchange_sample.service_charge LIKE '%".$search."%')";
		}
		$orderBy = "ORDER BY tbl_exchange_sample.created_date_time ASC, ". $columns[$request->input('order.0.column')] ." " .$request->input('order.0.dir');

		$limitOffset = " LIMIT ".$request->input('length')." OFFSET ".$request->input('start')."";

		$qry = "SELECT tbl_exchange_sample.*,tbl_lager.proprietor_name,tbl_lager.jewelry_name FROM tbl_exchange_sample LEFT JOIN tbl_lager ON tbl_exchange_sample.fk_lager_id=tbl_lager.id WHERE tbl_exchange_sample.created_date_time BETWEEN '".$startDate."' AND '".$endDate."' AND tbl_exchange_sample.service_charge IS NOT NULL $where  $whereraw $orderBy $limitOffset";

		$total_row = DB::select("SELECT COUNT(*) as total_record FROM tbl_exchange_sample WHERE service_charge IS NOT NULL AND tbl_exchange_sample.created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $where");

		$sum_table = DB::select("SELECT SUM(CASE WHEN paid_status = 'D' THEN service_charge ELSE 0 END) TotalDue, SUM(CASE WHEN paid_status = 'P' THEN service_charge ELSE 0 END) TotalPaid FROM tbl_exchange_sample WHERE created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $where");
		$sum_decode = json_decode(json_encode($sum_table,true),true);

		$j_decode = json_decode(json_encode($total_row,true),true);
		$total_data = 0;
		if(count($j_decode) > 0){
			$total_data = $j_decode[0]['total_record'];
		}

		$GetData = DB::select($qry);

		$decode = json_decode(json_encode($GetData , true), true);
		$data = [];
		if(!empty($decode)){
			foreach($decode as $value){
				$expdate = explode(' ', $value['created_date_time']);
				$date = date("d/m/Y", strtotime($expdate[0]));

				$row = array();
				$row[] = $date;
				$row[] = $value['sl_no'];
				$row[] = ($value['fk_lager_id']==0)?'':$value['jewelry_name'];
				$row[] = ($value['fk_lager_id']==0)?$value['customer_name']:$value['proprietor_name'];
				$row[] = $value['sample_name'];
				$row[] = $value['weight'];
				$row[] = $value['purity'];
				$row[] = $value['paid_status'] == 'D' ? $value['service_charge'] : '';
				$row[] = $value['paid_status'] == 'P' ? $value['service_charge'] : '';
				$data[] = $row;
			}
			$row2 = ['', '', '', '', '', '', 'Total', $sum_decode[0]['TotalDue'], $sum_decode[0]['TotalPaid']];
			$data[] = $row2;
		}
		$json_data = array(
			"draw" => $request->input('draw'),
			"recordsTotal" => $total_data,
			"recordsFiltered" => $total_data,
			"data" => $data
		);
		return Response::json($json_data);
	}
    //============= refine statement view ========//
    public function refineStatment(){
        $data['main_menu'] = 'mnu_satement';
        $data['sub_menu'] = 'mnu_refine_statement';
		$data['breadcrumb'] = [['refine-statment', 'Statement'],['refine-statment','Refine Statement']];
        $data['lager'] = Lager::where('is_active','A')->where('is_delete','N')->get()->toArray();
        return view('statement.refinestatment')->withData($data);
    }
    //============= refine statement data table ========//
	public function refine (Request $request){
		$ledger_id = $request->ledger_id;
		$columns = array('tbl_exchange.created_date_time','tbl_exchange.batch_no','tbl_lager.jewelry_name','tbl_lager.proprietor_name','tbl_lager.address','tbl_exchange.alloy_weight','tbl_exchange.purity','tbl_exchange.fine_gold_weight','tbl_exchange.id');

		$daterange = explode('-', $request->daterange);

		$expstartdate = explode('/', $daterange[0]);
		$startDate = trim($expstartdate[2]).'-'.trim($expstartdate[1]).'-'.trim($expstartdate[0]) .' 00:00:00';

		$expenddate = explode('/', $daterange[1]);
		$endDate = trim($expenddate[2]).'-'.trim($expenddate[1]).'-'.trim($expenddate[0]).' 23:59:59';

		$where = '';
		$whereraw = '';
		if($ledger_id != ''){
			$where = " AND tbl_exchange.fk_lager_id = '".$ledger_id."'";
		}
		if(!empty($request->input('search.value'))) {
			$search = strtoupper($request->input('search.value'));
			$whereraw = " AND (tbl_exchange.batch_no LIKE '%".$search."%')";
		}
		$orderBy = "ORDER BY tbl_exchange.created_date_time ASC, ". $columns[$request->input('order.0.column')] ." " .$request->input('order.0.dir');

		$limitOffset = " LIMIT ".$request->input('length')." OFFSET ".$request->input('start')."";

		$qry = "SELECT tbl_exchange.*,tbl_lager.proprietor_name,tbl_lager.jewelry_name,tbl_lager.address FROM tbl_exchange INNER JOIN tbl_lager ON tbl_exchange.fk_lager_id=tbl_lager.id WHERE tbl_exchange.created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $where  $whereraw $orderBy $limitOffset";

		$total_row = DB::select("SELECT COUNT(*) as total_record FROM tbl_exchange WHERE tbl_exchange.created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $where");

		$sum_table = DB::select("SELECT SUM(alloy_weight) TotalOldGold, AVG(purity) AvgPurity, SUM(fine_gold_weight) TotalFineGold FROM tbl_exchange WHERE created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $where $whereraw");
		$sum_decode = json_decode(json_encode($sum_table,true),true);
		
		$j_decode = json_decode(json_encode($total_row,true),true);
		$total_data = 0;
		if(count($j_decode) > 0){
			$total_data = $j_decode[0]['total_record'];
		}

		$GetData = DB::select($qry);
		$decode = json_decode(json_encode($GetData , true), true);
		$data = [];
		$now_batch_no = OpeningBalance::where('id', 1)->pluck('batch_no');
		// print_r($now_batch_no);die;

		if(!empty($decode)){
			foreach($decode as $value){
				$expdate = explode(' ', $value['created_date_time']);
				$date = date("d/m/Y", strtotime($expdate[0]));
				$btn = '<button class="btn btn-danger btn-sm refine-delete-btn" data-id="'.$value['id'].'" type="button">Delete</button>';

				$row = array();
				$row[] = $date;
				$row[] = $value['batch_no'];
				$row[] = $value['jewelry_name'];
				$row[] = $value['proprietor_name'];
				$row[] = $value['address'];
				$row[] = $value['alloy_weight'];
				$row[] = $value['purity'];
				$row[] = $value['fine_gold_weight'];
				$row[] = $value['batch_no']==$now_batch_no[0] ? $btn : "";
				$data[] = $row;
			}
		}
		$total_old_gold = $sum_decode[0]['TotalOldGold'];
		$total_fine_gold = $sum_decode[0]['TotalFineGold'];
		$avg_purity = round(($sum_decode[0]['AvgPurity']),2);
		// $avg_purity = round((($total_fine_gold / $total_old_gold)*100),3);
		$row2 = ['', '', '', '', 'Total', $total_old_gold, $avg_purity, $total_fine_gold,''];
		$data[] = $row2;
		$json_data = array(
			"draw" => $request->input('draw'),
			"recordsTotal" => $total_data,
			"recordsFiltered" => $total_data,
			"data" => $data
		);
		return Response::json($json_data);
	}
	/*------------- Refine data delete ------------*/
	public function refineDataDelete (Request $request){
		$deleteid = $request->id;

		$refine_data = Exchange::where('id',$deleteid)->get()->toArray();
		$alloy_weight = $refine_data[0]['alloy_weight'];
		$fine_gold_weight = $refine_data[0]['fine_gold_weight'];

		$get_stock = OpeningBalance::get()->toArray();
		$fine_stock = $get_stock[0]['fine_stock'];
		$alloy_parchan = $get_stock[0]['alloy_parchan'];
		$alloy_gold = $get_stock[0]['alloy_gold'];

		$new_fine_stock = $fine_stock + $fine_gold_weight;
		$new_alloy_parchan = $alloy_parchan - $alloy_weight;
		$new_alloy_gold = $alloy_gold - $fine_gold_weight;

		$update_stock = OpeningBalance::where('id', 1)->update(['fine_stock'=> $new_fine_stock, 'alloy_parchan'=> $new_alloy_parchan, 'alloy_gold'=> $new_alloy_gold]);

		$refinedelete = Exchange::where('id',$deleteid)->delete();

		$return['key'] = 'S';
		$return['msg'] = 'Refine Data has been deleted.';
		return $return;
	}

	/*===================== Our sale purchase =================*/
		//------------ sale purchase view ----------------//
    public function ourSaleParchase(){
        $data['main_menu'] = 'mnu_satement';
		$data['sub_menu'] = 'mnu_our_sale_parchase';
		$data['breadcrumb'] = [['our-sale-and-parchase', 'Statement'],['our-sale-and-parchase','Sale and Purchase']];
        $data['lager'] = Lager::where('is_active','A')->where('is_delete','N')->get()->toArray();

        return view('statement.oursaleparchase')->withData($data);
    }
		//------------ sale purchase tbl ---------------//
	public function saleStatement (Request $request){
		// print_r($request->all());die;
		$columns = array('created_date_time','fk_lager_id','gold_weight','sale_rate','total_amount','is_gst');

		$daterange = explode('-', $request->daterange);

		$expstartdate = explode('/', $daterange[0]);
		$startDate = trim($expstartdate[2]).'-'.trim($expstartdate[1]).'-'.trim($expstartdate[0]) .' 00:00:00';

		$expenddate = explode('/', $daterange[1]);
		$endDate = trim($expenddate[2]).'-'.trim($expenddate[1]).'-'.trim($expenddate[0]).' 23:59:59';

		$propiter_id = $request->propiter_id;
		$where = '';
		if($propiter_id != ''){
			$where = "AND tbl_sale_purchase.fk_lager_id = '".$propiter_id."'";
		}

		$is_gst = $request->is_gst;
		$non_gst =  $request->non_gst;
		// print($is_gst);die;
		$where_gst = '';
		if($is_gst == 'Y' && $non_gst == 'Y'){
			$where_gst = '';
		}elseif($is_gst == 'Y' && $non_gst == 'N'){
			$where_gst = "AND tbl_sale_purchase.is_gst = 'Y'";
		}elseif($is_gst == 'N' && $non_gst == 'Y'){
			$where_gst = "AND tbl_sale_purchase.is_gst = 'N'";
		}

		$whereraw = '';
		if(!empty($request->input('search.value'))){
			$search = strtoupper($request->input('search.value'));
			$whereraw = "AND (UPPER(tbl_lager.jewelry_name) LIKE '%".$search."%' OR tbl_sale_purchase.created_date_time LIKE '%".$search."%' OR tbl_sale_purchase.gold_weight LIKE '%".$search."%' OR tbl_sale_purchase.type LIKE '%".$search."%' OR tbl_sale_purchase.sale_rate LIKE '%".$search."%' OR tbl_sale_purchase.purchase_rate LIKE '%".$search."%' OR tbl_sale_purchase.total_amount LIKE '%".$search."%')";
			// $count_qury = "SELECT COUNT(id) FROM tbl_lager WHERE is_delete = 'N'";
		}

		$data_qury = "SELECT tbl_sale_purchase.*,tbl_lager.jewelry_name FROM tbl_sale_purchase INNER JOIN tbl_lager ON tbl_sale_purchase.fk_lager_id=tbl_lager.id WHERE tbl_sale_purchase.type = 'S' AND tbl_sale_purchase.created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $where $whereraw $where_gst";

		$count_qury = "SELECT COUNT(id) FROM tbl_sale_purchase WHERE type = 'S' AND created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $where";
		$search_qry = '';

		

		$count = DB::select($count_qury.$search_qry);

		$sum_table = DB::select("SELECT SUM(gold_weight) Totalweight, AVG(sale_rate) AvgRate, SUM(total_amount) TotalAmmount FROM tbl_sale_purchase WHERE type = 'S' AND created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $where $where_gst");
		$sum_decode = json_decode(json_encode($sum_table,true),true);

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
		//print_r($final_qry);die;
		$GetData = DB::select($final_qry);
		$decode = json_decode(json_encode($GetData , true), true);
		$data = [];

		if(!empty($decode)){
			foreach($decode as $value){
				//date
				$expdate = explode(' ', $value['created_date_time']);

				$date = date("d/m/Y", strtotime($expdate[0]));
				// $expdate = explode(' ', $value['created_date_time']);
				// $date = date("d M Y", strtotime($expdate[0]));
				//type
				// switch ($value['type']) {
				//   case "P":
				// 	$type = "Purchase";
				// 	$rate = $value['purchase_rate'];
				// 	break;
				//   case "S":
				// 	$type = "Sale";
				// 	$rate = $value['sale_rate'];
				//   break;
				// }
				//gst
				switch ($value['is_gst']){
					case "Y":
						$gst = "Yes";
					break;
					case "N":
						$gst = "No";
					break;
				}
				//print_r($value);die;
				$row = array();
				$row[] = $date;
				$row[] = $value['jewelry_name'];
				$row[] = $value['remarks'];
				$row[] = $value['gold_weight'];
				$row[] = $value['sale_rate'];
				$row[] = $value['total_amount'];
				$row[] = $gst;
				$data[] = $row;
			}
		}
		$total_weight = $sum_decode[0]['Totalweight'];
		$avg_rate = number_format($sum_decode[0]['AvgRate'],2,'.','');
		$total_ammount = $sum_decode[0]['TotalAmmount'];
		// $avg_purity = round(($total_fine_gold / $total_old_gold),3);
		$row2 = ['', '','Total', $total_weight, $avg_rate, $total_ammount, ''];
		$data[] = $row2;

		$json_data = array(
			"draw" => intval($request->input('draw')),
			"recordsTotal" => intval($total_data),
			"recordsFiltered" => intval($total_data),
			"data" => $data
		);
		return Response::json($json_data);
	}
	public function purchaseStatement (Request $request){
		//print_r($request->all());die;
		$columns = array('created_date_time','fk_lager_id','gold_weight','sale_rate','total_amount','is_gst');



		$daterange = explode('-', $request->daterange);

		$expstartdate = explode('/', $daterange[0]);
		$startDate = trim($expstartdate[2]).'-'.trim($expstartdate[1]).'-'.trim($expstartdate[0]) .' 00:00:00';

		$expenddate = explode('/', $daterange[1]);
		$endDate = trim($expenddate[2]).'-'.trim($expenddate[1]).'-'.trim($expenddate[0]).' 23:59:59';

		$propiter_id = $request->propiter_id;

		$is_gst = $request->is_gst;
		$non_gst = $request->non_gst;
		$where_gst = '';
		if($is_gst == 'Y' && $non_gst == 'Y'){
			$where_gst = '';
		}elseif($is_gst == 'Y' && $non_gst == 'N'){
			$where_gst = "AND tbl_sale_purchase.is_gst = 'Y'";
		}elseif($is_gst == 'N' && $non_gst == 'Y'){
			$where_gst = "AND tbl_sale_purchase.is_gst = 'N'";
		}

		$where = '';
		if($propiter_id != ''){
			$where = "AND tbl_sale_purchase.fk_lager_id = '".$propiter_id."'";
		}
		$whereraw ='';
		if(!empty($request->input('search.value'))){
			$search = strtoupper($request->input('search.value'));
			$whereraw = "AND (UPPER(tbl_lager.jewelry_name) LIKE '%".$search."%' OR tbl_sale_purchase.created_date_time LIKE '%".$search."%' OR tbl_sale_purchase.gold_weight LIKE '%".$search."%' OR tbl_sale_purchase.type LIKE '%".$search."%' OR tbl_sale_purchase.sale_rate LIKE '%".$search."%' OR tbl_sale_purchase.purchase_rate LIKE '%".$search."%' OR tbl_sale_purchase.total_amount LIKE '%".$search."%')";
		}

		$data_qury = "SELECT tbl_sale_purchase.*,tbl_lager.jewelry_name FROM tbl_sale_purchase INNER JOIN tbl_lager ON tbl_sale_purchase.fk_lager_id=tbl_lager.id WHERE tbl_sale_purchase.type = 'P' AND tbl_sale_purchase.created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $where $whereraw $where_gst";

		$count_qury = "SELECT COUNT(id) FROM tbl_sale_purchase WHERE type = 'P' AND created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $where";
		$search_qry = '';

		

		$count = DB::select($count_qury.$search_qry);

		$sum_table = DB::select("SELECT SUM(gold_weight) Totalweight, AVG(purchase_rate) AvgRate, SUM(total_amount) TotalAmmount FROM tbl_sale_purchase WHERE type = 'P' AND created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $where $where_gst");
		$sum_decode = json_decode(json_encode($sum_table,true),true);


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
		//print_r($final_qry);die;
		$GetData = DB::select($final_qry);
		$decode = json_decode(json_encode($GetData , true), true);
		$data = [];

		if(!empty($decode)){
			foreach($decode as $value){
				//date
				$expdate = explode(' ', $value['created_date_time']);
				$date = date("d/m/Y", strtotime($expdate[0]));
				// $expdate = explode(' ', $value['created_date_time']);
				// $date = date("d M Y", strtotime($expdate[0]));
				//type
				// switch ($value['type']) {
				//   case "P":
				// 	$type = "Purchase";
				// 	$rate = $value['purchase_rate'];
				// 	break;
				//   case "S":
				// 	$type = "Sale";
				// 	$rate = $value['sale_rate'];
				//   break;
				// }
				//gst
				switch ($value['is_gst']){
					case "Y":
						$gst = "Yes";
					break;
					case "N":
						$gst = "No";
					break;
				}
				//print_r($value);die;
				$row = array();
				$row[] = $date;
				$row[] = $value['jewelry_name'];
				$row[] = $value['remarks'];
				$row[] = $value['gold_weight'];
				$row[] = $value['purchase_rate'];
				$row[] = $value['total_amount'];
				$row[] = $gst;
				$data[] = $row;
			}
		}
		$total_weight = $sum_decode[0]['Totalweight'];
		$avg_rate = number_format($sum_decode[0]['AvgRate'],2,'.','');
		$total_ammount = $sum_decode[0]['TotalAmmount'];
		// $avg_purity = round(($total_fine_gold / $total_old_gold),3);
		$row2 = ['', '','Total', $total_weight, $avg_rate, $total_ammount, ''];
		$data[] = $row2;

		$json_data = array(
			"draw" => intval($request->input('draw')),
			"recordsTotal" => intval($total_data),
			"recordsFiltered" => intval($total_data),
			"data" => $data
		);
		return Response::json($json_data);
	}
	/*------------- Non GST Sale Purchase Data Delete ------------*/
	public function salePurchaseNGstDelete (Request $request){
		$refinedelete = SalePurchase::where('is_gst','N')->delete();
		$return['key'] = 'S';
		$return['msg'] = 'Non GST Sale Purchase Data has been Cleared.';
		return $return;
	}

    /*public function partySaleParchase(){
        $data['main_menu'] = 'mnu_satement';
		$data['sub_menu'] = 'mnu_party_sale_parchase';
		$data['breadcrumb'] = [['party-sale-and-parchase', 'Statement'],['party-sale-and-parchase','Sale and Purchase(Party)']];
        $data['lager'] = Lager::where('is_active','A')->where('is_delete','N')->get()->toArray();
        return view('statement.partysaleparchase')->withData($data);
    }*/

	//=======debit and credit statement=========//
    public function deditCredit(){
        $data['main_menu'] = 'mnu_satement';
		$data['sub_menu'] = 'mnu_debit_credit_statement';
		$data['breadcrumb'] = [['debit-credit-statment', 'Statement'],['debit-credit-statment','Dedit/Credit Statment']];
        $data['lager'] = Lager::where('is_active','A')->where('is_delete','N')->get()->toArray();
        return view('statement.debitcredit')->withData($data);
    }
	//--------debit and credit data table-----------//
	public function deditAndCreditStatement (Request $request){
		// print_r($request->all());die;
		$ledger_id = $request->ledger_id;
		$columns = array('tbl_fund_credit_debit.created_date_time','tbl_lager.jewelry_name','tbl_lager.proprietor_name','tbl_fund_credit_debit.amount','tbl_fund_credit_debit.weight','tbl_fund_credit_debit.weight','tbl_fund_credit_debit.amount');

		$daterange = explode('-', $request->daterange);

		$expstartdate = explode('/', $daterange[0]);
		$startDate = trim($expstartdate[2]).'-'.trim($expstartdate[1]).'-'.trim($expstartdate[0]) .' 00:00:00';

		$expenddate = explode('/', $daterange[1]);
		$endDate = trim($expenddate[2]).'-'.trim($expenddate[1]).'-'.trim($expenddate[0]).' 23:59:59';

		$where = '';
		$whereraw = '';
		if($ledger_id != ''){
			$where = " AND tbl_fund_credit_debit.fk_lager_id = '".$ledger_id."'";
		}
		if(!empty($request->input('search.value'))) {
			$search = strtoupper($request->input('search.value'));
			$whereraw = " AND (UPPER(tbl_lager.proprietor_name) LIKE '%".$search."%' OR UPPER(tbl_lager.jewelry_name) LIKE '%".$search."%' OR UPPER(tbl_fund_credit_debit.amount) LIKE '%".$search."%' OR tbl_fund_credit_debit.weight LIKE '%".$search."%' OR tbl_fund_credit_debit.type LIKE '%".$search."%')";
		}
		$orderBy = "ORDER BY tbl_fund_credit_debit.created_date_time ASC,". $columns[$request->input('order.0.column')] ." " .$request->input('order.0.dir');

		$limitOffset = " LIMIT ".$request->input('length')." OFFSET ".$request->input('start')."";

		$qry = "SELECT tbl_fund_credit_debit.*,tbl_lager.proprietor_name,tbl_lager.jewelry_name FROM tbl_fund_credit_debit INNER JOIN tbl_lager ON tbl_fund_credit_debit.fk_lager_id=tbl_lager.id WHERE tbl_fund_credit_debit.created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $where  $whereraw $orderBy $limitOffset";

		$total_row = DB::select("SELECT COUNT(*) as total_record FROM tbl_fund_credit_debit WHERE tbl_fund_credit_debit.created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $where");

		$j_decode = json_decode(json_encode($total_row,true),true);
		$total_data = 0;

		$sum_table = DB::select("SELECT SUM(CASE WHEN type = 'C' AND transaction_type = 'C' THEN amount ELSE 0 END) TotalMoneyDeposit, SUM(CASE WHEN type = 'G' AND transaction_type = 'C' THEN weight ELSE 0 END) TotalGoldDeposit, SUM(CASE WHEN type = 'G' AND transaction_type = 'D' THEN weight ELSE 0 END) TotalGoldExpenditure, SUM(CASE WHEN type = 'C' AND transaction_type = 'D' THEN amount ELSE 0 END) TotalMoneyExpenditure  FROM tbl_fund_credit_debit WHERE created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $where");
		$sum_decode = json_decode(json_encode($sum_table,true),true);

		if(count($j_decode) > 0){
			$total_data = $j_decode[0]['total_record'];
		}

		$GetData = DB::select($qry);
		$decode = json_decode(json_encode($GetData , true), true);
		$data = [];
		if(!empty($decode)){
			foreach($decode as $value){
				$expdate = explode(' ', $value['created_date_time']);
				$date = date("d/m/Y", strtotime($expdate[0]));
				$transaction_type = $value['transaction_type'];
				$type = $value['type'];
				$amount = $value['amount'];
				$weight = $value['weight'];
				// if($value['transaction_type'] == 'C'){
				// $transaction_type = 'Credit';
				// }else{
				// $transaction_type = 'Debit';
				// }
				$row = array();
				$row[] = $date;
				$row[] = $value['jewelry_name'];
				$row[] = $value['proprietor_name'];
				$row[] = $value['remarks'];
				$row[] = ($transaction_type == 'C') ? (($type == 'C') ? $amount  :  '') :  '';
				$row[] = ($transaction_type == 'C') ? (($type == 'G') ? $weight  :  '') :  '';
				$row[] = ($transaction_type == 'D') ? (($type == 'G') ? $weight  :  '') :  '';
				$row[] = ($transaction_type == 'D') ? (($type == 'C') ? $amount  :  '') :  '';
				// $row[] = $value['amount'];
				// $row[] = $value['weight'];
				// $row[] = $transaction_type;
				$data[] = $row;
			}
			$row2 = ['', '', '', 'Total', $sum_decode[0]['TotalMoneyDeposit'], $sum_decode[0]['TotalGoldDeposit'], $sum_decode[0]['TotalGoldExpenditure'], $sum_decode[0]['TotalMoneyExpenditure']];
			$data[] = $row2;
		}
		$json_data = array(
			"draw" => $request->input('draw'),
			"recordsTotal" => $total_data,
			"recordsFiltered" => $total_data,
			"data" => $data
		);
		return Response::json($json_data);
	}

    public function deuDeposite(){
        $data['main_menu'] = 'mnu_satement';
		$data['sub_menu'] = 'mnu_party_deu_deposit_statement';
		$data['breadcrumb'] = [['all-deu-deposite-Statment', 'Statement'],['all-deu-deposite-Statment','All Party Due/Deposit Statement']];
        $data['lager'] = Lager::where('is_active','A')->where('is_delete','N')->get()->toArray();
        return view('statement.alldeudeposite')->withData($data);
    }
	public function allDepositStatement (Request $request){
		// print_r($request->all());die;
		// $ledger_id = $request->ledger_id;
		$columns = array('updated_balance_time','jewelry_name','cash_balance','gold_balance');

		// $daterange = explode('-', $request->daterange);

		// $expstartdate = explode('/', $daterange[0]);
		// $startDate = trim($expstartdate[2]).'-'.trim($expstartdate[1]).'-'.trim($expstartdate[0]) .' 00:00:00';

		// $expenddate = explode('/', $daterange[1]);
		// $endDate = trim($expenddate[2]).'-'.trim($expenddate[1]).'-'.trim($expenddate[0]).' 23:59:59';

		// $where = '';
		$whereraw = '';
		// if($ledger_id != ''){
		// 	$where = " AND tbl_fund_credit_debit.fk_lager_id = '".$ledger_id."'";
		// }
		if(!empty($request->input('search.value'))) {
			$search = strtoupper($request->input('search.value'));
			$whereraw = " AND (UPPER(jewelry_name) LIKE '%".$search."%')";
		}
		$orderBy = "ORDER BY ". $columns[$request->input('order.0.column')] ." " .$request->input('order.0.dir');

		// $limitOffset = " LIMIT ".$request->input('length')." OFFSET ".$request->input('start')."";

		$qry = "SELECT updated_balance_time, jewelry_name, cash_balance, gold_balance  FROM tbl_lager WHERE cash_balance > 0 OR gold_balance > 0 $whereraw $orderBy";

		$total_row = DB::select("SELECT COUNT(*) as total_record FROM tbl_lager WHERE cash_balance > 0 OR gold_balance > 0");

		$j_decode = json_decode(json_encode($total_row,true),true);
		$total_data = 0;
		if(count($j_decode) > 0){
			$total_data = $j_decode[0]['total_record'];
		}

		$GetData = DB::select($qry);
		$decode = json_decode(json_encode($GetData , true), true);

		$sum_table = DB::select("SELECT SUM(CASE WHEN cash_balance > 0 THEN cash_balance ELSE 0 END) TotalCash, SUM(CASE WHEN gold_balance > 0 THEN gold_balance ELSE 0 END) TotalGold FROM tbl_lager");
		$sum_decode = json_decode(json_encode($sum_table,true),true);

		$data = [];
		if(!empty($decode)){
			foreach($decode as $value){
				$expdate = explode(' ', $value['updated_balance_time']);
				$date = date("d/m/Y", strtotime($expdate[0]));
				$cash_balance = $value['cash_balance'];
				$gold_balance = $value['gold_balance'];

				$row = array();
				$row[] = $date;
				$row[] = $value['jewelry_name'];
				$row[] = ($cash_balance > 0) ?  $cash_balance :  '';
				$row[] = ($gold_balance > 0) ?  $gold_balance :  '';				
				$data[] = $row;
			}
			$row2 = ['','Total', $sum_decode[0]['TotalCash'], $sum_decode[0]['TotalGold']];
			$data[] = $row2;
		}
		$json_data = array(
			"draw" => $request->input('draw'),
			"recordsTotal" => $total_data,
			"recordsFiltered" => $total_data,
			"data" => $data
		);
		return Response::json($json_data);
	}
	public function allDueStatement (Request $request){
		// print_r($request->all());die;
		// $ledger_id = $request->ledger_id;
		$columns = array('updated_balance_time','jewelry_name','cash_balance','gold_balance');

		// $daterange = explode('-', $request->daterange);

		// $expstartdate = explode('/', $daterange[0]);
		// $startDate = trim($expstartdate[2]).'-'.trim($expstartdate[1]).'-'.trim($expstartdate[0]) .' 00:00:00';

		// $expenddate = explode('/', $daterange[1]);
		// $endDate = trim($expenddate[2]).'-'.trim($expenddate[1]).'-'.trim($expenddate[0]).' 23:59:59';

		// $where = '';
		$whereraw = '';
		// if($ledger_id != ''){
		// 	$where = " AND tbl_fund_credit_debit.fk_lager_id = '".$ledger_id."'";
		// }
		if(!empty($request->input('search.value'))) {
			$search = strtoupper($request->input('search.value'));
			$whereraw = " AND (UPPER(jewelry_name) LIKE '%".$search."%')";
		}
		$orderBy = "ORDER BY ".$columns[$request->input('order.0.column')] ." " .$request->input('order.0.dir');

		// $limitOffset = " LIMIT ".$request->input('length')." OFFSET ".$request->input('start')."";

		$qry = "SELECT updated_balance_time, jewelry_name, cash_balance, gold_balance  FROM tbl_lager WHERE cash_balance < 0 OR gold_balance < 0   $whereraw $orderBy";

		$total_row = DB::select("SELECT COUNT(*) as total_record FROM tbl_lager WHERE cash_balance < 0 OR gold_balance < 0");

		$j_decode = json_decode(json_encode($total_row,true),true);
		$total_data = 0;
		if(count($j_decode) > 0){
			$total_data = $j_decode[0]['total_record'];
		}

		$GetData = DB::select($qry);
		$decode = json_decode(json_encode($GetData , true), true);

		$sum_table = DB::select("SELECT SUM(CASE WHEN cash_balance < 0 THEN abs(cash_balance) ELSE 0 END) TotalCash, SUM(CASE WHEN gold_balance < 0 THEN abs(gold_balance) ELSE 0 END) TotalGold FROM tbl_lager");
		$sum_decode = json_decode(json_encode($sum_table,true),true);

		$data = [];
		if(!empty($decode)){
			foreach($decode as $value){
				$expdate = explode(' ', $value['updated_balance_time']);
				$date = date("d/m/Y", strtotime($expdate[0]));
				$cash_balance = $value['cash_balance'];
				$gold_balance = $value['gold_balance'];

				$row = array();
				$row[] = $date;
				$row[] = $value['jewelry_name'];
				$row[] = ($cash_balance < 0) ?  abs($cash_balance) :  '';				
				$row[] = ($gold_balance < 0) ?  abs($gold_balance) :  '';				
				$data[] = $row;
			}
			$row2 = ['','Total', $sum_decode[0]['TotalCash'], $sum_decode[0]['TotalGold']];
			$data[] = $row2;
		}
		$json_data = array(
			"draw" => $request->input('draw'),
			"recordsTotal" => $total_data,
			"recordsFiltered" => $total_data,
			"data" => $data
		);
		return Response::json($json_data);
	}
}