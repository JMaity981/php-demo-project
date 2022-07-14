<?php
require_once 'db/connection.php';
?>
<!DOCTYPE html>
<html>


<!-- Mirrored from themenate.com/applicator/dist/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Jul 2018 15:43:55 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin - Login</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="assets/images/logo/apple-touch-icon.png">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png">

    <!-- core dependcies css -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/vendor/PACE/themes/blue/pace-theme-minimal.css" />
    <link rel="stylesheet" href="assets/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css" />
	<link href="view/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
    <!-- core css -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/themify-icons.css" rel="stylesheet">
    <link href="assets/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="assets/css/animate.min.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />
</head>

<body>
    <div class="app">
        <div class="layout bg-gradient-info">
            <div class="container">
                <div class="row full-height align-items-center">
                    <div class="col-md-5 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="p-15">
                                    <div class="m-b-30">
                                        <img class="img-responsive inline-block" src="assets/images/logo/logo.png" alt="">
                                        <h2 class="inline-block pull-right m-v-0 p-t-15">Login</h2>
                                    </div>
                                    <p class="m-t-15 font-size-13">Please enter your user name and password to login</p>
                                    <form class="login">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="User name">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <div class="checkbox font-size-13 d-inline-block p-v-0 m-v-0" style="display:none !important;">
                                            <input id="agreement" name="agreement" type="checkbox">
                                            <label for="agreement">Keep Me Signed In</label>
                                        </div>
                                        <div class="pull-right" style="display:none;">
                                            <a href="#">Forgot Password?</a>
                                        </div>
                                        <div class="m-t-20 text-right">
                                            <button type="submit" class="btn btn-gradient-success">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script>
	//----- Url ----------------
	var base_url = "<?php echo site_url();?>";
	</script>
	<script src="view/public/vendor/jquery/jquery.min.js"></script>
    <script src="view/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="view/public/vendor/jquery-validation/jquery.validate.min.js"></script> 
	<script src="view/public/vendor/jquery-easing/jquery.easing.min.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script>
	$( ".login" ).validate({
		
		errorElement: 'label',
		errorClass: 'error',
		rules: {
			email: {
				required: true,
				email: true
			},
			password: {
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
			var email = $("input[name=email]").val(),
				password = $("input[name=password]").val(),
				data = {'email':email,'password':password};
			
			var action = base_url+"controller/Login.php";
			$.ajax({
				url: action,
				type: 'POST',
				data: data,
				dataType: 'json',
				success:function(result){
					console.log(result);
					if(result.res == 0){
						toastr.success("Successfully login");
						window.location.href = base_url+"admin_dashboard.php";
					}else{
						toastr.error("Cadincial not match");
					}
				},
				error:function(error){
					console.log(error.responseText);
				}
			});
		}
	});
	</script>
</body>


<!-- Mirrored from themenate.com/applicator/dist/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Jul 2018 15:43:55 GMT -->
</html>