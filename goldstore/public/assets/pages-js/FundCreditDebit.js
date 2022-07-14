var FundCreditDebitJs = {
    init: function (){
		FundCreditDebitJs.FundCreditDebit();
	},
	FundCreditDebit: function (){
        $('.print-btn').hide()
        $('input[type=radio][name=select_gold_cash]').on('change', function(){
            var selectVal = $(this).val();
           if(selectVal == 'G'){
            $('.gold-weight-fg').show();
            $('.amount-fund').hide();
			$("input[name=amount]").val('');
           }else if(selectVal == 'C'){
            $('.amount-fund').show();
            $('.gold-weight-fg').hide();
			$("input[name=gold_weight]").val('');
           }
        });
		$( 'input[name="select_gold_cash"]:radio:first' ).click();
        $('#fundCreditDebitForm').validate({
            rules: {
				select_gold_cash:{
					required: true,
				},
                remarks: {
                    required: false,
                },
				transaction_type:{
					required: true,
				},
				
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
                var data = $('#fundCreditDebitForm').serialize();
				var ladgerId = $("input[name=hidden]").val();
                var action = $('#fundCreditDebitForm').attr('action');
				if(ladgerId != ''){
					$.ajax({
						url: action,
						type: "POST",
						data: data,
						headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
						beforeSend: function() {
							$(".finish-btn").prop("disabled", true);
							CommonJS.showLoader('reg-frm-loder');
						},
						complete: function() {
							$(".finish-btn").prop("disabled", false);
							CommonJS.hideLoader('reg-frm-loder');
						},
						success: function(res) {
							console.log(res);
							if(res.key == 'S'){
								$('#fundCreditDebitForm')[0].reset();
								CommonJS.Toaster({
									'type': 'success',
									'msg': res.msg,
								});
								CommonJS.getGoldCashDetails();
								if ($('.print-fund-credit-debit').prop('checked') == true){
                                    url = base_url+'/generate-fund-credit-debit-pdf?id='+res.id;
									window.open(url, '_blank');
                                }
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
				}else{
					CommonJS.Toaster({
						'type': 'error',
						'msg': 'Please select a ladger.',
					});
				}
                //console.log(data);
                
            }
        });
    }
}