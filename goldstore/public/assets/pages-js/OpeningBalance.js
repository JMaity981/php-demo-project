var OpeningBalanceJs = {
	init: function (){
		OpeningBalanceJs.OpeningBalance();
	},
	
	OpeningBalance: function (){
		//get opening balance
		function getOppeningBalance (){
			$.ajax({
				url: base_url + '/get-opening-balance',
				type: "POST",
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				beforeSend: function() {
					CommonJS.showLoader('page-wrapper');
					$( ".wrapper" ).addClass( "loader" );
				},
				complete: function() {
					CommonJS.hideLoader('page-wrapper');
					$( ".wrapper" ).removeClass( "loader" );
				},
				success: function(res) {
					console.log(res);
					/*if(res.gold_disable != 0){
						$(".gold-amount").prop( "disabled", true );
					}
					if(res.cash_disable != 0){
						$(".cash-amount").prop( "disabled", true );
					}*/
					if(res.rowcount != 0){
						$(".balance-save-btn").prop( "disabled", true );
						$(".parchan-alloy").prop( "disabled", true );
						$(".gold-alloy").prop( "disabled", true );
						$(".fine-gold").prop( "disabled", true );
						$(".cash-amaount").prop( "disabled", true );
					}
					$('.render-opening-balance-list').html(res.html);
				},
				error: function(error) {
					console.log(error.responseText);
				}
			});
		}
		getOppeningBalance();
		//add opening balance
		$("#addstock").validate({
            rules: {
                parchanalloy: {
                    required: true
                },
				goldalloy:{
					required: true
				},
				finegold: {
                    required: true
                },
				cashamaount: {
                    required: true
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
                var data = new FormData($(form)[0]);
                var action = $('#addstock').attr('action');
                $.ajax({
                    url: action,
                    type: "POST",
                    data: data,
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					processData: false,
                    contentType: false,
					beforeSend: function() {
						$(".balance-save-btn").prop("disabled", true);
						$('.balance-save-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...');
						CommonJS.showLoader('page-wrapper');
						$( ".wrapper" ).addClass( "loader" );
					},
					complete: function() {
						$('.balance-save-btn').html('Save');
						CommonJS.hideLoader('page-wrapper');
						$( ".wrapper" ).removeClass( "loader" );
					},
                    success: function(res) {
						if(res.key == 'S'){
							$('.hiddenuserid').val('');
							CommonJS.Toaster({
								'type': 'success',
								'msg': res.msg,
							});
							$(".balance-save-btn").attr('disabled',true).html("Save");
							getOppeningBalance();
							$("#addstock")[0].reset();
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
            }
        });

		//======== modal password checking=========//
		$('.edit').on('click', function() {
			$('#modalQuickView').modal({ backdrop: 'static', keyboard: false });
		});
		
		//======opening balance edit=============//
		$("#edit_modal").validate({
			submitHandler: function() {
				var password = $("input[name=password]").val();
				if(password != ""){
					$.ajax({
						type: 'POST',
						url: base_url + "/opening-balance-edit",
						data:{ password:password },
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						//dataType: 'json',
						success: function(response) {
							console.log(response);
							if(response.key == 'S'){
								$('#modalQuickView').modal('hide')
								$("#edit_modal")[0].reset();
								$("#h_id").val(response.id[0]["id"]);
								$("input[name=parchanalloy]").val(response.qry[0]["alloy_parchan"]);
								$(".parchan-alloy").prop( "disabled", false );
								$("input[name=goldalloy]").val(response.qry[0]["alloy_gold"]);
								$(".gold-alloy").prop( "disabled", false );
								$("input[name=finegold]").val(response.qry[0]["fine_stock"]);
								$("input[name=cashamaount]").val(response.qry[0]["cash_stock"]);
								$(".balance-save-btn").removeAttr('disabled').html("Update");
							}else if(response.key == 'E'){
								CommonJS.Toaster({
									'type': 'error',
									'msg': response.msg,
								});
							}
						},
						error: function(error) {
							console.log(error.responseText);
						}
					});
				} else {
					CommonJS.Toaster({
						'type': 'error',
						'msg': 'Please enter your password.',
					});
				}
			}
		});
			/*var parchanalloy = $('.parchan-alloy').val();
			var goldalloy = $('.gold-alloy').val();
			var cashamaount = $('.cash-amount').val();
			var goldamaount = $('.gold-amount').val();
			$.ajax({
				url: base_url + '/add-opening-balance',
				type: "POST",
				data: {cashamaount:cashamaount , goldamaount:goldamaount},
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				beforeSend: function() {
					$(".balance-save-btn").prop("disabled", true);
					$('.balance-save-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...');
					CommonJS.showLoader('frm-loader');
				},
				complete: function() {
					$(".balance-save-btn").prop("disabled", false);
					$('.balance-save-btn').html('Save');
					CommonJS.hideLoader('frm-loader');
				},
				success: function(res) {
					console.log(res);
					if(res.key == 'S'){
						$('#addopeningbalance')[0].reset();
						getOppeningBalance();
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
					console.log(error.responseText);
				}
			});*/
		
	}
}