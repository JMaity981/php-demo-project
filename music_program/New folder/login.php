<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
  	<style type="text/css">
  		.error{
  			color:red;
  		}
  	</style>
</head>
<body>
	<h1 style="text-align: center;">LOGIN</h1>
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<legend></legend>
				<form id="MyForm" method="POST" action="login_action.php">
					<label for="mobile">Mobile No.:</label>
					<input type="number" class="form-control" name="mobile" placeholder="Enter Your Mobile No.">
					<br>
					<label for="password">Password:</label>
					<input type="password" class="form-control" name="password" placeholder="Enter Your Password">
					<br>
					<input type="submit" value="Login" name="login" class="form-control btn btn-primary">
				</form>
				<a href="forgot_password.php"><h5 style="text-align: right;">Forgot Password</h5></a>
				<h3 style="text-align: center;">NEW USER</h3>
				<legend></legend>
				<a href="sign_up.php">
					<button class="form-control btn btn-warning">Sign UP</button>
				</a>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="js/lib/jquery.js"></script>
  	<script src="js/dist/jquery.validate.js"></script>
  	<script>
		$().ready(function() {
			$("#MyForm").validate({
				rules: {
					mobile: {
						required: true,
						minlength: 10,
						maxlength: 10
					},
					password: {
						required: true,
						minlength: 8
					}
				},
				messages: {
					mobile:  {
						required: "please enter a mobile no.",
						minlength: "please enter the correct mobile no",
						maxlength: "please enter the correct mobile no"
					},
					password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 8 characters long"
					}
				}
			});
		});
	</script>


</body>
</html>