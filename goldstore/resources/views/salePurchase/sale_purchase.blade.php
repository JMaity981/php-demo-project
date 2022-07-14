@extends('common.layout')
@section('title', 'Sale-Purchase')
@section('style')
    {!! Html::style('public/assets/plugins/notifications/css/lobibox.min.css') !!}
	{!! Html::style('public/assets/plugins/select2/css/select2.min.css')!!}
	{!! Html::style('public/assets/plugins/select2/css/select2-bootstrap4.css')!!}
@endsection
@section('script')
	{!! Html::script('public/assets/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/assets/plugins/notifications/js/lobibox.min.js') !!}
    {!! Html::script('public/assets/pages-js/sale-purchase.js') !!}
	
    <script>
		CommonJS.SingleDropdown();
		CommonJS.commonProprietorDetaild();
        SalePurchaseJs.salepurchase();
    </script>

    <style>
        input[type=checkbox] {
            transform: scale(1.5);
        }

    </style>

@endsection
@section('content')
    <div class="card">
		<div class="card-header">Sale Purchase</div>
        <div class="tab-content mt-3">
			<div class="card-body">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-lg-3">
								<div class="form-group">
									<label>Select Proprietor Name:</label>
								   <select class = "single-select proprietor-name">
										<option value="" disabled selected>Enter Proprietor Name</option>
										@foreach($data['lager'] as $key=> $customer_data)
											<option value="{{ $customer_data['id'] }}">{{ $customer_data['proprietor_name'] }}</option>
										@endforeach
										
									</select>
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-lg-3">
								<div class="form-group">
									<label>Jewelry Name:</label>
									<input class="form-control jewelry_name" type="text"
										placeholder="Enter Jewelry Name" name="jewelry_name">
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-lg-3">
								<div class="form-group">
									<label>Phone No:</label>
									<input class="form-control ph_no phone_no" type="text" placeholder="Enter Phone No">
								</div>
							</div>
							<div class="col-md-3 col-sm-3 col-lg-3">
								<div class="form-group">
									<label>Gst Number:</label>
									<input class="form-control gst_no gst_number" type="text" placeholder="Enter Gst Number">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						{{ Form::open(['id' => 'sale_purchase']) }}
						<div class="row">
							<input type="hidden" class="from-control hiddenlager" name="hidden">
							<div class="col-md-4 col-sm-4 col-lg-4">
								<label for="validationCustom03">Sale Purchase Type:</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" name="select_type" id="s_id" class="custom-control-input select_type" value="S" {{ $_GET['type'] == 'S' ? 'checked' : '' }} {{ $_GET['type'] == 'P' ? 'disabled' : ''}}>
									<label class="custom-control-label" for="s_id">Sale</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" name="select_type" id="p_id" class="custom-control-input select_type" value="P" {{ $_GET['type'] == 'P' ? 'checked' : '' }} {{ $_GET['type'] == 'S' ? 'disabled' : ''}}>
									<label class="custom-control-label" for="p_id">Purchase</label>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-lg-4">
								<label>Sale Rate(Per Gram):</label>
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text  bg-transparent"><svg xmlns="http://www.w3.org/2000/svg" class="text-primary"
												xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" id="footer-icon-name" width="1em" height="1em"
												preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
												<path d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"
												fill="currentColor"></path>
											</svg></span>
									</div>
									<input class="form-control  s_rate" type="text" placeholder="Enter Sale Rate" name="sale_rate" value={{ $data['sale']['sale_rate'] }}>
									<div class="input-group-append"><span class="input-group-text">/gm</span>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-lg-4">
								<label>Purchase Rate(Per Gram):</label>
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text    bg-transparent"><svg xmlns="http://www.w3.org/2000/svg" class="text-primary"
												xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" id="footer-icon-name" width="1em" height="1em"
												preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
												<path d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"
												fill="currentColor"></path>
											</svg></span>
									</div>
									<input class="form-control  p_rate" type="text" 
										placeholder="Enter Purchase Rate" name="purchase_rate" value={{ $data['parchase']['purchase_rate'] }}>
									<div class="input-group-append"><span class="input-group-text">/gm</span>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-lg-4">
								<label for="gold">Gold Weight:</label>
								<div class="input-group mb-3">
									<div class="input-group-prepend"><span class="input-group-text">Weight</span>
									</div>
									<input type="text" class="form-control g_w reset" name="gold"
										placeholder="Enter Gold Weight">
									<div class="input-group-append"><span class="input-group-text">gm</span>
									</div>
								</div>
							</div>
							<div class="col-md-4 mb-3">
								<label for="validationCustom02">Amount:</label>
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text bg-transparent"><svg xmlns="http://www.w3.org/2000/svg" class="text-primary"
												xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" id="footer-icon-name" width="1em" height="1em"
												preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
												<path d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"
												fill="currentColor"></path>
											</svg></span>
									</div>
									<input type="text" class="form-control border-left-0 reset" name="amount"
										placeholder="Amount" id="amount_id" value="">
								</div>
							</div>
							<div class="col-md-4 mb-3">
								<label for="paid-amount">Paid Amount:</label>
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text    bg-transparent"><svg xmlns="http://www.w3.org/2000/svg" class="text-primary"
												xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" id="footer-icon-name" width="1em" height="1em"
												preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
												<path d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"
												fill="currentColor"></path>
											</svg></span>
									</div>
									<input type="text" class="form-control border-left-0 reset" name="paid_amount"
									placeholder="Enter Paid Amount">
								</div>
							</div>
							<div class="col-md-8 col-sm-8 col-lg-8">
								<div class="form-group">
									<label>Remark:</label>
									<textarea class="form-control" name="remark" rows="3"></textarea>
								</div>
							</div>
							<div class="col-md-2 col-sm-2 col-lg-2">
								<div class="form-group pt-5">
									<input type="checkbox" id="gst_bill_id" name="gst_bill">
									<label for="gst_bill"><strong>GST Bill?</strong></label>
								</div>
							</div>
							<div class="col-md-2 col-sm-2 col-lg-2">
								<div class="form-group pt-5">
									<button type="submit" class="btn btn-primary btn-md float-right">Submit</button>
									<a href="{{url('test-pdf')}}" target="_blank" type="button" class="btn btn-primary btn-md gpdf">test pdf</a>
								</div>
							</div>
						</div>
						{{ Form::close() }}
					</div>
				</div>
			</div>
        </div>
    </div>
@endsection
