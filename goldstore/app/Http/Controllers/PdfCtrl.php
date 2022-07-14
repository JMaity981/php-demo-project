<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Models\SalePurchase;
use App\Models\Exchange;
use App\Models\FundCreditDebit;
use App\Models\ExchangeSample;
use App\Models\Lager;
use App\Models\OpeningBalance;
use DB;
use PDF;
use File;
use DirectoryIterator;
use ZipArchive;
use \RecursiveIteratorIterator;

class PdfCtrl extends Controller
{

	//-------------- Generate bill pdf section -------------//
	/*---------------Received Bill---------------*/
	public function generateBillPdf (Request $request){
		//print_r($request->all());die;
		//------------- get val qry ---------------//
		$serialNo = $request->token;

		$getrecivedval = ExchangeSample::leftjoin('tbl_lager','tbl_exchange_sample.fk_lager_id','=','tbl_lager.id')
										->select('tbl_exchange_sample.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
										->where('tbl_exchange_sample.sl_no',$serialNo)
										->get()->toArray();
		//echo"<pre>";print_r($getrecivedval);die;
		//---------------- start pdf section -----------------//
		PDF::SetTitle('Bill');
		$x = 1;
		$y = 28;
		$gap_one = 5;
		$gap_two = 5; $x_val_gap = 45;
		
        PDF::AddPage();
		PDF::SetFont('helvetica', '', 15);
		//PDF::MultiCell(20, 38, "NARAYANI GOLD"."\n", 0, 'J', 0, 1, '' ,'', true);
		PDF::Text(1, 18, 'NARAYANI GOLD');
		PDF::SetFont('helvetica', '', 9);

		if($getrecivedval[0]['fk_lager_id'] == 0){
			//PDF::MultiCell(5, 10, "prabgas debnath", 0, 'J', 0, 1, '' ,'', false);
			PDF::Text(1, 25, $getrecivedval[0]['customer_name']);
			PDF::SetFont('helvetica', '', 9);
		} else {
			//PDF::MultiCell(3, 18, $getrecivedval[0]['jewelry_name']."\n", 0, 'J', 0, 1, '' ,'', true);
			//PDF::MultiCell(3, 18, $getrecivedval[0]['proprietor_name']."\n", 0, 'J', 0, 1, '' ,'', true);
			PDF::Text(1, 24.5, 'JLS : '.$getrecivedval[0]['jewelry_name']);
			PDF::Text(1, 28.5, 'PRP : '.$getrecivedval[0]['proprietor_name']);
		}
		
		$arrval[] = ['label' => 'S. No.', 'val' => $getrecivedval[0]['sl_no']];
		$arrval[] = ['label' => 'Date', 'val' => date('d/m/y H:i:s', strtotime($getrecivedval[0]['created_date_time']))];
		foreach($getrecivedval as $key => $data){
			$arrval[] = ['label' => $data['sample_name'], 'val' => $data['weight']];
		}
		//$arrval[] = ['label' => 'Total', 'val' => $getrecivedval[0]['alloy_weight']];
		$sec1_lab_x = 1; $sec1_val_x = $x+18; $seccol_x = $x+16;
		foreach($arrval as $key => $val){
			$y = $y+$gap_two; 
			PDF::Text($sec1_lab_x, $y, $val['label']);
			//PDF::MultiCell(10, 5, $val['label'], 1, 'L', 1, 0, 3, 25, true);
			PDF::Text($seccol_x, $y, ':');
			PDF::Text($sec1_val_x, $y, $val['val']);
		}
		
		PDF::Output('Bill.pdf');
	}
	/*---------------Exchange Bill---------------*/
	public function generateExchangeBillPdf (Request $request){
		// print_r($request->all());die;
		//------------- get val qry ---------------//
		$id = $request->id;

		$get_exchange_val = Exchange::leftjoin('tbl_lager','tbl_exchange.fk_lager_id','=','tbl_lager.id')
						->select('tbl_exchange.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
						->where('tbl_exchange.id',$id)
						->get()->toArray();
		$date = date('d/m/y H:i:s', strtotime($get_exchange_val[0]['created_date_time']));
		$alloy_weight = $get_exchange_val[0]['alloy_weight'];
		$purity = $get_exchange_val[0]['purity'];
		$fine_gold_weight = $get_exchange_val[0]['fine_gold_weight'];

		//---------------- start pdf section -----------------//
		PDF::SetTitle('Exchange Bill');
		
        PDF::AddPage();
		PDF::SetFont('helvetica', 'B', 15);
		PDF::Text(1, 18, 'NARAYANI GOLD');
		PDF::SetFont('helvetica', 'B', 9);
		PDF::Text(1, 24.5, 'JLS  : '.$get_exchange_val[0]['jewelry_name']);
		PDF::Text(1, 28.5, 'PRP : '.$get_exchange_val[0]['proprietor_name']);
		PDF::Text(1, 32.5, 'DATE : '.$date);
		PDF::Text(8, 36.5, 'BILL(Exchange)');
		PDF::SetFont('helvetica', 'B', 10);
		$style = array('width' => 0.4, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0,0,0));
		PDF::Line(0, 41.5, 48, 41.5, $style);
		PDF::SetFont('helvetica', 'B', 9);
		PDF::Text(1, 42.5, 'Alloy Gold : '.$alloy_weight.'gm');
		PDF::Text(1, 46.5, 'Purity         : '.$purity);
		PDF::Text(1, 50.5, 'Fine Gold   : '.$fine_gold_weight.'gm');
		
		PDF::Output('bill_exchange.pdf');
	}
	/*---------------Sale Purchase Bill---------------*/
	public function generateSalePurchaseBillPdf (Request $request){
		// print_r($request->all());die;
		//------------- get val qry ---------------//
		$id = $request->id;

		$get_sale_purchase_val = SalePurchase::leftjoin('tbl_lager','tbl_sale_purchase.fk_lager_id','=','tbl_lager.id')
						->select('tbl_sale_purchase.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
						->where('tbl_sale_purchase.id',$id)
						->get()->toArray();
		$type = ($get_sale_purchase_val[0]['type'] == 'S') ? 'SALE' : 'PURCHASE';
		$date = date('d/m/y H:i:s', strtotime($get_sale_purchase_val[0]['created_date_time']));
		$weight = $get_sale_purchase_val[0]['gold_weight'];
		$rate = ($get_sale_purchase_val[0]['type'] == 'S') ? $get_sale_purchase_val[0]['sale_rate'] : $get_sale_purchase_val[0]['purchase_rate'];
		$total = $get_sale_purchase_val[0]['total_amount'];
		$paid = $get_sale_purchase_val[0]['pay_amount'];
		// print_r($get_sale_purchase_val);die;

		//---------------- start pdf section -----------------//
		PDF::SetTitle('Sale/Purchase Bill');
		
        PDF::AddPage();
		PDF::SetFont('helvetica', 'B', 15);
		PDF::Text(1, 18, 'NARAYANI GOLD');
		PDF::SetFont('helvetica', 'B', 9);
		PDF::Text(1, 24.5, 'JLS  : '.$get_sale_purchase_val[0]['jewelry_name']);
		PDF::Text(1, 28.5, 'PRP : '.$get_sale_purchase_val[0]['proprietor_name']);
		
		PDF::Text(1, 32.5, 'DATE : '.$date);
		PDF::SetFont('helvetica', 'B', 10);
		PDF::Text(8, 36.5, 'BILL('.$type.')');
		$style = array('width' => 0.4, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0,0,0));
		PDF::Line(0, 41.5, 48, 41.5, $style);
		PDF::SetFont('helvetica', 'B', 9);
		PDF::Text(1, 42.5, 'Weight    Rate       Total');
		PDF::Text(1, 46.5, $weight.' * '.$rate.' = '.$total);
		PDF::Line(0, 51.5, 48, 51.5, $style);
		PDF::Text(1, 52.5, 'Paid Amount = '.$paid.'/-');
		
		PDF::Output('bill_sale_purchase.pdf');
	}
	/*---------------Fund Credit Debit Bill---------------*/
	public function generateFundCreditDebitBillPdf (Request $request){
		// print_r($request->all());die;
		//------------- get val qry ---------------//
		$id = $request->id;

		$get_fund_cre_deb_val = FundCreditDebit::leftjoin('tbl_lager','tbl_fund_credit_debit.fk_lager_id','=','tbl_lager.id')
						->select('tbl_fund_credit_debit.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
						->where('tbl_fund_credit_debit.id',$id)
						->get()->toArray();
		$type = ($get_fund_cre_deb_val[0]['type'] == 'G') ? 'Gold' : 'Cash';
		$tr_type = ($get_fund_cre_deb_val[0]['transaction_type'] == 'C') ? 'Credit' : 'Debit';
		$date = date('d/m/y H:i:s', strtotime($get_fund_cre_deb_val[0]['created_date_time']));
		$value = ($get_fund_cre_deb_val[0]['type'] == 'G') ? $get_fund_cre_deb_val[0]['weight'] : $get_fund_cre_deb_val[0]['amount'];
		$value_sign = ($get_fund_cre_deb_val[0]['type'] == 'G') ? 'gm' : '/-';
		//---------------- start pdf section -----------------//
		PDF::SetTitle('Fund Credit/Debit Bill');
		
        PDF::AddPage();
		PDF::SetFont('helvetica', 'B', 15);
		PDF::Text(1, 18, 'NARAYANI GOLD');
		PDF::SetFont('helvetica', 'B', 9);
		PDF::Text(1, 24.5, 'JLS  : '.$get_fund_cre_deb_val[0]['jewelry_name']);
		PDF::Text(1, 28.5, 'PRP : '.$get_fund_cre_deb_val[0]['proprietor_name']);
		
		PDF::Text(1, 32.5, 'DATE : '.$date);
		PDF::Text(1, 36.5, $type.' '.$tr_type.' = '.$value.$value_sign );
		
		PDF::Output('bill_fund_credit_debit.pdf');
	}
	//-------------- end Generate bill pdf section ---------//	
	//------------------- Party Statement -----------------//
	public function partyStatementPdf (Request $request){
		//print_r($request->all());die;
		
		$page_no = $request->page_no;
		$filepath = $request->file_path;
		$limit = 500;
		$offset = $page_no*$limit;
		$propiterId = $request->propiter_jewelry_name;
		
		$daterange = explode('-', $request->dateRange);
		$expstartdate = explode('/', $daterange[0]);
		$startDate = trim($expstartdate[2]).'-'.trim($expstartdate[1]).'-'.trim($expstartdate[0]);
		
		$expenddate = explode('/', $daterange[1]);
		$endDate = trim($expenddate[2]).'-'.trim($expenddate[1]).'-'.trim($expenddate[0]);
		
		$countval = ExchangeSample::where('fk_lager_id',$propiterId)->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))->count();
		$amountdata = FundCreditDebit::whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
									->where('fk_lager_id',$propiterId)
									->where('type','C')
									->select('tbl_fund_credit_debit.*')
									->offset($offset)
									->limit($limit)
									->orderBy('created_date_time', 'ASC')
									->get()->toArray();
		$golddata = FundCreditDebit::whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
									->where('fk_lager_id',$propiterId)
									->where('type','G')
									->select('tbl_fund_credit_debit.*')
									->offset($offset)
									->limit($limit)
									->orderBy('created_date_time', 'ASC')
									->get()->toArray();
		$ledgerdata = Lager::where('id',$propiterId)
							->select('jewelry_name','proprietor_name')
							->get()->toArray();
		if(sizeof($amountdata)==0){
			$amountdata = FundCreditDebit::where('fk_lager_id',$propiterId)
									->where('type','C')
									->select('tbl_fund_credit_debit.*')
									->limit(1)
									->orderBy('created_date_time', 'DESC')
									->get()->toArray();
		}
		if(sizeof($golddata)==0){
			$golddata = FundCreditDebit::where('fk_lager_id',$propiterId)
									->where('type','G')
									->select('tbl_fund_credit_debit.*')
									->limit(1)
									->orderBy('created_date_time', 'DESC')
									->get()->toArray();
		}
		// for Amount start
		$tr = '';
		foreach($amountdata as $data){
			
			//date 
			$expdate = explode(' ', $data['created_date_time']);
			$cash_credit = ($data['transaction_type'] == 'C') ?  $data['amount'] :  '';
			$cash_debit = ($data['transaction_type'] == 'D') ?  $data['amount'] :  '';
			$plus_minus = ($data['updated_cash'] < 0) ? '-' : '+';
			$tr .= '<tr>
						<td style="font-size: 8px; width:20%;">'.date('d/m/Y',strtotime($expdate[0])).'</td>
						<td style="font-size: 8px; width:23%;">'.$data['remarks'].'</td>
						<td style="font-size: 8px;">'.$cash_credit.'</td>
						<td style="font-size: 8px;">'.$cash_debit.'</td>
						<td style="font-size: 8px; width:7%;">'.$plus_minus.'</td>
						<td style="font-size: 8px;">'.abs($data['updated_cash']).'</td>
					</tr>';
		}
		// amount end
		// for gold start
		$gtr = '';
		foreach($golddata as $gdata){
			
			//date 
			$expdate = explode(' ', $gdata['created_date_time']);
			$gold_credit = ($gdata['transaction_type'] == 'C') ?  $gdata['weight'] :  '';
			$gold_debit = ($gdata['transaction_type'] == 'D') ?  $gdata['weight'] :  '';
			$plus_minus = ($gdata['updated_gold'] < 0) ? '-' : '+';
			$gtr .= '<tr>
						<td style="font-size: 8px; width:20%;">'.date('d/m/Y',strtotime($expdate[0])).'</td>
						<td style="font-size: 8px; width:23%;">'.$gdata['remarks'].'</td>
						<td style="font-size: 8px;">'.$gold_credit.'</td>
						<td style="font-size: 8px;">'.$gold_debit.'</td>
						<td style="font-size: 8px; width:7%;">'.$plus_minus.'</td>
						<td style="font-size: 8px;">'.abs($gdata['updated_gold']).'</td>
					</tr>';
		}
		// gold end
		$html = '<h1 align="center">Party Statement</h1>
				<p align="center"><b>Jewellers Name : </b>'.$ledgerdata[0]['jewelry_name'].' &nbsp; <b>Proprietor Name :</b>'.$ledgerdata[0]['proprietor_name'].'</p>
				
				<table style="padding-top: 3px;">
					<tr>
						<td>
							<h5 align="center">Money/Amount</h5>
						</td>
						<td>
							<h5 align="center">Gold</h5>
						</td>
					</tr>
					<tr style="font-size:11px;">
						<td>
							<table border="1" cellpadding="2" cellspacing="0" nobr="true">
								
								<thead>
									<tr>
										<th align="center" style="font-size: 10px; font-weight: bold; width:20%;">Date</th>
										<th align="center" style="font-size: 10px; font-weight: bold; width:23%;">Remarks</th>
										<th align="center" style="font-size: 10px; font-weight: bold;">Credit</th>
										<th align="center" style="font-size: 10px; font-weight: bold;">Debit</th>
										<th align="center" style="font-size: 10px; font-weight: bold; width:7%;">+/-</th>
										<th align="center" style="font-size: 10px; font-weight: bold;">Balance</th>
									</tr>
								</thead>
								
								<tbody>
											'.$tr.'
								</tbody>
							</table>
						</td>
						<td>
							<table border="1" cellpadding="2" cellspacing="0" nobr="true">
								<tr>
									<th align="center" style="font-size: 10px; font-weight: bold; width:20%;">Date</th>
									<th align="center" style="font-size: 10px; font-weight: bold; width:23%;">Remarks</th>
									<th align="center" style="font-size: 10px; font-weight: bold;">Credit</th>
									<th align="center" style="font-size: 10px; font-weight: bold;">Debit</th>
									<th align="center" style="font-size: 10px; font-weight: bold; width: 7%;">+/-</th>
									<th align="center" style="font-size: 10px; font-weight: bold;">Balance</th>
								</tr>
								<tbody>
											'.$gtr.'
								</tbody>
							</table>
						</td>
					</tr>
				</table>';
		PDF::SetTitle('Party Statement');
		PDF::AddPage();
		PDF::writeHTML($html, true, false, true, false, '');
		$fullfilepath = storage_path('export-pdf/party-statement/party-statement-'.$ledgerdata[0]['jewelry_name'].'.pdf');
		$file = PDF::Output($fullfilepath, 'F');
		/*if($filepath == ''){
			//$filepath = storage_path('export-pdf/'.time());
			$filepath = storage_path('export-pdf/party-statment');
			File::makeDirectory($filepath, $mode = 0777, true, true);
			Controller::zipDownload($filepath);
		}
		$filename = $page_no.'.pdf';
		$fullfilepath = $filepath.'/'.$filename;
		$filenameexp = explode('/',$filepath);
		
		if((count($amountdata) == 0) AND (count($golddata) == 0)){
			$return['key'] = 'C';
			$return['msg'] = 'Success.';
			$return['filename'] = $filenameexp[1];
			return $return;
		}
		
		$file = PDF::Output($fullfilepath, 'F');
		Controller::zipDownload($filepath);
		$return['newpageno'] = $page_no+1;
		$return['filepath'] = $filepath;
		$return['key'] = 'S';
		$return['msg'] = 'Success.';*/
		//$return['complete_progress'] = 

		$return['filepath'] = $fullfilepath;
		$return['key'] = 'S';
		$return['msg'] = 'Success.';
		return $return;
	}
	/*------------------- end Party statement ------------------*/
	//--------------------------- our-sale-and-parchase statement pdf section -----------------------//
	public function ourSaleParchaseStatement(Request $request){
		//print_r($request->all());die;
		$page_no = $request->page_no;
		$filepath = $request->file_path;
		$limit = 500000;
		$offset = $page_no*$limit;
		
		$daterange = explode('-', $request->dateRange);
		
		$expstartdate = explode('/', $daterange[0]);
		$startDate = trim($expstartdate[2]).'-'.trim($expstartdate[1]).'-'.trim($expstartdate[0]);
		

		$expenddate = explode('/', $daterange[1]);
		$endDate = trim($expenddate[2]).'-'.trim($expenddate[1]).'-'.trim($expenddate[0]);
		
		$propiterId = $request->propiter_jewelry_name;

		$is_gst = $request->is_gst;
		$non_gst =  $request->non_gst;
		// print($is_gst);die;
		$where_gst = '';
		$where_ledger = '';
		if($is_gst == 'Y' && $non_gst == 'Y'){
			if($propiterId == ''){
				$countval = SalePurchase::whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))->count();
				
				$saledata = SalePurchase::join('tbl_lager','tbl_sale_purchase.fk_lager_id','=','tbl_lager.id')
											->whereBetween('tbl_sale_purchase.created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
											->where('tbl_sale_purchase.type','S')
											->select('tbl_sale_purchase.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
											->offset($offset)
											->limit($limit)
											->get()->toArray();
				$parchasedata = SalePurchase::join('tbl_lager','tbl_sale_purchase.fk_lager_id','=','tbl_lager.id')
											->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
											->where('tbl_sale_purchase.type','P')
											->select('tbl_sale_purchase.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
											->offset($offset)
											->limit($limit)
											->get()->toArray();
			}else{
				$countval = SalePurchase::where('fk_lager_id',$propiterId)->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))->count();
				
				$saledata = SalePurchase::join('tbl_lager','tbl_sale_purchase.fk_lager_id','=','tbl_lager.id')
											->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
											->where('fk_lager_id',$propiterId)
											->where('tbl_sale_purchase.type','S')
											->select('tbl_sale_purchase.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
											->offset($offset)
											->limit($limit)
											->get()->toArray();
				$parchasedata = SalePurchase::join('tbl_lager','tbl_sale_purchase.fk_lager_id','=','tbl_lager.id')
											->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
											->where('fk_lager_id',$propiterId)
											->where('tbl_sale_purchase.type','P')
											->select('tbl_sale_purchase.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
											->offset($offset)
											->limit($limit)
											->get()->toArray();
				$where_ledger = "AND fk_lager_id = '".$propiterId."'";
			}
		}elseif($is_gst == 'Y' && $non_gst == 'N'){
			$where_gst = "AND is_gst = 'Y'";
			if($propiterId == ''){
				$countval = SalePurchase::whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))->count();
				
				$saledata = SalePurchase::join('tbl_lager','tbl_sale_purchase.fk_lager_id','=','tbl_lager.id')
											->whereBetween('tbl_sale_purchase.created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
											->where('tbl_sale_purchase.type','S')
											->where('tbl_sale_purchase.is_gst','Y')
											->select('tbl_sale_purchase.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
											->offset($offset)
											->limit($limit)
											->get()->toArray();
				$parchasedata = SalePurchase::join('tbl_lager','tbl_sale_purchase.fk_lager_id','=','tbl_lager.id')
											->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
											->where('tbl_sale_purchase.type','P')
											->where('tbl_sale_purchase.is_gst','Y')
											->select('tbl_sale_purchase.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
											->offset($offset)
											->limit($limit)
											->get()->toArray();
			}else{
				$countval = SalePurchase::where('fk_lager_id',$propiterId)->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))->count();
				
				$saledata = SalePurchase::join('tbl_lager','tbl_sale_purchase.fk_lager_id','=','tbl_lager.id')
											->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
											->where('fk_lager_id',$propiterId)
											->where('tbl_sale_purchase.type','S')
											->where('tbl_sale_purchase.is_gst','Y')
											->select('tbl_sale_purchase.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
											->offset($offset)
											->limit($limit)
											->get()->toArray();
				$parchasedata = SalePurchase::join('tbl_lager','tbl_sale_purchase.fk_lager_id','=','tbl_lager.id')
											->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
											->where('fk_lager_id',$propiterId)
											->where('tbl_sale_purchase.type','P')
											->where('tbl_sale_purchase.is_gst','Y')
											->select('tbl_sale_purchase.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
											->offset($offset)
											->limit($limit)
											->get()->toArray();
				$where_ledger = "AND fk_lager_id = '".$propiterId."'";
			}
		}elseif($is_gst == 'N' && $non_gst == 'Y'){
			$where_gst = "AND is_gst = 'N'";
			if($propiterId == ''){
				$countval = SalePurchase::whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))->count();
				
				$saledata = SalePurchase::join('tbl_lager','tbl_sale_purchase.fk_lager_id','=','tbl_lager.id')
											->whereBetween('tbl_sale_purchase.created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
											->where('tbl_sale_purchase.type','S')
											->where('tbl_sale_purchase.is_gst','N')
											->select('tbl_sale_purchase.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
											->offset($offset)
											->limit($limit)
											->get()->toArray();
				$parchasedata = SalePurchase::join('tbl_lager','tbl_sale_purchase.fk_lager_id','=','tbl_lager.id')
											->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
											->where('tbl_sale_purchase.type','P')
											->where('tbl_sale_purchase.is_gst','N')
											->select('tbl_sale_purchase.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
											->offset($offset)
											->limit($limit)
											->get()->toArray();
			}else{
				$countval = SalePurchase::where('fk_lager_id',$propiterId)->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))->count();
				
				$saledata = SalePurchase::join('tbl_lager','tbl_sale_purchase.fk_lager_id','=','tbl_lager.id')
											->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
											->where('fk_lager_id',$propiterId)
											->where('tbl_sale_purchase.type','S')
											->where('tbl_sale_purchase.is_gst','N')
											->select('tbl_sale_purchase.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
											->offset($offset)
											->limit($limit)
											->get()->toArray();
				$parchasedata = SalePurchase::join('tbl_lager','tbl_sale_purchase.fk_lager_id','=','tbl_lager.id')
											->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
											->where('fk_lager_id',$propiterId)
											->where('tbl_sale_purchase.type','P')
											->where('tbl_sale_purchase.is_gst','N')
											->select('tbl_sale_purchase.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
											->offset($offset)
											->limit($limit)
											->get()->toArray();
				$where_ledger = "AND fk_lager_id = '".$propiterId."'";
			}
		}
		$sum_sale = DB::select("SELECT SUM(gold_weight) As Totalweight, AVG(sale_rate) As AvgRate, SUM(total_amount) As TotalAmmount FROM tbl_sale_purchase WHERE type = 'S' $where_ledger $where_gst AND created_date_time BETWEEN '".$startDate.' '.'00:00:00'."' AND '".$endDate.' '.'23:59:59'."'");

		$sum_purchase = DB::select("SELECT SUM(gold_weight) Totalweight, AVG(purchase_rate) AvgRate, SUM(total_amount) TotalAmmount FROM tbl_sale_purchase WHERE type = 'P' $where_ledger $where_gst AND created_date_time BETWEEN '".$startDate.' '.'00:00:00'."' AND '".$endDate.' '.'23:59:59'."'");
		$sum_sale_decode = json_decode(json_encode($sum_sale,true),true);
		$sum_purchase_decode = json_decode(json_encode($sum_purchase,true),true);
		// for SALE start
		$tr = '';
		foreach($saledata as $data){			
			//date 
			$expdate = explode(' ', $data['created_date_time']);
			$gst = ($data['is_gst'] == 'Y') ?  'Yes' :  'No';
			$tr .= '<tr>
						<td style="font-size: 8px; width:18%;">'.date('d/m/Y',strtotime($expdate[0])).'</td>
						<td style="font-size: 8px;">'.$data['jewelry_name'].'</td>
						<td style="font-size: 8px;">'.$data['remarks'].'</td>
						<td style="font-size: 8px;">'.$data['gold_weight'].'</td>
						<td style="font-size: 8px;">'.$data['sale_rate'].'</td>
						<td style="font-size: 8px; ">'.$data['total_amount'].'</td>
						<td style="font-size: 8px;width:10%;">'.$gst.'</td>
					</tr>';
		}
		if(sizeof($sum_sale_decode)>0){	
			$tr .= '<tr>
						<td style="font-size: 8px;"></td>
						<td style="font-size: 8px;"></td>
						<td style="font-size: 8px; font-weight: bold;">Total</td>
						<td style="font-size: 8px;">'.$sum_sale_decode[0]['Totalweight'].'</td>
						<td style="font-size: 8px;">'.number_format($sum_sale_decode[0]['AvgRate'],2,'.','').'</td>
						<td style="font-size: 8px;">'.$sum_sale_decode[0]['TotalAmmount'].'</td>
						<td style="font-size: 8px;width:10%;"></td>
					</tr>';
		}
		$tr.= 
		// SALE end
		// for PURCHASE start
		$ptr = '';
		foreach($parchasedata as $datap){
			
			//date 
			$expdate = explode(' ', $datap['created_date_time']);
			$gst = ($datap['is_gst'] == 'Y') ?  'Yes' :  'No';
			$ptr .= '<tr>
						<td style="font-size: 8px; width:18%;">'.date('d/m/Y',strtotime($expdate[0])).'</td>
						<td style="font-size: 8px;">'.$datap['jewelry_name'].'</td>
						<td style="font-size: 8px;">'.$datap['remarks'].'</td>
						<td style="font-size: 8px;">'.$datap['gold_weight'].'</td>
						<td style="font-size: 8px;">'.$datap['purchase_rate'].'</td>
						<td style="font-size: 8px; ">'.$datap['total_amount'].'</td>
						<td style="font-size: 8px;width:10%;">'.$gst.'</td>
					</tr>';
		}
		if(sizeof($sum_purchase_decode)>0){	
			$ptr .= '<tr>
						<td style="font-size: 8px;"></td>
						<td style="font-size: 8px;"></td>
						<td style="font-size: 8px; font-weight: bold;">Total</td>
						<td style="font-size: 8px;">'.$sum_purchase_decode[0]['Totalweight'].'</td>
						<td style="font-size: 8px;">'.number_format($sum_purchase_decode[0]['AvgRate'],2,'.','').'</td>
						<td style="font-size: 8px;">'.$sum_purchase_decode[0]['TotalAmmount'].'</td>
						<td style="font-size: 8px;width:10%;"></td>
					</tr>';
		}
		$ptr.= 
		// PURCHASE end
		$html = '<h1 align="center">Sale Purchase Statement</h1>
				
				<table style="padding-top: 3px;">
					<tr>
						<td>
							<h5 align="center">SALE</h5>
						</td>
						<td>
							<h5 align="center">PURCHASE</h5>
						</td>
					</tr>
					<tr style="font-size:11px;">
						<td>
							<table border="1" cellpadding="2" cellspacing="0" nobr="true">
								
								<thead>
									<tr>
										<th align="center" style="font-size: 10px; font-weight: bold; width:18%;">Date</th>
										<th align="center" style="font-size: 10px; font-weight: bold;">Jewellers Name</th>
										<th align="center" style="font-size: 10px; font-weight: bold;">Remarks</th>
										<th align="center" style="font-size: 10px; font-weight: bold;">Gold Weight</th>
										<th align="center" style="font-size: 10px; font-weight: bold;">Rate</th>
										<th align="center" style="font-size: 10px; font-weight: bold;">Amount</th>
										<th align="center" style="font-size: 10px; font-weight: bold; width:10%;">Is GST</th>
									</tr>
								</thead>
								
								<tbody>
											'.$tr.'
								</tbody>
							</table>
						</td>
						<td>
							<table border="1" cellpadding="2" cellspacing="0" nobr="true">
								<tr>
									<th align="center" style="font-size: 10px; font-weight: bold; width:18%;">Date</th>
									<th align="center" style="font-size: 10px; font-weight: bold;">Jewellers Name</th>
									<th align="center" style="font-size: 10px; font-weight: bold;">Remarks</th>
									<th align="center" style="font-size: 10px; font-weight: bold;">Gold Weight</th>
									<th align="center" style="font-size: 10px; font-weight: bold;">Rate</th>
									<th align="center" style="font-size: 10px; font-weight: bold;">Amount</th>
									<th align="center" style="font-size: 10px; font-weight: bold; width:10%;">Is GST</th>
								</tr>
								<tbody>
											'.$ptr.'
								</tbody>
							</table>
						</td>
					</tr>
				</table>';
		PDF::SetTitle('Sale Parchase Statement');
		PDF::AddPage();
		PDF::writeHTML($html, true, false, true, false, '');
		
		$fullfilepath = storage_path('export-pdf/sale-purchase-statement/sale-purchase-statement.pdf');
		$file = PDF::Output($fullfilepath, 'F');

		/*if($filepath == ''){
			//$filepath = storage_path('export-pdf/'.time());
			$filepath = storage_path('export-pdf/sale-parchase-statement');
			File::makeDirectory($filepath, $mode = 0777, true, true);
			Controller::zipDownload($filepath);
		}
		$filename = $page_no.'.pdf';
		$fullfilepath = $filepath.'/'.$filename;
		
		$filenameexp = explode('/',$filepath);
		//print_r($filepath);die;
		if(count($saledata) == 0 AND count($parchasedata) == 0){
			$return['key'] = 'C';
			$return['msg'] = 'Success.';
			$return['filename'] = $filenameexp[1];
			return $return;
		}
		
		$file = PDF::Output($fullfilepath, 'F');
		Controller::zipDownload($filepath);
		$return['newpageno'] = $page_no+1;
		$return['filepath'] = $filepath;
		$return['key'] = 'S';
		$return['msg'] = 'Success.';*/
		
		$return['filepath'] = $fullfilepath;
		$return['key'] = 'S';
		$return['msg'] = 'Success.';
		return $return;
	}
	//------------------------ end our-sale-and-parchase statement pdf section -----------------------//
	//------------------- Touch Statement -----------------//
	public function touchStatementPdf (Request $request){
		//print_r($request->all());die;
		
		$page_no = $request->page_no;
		$filepath = $request->file_path;
		$limit = 500000;
		$offset = $page_no*$limit;
		$propiterId = $request->propiter_jewelry_name;
		
		$daterange = explode('-', $request->dateRange);
		$expstartdate = explode('/', $daterange[0]);
		$startDate = trim($expstartdate[2]).'-'.trim($expstartdate[1]).'-'.trim($expstartdate[0]);
		
		$expenddate = explode('/', $daterange[1]);
		$endDate = trim($expenddate[2]).'-'.trim($expenddate[1]).'-'.trim($expenddate[0]);
		
		if($propiterId == ''){
			$countval = ExchangeSample::whereBetween('tbl_exchange_sample.created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))->count();
			$saleparchasedata = ExchangeSample::leftJoin('tbl_lager','tbl_exchange_sample.fk_lager_id','=','tbl_lager.id')
										->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
										->whereNotNull('tbl_exchange_sample.service_charge')
										->select('tbl_exchange_sample.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
										->offset($offset)
										->limit($limit)
										->get()->toArray();
			$sum_table = DB::select("SELECT SUM(CASE WHEN paid_status = 'D' THEN service_charge ELSE 0 END) TotalDue, SUM(CASE WHEN paid_status = 'P' THEN service_charge ELSE 0 END) TotalPaid FROM tbl_exchange_sample WHERE created_date_time BETWEEN '".$startDate.' '.'00:00:00'."' AND '".$endDate.' '.'23:59:59'."' ");
			$sum_decode = json_decode(json_encode($sum_table,true),true);
		}else{
			$countval = ExchangeSample::where('fk_lager_id',$propiterId)->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))->count();
			$saleparchasedata = ExchangeSample::leftJoin('tbl_lager','tbl_exchange_sample.fk_lager_id','=','tbl_lager.id')
										->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
										->whereNotNull('tbl_exchange_sample.service_charge')
										->where('tbl_exchange_sample.fk_lager_id',$propiterId)
										->select('tbl_exchange_sample.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
										->offset($offset)
										->limit($limit)
										->get()->toArray();
			
			$sum_table = DB::select("SELECT SUM(CASE WHEN paid_status = 'D' THEN service_charge ELSE 0 END) TotalDue, SUM(CASE WHEN paid_status = 'P' THEN service_charge ELSE 0 END) TotalPaid FROM tbl_exchange_sample WHERE created_date_time BETWEEN '".$startDate.' '.'00:00:00'."' AND '".$endDate.' '.'23:59:59'."' AND fk_lager_id = '".$propiterId."' ");
			$sum_decode = json_decode(json_encode($sum_table,true),true);

		
		$j_decode = json_decode(json_encode($total_row,true),true);
		}
		
		//print_r($countval);die;
		$tr = '';
		foreach($saleparchasedata as $data){
			
			//date 
			$expdate = explode(' ', $data['created_date_time']);
			//$date = date("d M Y", strtotime($expdate[0]));
			$jewelry_name = ($data['fk_lager_id']==0)?'':$data['jewelry_name'];
			$proprietor_name = ($data['fk_lager_id']==0)?$data['customer_name']:$data['proprietor_name'];
			$service_charge_due = $data['paid_status'] == 'D' ? $data['service_charge']: '';
			$service_charge_paid = $data['paid_status'] == 'P' ? $data['service_charge'] : '';
			$tr .= '<tr>
						<td style="font-size: 8px;">'.date('d/m/Y',strtotime($expdate[0])).'</td>
						<td style="font-size: 8px;">'.$data['sl_no'].'</td>
						<td style="font-size: 8px;">'.$jewelry_name.'</td>
						<td style="font-size: 8px;">'.$proprietor_name.'</td>
						<td style="font-size: 8px;">'.$data['sample_name'].'</td>
						<td style="font-size: 8px;">'.$data['weight'].'</td>
						<td style="font-size: 8px;">'.$data['purity'].'</td>
						<td style="font-size: 8px;">'.$service_charge_due.'</td>
						<td style="font-size: 8px;">'.$service_charge_paid.'</td>
					</tr>';
		}
		if(sizeof($sum_decode)>0){
			
			$tr .= '<tr>
						<td style="font-size: 8px;"></td>
						<td style="font-size: 8px;"></td>
						<td style="font-size: 8px;"></td>
						<td style="font-size: 8px;"></td>
						<td style="font-size: 8px;"></td>
						<td style="font-size: 8px;"></td>
						<td style="font-size: 10px; font-weight: bold;">TOTAL</td>
						<td style="font-size: 8px;">'.$sum_decode[0]['TotalDue'].'</td>
						<td style="font-size: 8px;">'.$sum_decode[0]['TotalPaid'].'</td>
					</tr>';
		}
		$tr.= 
		$html = '<h1 align="center">Tounch Statement</h1>
				<table border="1" cellpadding="2" cellspacing="0" nobr="true">
					<tr>
						<th align="center" style="font-size: 10px; font-weight: bold;">Date</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Sr. No.</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Jewellers Name</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Proprietor Name</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Sample Name</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Old Gold Weight</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Purity</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Service Charge Due</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Service Charge Paid</th>

					</tr>
					'.$tr.'
				</table>';
		PDF::SetTitle('Tounch Statement');
		PDF::AddPage();
		PDF::writeHTML($html, true, false, true, false, '');
		
		$fullfilepath = storage_path('export-pdf/tounch-statement/tounch-statement.pdf');
		$file = PDF::Output($fullfilepath, 'F');
		/*if($filepath == ''){
			//$filepath = storage_path('export-pdf/'.time());
			$filepath = storage_path('export-pdf/touch-statment');
			File::makeDirectory($filepath, $mode = 0777, true, true);
			Controller::zipDownload($filepath);
		}
		$filename = $page_no.'.pdf';
		$fullfilepath = $filepath.'/'.$filename;
		$filenameexp = explode('/',$filepath);
		
		if(count($saleparchasedata) == 0){
			$return['key'] = 'C';
			$return['msg'] = 'Success.';
			$return['filename'] = $filenameexp[1];
			return $return;
		}
		
		$file = PDF::Output($fullfilepath, 'F');
		Controller::zipDownload($filepath);
		$return['newpageno'] = $page_no+1;
		$return['filepath'] = $filepath;
		$return['key'] = 'S';
		$return['msg'] = 'Success.';*/
		//$return['complete_progress'] = 
		
		$return['filepath'] = $fullfilepath;
		$return['key'] = 'S';
		$return['msg'] = 'Success.';
		return $return;
	}
	/*------------------- end touch statement ------------------*/
	/*------------------ Refine statment pdf --------------------*/
	public function refineStatementPdf (Request $request){
		// print_r($request->all());die;
		$propiterId = $request->propiter_jewelry_name;
		$page_no = $request->page_no;
		$filepath = $request->file_path;
		$limit = 500000;
		$offset = $page_no*$limit;
		
		$daterange = explode('-', $request->dateRange);
		
		$expstartdate = explode('/', $daterange[0]);
		$startDate = trim($expstartdate[2]).'-'.trim($expstartdate[1]).'-'.trim($expstartdate[0]);

		$expenddate = explode('/', $daterange[1]);
		$endDate = trim($expenddate[2]).'-'.trim($expenddate[1]).'-'.trim($expenddate[0]);
		
		if($propiterId == ''){
			$countval = Exchange::whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))->count();
			
			$refinestatementdata = Exchange::join('tbl_lager','tbl_exchange.fk_lager_id','=','tbl_lager.id')
										->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
										->select('tbl_exchange.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name','tbl_lager.address')
										->offset($offset)
										->limit($limit)
										->get()->toArray();
			$sum_table = DB::select("SELECT SUM(alloy_weight) TotalOldGold, AVG(purity) AvgPurity, SUM(fine_gold_weight) TotalFineGold FROM tbl_exchange WHERE created_date_time BETWEEN '".$startDate.' '.'00:00:00'."' AND '".$endDate.' '.'23:59:59'."'");
			$sum_decode = json_decode(json_encode($sum_table,true),true);
		}else{
			$countval = Exchange::where('fk_lager_id',$propiterId)->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))->count();
			
			$refinestatementdata = Exchange::join('tbl_lager','tbl_exchange.fk_lager_id','=','tbl_lager.id')
										->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
										->where('fk_lager_id',$propiterId)
										->select('tbl_exchange.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name','tbl_lager.address')
										->offset($offset)
										->limit($limit)
										->get()->toArray();

			$sum_table = DB::select("SELECT SUM(alloy_weight) TotalOldGold, AVG(purity) AvgPurity, SUM(fine_gold_weight) TotalFineGold FROM tbl_exchange WHERE created_date_time BETWEEN '".$startDate.' '.'00:00:00'."' AND '".$endDate.' '.'23:59:59'."'AND fk_lager_id = '".$propiterId."' ");
			$sum_decode = json_decode(json_encode($sum_table,true),true);
		}
		
		$tr = '';
		foreach($refinestatementdata as $data){
			//print_r($data);
			//date 
			$expdate = explode(' ', $data['created_date_time']);
			$date = date("d/m/Y", strtotime($expdate[0]));

			$tr .= '<tr>
						<td style="font-size: 8px;">'.$date.'</td>
						<td style="font-size: 8px;">'.$data['batch_no'].'</td>
						<td style="font-size: 8px;">'.$data['jewelry_name'].'</td>
						<td style="font-size: 8px;">'.$data['proprietor_name'].'</td>
						<td style="font-size: 8px;">'.$data['address'].'</td>
						<td style="font-size: 8px;">'.$data['alloy_weight'].'</td>
						<td style="font-size: 8px;">'.$data['purity'].'</td>
						<td style="font-size: 8px;">'.$data['fine_gold_weight'].'</td>
					</tr>';
		}
		//die;
		if(sizeof($sum_decode)>0){
			$avg_purity = number_format($sum_decode[0]['AvgPurity'],2,'.','');
			$tr .= '<tr>
						<td style="font-size: 8px;"></td>
						<td style="font-size: 8px;"></td>
						<td style="font-size: 8px;"></td>
						<td style="font-size: 8px;"></td>
						<td style="font-size: 10px; font-weight: bold;">TOTAL</td>
						<td style="font-size: 8px;">'.$sum_decode[0]['TotalOldGold'].'</td>
						<td style="font-size: 8px;">'.$avg_purity.'</td>
						<td style="font-size: 8px;">'.$sum_decode[0]['TotalFineGold'].'</td>
					</tr>';
		}
		$tr.=
		$html = '<h1 align="center">Refine Statement</h1>
				<table border="1" cellpadding="2" cellspacing="0" nobr="true">
					<tr>
						<th align="center" style="font-size: 10px; font-weight: bold;">Date</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Batch No.</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Jewellers Name</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Proprietor Name</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Address</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Old Gold Weight</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Purity</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Fine Gold Weight</th>
					</tr>
					'.$tr.'
				</table>';
		PDF::SetTitle('Refine Statement');
		PDF::AddPage();
		PDF::writeHTML($html, true, false, true, false, '');
		
		$fullfilepath = storage_path('export-pdf/refine-statement/refine-statement.pdf');
		$file = PDF::Output($fullfilepath, 'F');

		/*if($filepath == ''){
			//$filepath = storage_path('export-pdf/'.time());
			$filepath = storage_path('export-pdf/refine-statement');
			File::makeDirectory($filepath, $mode = 0777, true, true);
			self::zipDownload($filepath);
		}
		$filename = $page_no.'.pdf';
		$fullfilepath = $filepath.'/'.$filename;
		
		$filenameexp = explode('/',$filepath);
		//print_r($filepath);die;
		if(count($refinestatementdata) == 0){
			$return['key'] = 'C';
			$return['msg'] = 'Success.';
			$return['filename'] = $filenameexp[1];
			return $return;
		}
		
		$file = PDF::Output($fullfilepath, 'F');
		self::zipDownload($filepath);
		$return['newpageno'] = $page_no+1;
		$return['filepath'] = $filepath;
		$return['key'] = 'S';
		$return['msg'] = 'Success.';*/
		$return['filepath'] = $fullfilepath;
		$return['key'] = 'S';
		$return['msg'] = 'Success.';
		return $return;
	}
	/*------------------- Refine statement pdf end --------------*/
	/*-------------------- Debit & credit statement pdf -----------------*/
	public function debitCreditStatementPdf (Request $request){
		//print_r($request->all());die;
		$propiterId = $request->propiter_jewelry_name;
		$page_no = $request->page_no;
		$filepath = $request->file_path;
		$limit = 500000;
		$offset = $page_no*$limit;
		
		$daterange = explode('-', $request->dateRange);
		
		$expstartdate = explode('/', $daterange[0]);
		$startDate = trim($expstartdate[2]).'-'.trim($expstartdate[1]).'-'.trim($expstartdate[0]);

		$expenddate = explode('/', $daterange[1]);
		$endDate = trim($expenddate[2]).'-'.trim($expenddate[1]).'-'.trim($expenddate[0]);
		
		if($propiterId == ''){
			$countval = FundCreditDebit::whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))->count();
			
