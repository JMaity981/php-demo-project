@extends('common.layout')
@section('title', 'Fund Credit & Debit')
@section('style')
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/assets/plugins/select2/css/select2-bootstrap4.css') !!}
	{!! Html::style('public/assets/plugins/notifications/css/lobibox.min.css') !!}
@endsection

@section('script')
	
    {!! Html::script('public/assets/plugins/select2/js/select2.min.js') !!}
	{!! Html::script('public/assets/plugins/notifications/js/notifications.min.js') !!}
	{!! Html::script('public/assets/pages-js/Recived.js') !!}
	{!! Html::script('public/assets/pages-js/FundCreditDebit.js') !!}
	<script>
		CommonJS.SingleDropdown();
		CommonJS.commonProprietorDetaild();
        // $('.single-select').select2({
		// 	theme: 'bootstrap4',
		// 	width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
		// 	placeholder: $(this).data('placeholder'),
		// 	allowClear: Boolean($(this).data('allow-clear')),
		// });
        FundCreditDebitJs.FundCreditDebit();
		RecivedJs.Recived();
	</script>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h4 class="mb-0">Credit & Debit</h4>
            </div>
            <hr/>
            {{ Form::open(array('url' => 'insert-fund-credit-debit', 'id' => 'fundCreditDebitForm')) }}
            {{-- <form class="needs-validation" novalidate> --}}
                <div class="form-row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                
                </div>
                
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <div class="form-group">
                        <label>Select Propiter</label>
                        <select class = "single-select proprietor-name proprietor-name" name="propiter_name">
                            <option value="" disabled selected>Enter Proprietor Name</option>
                            @foreach($data['lager'] as $key=> $customer_data)
                                <option value="{{ $customer_data['id'] }}">{{ $customer_data['proprietor_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <div class="form-group">
                        <label>Jewelry Name</label>
                        <input class="form-control jewelry_name" type="text" placeholder="Enter Jewelry Name" name="jewelry_name">
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <div class="form-group">
                        <label>Phone No</label>
                        <input class="form-control phone_no" type="text" placeholder="Enter Phone No" name="phone_no">
                    </div>
                </div>
                
                    <div class="col-md-4 mb-3 form-group select2">
                        <label>Select Gold / Cash</label>
                        <select class="single-select" name="type">
                            <option value="G">Gold</option>
                            <option value="C">Cash</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3 gold-weight-fg">
                        <label for="validationCustom02">Gold Weight</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">	<span class="input-group-text">Weight</span>
                            </div>
                            <input type="text" class="form-control" name="gold_weight">
                            <div class="input-group-append">	<span class="input-group-text">gm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Amount</label>
                        <div class="input-group">
                            <div class="input-group-prepend">	<span class="input-group-text bg-transparent"><svg xmlns="http://www.w3.org/2000/svg" class="text-primary" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" id="footer-icon-name" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z" fill="currentColor"></path></svg></span>
                            </div>
                            <input type="text" class="form-control border-left-0" name="amount" placeholder="Enter Amount">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom03">Choose Transaction Type</label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="transaction_type" id="transaction_type1" class="custom-control-input" value="C">
                            <label class="custom-control-label" for="transaction_type1">Credit</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="transaction_type" id="transaction_type2" class="custom-control-input" value="D">
                            <label class="custom-control-label" for="transaction_type2">Debit</label>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="validationCustom02">&nbsp;</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="sms_enabled" id="customCheck4">
                            <label class="custom-control-label" for="customCheck4">SMS Enabled ?</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Remarks</label>
                        <div class="input-group">
                            <div class="input-group-prepend">	<span class="input-group-text bg-transparent"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 36 36"><path d="M33 6.4l-3.7-3.7a1.71 1.71 0 0 0-2.36 0L23.65 6H6a2 2 0 0 0-2 2v22a2 2 0 0 0 2 2h22a2 2 0 0 0 2-2V11.76l3-3a1.67 1.67 0 0 0 0-2.36zM18.83 20.13l-4.19.93l1-4.15l9.55-9.57l3.23 3.23zM29.5 9.43L26.27 6.2l1.85-1.85l3.23 3.23z" class="clr-i-solid clr-i-solid-path-1 text-primary" fill="currentColor"/></svg></span>
                            </div>
                            <input type="text" name="remarks" class="form-control border-left-0" placeholder="Your Remarks...">
                        </div>
                    </div>
                    <div class="form-group col-md-12 text-right">
                        <label for="validationCustom02">&nbsp;</label>
                        <div class="custom-control custom-checkbox">
                            <button class="btn btn-primary finish-btn" type="submit"><svg class="mr-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path d="M29.548 3.043a2.5 2.5 0 0 0-3.513.4L16 16.067l-3.508-4.414a2.5 2.5 0 0 0-3.915 3.112l5.465 6.875c.474.597 1.195.943 1.957.943s1.482-.35 1.957-.944L29.95 6.555c.86-1.08.68-2.654-.402-3.513zM24.5 24.5h-17v-17h12.756l2.385-3H6c-.83 0-1.5.67-1.5 1.5v20c0 .828.67 1.5 1.5 1.5h20a1.5 1.5 0 0 0 1.5-1.5V12.85l-3 3.774V24.5z" fill="currentColor"/></svg>Finish</button>

                            <button class="btn btn-dark print-btn" type="button"><svg class="mr-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none"><path d="M18 17.5v1.25A2.25 2.25 0 0 1 15.75 21h-7.5A2.25 2.25 0 0 1 6 18.75v-1.251l-1.75.001A2.25 2.25 0 0 1 2 15.25V9.254a3.25 3.25 0 0 1 3.25-3.25l.749-.001L6 5.25A2.25 2.25 0 0 1 8.25 3h7.502a2.25 2.25 0 0 1 2.25 2.25v.753h.75a3.254 3.254 0 0 1 3.252 3.25l.003 5.997a2.249 2.249 0 0 1-2.248 2.25H18zm-2.25-4h-7.5a.75.75 0 0 0-.75.75v4.5c0 .414.336.75.75.75h7.5a.75.75 0 0 0 .75-.75v-4.5a.75.75 0 0 0-.75-.75zm.002-9H8.25a.75.75 0 0 0-.75.75l-.001.753h9.003V5.25a.75.75 0 0 0-.75-.75z" fill="currentColor"/></g></svg>Print</button>
                        </div>
                    </div>
                </div>
            {{-- </form> --}}
			{{ Form::close() }}
            
        </div>
    </div>
@endsection