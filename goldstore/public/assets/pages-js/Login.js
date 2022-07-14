var LoginJs = {
	init: function () {
		LoginJs.Login();
	},
	/* Login */
	Login: function() {
		//password show hide
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
		
		//login
		$("#login").validate({
            rules: {
                loginemail: {
                    required: true,
                },
                loginpassword: {
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
                var action = $('#login').attr('action');
                $.ajax({
                    url: action,
                    type: "POST",
                    data: data,
					beforeSend: function() {
						$('.btn-group').html('');
						CommonJS.ButtonLoader({
							'btn_set': 'btn-group',
							'btntext': 'Log In...',
						});
                    },
                    complete: function() {
						$('.btn-group').html('');
						var btnhtml = `<button type="submit" class="btn btn-primary btn-block">Log In</button>
										<button type="button" class="btn btn-primary"><i class="lni lni-arrow-right"></i>
										</button>`;
						$('.btn-group').html(btnhtml);
                       
                    },
                    success: function(res) {
                        console.log(res);
						if(res.key == 'S'){
							CommonJS.Toaster({
								'type': 'success',
								'msg': res.msg,
							});
							window.open(res.url, '_self');
						}else if(res.key == 'E'){
							var errormsghtml = `<div class="alert bg-danger text-white alert-dismissible fade show" role="alert">
													${res.msg}
												</div>`;
							$('.error-msg').html(errormsghtml);
						}
						
                    },
                    error: function(error) {
                        console.log(error.responseText);
                    }
                });
            }
        });
	},
}