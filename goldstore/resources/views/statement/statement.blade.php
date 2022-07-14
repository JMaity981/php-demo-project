@extends('common.layout')
@section('title', 'Statement')
@section('style')
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/assets/plugins/select2/css/select2-bootstrap4.css') !!}
	{!! Html::style('public/assets/plugins/notifications/css/lobibox.min.css') !!}
	{!! Html::style('public/assets/daterangepicker/daterangepicker.css') !!}
	{{-- {!! Html::style('public/assets/npm/daterangepicker/daterangepicker.css') !!} --}}

@endsection

@section('script')
	
    {!! Html::script('public/assets/plugins/select2/js/select2.min.js') !!}
	{!! Html::script('public/assets/plugins/notifications/js/notifications.min.js') !!}
	{!! Html::script('public/assets/js/moment.js') !!}
	{!! Html::script('public/assets/daterangepicker/daterangepicker.js') !!}
    {{-- {!! Html::script('public/assets/momentjs/latest/moment.min.js') !!} --}}
	{{-- {!! Html::script('public/assets/npm/daterangepicker/daterangepicker.min.js') !!} --}}
	{!! Html::script('public/assets/pages-js/Recived.js') !!}
	
	<script>
		$(function() {
			var start = moment().subtract(29, 'days');
			var end = moment();

			function cb(start, end) {
				$('#reportrange span').html(start.format('D/MM/YYYY') + ' - ' + end.format('D/MM/YYYY'));
				$(".daterange_value").val(start.format('D/MM/YYYY') + ' - ' + end.format('D/MM/YYYY'));
			}

			$('#reportrange').daterangepicker({
				"autoApply": true,
				startDate: start,
				endDate: end,
				ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				}
			}, cb);

			cb(start, end);
			$(".sarchtable").trigger("click");
		});
        $('.print-btn').hide()
        $('select[name=type]').on('change', function(){
            var selectVal = $(this).val();
            (selectVal == "G") ? $('.gold-weight-fg').show() : $('.gold-weight-fg').hide();
        });
		$(".rate, .g_w").change(function() {
			$("#ammount").val($(".rate").val() * $(".g_w").val());
		});
		$('.ammount').prop('readonly', true);
        $('#statementSearchForm').validate({
            submitHandler: function(form) {
                var data = $('#statementSearchForm').serialize();
                var action = $('#statementSearchForm').attr('action');
                $.ajax({
                    url: action,
                    type: "POST",
                    data: data,
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					beforeSend: function() {
						$(".finish-btn").prop("disabled", true);
						$('.finish-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Finishing...');
						CommonJS.showLoader('reg-frm-loder');
                    },
                    complete: function() {
						$(".finish-btn").prop("disabled", false);
						$('.finish-btn').html('<svg class="mr-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path d="M29.548 3.043a2.5 2.5 0 0 0-3.513.4L16 16.067l-3.508-4.414a2.5 2.5 0 0 0-3.915 3.112l5.465 6.875c.474.597 1.195.943 1.957.943s1.482-.35 1.957-.944L29.95 6.555c.86-1.08.68-2.654-.402-3.513zM24.5 24.5h-17v-17h12.756l2.385-3H6c-.83 0-1.5.67-1.5 1.5v20c0 .828.67 1.5 1.5 1.5h20a1.5 1.5 0 0 0 1.5-1.5V12.85l-3 3.774V24.5z" fill="currentColor"/></svg>Finish');
						CommonJS.hideLoader('reg-frm-loder');
                    },
                    success: function(res) {
						console.log(res.booking_no[0]['booking_no']);
						if(res.key == 'S'){
							$('#bookingForm')[0].reset();
							//console.log(res.booking_no[0].['booking_no']);
							$('.booking_no').val(res.booking_no[0]['booking_no']);
							
							CommonJS.Toaster({
								'type': 'success',
								'msg': res.msg,
							});
						}else if(res.key == 'E'){
							CommonJS.Toaster({
								'type': 'error',
								'msg': res.msg,
							});
						}
                    },
                    error: function(error) {
                        CommonJS.Toaster({
                            'type': 'error',
                            'msg': error.responseText,
                        });
                    }
                });
            }
        });
        //Date Range

        /*$(function() {
            $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });*/
        //Close Date range
		CommonJS.NumberValidation();
		CommonJS.SingleDropdown();
		CommonJS.commonProprietorDetaild();
		//RecivedJs.Recived();
	</script>
@endsection
@section('content')
<div class="card">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">Statement</h4>
		</div>
		<hr/>
		{{ Form::open(array('url' => 'statement-search', 'id' => 'statementSearchForm')) }}
		{{-- <form class="needs-validation" novalidate> --}}
			<div class="form-row">
                <div class="col-md-4 col-sm-4 col-lg-4">
					<div class="form-group">
						<label>Date Range</label>
                        {{-- <input type="text" name="daterange" class="form-control"> --}}
						<input type="hidden" name="daterange" class="form-control daterange_value">
						<div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
							<i class="fa fa-calendar"></i>&nbsp;
							<span></span> <i class="fa fa-caret-down"></i>
						</div>
					</div>
				</div>
            
				<div class="col-md-4 col-sm-4 col-lg-4">
					<div class="form-group">
						<label>Select Propiter</label>
						<select class = "single-select proprietor-name" name="propiter_name">
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
				<div class="form-group col-md-12 text-right">
					<label for="validationCustom02">&nbsp;</label>
					<div class="custom-control custom-checkbox">
						<button class="btn btn-primary finish-btn" type="submit">Search</button>
					</div>
				</div>
            </div>
		{{-- </form> --}}
		{{ Form::close() }}
	</div>
</div>
        
  
@endsection