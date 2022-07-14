<!DOCTYPE html>
<html>
<head>
	<title>Resistration From</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 form-section">
				<h2><center>Login Form</center></h2>
			</div>
		</div>
		<form method="post" action="controller/LoginCtrl.php" id="login" autocomplete="false">
			<div class="row">
				<div class=" col-md-3 r">
					<label for="u_name"><strong>Username</strong></label>
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
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>
	<script>
		$("#login").validate({
		rules: {
			u_name:{
				required: true,
				minlength: 4
			},
			psw:{
				required: true,
				minlength: 6,
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
					console.log(data.key);
					if(data.key == 'S'){
						toastr.success(data.msg);
						setTimeout(function(){ 
							window.location.href = "./profile.php?student_id="+data.stidentid; 
						}, 3000);
						
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