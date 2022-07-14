var BookingJs = {
    init: function (){
		BookingJs.Booking();
	},
	Booking: function (){
        $('.booking_no').prop('readonly', true);
		$(".phone_no" ).prop( "disabled", true );
        $('.print-btn').hide()
        $('select[name=type]').on('change', function(){
            var selectVal = $(this).val();
            (selectVal == "G") ? $('.gold-weight-fg').show() : $('.gold-weight-fg').hide();
        });
        $(".rate, .g_w").change(function() {
            $("#ammount").val(parseInt($(".rate").val() * $(".g_w").val()));
        });
        $('.ammount').prop('readonly', true);

        $('input[type=radio][name=select_type]').change(function() {
            var optionValue = $(this).val();
            $.ajax({
                type: 'POST',
                url: base_url + "/onchange-sale-purchase",
                data:{type: optionValue},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(res) {
                    if(res.key == 'S'){
                        if(res.data[0].type == 'S'){
                            $(".rate").val(res.data[0].sale_rate);
                        }else{
                            $(".rate").val(res.data[0].purchase_rate);
                        }
                    }else{
                        toastr.warning(res.msg);
                    }
                },
                error: function(error) {
                    console.log(error.responseText);
                }
            });            
        
        });

        var bookingListDataTbl = $('#booking_tbl').DataTable({
            "lengthMenu": [
                [50, 100, 500, 1000],
                [50, 100, 500, 1000]
            ],
            "processing": false,
            "serverSide": true,
            "ajax": {
                "url": base_url + "/booking-statement",
                "type": "get",
                "data": function(data){
                    data.daterange = $('.daterange_value').val();
                    data.is_sale = is_sale;
                    data.is_purchase = is_purchase;
                    data.is_cancel = is_cancel;
                    data.is_bill = is_bill;
                    data.is_pending = is_pending;
                },
                "dataType": "json",
                beforeSend: function() {
                    CommonJS.showLoader('tbl-loader');
                },
                complete: function() {
                    CommonJS.hideLoader('tbl-loader');
                },
                "dataSrc": function(result) {
                    console.log(result);
                    return result.data;
                },
                "error": function(error) {
                    console.log(error.responseText);
                },
            },
        });
		/*-------------- booking form ------------------*/
        $('#bookingForm').validate({
            rules: {
                jewelry_name: {
                    required: true,
                },
                remarks: {
                    required: false,
                },
                propiter_name:{
                    required: true,
                },
                phone_no: {
                    required: true,
                    maxlength: 10
                },
                gold_weight: {
                    required: true,
                },
                ammount: {
                    required: true,
                },
                ammount_gram: {
                    required: true
                }
            },
            errorPlacement: function(label, element) {
                //$('.input-icon i').css("color", "red");
                //$('.input-icon input').css("border-bottom", "1px solid red");
            },
            highlight: function(element, errorClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function(form) {
                var data = $('#bookingForm').serialize();
                var ammount = $("input[name=ammount_gram]").val();
                var action = $('#bookingForm').attr('action');
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
                            // console.log(res.booking_no[0].['booking_no']);
                            $('.booking_no').val(res.booking_no[0]['booking_no']);
							bookingListDataTbl.ajax.reload();
                            // getTotalAvgValue();
                            CommonJS.Toaster({
                                'type': 'success',
                                'msg': res.msg,
                            });
                            $("input[name=ammount_gram]").val(ammount);
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
        var is_sale = 'N';
        $(".sale").on('change', function(){
            if($(this).prop('checked')) {
                is_sale = 'Y';
            } else {
                is_sale = 'N'
            }
        });
        var is_purchase = 'N';
        $(".purchase").on('change', function(){
            if($(this).prop('checked')) {
                is_purchase = 'Y';
            } else {
                is_purchase = 'N'
            }
        });
        var is_cancel = 'N';
        $(".cancel").on('change', function(){
            if($(this).prop('checked')) {
                is_cancel = 'Y';
            } else {
                is_cancel = 'N'
            }
        });
        var is_bill = 'N';
        $(".bill").on('change', function(){
            if($(this).prop('checked')) {
                is_bill = 'Y';
            } else {
                is_bill = 'N'
            }
        });
        var is_pending = 'N';
        $(".pending").on('change', function(){
            if($(this).prop('checked')) {
                is_pending = 'Y';
            } else {
                is_pending = 'N'
            }
        });
		/*------------------------ booking tbl -----------------*/
        $(document).ready(function (){
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
            
            
        });
        
        $(".sarchtable").on('click', function(){
			$('#booking_tbl').DataTable().ajax.reload();
		});
		/*----------------------- cancel button -----------------*/
		$(document).on('click','.cancel-btn',function(){
			var id = $(this).data('id');
			const swalWithBootstrapButtons = swal.mixin({
				confirmButtonClass: 'btn btn-success btn-rounded',
				cancelButtonClass: 'btn btn-danger btn-rounded mr-3',
				buttonsStyling: false,
			})
			swalWithBootstrapButtons({
				title: 'Are you sure to Cancel ?',
				text: "You won't be able to revert this!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Yes',
				cancelButtonText: 'No',
				reverseButtons: true,
				padding: '2em'
			}).then(function(result) {
				if (result.value == true) {
					$.ajax({
						url: base_url + '/booking-cancel',
						data: { id: id},
						type: "POST",
						headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
						success: function(data) {
							//console.log(data);
							if (data.key == 'S') {
								$('#booking_tbl').DataTable().ajax.reload();
								CommonJS.Toaster({
									'type': 'success',
									'msg': data.msg,
								});
							}
						},
						error: function(error) {
							console.log(error.responseText);
						},
					});
				}
			})
		});
		/*---------------- billing button --------------------*/
		$(document).on('click','.billing-btn',function(){
			var id = $(this).data('id');
			$.ajax({
				url: base_url + '/get-billing-data',
				data: { id: id},
				type: "POST",
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				success: function(data) {
					console.log(data);
					window.location.href = 'transection?bookingid='+data.booking_details[0].id+"&lagerid="+data.booking_details[0].fk_lager_id+"&rate="+data.booking_details[0].sale_rate+"&weight="+data.booking_details[0].weight+"&ammount="+data.booking_details[0].ammount+"&type="+data.booking_details[0].type;
				},
				error: function(error) {
					console.log(error.responseText);
				},
			});
		});
		/*---------------- TOTAL & AVERAGE Value --------------------*/
		/*getTotalAvgValue();
		function getTotalAvgValue(){
			$.ajax({
				url: base_url + '/get-total-value',
				type: "POST",
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				success: function(data) {
					console.log(data);
                    $('.booking_total_weight').html(data[0].total_weight);
					$('.booking_total_amount').html(data[0].total_amount);
					$('.booking_average_rate').html(data[0].average_rate);
				},
				error: function(error) {
					console.log(error.responseText);
				},
			});
		};*/
    }
}