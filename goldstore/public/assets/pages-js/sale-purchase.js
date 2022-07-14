var SalePurchaseJs = {
	init: function (){
		SalePurchaseJs.salepurchase();
	},
	salepurchase: function (){
        $( ".jewelry_name" ).prop( "disabled", true );
		$( ".ph_no" ).prop( "disabled", true );
		$( ".gst_no" ).prop( "disabled", true );
        $('#amount_id').prop('readonly', true);
        $(".s_rate").prop("disabled", "disabled");
        $(".p_rate").prop("disabled", "disabled");

        if($('.is_booking').val()!=''){
            $('.g_w').prop('readonly', true);
			$(".jewelryname").select2({disabled:'readonly'});
        }

        $('input[type=radio][name=select_type]').change(function() {
            var optionValue = $(this).val();
            // console.log(optionValue);
            if (optionValue == 'S') {
                $(".p_rate").prop("disabled", "disabled");
                $('.p_rate').val('');
                $('.reset').val('');
                $(".s_rate").removeAttr("disabled");
                $(".s_rate, .g_w").change(function() {
                $("#amount_id").val(parseInt($(".s_rate").val() * $(".g_w").val()));
                });
            }else if (optionValue == 'P') {
                $(".s_rate").prop("disabled", "disabled");
                $('.s_rate').val('');
                $('.reset').val('');
                $(".p_rate").removeAttr("disabled");
                $(".p_rate, .g_w").change(function() {
                $("#amount_id").val(parseInt($(".p_rate").val() * $(".g_w").val()));
                });
            }

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
                            $(".s_rate").val(res.data[0].sale_rate);
                        }else{
                            $(".p_rate").val(res.data[0].purchase_rate);
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

        //for calculate ammount
        //for sign up button click
        $("#sale_purchase").validate({
            rules: {
                select_type: { 
                    required: true
                },
                sale_rate: {
                    required: true,
                    number: true,
                },
                purchase_rate: {
                    required: true,
                    number: true,
                },
                gold: {
                    required: true,
                    number: true,
                },
                paid_amount: {
                    required: true,
                    number: true,
                },
                remark: {
                    required: false,
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
                var data = $(form).serialize();
                var sale_rate = $("input[name=sale_rate]").val();
                var purchase_rate = $("input[name=purchase_rate]").val();
				var ladgerId = $("input[name=hidden]").val();
				if(ladgerId != ''){
                    $.ajax({
                        type: 'POST',
                        url: base_url + "/sale-purchase-insert",
                        data: data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        success: function(res) {
                            console.log(res);
                            if(res.key == 'S'){
                                $("#sale_purchase")[0].reset();
                                CommonJS.Toaster({
                                    'type': 'success',
                                    'msg': res.msg,
                                });
                                if (window.location.href.indexOf('?bookingid=') > 0) {
                                    setTimeout(function(){window.location.href= "transection";},2000);
                                }
                                $("input[name=sale_rate]").val(sale_rate);
                                $("input[name=purchase_rate]").val(purchase_rate);
								CommonJS.getGoldCashDetails();
                                if ($('.print-sale-purchase').prop('checked') == true){
                                    url = base_url+'/generate-sale-purchase-bill-pdf?id='+res.id;
								    window.open(url,'_blank');
                                }
                            }else if(res.key == 'E'){
                                CommonJS.Toaster({
                                    'type': 'error',
                                    'msg': res.msg,
                                });
                            }
                        },
                        error: function(error) {
                            console.log(error.responseText);
                        }
                    });
                }else{
                    CommonJS.Toaster({
						'type': 'error',
						'msg': 'Please select a Ledger.',
					});
                }
            }
        });
	}
}

