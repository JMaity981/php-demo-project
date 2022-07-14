var RecivedJs = {
	init: function (){
		RecivedJs.Recived();
	},
	getsamplelist:function (){
		$.ajax({
			url: base_url+"/get-sample-list",
			type: "get",
			dataType: 'json',
			success: function(res){
				$('.table-responsive').html(res.html);
			},
			error:function(error){
				console.log(error.responseText);
			}
		});
	},
	
	Recived: function (){
		/*======================================== Recived Section ===============================*/
		$( ".jewelry_name" ).prop( "disabled", true );
		$( ".phone_no" ).prop( "disabled", true );
		$( ".gst_number" ).prop( "disabled", true );
		$( ".serial_no" ).prop( "disabled", true );
			//append form 
		$(document).on('click','.append-frm-btn',function(){
			var samplename = $('.sample_name').val();
			var wait = $('.wait').val();
			if(samplename != '' && wait != ''){
				var frmhtml = `<div class="row add-sample-row">
								<div class="col-md-5 col-sm-5 col-lg-5">
									<div class="form-group">
										<input class="form-control sample_name" type="text" placeholder="Sample Name" name="samplename[]">
									</div>
								</div>
								<div class="col-md-5 col-sm-5 col-lg-5 mb-3 gold-weight-fg">
									<div class="input-group mb-3">
										<input type="text" placeholder="Gold wait" name="gold_weight[]" class="form-control number-validate  gold-weight" name="gold_weight">
										<div class="input-group-append">	
											<span class="input-group-text">gm</span>
										</div>
									</div>
								</div>
								<div class="col-md-2 col-sm-2 col-lg-2">
									<button type="button" class="btn btn-danger btn-sm remove-one">
										<i class="fadeIn animated bx bx-minus"></i>
									</button>
								</div>
							</div>`;
				$('.add-sample-row:last-child').after(frmhtml);
				
				CommonJS.NumberValidation();
			}
			$(document).on("click",".remove-one",function() {
				$(this).closest(".add-sample-row").remove();
			});
		});

		//get sample List
		
		RecivedJs.getsamplelist();
		
		//add sample & wait
		$(".add-sample-form").validate({
            rules: {
                'gold_weight[]': {
                    required: true,
                },
                'samplename[]': {
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
                var data = $(form).serialize();
				var serialno = $('.serial_no').val();
                var action = $('.add-sample-form').attr('action');
				var propritervalue = $(".proprietor-name option:selected").val();
				if(propritervalue != ''){
					$.ajax({
						url: action,
						type: "POST",
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						data: data,
						beforeSend: function() {
							CommonJS.showLoader('page-wrapper');
							$( ".wrapper" ).addClass( "loader" );
						},
						complete: function() {
						   //CommonJS.hideLoader('tbl-loader');
						   CommonJS.hideLoader('page-wrapper');
							$( ".wrapper" ).removeClass( "loader" );
						},
						success: function(res) {
							if(res.key == 'E'){
								CommonJS.Toaster({
									'type': 'error',
									'msg': res.msg,
								});
							}else if(res.key == 'S'){
								$('.add-sample-form')[0].reset();
								$('.sample_name').val('');
								$('.gold-weight').val('');
								$('.serial_no').val(res.serialno[0]['serial_no']);
								$('.hidden_serialno').val(res.serialno[0]['serial_no']);
								RecivedJs.getsamplelist();
								CommonJS.Toaster({
									'type': 'success',
									'msg': res.msg,
								});
								url = base_url+'/generate-bill-Pdf?token='+res.serial_no;
								window.open(url,'_blanks');
								$("#jn").val('').trigger("change");
								$(".address").val('');
								$(".phone_no").val('');
							}
						},
						error: function(error) {
							console.log(error.responseText);
						}
					});
				}else{
					CommonJS.Toaster({
						'type': 'error',
						'msg': 'Plese select propriter name.',
					});
				}                
            }
        });
		/*--------------- editable table -------------*/
			//----------- edit btn click -----------//
			$(document).on('click','.open-tbl-frm',function(){
				var id = $(this).data('id');
				$('.purity-value'+id).addClass('d-none');
				$('.service-value'+id).addClass('d-none');
				$('.purity'+id).removeClass('d-none');
				$('.service-charge'+id).removeClass('d-none');
				$('.due-checkbox'+id).removeClass('d-none');
				$('.edittable-add-data'+id).html('');
				$('.edittable-add-data'+id).html('<i class="fadeIn animated bx bx-save"></i>');
				$('.edittable-add-data'+id).addClass('save-tbl-frm');
				$('.edittable-add-data'+id).addClass('edittable-save-data'+id);
				$('.edittable-add-data'+id).removeClass('open-tbl-frm');
				$('.edittable-add-data'+id).removeClass('edittable-add-data'+id);
			});
				//--------- save btn click ----------//
			$(document).on('click','.save-tbl-frm',function(){
				var id = $(this).data('id');
				$('.purity'+id).addClass('d-none');
				$('.purity-value'+id).removeClass('d-none');
				$('.edittable-save-data'+id).html('');
				$('.edittable-save-data'+id).html('<i class="fadeIn animated bx bx-edit"></i>');
				$('.edittable-save-data'+id).addClass('open-tbl-frm');
				$('.edittable-save-data'+id).addClass('edittable-add-data'+id);
				$('.edittable-save-data'+id).removeClass('save-tbl-frm');
				$('.edittable-save-data'+id).removeClass('.edittable-save-data'+id);
			});
				//-------- save data btn click ---------//
			$(document).on('click','.save-tbl-frm',function(){
				var id = $(this).data('id');
				var purity = $('.purity'+id).val();
				var servicecharge = $('.service-charge'+id).val();
				var paid = $("input[name='gender"+id+"']:checked").val();
				
				$.ajax({
					url: base_url+"/add-purity",
					type: "POST",
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					data:{id:id , purity:purity , servicecharge:servicecharge , paid:paid},
					dataType: 'json',
					success: function(res){
						console.log(res);
						CommonJS.Toaster({
							'type': 'success',
							'msg': res.msg,
						});
				  CommonJS.getGoldCashDetails();
						RecivedJs.getsamplelist();
					},
					error:function(error){
						console.log(error.responseText);
					}
				});
			});
		/*==================================== Exchange Section =========================*/
		//append form 
		$(document).on("keyup change", '.fine-gold-calculate', function(e) {
			sampleRowExchange();
		})

		function sampleRowExchange(){
			var slno = 0; filledupPurity = 0; totweight = 0; totpurity = 0; tofinegold = 0;
			$('.exchange-calculate').find('.add-sample-row-exchange').each(function(){
				var _this = $(this);
				var newslno = parseInt(slno)+1;

				var weight = _this.find('div:nth-child(2)').find('.fine-gold-calculate').val();
				if(weight == ''){
					weight = 0;
				}
				var purity = _this.find('div:nth-child(3)').find('.fine-gold-calculate').val();
				if(purity == ''){
					purity = 0;
				}else{
					filledupPurity = parseInt(filledupPurity)+1
				}
				var fine_gold = ((weight*purity)/100).toFixed(3);
				_this.find('div:nth-child(4)').find('#fine_gold').val(fine_gold)

				_this.find('div').find('div').find('button').html(newslno);

				slno = newslno;
				totweight = parseFloat(totweight) + parseFloat(weight);
				totpurity = parseFloat(totpurity) + parseFloat(purity);
				tofinegold = parseFloat(tofinegold) + parseFloat(fine_gold);
			});
			// var calcPurity = ((tofinegold*100)/totweight).toFixed(3);
			if(totweight > 0){
				$('input[name=alloy_weight]').val((totweight).toFixed(3));
			}
			if(totpurity > 0){
				$('input[name=purity]').val((totpurity/filledupPurity).toFixed(2));
			}
			if(tofinegold > 0){
				$('input[name=fine_gold]').val((tofinegold).toFixed(3));
			}
			
		}
		$(document).on('click','.append-exchange-btn',function(){
			var slno = parseInt($(this).attr('data-slno'))+1;
			$(this).attr('data-slno', slno);
			var html = `<div class="row add-sample-row-exchange remove-append-row"><div class="col-md-1 col-sm-1 col-lg-1">
				<div class="form-group">
					<button type="button" class="btn btn-dark">${slno}</button>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-lg-3">
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Weight</span>
						</div>
						<input type="text" class="form-control exchange-alloy-weight fine-gold-calculate reset-value"
							placeholder="Gold Weight">
						<div class="input-group-append">
							<span class="input-group-text">gm</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-lg-3">
				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Purity</span>
						</div>
						<input class="form-control exchange-purity fine-gold-calculate reset-value" type="text"
							placeholder="Purity">
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-lg-4">
				<div class="form-group">
				
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Weight</span>
						</div>
						<input class="form-control exchange-fine-gold-weight reset-value" type="text"
							placeholder="Fine Gold Weight" id="fine_gold" readonly>
						<div class="input-group-append">
							<span class="input-group-text">gm</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-1 col-sm-1 col-lg-1">
				<button type="button" class="btn btn-danger btn-sm remove-one-exchange">
					<i class="fadeIn animated bx bx-minus"></i>
				</button>
			</div></div>`;
			$(document).find('div .add-sample-row-exchange:last').after(html);
			//$(".append").append(html);
			sampleRowExchange();
		});
		$(document).on("click",".remove-one-exchange",function() {
			$(this).closest(".add-sample-row-exchange").remove();
			sampleRowExchange();
		});
		// $(".exchange-prop-name").prop('disabled', true);
		// $(".exchange-jewelry-name").prop('disabled', true);
		$(".exchange-phone-no").prop('disabled', true);
		// $(".exchange-gst-number").prop('disabled', true);
		// $(".exchange-alloy-weight").prop('disabled', true);
		// $(".exchange-purity").prop('disabled', true);
		$(".exchange-fine-gold-weight").prop('readonly', true);
		$(".read-only").prop('readonly', true);

		
		/*$( ".fine-gold-calculate" ).change(function() {
			$("#fine_gold").val(($(".exchange-alloy-weight").val() * $(".exchange-purity").val()/100).toFixed(3));
		});*/
		$('#exchange_form').validate({
            rules: {
				alloy_weight:{
					required: true,
				},
                purity: {
                    required: true,
                },
				fine_gold:{
					required: true,
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
                var data = $('#exchange_form').serialize();
				var ladgerId = $("input[name=hidden]").val();
                var action = $('#exchange_form').attr('action');
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
								$('#exchange_form')[0].reset();
								$('.reset-value').val('');
								CommonJS.Toaster({
									'type': 'success',
									'msg': res.msg,
								});
								CommonJS.getGoldCashDetails();
								$('.remove-append-row').remove();
								if ($('.print-exchange').prop('checked') == true){
                                    url = base_url+'/generate-exchange-bill-pdf?id='+res.id;
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
							CommonJS.Toaster({
								'type': 'error',
								'msg': error.responseText,
							});
						}
					});
				}else{
					CommonJS.Toaster({
						'type': 'error',
						'msg': 'Please select a Ledger.',
					});
				}
                //console.log(data);
            }
        });
	}
}





