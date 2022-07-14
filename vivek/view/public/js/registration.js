$( ".registration" ).validate({
	ignore: ':hidden:not(:checkbox)',
	errorElement: 'label',
	errorClass: 'error',
	rules: {
		photo: {
			required: true
		},
		state: {
			required: true
		},
		district: {
			required: true
		},
		candidatename: {
			required: true
		},
		fathername: {
			required: true
		},
		dob: {
			required: true
		},
		permanentaddress: {
			required: true
		},
		officeaddress: {
			required: true
		},
		pincode: {
			required: true,
			minlength: 6,
			maxlength: 6
		},
		mobile: {
			required: true,
			number: true,
			minlength: 10,
			maxlength: 10
		},
		email: {
			required: true,
			email: true
		},
		aadhaar: {
			required: true
		}
	},

	highlight: function(element) { // hightlight error inputs
		$(element)
			.closest('.form-control').addClass('error'); // set error class to the control group
	},

	success: function(label) {
		label.closest('.form-group').removeClass('error');
		label.remove();
	},
	
	submitHandler: function(form) {
		var data = new FormData($(form)[0]);
			
		var action = base_url+"controller/Registration.php";
		$.ajax({
			url: action,
			type: 'POST',
			data: data,
			dataType: 'json',  // what to expect back from the PHP script, if anything
        	cache: false,
        	contentType: false,
        	processData: false,
			success:function(result){
				console.log(result);
				if(result.res == 0){
					toastr.success("Form successfully submited");
					$(".registration")[0].reset();
					$('#applicationModal').addClass('show');
					$('#applicationModal').modal('show');
					$('h5.no').text(result.application_no);
				}else if(result.res == 1){
					toastr.error("Internal server error");
				}else if(result.res == 2){
					toastr.error("This email allreay existed");
				}else{
					toastr.error("Photo is too large to upload");
				}
			},
			error:function(error){
				console.log(error.responseText);
			}
		});
	}
});

$('.dob').datepicker({
	format: 'mm/dd/yyyy',
	autoclose: true
});