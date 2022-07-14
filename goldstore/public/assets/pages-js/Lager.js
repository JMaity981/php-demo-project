var LagerJs = {
	init: function (){
		LagerJs.Lager();
	},
	Lager: function (){
		/*--------- collapse show function ---------*/
		$('#collapsefour').on('show.bs.collapse', function () {
			var hidden_fk_customer_id = $('.hiddenuserid').val();
				collapseTitle = 'Add New Ledger';
				btnText = 'Save';
			if(hidden_fk_customer_id != ''){
				collapseTitle = 'Edit Information';
				btnText = 'Update Data';
			}
			$('.collapse-title').text(collapseTitle);
			$('.user-reg-btn').text(btnText);
		});
		/*--------- collapse hide function ---------*/
		$('#collapsefour').on('hide.bs.collapse', function () {
			$("#lager")[0].reset();
			$('.hiddenuserid').val('');
			$('.form-control').removeClass('is-invalid');
            $('.collapse-title').text('Ledger List');
			
        });
		/*--------- Add User --------*/
		$("#lager").validate({
            rules: {
                jewelry_name: {
                    required: true,
                },
				proprietor_name:{
					required: true,
				},
				phoneno: {
                    required: true,
					maxlength: 10
                },
				address: {
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
                var data = new FormData($(form)[0]);
                var action = $('#lager').attr('action');
                $.ajax({
                    url: action,
                    type: "POST",
                    data: data,
					headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					processData: false,
                    contentType: false,
					beforeSend: function() {
						$(".user-reg-btn").prop("disabled", true);
						$('.user-reg-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...');
						CommonJS.showLoader('page-content');
						$( ".wrapper" ).addClass( "loader" );
                    },
                    complete: function() {
						$(".user-reg-btn").prop("disabled", false);
						$('.user-reg-btn').html('Add User');
						CommonJS.hideLoader('page-content');
						$( ".wrapper" ).removeClass( "loader" );
                    },
                    success: function(res) {
                        console.log(res);
						if(res.key == 'S'){
							$('#lager')[0].reset();
							$('.hiddenuserid').val('');
							customerListDataTbl.ajax.reload();
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
                });
            }
        });
		/*---------- Get user ajax table ------------*/
		var customerListDataTbl = $('#user_list_tbl').DataTable({
		  "lengthMenu": [
			[100, 500, 1000],
			[100, 500, 1000]
		  ],
		  "processing": false,
		  "serverSide": true,
		  "ajax": {
			"url": base_url + "/userregistration-ajax-tbl",
			"type": "get",
			"dataType": "json",
			beforeSend: function() {
			 	CommonJS.showLoader('page-wrapper');
				$( ".wrapper" ).addClass( "loader" );
			},
			complete: function() {
				CommonJS.hideLoader('page-wrapper');
				$( ".wrapper" ).removeClass( "loader" );
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
		/*----------- customer status change ---------------*/
		$(document).on('change','.change-status',function(){
			 var _this = $(this);
				id = _this.data('id');
            if (_this.prop("checked") == true) {
                var status = 'A';
            } else {
                var status = 'I';
            }
			$.ajax({
                url: base_url + '/customer-status-change',
                data: { id: id, status: status },
                type: "POST",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function(data) {
                    console.log(data);
                    if (data.key == 'S') {
                        customerListDataTbl.ajax.reload();
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
		});
		/*----------------- customer delete ---------------*/
		$(document).on('click','.customer-delete',function(){
			var id = $(this).data('id');
			const swalWithBootstrapButtons = swal.mixin({
				confirmButtonClass: 'btn btn-success btn-rounded',
				cancelButtonClass: 'btn btn-danger btn-rounded mr-3',
				buttonsStyling: false,
			})
			swalWithBootstrapButtons({
				title: 'Are you sure to Delete ?',
				text: "You won't be able to revert this!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Yes, delete it!',
				cancelButtonText: 'No, cancel!',
				reverseButtons: true,
				padding: '2em'
			}).then(function(result) {
				if (result.value == true) {
					$.ajax({
						url: base_url + '/customer-delete',
						data: { id: id},
						type: "POST",
						headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
						success: function(data) {
							console.log(data);
							if (data.key == 'S') {
								customerListDataTbl.ajax.reload();
								CommonJS.Toaster({
									'type': 'success',
									'msg': data.msg,
								});
							}else if(data.key == 'E'){
								CommonJS.Toaster({
									'type': 'error',
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
		/*------------- customer update -----------------*/
		$(document).on('click','.customer-update',function(){
			var id = $(this).data('id');
			//$('.user-reg-btn').html('Update');
			$.ajax({
				url: base_url + '/customer-update',
				data: { id: id},
				type: "POST",
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				beforeSend: function() {
					CommonJS.showLoader('table-responsive');
					$( ".wrapper" ).addClass( "loader" );
				},
				complete: function() {
				  CommonJS.hideLoader('table-responsive');
				  $( ".wrapper" ).removeClass( "loader" );
				},
				success: function(data) {
					console.log(data);
					window.scrollTo({ top: 0, behavior: 'smooth' });
					$('.hiddenuserid').val(data[0].id);
					$('.hidden_mb_no').val(data[0].phone_no);
					$('.hidden_file_name').val(data[0].proprietor_image);
					$('.jewelry_name').val(data[0].jewelry_name);
					$('.proprietor_name').val(data[0].proprietor_name);
					$('.phoneno').val(data[0].phone_no);
					$('.gst_number').val(data[0].gst_number);
					$('#validationTextarea').val(data[0].address);
					$("#collapsefour").collapse('show');
				},
				error: function(error) {
					console.log(error.responseText);
				},
			});
		});
		/*--------------- view user details ---------------*/
		$(document).on('click','.view-user-details',function(){
			var id = $(this).data('id');
			$.ajax({
				url: base_url + '/customer-update',
				data: { id: id},
				type: "POST",
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				beforeSend: function() {
					CommonJS.showLoader('table-responsive');
					$( ".wrapper" ).addClass( "loader" );
				},
				complete: function() {
				  CommonJS.hideLoader('table-responsive');
				  $( ".wrapper" ).removeClass( "loader" );
				},
				success: function(data) {
					console.log(data);
					$('#commonModallg').modal('show');
					$('.modal-title').text('User Details');
						//check activity
					if(data[0].is_active == 'A'){
						var active = 'Active';
						var badgecolor = 'badge-primary';
					}else{
						var active = 'Inactive';
						var badgecolor = 'badge-danger';
					}
						//check email
					if(data[0].email == ''){
						var email = `<span class="badge badge-dark">Null</span>`;
					}else{
						var email = data[0].email;
					}
					//check Image
					if(data[0].proprietor_image != ''){
						var image = `<img src="storage/userimage/${data[0].proprietor_image}" class="rounded-circle shadow" width="100" height="100" alt="" />`;
					}else{
						var image = `<i class="fadeIn animated bx bx-user-circle fs" style="font-size: 65px;"></i>`;
					}
						
					
					var userdetailshtml = `<div class="user-profile-page">
										<div class="card radius-15">
											<div class="card-body">
												<div class="row">
													<div class="col-12 col-lg-7 border-right">
														<div class="d-md-flex align-items-center">
															<div class="mb-md-0 mb-3">
																${image}
															</div>
															<div class="ml-md-4 flex-grow-1">
																<div class="d-flex align-items-center mb-1">
																	<h4 class="mb-0">${data[0].jewelry_name}</h4>
																</div>
																<p class="mb-0 text-muted">
																	<i class="fadeIn animated bx bx-mobile-alt"></i>
																	+91 ${data[0].phone_no}
																</p>
															</div>
														</div>
													</div>
													<div class="col-12 col-lg-5">
														<table class="table table-sm table-borderless mt-md-0 mt-3">
															<tbody>
																<tr>
																	<th>Activity:</th>
																	<td> 
																		<h6><span class="badge ${badgecolor}">${active}</span></h6>
																	</td>
																</tr>
																<tr>
																	<th>Proprietor Name:</th>
																	<td>${data[0].proprietor_name}</td>
																</tr>
																<tr>
																	<th>Gst Number:</th>
																	<td>${data[0].gst_number}</td>
																</tr>
																<tr>
																	<th>Address:</th>
																	<td>${data[0].address}</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>`;
					$('.modal-body').html(userdetailshtml);
				},
				error: function(error) {
					console.log(error.responseText);
				},
			});
		});
	}
}