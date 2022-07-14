<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Lager;
use App\Models\BookingNo;
use App\Models\Booking;
use App\Models\SalePurchase;
use Response;
use DB;

class BookingCtrl extends Controller
{
    public function booking (){
		$data['main_menu'] = 'mnu_booking';
		$data['sub_menu'] = '';
		$data['breadcrumb'] = [['booking', 'Booking']];
		
		$sale = SalePurchase::where('type', 'S')->orderBy('id', 'desc')->limit(1)->get()->toArray();
		if(sizeof($sale)>0){
			$data['sale']['sale_rate'] = $sale[0]['sale_rate'];
		} else {
			$data['sale']['sale_rate'] = 0.00;
		}
		$data['booking_no'] = BookingNo::get()->toArray();
		$data['lager'] = Lager::get()->where('is_active','A')->where('is_delete','N')->toArray();

		
        return view('booking.booking')->withData($data);
    }
	public function insertBooking(Request $request){
		// print_r($request->all());die;
        $insert_data = array(
            "fk_lager_id"=>$request->hidden,
            "booking_no"=>$request->booking_no,
            "type"=>$request->select_type,
            "sale_rate"=>$request->ammount_gram,
            "weight"=>$request->gold_weight,
            "ammount"=>$request->ammount,
			"remarks"=>$request->remarks,
            "created_date_time" => date('Y-m-d H:i:s')
            );
        $insert = booking::insertGetId($insert_data);
        if($insert){
			$getbookingno = BookingNo::get()->toArray();
			$incriment = ($getbookingno[0]['booking_no'])+1;
			$updatebookingno = DB::table('tbl_booking_no')->update(['booking_no' => $incriment]);
			// $updatebookingno = BookingNo::update(['booking_no' => $incriment]);
			$return['booking_no'] = BookingNo::get()->toArray();

            $return['key']='S';
            $return['msg']='Your Booking Succesfully insert';
        }else{
            $return['key']='E';
            $return['msg']='There is an error';
        }
        return $return;
    }
    public function bookingStatement(Request $request){
		// $total_weight = Booking::where('is_deliverd','N')->where('is_cancel','N')->sum('weight');
		// $total_amount = Booking::where('is_deliverd','N')->where('is_cancel','N')->sum('ammount');
		// $average_rate = Booking::where('is_deliverd','N')->where('is_cancel','N')->avg('sale_rate');
		// print_r($request->all());die;
		$columns = array('tbl_booking.created_date_time','tbl_lager.jewelry_name','tbl_lager.proprietor_name','tbl_booking.weight','tbl_booking.sale_rate','tbl_booking.ammount');

		$daterange = explode('-', $request->daterange);
		if($daterange[0]==''){
			$json_data = array(
				"draw" => $request->input('draw'),
				"recordsTotal" => 0,
				"recordsFiltered" => 0,
				"data" => [],
			);
			return Response::json($json_data);
		}
		// print_r($daterange);die;
		$expstartdate = explode('/', $daterange[0]);
		$startDate = trim($expstartdate[2]).'-'.trim($expstartdate[1]).'-'.trim($expstartdate[0]) .' 00:00:00';

		$expenddate = explode('/', $daterange[1]);
		$endDate = trim($expenddate[2]).'-'.trim($expenddate[1]).'-'.trim($expenddate[0]).' 23:59:59';
        
		// $sale = ($request->is_sale=='Y')?"AND tbl_booking.type = 'S'":'';
		// $purchase = ($request->is_purchase=='Y')?"AND tbl_booking.type = 'P'":'';
		$sale = '';
		if($request->is_sale=='Y'){
			$sale = "AND tbl_booking.type = 'S'";
		}
		$purchase = '';
		if($request->is_purchase=='Y'){
			$purchase = "AND tbl_booking.type = 'P'";
		}
		$bill = '';
		if($request->is_bill=='Y'){
			$bill = "AND tbl_booking.is_deliverd = 'Y'";
		}
		$cancel = '';
		if($request->is_cancel=='Y'){
			$cancel = "AND tbl_booking.is_cancel = 'Y'";
		}
		$pending = '';
		if($request->is_pending=='Y'){
			$pending = "AND tbl_booking.is_cancel = 'N' AND tbl_booking.is_deliverd = 'N'";
		}
		// $where = "AND tbl_booking.is_deliverd = '".$request->is_bill."' AND tbl_booking.is_cancel = '".$request->is_cancel."'";
		// $where = "WHERE tbl_booking.is_deliverd='N' AND tbl_booking.is_cancel='N'";
		$whereraw = '';
		if(!empty($request->input('search.value'))) {
			$search = strtoupper($request->input('search.value'));
			$whereraw = " AND (UPPER(tbl_lager.proprietor_name) LIKE '%".$search."%' OR UPPER(tbl_lager.jewelry_name) LIKE '%".$search."%')";
		}

		$orderBy = "ORDER BY ". $columns[$request->input('order.0.column')] ." " .$request->input('order.0.dir');

		$limitOffset = " LIMIT ".$request->input('length')." OFFSET ".$request->input('start')."";
		
		
		$qry = "SELECT tbl_booking.*,tbl_lager.proprietor_name,tbl_lager.jewelry_name FROM tbl_booking INNER JOIN tbl_lager ON tbl_booking.fk_lager_id=tbl_lager.id WHERE tbl_booking.created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $sale $purchase $pending $bill $cancel $whereraw $orderBy $limitOffset";
		$total_row = DB::select("SELECT COUNT(*) as total_record FROM tbl_booking WHERE created_date_time BETWEEN '".$startDate."' AND '".$endDate."' $sale $purchase $pending $bill $cancel");
		
		$j_decode = json_decode(json_encode($total_row,true),true);
		$total_data = 0;
		if(count($j_decode) > 0){
			$total_data = $j_decode[0]['total_record'];
		}

		$sum_table = DB::select("SELECT SUM(weight) TotalWeight, SUM(ammount) TotalAmount, AVG(sale_rate) AvgRate FROM tbl_booking WHERE created_date_time BETWEEN '".$startDate."' AND '".$endDate."'  $sale $purchase $pending $bill $cancel");
		$sum_decode = json_decode(json_encode($sum_table,true),true);
		
		$GetData = DB::select($qry);
		$decode = json_decode(json_encode($GetData , true), true);
		$data = [];
		if(!empty($decode)){
			foreach($decode as $value){
				$expdate = explode(' ', $value['created_date_time']);
				$date = date("d/m/Y", strtotime($expdate[0]));
				$row = array();
				$row[] = $date;
				$row[] = ($value['type']=='S')?"SALE":"PURCHASE";
				$row[] = $value['jewelry_name'];
				$row[] = $value['remarks'];
				$row[] = $value['weight'];
				$row[] = $value['sale_rate'];
				$row[] = $value['ammount'];
				if($value['is_deliverd']=='Y'){
					$row[] = 'BILLED';
				}elseif($value['is_cancel']=='Y'){
					$row[] = 'CANCELED';
				}else{
					$row[] = '<button class="btn btn-primary btn-sm billing-btn" data-id="'.$value['id'].'" type="button">Billing</button>
						<button class="btn btn-danger btn-sm cancel-btn" data-id="'.$value['id'].'" type="button">Cancel</button>';
				}
				$data[] = $row;
			}
			$row2 = ['', '', '', 'Total', $sum_decode[0]['TotalWeight'], number_format($sum_decode[0]['AvgRate'], 2), $sum_decode[0]['TotalAmount'], ''];
			$data[] = $row2;
		}
		$json_data = array(
			"draw" => $request->input('draw'),
			"recordsTotal" => $total_data,
			"recordsFiltered" => $total_data,
			"data" => $data,
		);
		return Response::json($json_data);
    }
	/*----------------- Booking Cancel ------------------*/
	public function bookingCancel(Request $request){
		$id = $request->id;
		$update = DB::table('tbl_booking')->where('id',$id)->update(['is_cancel'=>'Y']);
		$return['key'] = 'S';
		$return['msg'] = 'The booking has been canceled';
		return $return;
	}
	/*--------------- get billing data ----------------*/
	public function getBillingData (Request $request){
		$id = $request->id;
		$data['booking_details'] = Booking::where('id',$id)->get(['id','fk_lager_id','sale_rate','weight','ammount','type'])->toArray();
		return $data;
	}
	public function getTotalValue(){
		$rec = Booking::select(DB::raw("sum(weight) as total_weight, sum(ammount) as total_amount, CAST(AVG(sale_rate) as DECIMAL(10,2)) as average_rate"))
						->where('is_deliverd','N')
						->where('is_cancel','N')
						->get()->toArray();
						
		return $rec;
	}
}