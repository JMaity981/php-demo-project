<?php
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Insert</title>
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
	<h1 style="text-align: center;">
		<u>Describe Your Details</u>
	</h1>
	<div class="container">
		<legend></legend>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form  id="MyForm" action="sign_up_action.php" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label for="name">Name:</label>
								<input type="text" class="form-control" name="name" placeholder="Enter Your Name">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="profile_picture">Profile Picture:</label>
								<input type="file" name="profile_picture">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="gender">Gender:</label>
								<select name="gender"  class="form-control">
									<option value="">Select</option>
									<option value="M">Male</option>
									<option value="F">Female</option>
									<option value="O">Others</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="dob">Date-of-birth (mm/dd/yyyy):</label>
								<input type="date" class="form-control" name="dob">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">Email Id:</label>
								<input type="email" class="form-control" name="email" placeholder="Enter Your Email Id">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="mobile">Mobile No.:</label>
								<input type="number" class="form-control" name="mobile" placeholder="Enter Your Mobile No.">
							</div>
						</div>
					</div>				
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label for="address">Address:</label>
								<textarea name="address" placeholder="Eneter Your Address" class="form-control" rows="5" cols="12"></textarea>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="pcode">Pin-code:</label>
								<input type="number" class="form-control" name="pcode" placeholder="Enter Your Pin-code" maxlength="6">
							</div>
						</div>
					</div>
					<div class="form-group">
						<lebel for="password">Password:</lebel>
						<input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
					</div>
					<div class="form-group">
						<lebel for="confirm_password">Confirm Password:</lebel>
						<input type="password" class="form-control" name="confirm_password" placeholder="Enter Your Confirm Password">
					</div>
					<input type="submit" value="Sign Up" name="sign_up" class="btn btn-primary">
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="js/lib/jquery.js"></script>
  	<script src="js/dist/jquery.validate.js"></script>
  	<script>
	$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
		}
	});

	$().ready(function() {
		// validate signup form on keyup and submit
		$("#MyForm").validate({
			rules: {
				name: "required",
				profile_picture: "required",
				gender: "required",
				dob: "required",
				email: {
					required: true,
					email: true
				},
				mobile: {
					required: true,
					minlength: 10,
					maxlength: 10
				},
				address: {
					required:true,
					minlength:10
				},
				pcode: {
					required: true,
					minlength: 6,
					maxlength:6
				},
				password: {
					required: true,
					minlength: 8
				},
				confirm_password: {
					required: true,
					minlength: 8,
					equalTo: "#password"
				},
				
			},
			messages: {
				name: "Please enter your name",
				profile_picture: "Please upload a picture",
				gender: "please enter your Gender",
				dob: "please enter your Date-of-birth",
				email: {
					required: "Please enter a email address",
					email:"Please enter a valid email address"
				},
				mobile:  {
					required: "please enter a mobile no.",
					minlength: "please enter the correct mobile no",
					maxlength: "please enter the correct mobile no"
				},
				address:{
					required: "Please enter your Address",
					minlength: "Please enter your full Address"
				},
				pcode: {
					required :"Please enter your Pin_code",
					minlength: "Please enter your correct Pin_code",
					maxlength: "Please enter your correct Pin_code"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 8 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 8 characters long",
					equalTo: "Please enter the same password as above"
				},
			}
		});
	});
	</script>
</body>
</html>