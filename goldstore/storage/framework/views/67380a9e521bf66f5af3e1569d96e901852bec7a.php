<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Gold Store - Login</title>
	<!--favicon-->
	<link rel="icon" href="public/assets/images/logo-icon.png" type="image/png" />
	<!-- loader-->
	<?php echo Html::style('public/assets/css/pace.min.css'); ?>

	
	<?php echo Html::style('public/assets/css/bootstrap.min.css'); ?>

	<?php echo Html::style('public/assets/css/icons.css'); ?>

	<?php echo Html::style('public/assets/css/app.css'); ?>

	<?php echo Html::style('public/assets/css/style.css'); ?>

	<?php echo Html::style('public/assets/plugins/notifications/css/lobibox.min.css'); ?>

	
</head>

<body class="bg-login">
	<!-- wrapper -->
	<div class="wrapper" style="overflow-x: hidden;">
		<div class="d-flex align-items-center justify-content-center pt-4">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card radius-15">
						<div class="row no-gutters">
							<div class="col-lg-6">
								<?php echo e(Form::open(array('url' => 'login-auth' , 'id' => 'login' , 'autocomplete' => 'off'))); ?>

									<div class="card-body p-md-5">
										<div class="text-center">
											<img src="public/assets/images/logo-icon.png" width="80%" alt="">
											<!-- <h3 class="mt-4 font-weight-bold">Gold Store</h3> -->
										</div>
										<span class="error-msg"></span>
										<div class="form-group mt-4">
											<label>Email Address</label>
											<input type="text" class="form-control" name="loginemail" placeholder="Enter your email address" value="<?php echo e(Cookie::get('username')); ?>" />
										</div>
										<!--<div class="form-group">
											<label>Password</label>
											<input type="password" class="form-control" name="loginpassword" placeholder="Enter your password" value="<?php echo e(Cookie::get('password')); ?>" />
										</div>-->
										<div class="form-group">
											<label>Password</label>
											<div class="input-group" id="show_hide_password">
												<input class="form-control border-right-0" type="password" value="<?php echo e(Cookie::get('password')); ?>" placeholder="Enter your password" name="loginpassword">
												<div class="input-group-append">	
													<a href="javascript:;" class="input-group-text bg-transparent border-left-0">
														<i class='bx bx-hide'></i>
													</a>
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col">
												<div class="custom-control custom-switch">
													<input type="checkbox" name="remember_me" class="custom-control-input" id="customSwitch1">
													<label class="custom-control-label" for="customSwitch1">Remember Me</label>
												</div>
											</div>
											<!--<div class="form-group col text-right"> 
												<a href="authentication-forgot-password.html">
													<i class='bx bxs-key mr-2'></i>Forget Password?
												</a>
											</div>-->
										</div>
										<div class="btn-group mt-3 w-100">
											<button type="submit" class="btn btn-primary btn-block">Log In</button>
											<button type="button" class="btn btn-primary"><i class="lni lni-arrow-right"></i>
											</button>
										</div>
									</div>
								<?php echo e(Form::close()); ?>

								
							</div>
							<div class="col-lg-6">
								<img src="public/assets/images/login-images/login-frent-img.jpg" class="card-img login-img" alt="...">
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->

	<?php echo Html::script('public/assets/js/jquery.min.js'); ?>

	<?php echo Html::script('public/assets/js/pace.min.js'); ?>

	<?php echo Html::script('public/assets/js/validate.js'); ?>

	<?php echo Html::script('public/assets/plugins/notifications/js/lobibox.min.js'); ?>

	<?php echo Html::script('public/assets/plugins/notifications/js/notifications.min.js'); ?>

	<?php echo Html::script('public/assets/pages-js/Login.js'); ?>

	<?php echo Html::script('public/assets/pages-js/Common.js'); ?>

	<script>
		LoginJs.Login();
	</script>
</body>

</html><?php /**PATH C:\xampp\htdocs\goldstore\resources\views/login.blade.php ENDPATH**/ ?>