<?php
	include("../config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
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
	<h1 style="text-align: center;">ADMIN LOGIN</h1>
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<legend></legend>
				<form id="MyForm" method="POST" action="admin_login_action.php">
					<label for="email">Email Id:</label>
					<input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email Id">
					<br>
					<label for="password">Password:</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password">
					<br>
					<input type="submit" value="Login" name="login"  class="form-control btn btn-primary">
				</form>
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
					email: "required",
					password: "required"
				},
				messages: {
					email: "please enter your correct email id",	
					password: "Please provide your password"
				}
			});
		});
	</script>
</body>
</html>