<!DOCTYPE html>
<html>
<head>
	<title>Resistration From</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  	<script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
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
		<form method="post" action="controller/LoginCtrl.php">
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
						<input type="text" name="u_name" class="form-control" id="u_name" placeholder="Username" required="">
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
						<input type="password" name="psw" class="form-control" id="psw" placeholder="Password" required="">
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
</body>
</html>