			$debitcreditdata = FundCreditDebit::join('tbl_lager','tbl_fund_credit_debit.fk_lager_id','=','tbl_lager.id')
										->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
										->select('tbl_fund_credit_debit.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
										->offset($offset)
										->limit($limit)
										->get()->toArray();
			$sum_table = DB::select("SELECT SUM(CASE WHEN type = 'C' AND transaction_type = 'C' THEN amount ELSE 0 END) TotalMoneyDeposit, SUM(CASE WHEN type = 'G' AND transaction_type = 'C' THEN weight ELSE 0 END) TotalGoldDeposit, SUM(CASE WHEN type = 'G' AND transaction_type = 'D' THEN weight ELSE 0 END) TotalGoldExpenditure, SUM(CASE WHEN type = 'C' AND transaction_type = 'D' THEN amount ELSE 0 END) TotalMoneyExpenditure  FROM tbl_fund_credit_debit WHERE created_date_time BETWEEN '".$startDate.' '.'00:00:00'."' AND '".$endDate.' '.'23:59:59'."'");
			$sum_decode = json_decode(json_encode($sum_table,true),true);
		}else{
			$countval = FundCreditDebit::where('fk_lager_id',$propiterId)->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))->count();
			
			$debitcreditdata = FundCreditDebit::join('tbl_lager','tbl_fund_credit_debit.fk_lager_id','=','tbl_lager.id')
										->whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))
										->where('fk_lager_id',$propiterId)
										->select('tbl_fund_credit_debit.*','tbl_lager.jewelry_name','tbl_lager.proprietor_name')
										->offset($offset)
										->limit($limit)
										->get()->toArray();
			$sum_table = DB::select("SELECT SUM(CASE WHEN type = 'C' AND transaction_type = 'C' THEN amount ELSE 0 END) TotalMoneyDeposit, SUM(CASE WHEN type = 'G' AND transaction_type = 'C' THEN weight ELSE 0 END) TotalGoldDeposit, SUM(CASE WHEN type = 'G' AND transaction_type = 'D' THEN weight ELSE 0 END) TotalGoldExpenditure, SUM(CASE WHEN type = 'C' AND transaction_type = 'D' THEN amount ELSE 0 END) TotalMoneyExpenditure  FROM tbl_fund_credit_debit WHERE created_date_time BETWEEN '".$startDate.' '.'00:00:00'."' AND '".$endDate.' '.'23:59:59'."' AND fk_lager_id = '".$propiterId."' ");
			$sum_decode = json_decode(json_encode($sum_table,true),true);
		}
		
		$tr = '';
		foreach($debitcreditdata as $data){
			
			//date 
			$expdate = explode(' ', $data['created_date_time']);
			$date = date("d M Y", strtotime($expdate[0]));
			//credit-debit
			//print_r($data['type']);die;
			
			if($data['type'] == 'C'){
				$type = 'Credit';
			}else{
				$type = 'Credit';
			}
			//print_r($type1);die;
			$money_deposit = ($data['transaction_type'] == 'C') ? (($data['type'] == 'C') ? $data['amount']  :  '') :  '';
			$gold_deposit = ($data['transaction_type'] == 'C') ? (($data['type'] == 'G') ? $data['weight']  :  '') :  '';
			$gold_expenditure = ($data['transaction_type'] == 'D') ? (($data['type'] == 'G') ? $data['weight']  :  '') :  '';
			$money_expenditure = ($data['transaction_type'] == 'D') ? (($data['type'] == 'C') ? $data['amount']  :  '') :  '';
			$tr .= '<tr>
						<td style="font-size: 8px;">'.$date.'</td>
						<td style="font-size: 8px;">'.$data['jewelry_name'].'</td>
						<td style="font-size: 8px;">'.$data['proprietor_name'].'</td>
						<td style="font-size: 8px;">'.$data['remarks'].'</td>
						<td style="font-size: 8px;">'.$money_deposit.'</td>
						<td style="font-size: 8px;">'.$gold_deposit.'</td>
						<td style="font-size: 8px;">'.$gold_expenditure.'</td>
						<td style="font-size: 8px;">'.$money_expenditure.'</td>
					</tr>';
		}
		if(sizeof($sum_decode)>0){
			$tr .= '<tr>
						<td style="font-size: 8px;"></td>
						<td style="font-size: 8px;"></td>
						<td style="font-size: 8px;"></td>
						<td style="font-size: 10px; font-weight: bold;">TOTAL</td>
						<td style="font-size: 8px;">'.$sum_decode[0]['TotalMoneyDeposit'].'</td>
						<td style="font-size: 8px;">'.$sum_decode[0]['TotalGoldDeposit'].'</td>
						<td style="font-size: 8px;">'.$sum_decode[0]['TotalGoldExpenditure'].'</td>
						<td style="font-size: 8px;">'.$sum_decode[0]['TotalMoneyExpenditure'].'</td>
					</tr>';
		}
		$tr.=
		$html = '<h1 align="center">Debit/Credit Statement</h1>
				<table border="1" cellpadding="2" cellspacing="0" nobr="true">
					<tr>
						<th align="center" style="font-size: 10px; font-weight: bold;">Date</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Jewellers Name</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Proprietor Name</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Remarks</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Money Deposit</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Gold Deposit</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Gold Expenditure</th>
						<th align="center" style="font-size: 10px; font-weight: bold;">Money Expenditure</th>
					</tr>
					'.$tr.'
				</table>';
		PDF::SetTitle('Debit Credit Statement');
		PDF::AddPage();
		PDF::writeHTML($html, true, false, true, false, '');

		$fullfilepath = storage_path('export-pdf/debit-credit-statement/debit-credit-statement.pdf');
		$file = PDF::Output($fullfilepath, 'F');
		/*if($filepath == ''){
			//$filepath = storage_path('export-pdf/'.time());
			$filepath = storage_path('export-pdf/credit-debit-statement');
			File::makeDirectory($filepath, $mode = 0777, true, true);
			self::zipDownload($filepath);
		}
		$filename = $page_no.'.pdf';
		$fullfilepath = $filepath.'/'.$filename;
		
		$filenameexp = explode('/',$filepath);
		//print_r($filepath);die;
		if(count($debitcreditdata) == 0){
			$return['key'] = 'C';
			$return['msg'] = 'Success.';
			$return['filename'] = $filenameexp[1];
			return $return;
		}
		
		$file = PDF::Output($fullfilepath, 'F');
		self::zipDownload($filepath);
		$return['newpageno'] = $page_no+1;
		$return['filepath'] = $filepath;
		$return['key'] = 'S';
		$return['msg'] = 'Success.';*/

		$return['filepath'] = $fullfilepath;
		$return['key'] = 'S';
		$return['msg'] = 'Success.';
		return $return;
		//die;
	}
	/*--------------------end Debit & credit statement pdf -----------------*/
	//--------------------------- our-due-and-deposit statement pdf section -----------------------//
	public function dueDepositStatement(Request $request){
		//print_r($request->all());die;
		$page_no = $request->page_no;
		// $filepath = $request->file_path;
		$limit = 5000;
		$offset = $page_no*$limit;
		
		// $countval = Lager::whereBetween('created_date_time',array($startDate.' '.'00:00:00',$endDate.' '.'23:59:59'))->count();
		
		$depositdata = Lager::select('updated_balance_time','jewelry_name','cash_balance', 'gold_balance')
						->orwhere('cash_balance', '>', 0)
						->orwhere('gold_balance', '>', 0)
						->orderBy('updated_balance_time', 'ASC')
						->offset($offset)
						->limit($limit)
						->get()->toArray();

		$sum_deposit_table = DB::select("SELECT SUM(CASE WHEN cash_balance > 0 THEN cash_balance ELSE 0 END) TotalCash, SUM(CASE WHEN gold_balance > 0 THEN gold_balance ELSE 0 END) TotalGold FROM tbl_lager");
		$sum_deposit_decode = json_decode(json_encode($sum_deposit_table,true),true);

		$duedata = Lager::select('updated_balance_time','jewelry_name','cash_balance', 'gold_balance')
						->orwhere('cash_balance', '<' ,0)
						->orwhere('gold_balance', '<', 0)
						->orderBy('updated_balance_time', 'ASC')
						->offset($offset)
						->limit($limit)
						->get()->toArray();

		$sum_due_table = DB::select("SELECT SUM(CASE WHEN cash_balance < 0 THEN cash_balance ELSE 0 END) TotalCash, SUM(CASE WHEN gold_balance < 0 THEN gold_balance ELSE 0 END) TotalGold FROM tbl_lager");
		$sum_due_decode = json_decode(json_encode($sum_due_table,true),true);

		$stockdata = OpeningBalance::get()->toArray();
		// for DEPOSIT start
		$tr = '';
		foreach($depositdata as $value){
			$depositExpdate = explode(' ', $value['updated_balance_time']);
			$cash_balance1 = ($value['cash_balance'] > 0) ?  abs($value['cash_balance']) :  '';
			$gold_balance1 = ($value['gold_balance'] > 0) ?  abs($value['gold_balance']) :  '';	

			$tr .= '<tr>
						<td style="font-size: 8px;">'.date('d/m/Y',strtotime($depositExpdate[0])).'</td>
						<td style="font-size: 8px;">'.$value['jewelry_name'].'</td>
						<td style="font-size: 8px;">'.$cash_balance1.'</td>
						<td style="font-size: 8px;">'.$gold_balance1.'</td>
					</tr>';
		}
		$tr1 = '';
		if(sizeof($sum_deposit_decode)>0){
			$tr1 .= '<tr>
						<td style="font-size: 8px;"></td>
						<td style="font-size: 10px; font-weight: bold;">TOTAL DEPOSIT</td>
						<td style="font-size: 8px;">'.abs($sum_deposit_decode[0]['TotalCash']).'</td>
						<td style="font-size: 8px;">'.abs($sum_deposit_decode[0]['TotalGold']).'</td>
					</tr>';
		}
		// DEPOSIT end
		// for DUE start
		$ptr = '';
		foreach($duedata as $data){
			$expdate = explode(' ', $data['updated_balance_time']);
			$cash_balance = ($data['cash_balance'] < 0) ?  abs($data['cash_balance']) :  '';
			$gold_balance = ($data['gold_balance'] < 0) ?  abs($data['gold_balance']) :  '';
			$ptr .= '<tr>
						<td style="font-size: 8px;">'.date('d/m/Y',strtotime($expdate[0])).'</td>
						<td style="font-size: 8px;">'.$data['jewelry_name'].'</td>
						<td style="font-size: 8px;">'.$cash_balance.'</td>
						<td style="font-size: 8px;">'.$gold_balance.'</td>
					</tr>';
		}
		$ptr1 = '';
		if(sizeof($sum_due_decode)>0){
			
			$ptr1 .= '<tr>
						<td style="font-size: 8px;"></td>
						<td style="font-size: 10px; font-weight: bold;">TOTAL DUE</td>
						<td style="font-size: 8px;">'.abs($sum_due_decode[0]['TotalCash']).'</td>
						<td style="font-size: 8px;">'.abs($sum_due_decode[0]['TotalGold']).'</td>
					</tr>';
		}
		// DUE end
		$html = '<h1 align="center">All Due & Deposit Statement</h1>
				<table style="padding-top:2px">
					<tr>
						<td>
							<h5 align="center">DEPOSIT</h5>
						</td>
						<td>
							<h5 align="center">DUE</h5>
						</td>
					</tr>
					<tr>
						<td>
							<table cellspacing="0" cellpadding="2" border="1" nobr="true" style="float:right;">
								<tr>
									<th>Date</th>
									<th>Jewellers Name</th>
									<th>Amount</th>
									<th>Gold Wt.</th>
								</tr>
								'.$tr.'
								'.$tr1.'
							</table>
						</td>
						<td>
							<table cellspacing="0" cellpadding="1" border="1" nobr="true" style="float:right;">
								<tr>
									<th>Date</th>
									<th>Jewellers Name</th>
									<th>Amount</th>
									<th>Gold Wt.</th>
								</tr>
								'.$ptr.'
								'.$ptr1.'
							</table>
						</td>
					</tr>
				</table>
				<table style="padding-top: 3px;">
					<tr style="font-size:11px;">
						<td>
							<table border="1" cellpadding="2" cellspacing="0" nobr="true">
								
								<thead>
									<tr>
										<th align="center" style="font-size: 10px; font-weight: bold;">In Cash</th>
										<th align="center" style="font-size: 10px; font-weight: bold; ">In Fine Gold</th>
										<th align="center" style="font-size: 10px; font-weight: bold;">In Parchan(alloy)</th>
										<th align="center" style="font-size: 10px; font-weight: bold;">In Gold(alloy)</th>
									</tr>
								</thead>
								
								<tbody>
									<tr>
										<td align="center" style="font-size: 10px;">'.$stockdata[0]['cash_stock'].'</td>
										<td align="center" style="font-size: 10px;">'.$stockdata[0]['fine_stock'].'</td>
										<td align="center" style="font-size: 10px;">'.$stockdata[0]['alloy_parchan'].'</td>
										<td align="center" style="font-size: 10px;">'.$stockdata[0]['alloy_gold'].'</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</table>';
		PDF::SetTitle('Due Deposit Statement');
		PDF::AddPage();
		PDF::writeHTML($html, true, false, true, false, '');
		
		$fullfilepath = storage_path('export-pdf/due-deposit-statement/due-deposit-statement.pdf');
		$file = PDF::Output($fullfilepath, 'F');
		
		/*if($filepath == ''){
			//$filepath = storage_path('export-pdf/'.time());
			$filepath = storage_path('export-pdf/due-deposit-statement');
			File::makeDirectory($filepath, $mode = 0777, true, true);
			Controller::zipDownload($filepath);
		}
		
		$filename = $page_no.'.pdf';
		
		$fullfilepath = $filepath.'/'.$filename;
		
		
		$filenameexp = explode('/',$filepath);
		
		// print_r(count($duedata));die;

		if(count($depositdata) == 0 AND count($duedata) == 0){
			$return['key'] = 'C';
			$return['msg'] = 'Success.';
			$return['filename'] = $filenameexp[1];
			return $return;
		}
		
		$file = PDF::Output($fullfilepath, 'F');
		Controller::zipDownload($filepath);
		$return['newpageno'] = $page_no+1;
		$return['filepath'] = $filepath;
		$return['key'] = 'S';
		$return['msg'] = 'Success.';*/

		$return['filepath'] = $fullfilepath;
		$return['key'] = 'S';
		$return['msg'] = 'Success.';
		return $return;
	}
	//------------------------ end our-due-and-deposit statement pdf section -----------------------//
}