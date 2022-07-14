<?php
	require_once('db/connection.php');
	if(isset($_SESSION['id'])){
		$u_qry = "UPDATE resistration SET now_login = 'N' WHERE id = '".$_SESSION["id"]."'";
	    $update= mysqli_query($conn, $u_qry);
        unset($_SESSION["id"]);
        unset($_SESSION["name"]);
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LOGIN</title>
	<link rel="stylesheet" href="assets/css-cdn/bootstrap.min.css">
    <link href="assets/css-cdn/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css-cdn/toastr.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  	<link rel="stylesheet" href="assets/css/style.css">
  	<!-- <link rel="stylesheet" href="assets/css/all.css"> -->
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: sans-serif;
			background: linear-gradient(to right, #b92b27, #1565c0)
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<form method="post" action="controller/LoginCtrl.php" id="login" class="box">
						<h1>Login</h1>
						<p class="text-muted"> Please enter your Username and password!</p> 
						<input type="text" name="u_name" class="form-control" id="u_name" placeholder="Username">
						<input type="password" name="psw" class="form-control" id="psw" placeholder="Password">
						<button type="submit" class="btn btn-primary">LOGIN</button><br/><br/>
						<a href="resistration.php">New User: Resistration</a>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 form-section">
				<h2><center>Login Form</center></h2>
			</div>
		</div>
		<form method="post" action="controller/LoginCtrl.php" id="login" autocomplete="false">
			<div class="row">
				<div class=" col-md-3 r">
					<label for="u_name"><strong>User Name:</strong></label>
				</div>
				<div class="col-md-6">
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text">
    							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  									<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
								</svg>
    						</span>
  						</div>
						<input type="text" name="u_name" class="form-control" id="u_name" placeholder="Username">
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class=" col-md-3 r">
					<label for="psw"><strong>Password</strong></label>
				</div>
				<div class="col-md-6">
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
  									<path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
								</svg>
    						</span>
  						</div>
						<input type="password" name="psw" class="form-control" id="psw" placeholder="Password">
					</div>
				</div>
				<div class="col-md-5"></div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-primary">
						LOGIN
					</button>
				</div>
				<div class="col-md-5"></div>
			</div>
		</form>
	</div> -->
	<script src="assets/js-cdn/bootstrap.bundle.min.js"></script>
    <script src="assets/js-cdn/jquery.min.js"></script>
  	<script src="assets/js-cdn/bootstrap.min.js"></script>
	<script src="assets/js-cdn/jquery.validate.min.js"></script>
	<script src="assets/js-cdn/toastr.min.js"></script>
	<script>
		$("#login").validate({
		rules: {
			u_name:{
				required: true,
				minlength: 3
			},
			psw:{
				required: true,
				minlength: 3
			},
		},
		highlight:function(element,errorClass){
			$(element).parent().addClass('has-error');
			$(element).addClass('has-error');
		},
		unhighlight:function(element,errorClass,validClass){
			$(element).parent().removeClass('has-error');
			$(element).removeClass('has-error');
		},
		submitHandler: function (form){
			var data = $("#login").serialize();
			var action = $("#login").attr('action');
			$.ajax({
				url: action,
				type: "POST",
				dataType: 'json',
				data: data,
				success: function(data){
					if(data.key == 'S'){
						toastr.success(data.msg);
						setTimeout(function(){ 
							window.location.href = "index.php"; 
						}, 2000);
						
					}else{
						toastr.error(data.msg);
					}
				},
				error: function(error){
					console.log(error.responseText);
				},
			});
		},
	});
	</script>
</body>
</html>