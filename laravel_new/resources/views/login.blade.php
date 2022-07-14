<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>LOGIN</title>
	<link rel="stylesheet" href="public/assets/css-cdn/bootstrap.min.css">
    <link href="public/assets/css-cdn/font-awesome.min.css">
    <link rel="stylesheet" href="public/assets/css-cdn/toastr.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="public/assets/css/style.css">
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
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<a class="navbar-brand" href="registration">Resistration</a>
		<a class="navbar-brand" href="login">Login</a>
		<a class="navbar-brand" href="dashboard">Dashboard</a>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
                    {{ Form::open(array('id'=> 'login_form')) }}
						<h1>Login</h1>
						<p class="text-muted"> Please enter your Username and password!</p> 
						<input type="text" name="u_name" class="form-control" id="u_name" placeholder="Email Id or Mobile No.">
						<input type="password" name="psw" class="form-control" id="psw" placeholder="Password">
						<button type="submit" class="btn btn-primary">LOGIN</button><br/><br/>
						<a href="registration">New User: Resistration</a>
				    {{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
	<script src="public/assets/js-cdn/jquery.min.js"></script>
  	<script src="public/assets/js-cdn/bootstrap.min.js"></script>
	<script src="public/assets/js-cdn/jquery.validate.min.js"></script>
	<script src="public/assets/js-cdn/toastr.min.js"></script>
	<script>
		var baseUrl = "{{url('/')}}";
		$("#login_form").validate({
		rules: {
			u_name:{
				required: true,
				minlength: 10
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
			var data = $("#login_form").serialize();
			$.ajax({
				url: baseUrl+"/user-login",
				type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				dataType: 'json',
				data: data,
				success: function(data){
					if(data.length == 1){
						toastr.success('Login Successfull');
						setTimeout(function(){ 
							window.location.href = baseUrl+"/user-dashboard"; 
						}, 2000);
					}else{
						toastr.error('Email id or Mobile no. or Password does not match');
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