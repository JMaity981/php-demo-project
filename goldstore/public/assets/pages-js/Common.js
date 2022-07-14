/*var common_loader = `<div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">	
						<span class="sr-only">Loading...</span>
					</div>`;*/
var common_loader = `<div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">	<span class="sr-only">Loading...</span>
							</div>`;
					
var CommonJS = {
	
	/*------------ Menu Active ----------*/
	MenuActive: function (main_menu , sub_menu){
		if(sub_menu != ''){
			var mainclass = 'mnu_active';
			$("#"+sub_menu).addClass('mnu_active');
		}else{
			var mainclass = 'mnu_active';
		}
		$("#"+main_menu).addClass(mainclass);
	},
	
	/*------------ Common Loader ---------*/
		//show loader
	showLoader: function (div_class){
		$(document).find("."+div_class).prepend(common_loader);
	},
		//hide loader
	hideLoader:function (div_class){
		$(document).find("."+div_class).find('.spinner-border').remove();
	},
	
	/*------------ Common Toaster -----------*/
	Toaster:function(param){
    	var	msg = param.msg;
			type = param.type;
		Lobibox.notify(type, {
			pauseDelayOnHover: true,
			size: 'mini',
			icon: 'bx bx-check-circle',
			continueDelayOnInactiveTab: false,
			position: 'bottom right',
			msg: msg
		});
    },
	
	/*-------------- Common Button Loader ---------*/
	ButtonLoader:function (param){
		var setbtn = param.btn_set;
		var btnText = param.btntext;
		var btnloaderhtml = `<button class="btn btn-primary btn-block loader-btn" type="button" disabled>	
								<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
								${btnText}
							</button>`;
		$(document).find("."+setbtn).prepend(btnloaderhtml);
	},
	
	/*---------------- Nubber Validation --------------------*/
	NumberValidation:function(){
		$('.number-validate').keypress(function (event) {
		    var keycode = event.which;
		    if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || (keycode >= 48 && keycode <= 57)))) {
		        event.preventDefault();
		    }
		});
	},
	
	/*----------------- Single dropdown ----------------*/
	SingleDropdown:function(){
		$('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
	},
	
	/*------------------ Common Daterange --------------*/
	commonDaterange : function (){
		$(function() {
			$('.daterange').daterangepicker({
				autoUpdateInput: false,
				locale: {
					cancelLabel: 'Clear'
				}
			});
			$('.daterange').on('apply.daterangepicker', function(ev, picker) {
				$(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
			});

			$('.daterange').on('cancel.daterangepicker', function(ev, picker) {
				$(this).val('');
			});
		});
	},
	
	/*---------------- get common proprietor details ------------------*/
	
	commonProprietorDetaild : function (){
		//select jewelry Name
		$('.jewelryname').on('change',function(){
			var propId = $(".jewelryname :selected").val();
			$.ajax({
				url: base_url+"/get-lager-data",
				type: "POST",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data:{propId:propId},
				dataType: 'json',
				success: function(res){
					// console.log(res)
					$('.address').val(res.lager_details[0].address);
					$('.phone_no').val(res.lager_details[0].phone_no);
					// $('.gst_number').val(res.lager_details[0].gst_number);
					$('.hiddenlager').val(res.lager_details[0].id);
					$('.booking_value').html(res.booking);
					$('.gold_value').html(Math.abs(res.lager_details[0].gold_balance));
					$('.cash_value').html(Math.abs(res.lager_details[0].cash_balance));
					$('.customer-not-ledger').hide();
					//booking button color change
					if(res.booking > 0){
						$(".booking_value").removeClass("btn-success");
						$(".booking_value").removeClass("btn-primary");
						$(".booking_value").addClass("btn-danger");
					}else{
						$(".booking_value").removeClass("btn-danger");
						$(".booking_value").removeClass("btn-success");
						$(".booking_value").addClass("btn-primary");
					}
					//gold button color change
					if(res.lager_details[0].gold_balance > 0){
						$(".gold_value").removeClass("btn-primary");
						$(".gold_value").removeClass("btn-danger");
						$(".gold_value").addClass("btn-success");
					}else if(res.lager_details[0].gold_balance == 0){
						$(".gold_value").removeClass("btn-danger");
						$(".gold_value").removeClass("btn-success");
						$(".gold_value").addClass("btn-primary");
					}else if(res.lager_details[0].gold_balance < 0){
						$(".gold_value").removeClass("btn-success");
						$(".gold_value").removeClass("btn-primary");
						$(".gold_value").addClass("btn-danger");
					}
					//cash button color change
					if(res.lager_details[0].cash_balance > 0){
						$('.cash_value').removeClass('btn-primary');
						$('.cash_value').removeClass('btn-danger');
						$('.cash_value').addClass('btn-success');
					}else if(res.lager_details[0].cash_balance == 0){
						$('.cash_value').removeClass('btn-danger');
						$('.cash_value').removeClass('btn-success');
						$('.cash_value').addClass('btn-primary');
					}else if(res.lager_details[0].cash_balance < 0){
						$('.cash_value').removeClass('btn-success');
						$('.cash_value').removeClass('btn-primary');
						$('.cash_value').addClass('btn-danger');
					}
				},
				error:function(error){
					console.log(error.responseText);
				}
			});
		});
		//get gold or cash wait
		
	},
	getGoldCashDetails : function(){
		$.ajax({
			url:base_url+'/get-gold-cash-details',
			type:'GET',
			beforeSend: function() {
				CommonJS.showLoader('page-wrapper');
				$( ".wrapper" ).addClass( "loader" );
			},
			complete: function() {
				CommonJS.hideLoader('page-wrapper');
				$( ".wrapper" ).removeClass( "loader" );
			},
			success:function(data){
				//console.log(data)
				var html = `<div class="row">
								<div class="col-md-3">
									<div class="card radius-15 bg-voilet">
										<div class="card-body">
											<div class="d-flex align-items-center">
												<div>
													<h2 class="mb-0 text-white tot-cash">0000</h2>
												</div>
												<div class="ml-auto font-35 text-white">
													<i class="fadeIn animated bx bx-money"></i>
												</div>
											</div>
											<div class="d-flex align-items-center">
												<div>
													<p class="mb-0 text-white">In Cash</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-lg-3">
									<div class="card radius-15 bg-sunset">
										<div class="card-body">
											<div class="d-flex align-items-center">
												<div>
													<h2 class="mb-0 text-white fine-gold">0000</h2>
												</div>
												<div class="ml-auto font-35 text-white"><i class="fadeIn animated bx bx-coin"></i>
												</div>
											</div>
											<div class="d-flex align-items-center">
												<div>
													<p class="mb-0 text-white">In Fine Gold</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-lg-3">
									<div class="card radius-15 bg-danger">
										<div class="card-body">
											<div class="d-flex align-items-center">
												<div>
													<h2 class="mb-0 text-white alloy-parchan">0000</h2>
												</div>
												<div class="ml-auto font-35 text-white"><i class="fadeIn animated bx bx-coin"></i>
												</div>
											</div>
											<div class="d-flex align-items-center">
												<div>
													<p class="mb-0 text-white">In Parchan (alloy)</p>
												</div>
												<div class="ml-auto font-14 text-white"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-lg-3">
									<div class="card radius-15 bg-info">
										<div class="card-body">
											<div class="d-flex align-items-center">
												<div>
													<h2 class="mb-0 text-white alloy-gold">0000</h2>
												</div>
												<div class="ml-auto font-35 text-white"><i class="fadeIn animated bx bx-coin"></i>
												</div>
											</div>
											<div class="d-flex align-items-center">
												<div>
													<p class="mb-0 text-white">In Gold (alloy)</p>
												</div>
												<div class="ml-auto font-14 text-white"></div>
											</div>
										</div>
									</div>
								</div>
							</div>`;
				$('.render-info-box').html(html);
				if(data != ''){
					$('.tot-cash').html(data[0].cash_stock);
					$('.fine-gold').html(data[0].fine_stock);
					$('.alloy-parchan').html(data[0].alloy_parchan);
					$('.alloy-gold').html(data[0].alloy_gold);
				}
			},
			error:function(error){
				console.log(error.responseText);
				CommonJS.hideLoader('card-body');
			},
		});
	},
}
CommonJS.getGoldCashDetails();