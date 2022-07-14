<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
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
				<h2><center>Student Login</center></h2>
			</div>
		</div>
		<form method="post" action="controller/Student_loginCtrl.php" id="s_login">
			<div class="row">
				<div class=" col-md-4 r">
					<label for="u_name"><strong>Username</strong></label>
				</div>
				<div class="col-md-4">
					<div class="input-group mb-3">
						<input type="text" name="u_name" class="form-control" id="u_name" placeholder="Username">
					</div>
				</div>
				<div class="col-md-4"></div>
				<div class=" col-md-4 r">
					<label for="psw"><strong>Password</strong></label>
				</div>
				<div class="col-md-4">
					<div class="input-group mb-3">
						<input type="password" name="psw" class="form-control" id="psw" placeholder="Password">
					</div>
				</div>
                <div class="col-md-4"></div>
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
		$("#s_login").validate({
		submitHandler: function (form){
			var data = $("#s_login").serialize();
			var action = $("#s_login").attr('action');
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
							window.location.href = "./student_dashboard.php?student_id="+data.student_id; 
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