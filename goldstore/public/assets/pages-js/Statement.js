var StatementJs = {
	init: function (){
		StatementJs.PartyDeuAndDepositeStatement();
		StatementJs.TouchStatement();
		StatementJs.SalePurchase();
	},
	//=======Party Deu And Deposit Statemet==========//
	PartyDeuAndDepositeStatement: function (){
		$(document).on('click','.sale-parchase-search',function(){
			var tbl_id = $('.hidden_tbl_id').val();
			var tbl_id_money = $('.hidden_tbl_id_money').val();
			$('#'+tbl_id).DataTable().ajax.reload();
			$('#'+tbl_id_money).DataTable().ajax.reload();
		});
		
		var MoneyDueDepositTbl = $('#partydeudepositstatment_tbl_money').DataTable({
        	"bFilter": false,
			"ordering": false,
			"lengthMenu": [
				[100, 500, 1000],
				[100, 500, 1000]
			],
			"processing": false,
			"serverSide": true,
			"ajax": {
				"url": base_url + "/money-due-deposit",
				"type": "get",
				"dataType": "json",
				"data": function(data){
					data.daterange = $('.daterange').val();
					data.ledger_id = $('.proprietor-name').val();
				},
				beforeSend: function() {
					CommonJS.showLoader('page-wrapper');
					$( ".wrapper" ).addClass( "loader" );
				},
				complete: function() {
					CommonJS.hideLoader('page-wrapper');
					$( ".wrapper" ).removeClass( "loader" );
				},
				"dataSrc": function(result) {
					return result.data;
				},
				"error": function(error) {
					console.log(error.responseText);
				},
			},
		});

		var GoldDueDepositTbl = $('#partydeudepositstatment_tbl_gold').DataTable({
        	"bFilter": false,
			"ordering": false,
			"lengthMenu": [
				[100, 500, 1000],
				[100, 500, 1000]
			],
			"processing": false,
			"serverSide": true,
			"ajax": {
				"url": base_url + "/gold-due-deposit",
				"type": "get",
				"dataType": "json",
				"data": function(data){
					data.daterange = $('.daterange').val();
					data.ledger_id = $('.proprietor-name').val();
				},
				beforeSend: function() {
					CommonJS.showLoader('page-wrapper');
					$( ".wrapper" ).addClass( "loader" );
				},
				complete: function() {
					CommonJS.hideLoader('page-wrapper');
					$( ".wrapper" ).removeClass( "loader" );
				},
				"dataSrc": function(result) {
					return result.data;
				},
				"error": function(error) {
					console.log(error.responseText);
				},
			},
		});

		/*-------------- Party Statement Download -----------*/
		function savePartyStatement (){
			var dateRange = $('.daterange').val();
			var propiter_jewelry_name = $('.proprietor-name').val();
			var page_no = $('.hidden_pageno').val();
			var file_path = $('.hidden_filepath').val();
			// alert(dateRange);
			/*Swal.fire({
			  title: "<i>Downloading...</i>", 
			  html: `<div class="progress">
						<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
					</div>`,  
			  confirmButtonText: "OK",
			  allowOutsideClick: false,
			});*/
			$.ajax({
				url: base_url + '/party-statement-pdf',
				type: "GET",
				data: {dateRange:dateRange , propiter_jewelry_name:propiter_jewelry_name , page_no:page_no , file_path:file_path},
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
					if(res.key == 'S'){
						$('.hidden_pageno').val(res.newpageno);
						$('.hidden_filepath').val(res.filepath);
						window.location.href = 'download-any-file?filename='+res.filepath;
						// savePartyStatement();
					}else if(res.key == 'C'){
						/*CommonJS.Toaster({
							'type': 'success',
							'msg': 'Print Complete.',
						});*/
						$('.hidden_pageno').val(0);
						$('.hidden_filepath').val('');
						window.location.href = 'save-zip-file?filename='+res.filename;
					}
				},
				error: function(error) {
					console.log(error.responseText);
				}
			});
		}
		$('.party-statement-download').on('click',function(){
			savePartyStatement();
		});

	},
	//======= Tounch Statement ========//
	TouchStatement: function(){
		$(document).ready(function (){
			var tounchTbl = $('#tounchstatment_tbl').DataTable({
				"lengthMenu": [
				  [100, 500, 1000],
				  [100, 500, 1000]
				],
				"processing": false,
				"serverSide": true,
				"ajax": {
				  "url": base_url + "/tounch-and-statement",
				  "type": "get",
				  "dataType": "json",
				  "data": function(data){
					  data.daterange = $('.daterange').val();
					  data.ledger_id = $('.proprietor-name').val();
				  },
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
		});
		/*-------------- tounch tbl -------------*/
		
		/*------------ search ---------*/
		$(".sale-parchase-search").click(function(){
			var tbl_id = $('.hidden_tbl_id').val();
			$('#'+tbl_id).DataTable().ajax.reload();
		});
		/*-------------- touch statement download -----------*/
		function saveTouchStatement (){
			var dateRange = $('.daterange').val();
			var propiter_jewelry_name = $('.proprietor-name').val();
			var page_no = $('.hidden_pageno').val();
			var file_path = $('.hidden_filepath').val();
			//alert(propiter_jewelry_name)
			/*Swal.fire({
			  title: "<i>Downloading...</i>", 
			  html: `<div class="progress">
						<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
					</div>`,  
			  confirmButtonText: "OK",
			  allowOutsideClick: false,
			});*/
			$.ajax({
				url: base_url + '/touch-statement-pdf',
				type: "GET",
				data: {dateRange:dateRange , propiter_jewelry_name:propiter_jewelry_name , page_no:page_no , file_path:file_path},
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
					if(res.key == 'S'){
						$('.hidden_pageno').val(res.newpageno);
						$('.hidden_filepath').val(res.filepath);
						window.location.href = 'download-any-file?filename='+res.filepath;
						// saveTouchStatement();
					}else if(res.key == 'C'){
						/*CommonJS.Toaster({
							'type': 'success',
							'msg': 'Print Complete.',
						});*/
						$('.hidden_pageno').val(0);
						$('.hidden_filepath').val('');
						window.location.href = 'save-zip-file?filename='+res.filename;
					}
				},
				error: function(error) {
					console.log(error.responseText);
				}
			});
		}
		$('.touch-statement-download').on('click',function(){
			saveTouchStatement();
		});
	},

	//=========== Refine Statement ===========//
	RefineStatement: function(){
		$(document).ready(function (){
			/*----------- refinestatment data table ----------------*/
			var tounchTbl = $('#refinestatment_tbl').DataTable({
				"lengthMenu": [
				[100, 500, 1000],
				[100, 500, 1000]
				],
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": base_url + "/refine-and-statment",
					"type": "get",
					"dataType": "json",
					"data": function(data){
						data.daterange = $('.daterange').val();
						data.ledger_id = $('.proprietor-name').val();
					},
					beforeSend: function() {
						CommonJS.showLoader('page-wrapper');
						$( ".wrapper" ).addClass( "loader" );
					},
					complete: function() {
						CommonJS.hideLoader('page-wrapper');
						$( ".wrapper" ).removeClass( "loader" );
					},
					"dataSrc": function(result) {
						// console.log(result);
						return result.data;
					},
					"error": function(error) {
						console.log(error.responseText);
					},
				},
			});				
		});
		/*------------- search button click --------*/
		$(".sale-parchase-search").click(function(){
			var tbl_id = $('.hidden_tbl_id').val();
			$('#'+tbl_id).DataTable().ajax.reload();
		});
		/*----------------- data delete ---------------*/
		$(document).on('click','.refine-delete-btn',function(){
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
						url: base_url + '/refine-data-delete',
						data: { id: id},
						type: "POST",
						headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
						success: function(data) {
							console.log(data);
							if (data.key == 'S') {
								$('#refinestatment_tbl').DataTable().ajax.reload();
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
		/*------------------ download statement -----------------*/
		function refineStatementDownload (){
			var dateRange = $('.daterange').val();
			var propiter_jewelry_name = $('.proprietor-name').val();
			var page_no = $('.hidden_pageno').val();
			var file_path = $('.hidden_filepath').val();
			$.ajax({
				url: base_url + '/refine-statement-pdf',
				type: "GET",
				data: {dateRange:dateRange , propiter_jewelry_name:propiter_jewelry_name , page_no:page_no , file_path:file_path},
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
					if(res.key == 'S'){
						$('.hidden_pageno').val(res.newpageno);
						$('.hidden_filepath').val(res.filepath);
						window.location.href = 'download-any-file?filename='+res.filepath;
						// refineStatementDownload();
					}else if(res.key == 'C'){
						/*CommonJS.Toaster({
							'type': 'success',
							'msg': 'Print Complete.',
						});*/
						$('.hidden_pageno').val(0);
						$('.hidden_filepath').val('');
						window.location.href = 'save-zip-file?filename='+res.filename;
					}
				},
				error: function(error) {
					console.log(error.responseText);
				}
			});
		}
		
		$(".refine-statement-downlod").on('click',function(){
			refineStatementDownload();
		});
	},
	/*====================== Our sale and purchase =====================*/
	SalePurchase: function(){
		
		$(document).ready(function (){
			var is_gst = 'Y';
			var non_gst = 'Y';
			$(".is_gst").on('change', function(){
				if($(this).prop('checked')) {
					is_gst = 'Y';
					non_gst = 'N';
					$(".non_gst").prop('checked',false);
				} else {
					is_gst = 'N';
					non_gst = 'N';
				}
			});
			$(".non_gst").on('change', function(){
				if($(this).prop('checked')) {
					non_gst = 'Y';
					is_gst = 'N';
					$(".is_gst").prop('checked',false);
				} else {
					non_gst = 'N';
					is_gst = 'N';
				}
			});
			
			/*----------- sale purchase data table ------------*/
			var saleTbl = $('#sale_tbl').DataTable({
				"lengthMenu": [
				[100, 500, 1000],
				[100, 500, 1000]
				],
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": base_url + "/sale-statement",
					"type": "get",
					"dataType": "json",
					"data":function(data){
						data.daterange = $('.daterange').val();
						data.propiter_id = $('.proprietor-name').val();
						data.is_gst = is_gst;
						data.non_gst = non_gst;
					},
					beforeSend: function() {
						CommonJS.showLoader('page-wrapper');
						$( ".wrapper" ).addClass( "loader" );
					},
					complete: function() {
						CommonJS.hideLoader('page-wrapper');
						$( ".wrapper" ).removeClass( "loader" );
					},
					"dataSrc": function(result) {
						return result.data;
					},
					"error": function(error) {
						console.log(error.responseText);
					},
				},
				"bAutoWidth": false, // Disable the auto width calculation 
				"aoColumns": [
					{ "sWidth": "15%" },
					{ "sWidth": "20%" },
					{ "sWidth": "19%" },
					{ "sWidth": "11%" },
					{ "sWidth": "13%" },
					{ "sWidth": "16%" },
					{ "sWidth": "6%" },
				]
			});
			var purchaseTbl = $('#purchase_tbl').DataTable({
				"lengthMenu": [
					[100, 500, 1000],
					[100, 500, 1000]
				],
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": base_url + "/purchase-statement",
					"type": "get",
					"dataType": "json",
					"data":function(data){
						data.daterange = $('.daterange').val();
						data.propiter_id = $('.proprietor-name').val();
						data.is_gst = is_gst;
						data.non_gst = non_gst;
					},
					beforeSend: function() {
						CommonJS.showLoader('page-wrapper');
						$( ".wrapper" ).addClass( "loader" );
					},
					complete: function() {
						CommonJS.hideLoader('page-wrapper');
						$( ".wrapper" ).removeClass( "loader" );
					},
					"dataSrc": function(result) {
						return result.data;
					},
					"error": function(error) {
						console.log(error.responseText);
					},
				},
				"bAutoWidth": false, // Disable the auto width calculation 
				"aoColumns": [
					{ "sWidth": "15%" },
					{ "sWidth": "20%" },
					{ "sWidth": "19%" },
					{ "sWidth": "11%" },
					{ "sWidth": "13%" },
					{ "sWidth": "16%" },
					{ "sWidth": "6%" },
				]
			});	
		});
											
		/*-------------- Search btn click -------------*/
		$(document).on('click','.sale-parchase-search',function(){
			var tbl_id_sale = $('.hidden_tbl_id_sale').val();
			$('#'+tbl_id_sale).DataTable().ajax.reload();
			var tbl_id_purchase = $('.hidden_tbl_id_purchase').val();
			$('#'+tbl_id_purchase).DataTable().ajax.reload();
		});
		/*----------------- Non GST data delete ---------------*/
		$(document).on('click','.sale-purchase-non-gst-clear',function(){
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
						url: base_url + '/sale-purchase-non-gst-data-delete',
						type: "POST",
						headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
						success: function(data) {
							console.log(data);
							if (data.key == 'S') {
								$('#sale_tbl').DataTable().ajax.reload();
								$('#purchase_tbl').DataTable().ajax.reload();
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
		/*-------------- Sale Purchase statement Download -----------*/
		function printSaleParchaseStatement (){
			var dateRange = $('.daterange').val();
			var propiter_jewelry_name = $('.proprietor-name').val();
			var page_no = $('.hidden_pageno').val();
			var file_path = $('.hidden_filepath').val();
			var is_gst = 'Y';
			var non_gst = 'Y';
			if($(".is_gst").prop('checked')) {
				is_gst = 'Y';
				non_gst = 'N';
			} 
			else if($(".non_gst").prop('checked')) {
				non_gst = 'Y';
				is_gst = 'N';
			}
			console.log('is_gst', is_gst);
			console.log('non_gst', non_gst);
			$.ajax({
				url: base_url + '/search-sale-parchase-statement',
				type: "GET",
				data: {dateRange:dateRange , propiter_jewelry_name:propiter_jewelry_name , page_no:page_no , file_path:file_path, is_gst:is_gst, non_gst:non_gst},
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
					if(res.key == 'S'){
						// CommonJS.Toaster({
						// 	'type': 'success',
						// 	'msg': res.msg,
						// });
						$('.hidden_pageno').val(res.newpageno);
						$('.hidden_filepath').val(res.filepath);
						window.location.href = 'download-any-file?filename='+res.filepath;
						// printSaleParchaseStatement();
					}else if(res.key == 'C'){
						$('.hidden_pageno').val(0);
						$('.hidden_filepath').val('');
						window.location.href = 'save-zip-file?filename='+res.filename;
						CommonJS.Toaster({
							'type': 'success',
							'msg': 'Download Complete.',
						});
					}
				},
				error: function(error) {
					console.log(error.responseText);
				}
			});
		}
		$(document).on('click','.sale-purchase-statement',function(){
			printSaleParchaseStatement();
		});
	},

	PartySaleParchase: function(){
		$(document).ready( function () {
			$('#partysaleparchase_tbl').DataTable();
		});
	}, 
	//=========== debit-credit Statement ===========//
	DebitCreditStatement: function(){
		$(document).ready(function (){
			//------------debit-credit data tbl-------------// 
			var debitcreditTbl = $('#debitcredit_tbl').DataTable({
				"lengthMenu": [
					[100, 500, 1000],
					[100, 500, 1000]
				],
				"processing": false,
				"serverSide": true,
				"ajax": {
					"url": base_url + "/debit-and-credit",
					"type": "get",
					"dataType": "json",
					"data": function(data){
						data.daterange = $('.daterange').val();
						data.ledger_id = $('.proprietor-name').val();
					},
					beforeSend: function() {
						CommonJS.showLoader('page-wrapper');
						$( ".wrapper" ).addClass( "loader" );
					},
					complete: function() {
						CommonJS.hideLoader('page-wrapper');
						$( ".wrapper" ).removeClass( "loader" );
					},
					"dataSrc": function(result) {
						//console.log(result.data[5]);
					
						return result.data;
					},
					"error": function(error) {
						console.log(error.responseText);
					},
				}
			});
		});

	
		
		$(document).on('click','.sale-parchase-search',function(){
			var tbl_id = $('.hidden_tbl_id').val();
			$('#'+tbl_id).DataTable().ajax.reload();
		});
		/*------------- Debit credit statement pdf ----------------*/
		function debitCreditStatementpdf (){
			var dateRange = $('.daterange').val();
			var propiter_jewelry_name = $('.proprietor-name').val();
			var page_no = $('.hidden_pageno').val();
			var file_path = $('.hidden_filepath').val();
			$.ajax({
				url: base_url + '/debit-credit-statement-pdf',
				type: "GET",
				data: {dateRange:dateRange , propiter_jewelry_name:propiter_jewelry_name , page_no:page_no , file_path:file_path},
				beforeSend: function() {
					CommonJS.showLoader('page-wrapper');
					$(".wrapper" ).addClass( "loader" );
				},
				complete: function() {
					CommonJS.hideLoader('page-wrapper');
					$(".wrapper" ).removeClass("loader");
				},
				success: function(res) {
					console.log(res);
					if(res.key == 'S'){
						$('.hidden_pageno').val(res.newpageno);
						$('.hidden_filepath').val(res.filepath);
						window.location.href = 'download-any-file?filename='+res.filepath;
						// debitCreditStatementpdf();
					}else if(res.key == 'C'){
						/*CommonJS.Toaster({
							'type': 'success',
							'msg': 'Print Complete.',
						});*/
						$('.hidden_pageno').val(0);
						$('.hidden_filepath').val('');
						window.location.href = 'save-zip-file?filename='+res.filename;
					}
				},
				error: function(error) {
					console.log(error.responseText);
				}
			});
		}
		$('.debit-credit-statement-pdf').on('click',function(){
			debitCreditStatementpdf();
		});
	},

	//==== all deu deposite=======//
	AllDueDeposit: function(){
		var AllDepositTbl = $('#alldeposit_tbl').DataTable({
			"lengthMenu": [
				[100, 500, 1000],
				[100, 500, 1000]
			],
			"processing": false,
			"serverSide": true,
			"ajax": {
				"url": base_url + "/all-deposit",
				"type": "get",
				"dataType": "json",
				// "data": function(data){
				// 	data.daterange = $('.daterange').val();
				// 	data.ledger_id = $('.proprietor-name').val();
				// },
				beforeSend: function() {
					CommonJS.showLoader('page-wrapper');
					$( ".wrapper" ).addClass( "loader" );
				},
				complete: function() {
					CommonJS.hideLoader('page-wrapper');
					$( ".wrapper" ).removeClass( "loader" );
				},
				"dataSrc": function(result) {
					//console.log(result);
					return result.data;
				},
				"error": function(error) {
					console.log(error.responseText);
				},
			},
		});
		var AllDueTbl = $('#alldue_tbl').DataTable({
			"lengthMenu": [
				[100, 500, 1000],
				[100, 500, 1000]
			],
			"processing": false,
			"serverSide": true,
			"ajax": {
				"url": base_url + "/all-due",
				"type": "get",
				"dataType": "json",
				// "data": function(data){
				// 	data.daterange = $('.daterange').val();
				// 	data.ledger_id = $('.proprietor-name').val();
				// },
				beforeSend: function() {
					CommonJS.showLoader('page-wrapper');
					$( ".wrapper" ).addClass( "loader" );
				},
				complete: function() {
					CommonJS.hideLoader('page-wrapper');
					$( ".wrapper" ).removeClass( "loader" );
				},
				"dataSrc": function(result) {
					//console.log(result);
				
					return result.data;
				},
				"error": function(error) {
					console.log(error.responseText);
				},
			},
		});
		/*-------------- Due Deposit Statement -----------*/
		function printDueDepositStatement (){
			var page_no = $('.hidden_pageno').val();
			var file_path = $('.hidden_filepath').val();
			$.ajax({
				url: base_url + '/search-due-deposit-statement',
				type: "GET",
				data: { page_no:page_no , file_path:file_path},
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
					if(res.key == 'S'){
						$('.hidden_pageno').val(res.newpageno);
						$('.hidden_filepath').val(res.filepath);
						window.location.href = 'download-any-file?filename='+res.filepath;
					}else if(res.key == 'C'){
						$('.hidden_pageno').val(0);
						$('.hidden_filepath').val('');
						window.location.href = 'save-zip-file?filename='+res.filename;
						CommonJS.Toaster({
							'type': 'success',
							'msg': 'Download Complete.',
						});
					}
				},
				error: function(error) {
					console.log(error.responseText);
				}
			});
		}
		$(document).on('click','.due-deposit-statement',function(){
			printDueDepositStatement();
		});
	},
	
		// $(document).ready( function () {
		// 	$('#alldeposit_tbl').DataTable();
		// });

	
}