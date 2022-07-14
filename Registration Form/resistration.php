<?php
	require_once('db/connection.php');
?>
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
	<?php
		if(isset($_GET['student_id'])){
			$fk_student_id = $_GET['student_id'];
			$qry = "SELECT * FROM student_details WHERE id= '".$_GET['student_id']."'";
			$data = mysqli_query($conn, $qry);
			$data2 = mysqli_fetch_assoc($data);
			$f_name = $data2['first_name'];
			$l_name = $data2['last_name'];
			$deparment = $data2['deparment'];
			$email = $data2['email'];
			$phone = $data2['phone_no'];
			$qry2= "SELECT * FROM login WHERE fk_student_id= '".$_GET['student_id']."'";
			$data3 = mysqli_query($conn, $qry2);
			$data4 = mysqli_fetch_assoc($data3);
			$u_name = $data4['user_name'];
			$password = $data4['password'];
		}else{
			$fk_student_id = '';
			$f_name = '';
			$l_name = '';
			$deparment = '';
			$email = '';
			$phone = '';
			$u_name = '';
			$password = '';
		}
        
    ?>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 form-section">
				<h2><center>Registration Form</center></h2>
			</div>
		</div>
		<form method="get" action="controller/RegistrationCtrl.php">
			<input type="hidden" name="h_id" value="<?=$fk_student_id;?>">
			<div class="row">
				<div class=" col-md-3 r">
					<label for="f_name"><strong>First Name</strong></label>
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
						<input type="text" name="f_name" class="form-control" id="f_name" placeholder="First Name" required="" value="<?=$f_name?>">
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class=" col-md-3 r">
					<label for="l_name"><strong>Last Name</strong></label>
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
						<input type="text" name="l_name" class="form-control" id="l_name" placeholder="Last Name" value="<?=$l_name?>" required="">
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class=" col-md-3 r">
					<label for="depar"><strong>Department/Office</strong></label>
				</div>
				<div class="col-md-6">
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text">
    							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
  									<path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
								</svg>
    						</span>
  						</div>
  						<select class="custom-select" id="depar" name="depar" required="">
  							<option value="" disabled>Select your Department/Office</option>
  							<option value="php" <?php $deparment == 'php' ? 'selected': '';?>>Php Developer</option>	
  							<option value="python" <?php $deparment == 'python' ? 'selected': '';?>>Python Developer</option>
  							<option value="android"<?php $deparment == 'android' ? 'selected': '';?>>Android Developer</option>
  						</select>
					</div>
				</div>
				<div class="col-md-3"></div>
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
						<input type="text" name="u_name" class="form-control" id="u_name" placeholder="Username" value="<?=$u_name?>" required="">
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
						<input type="password" name="psw" class="form-control" id="psw" placeholder="Password" value="<?=$password?>" required="">
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class=" col-md-3 r">
					<label for="c_psw"><strong>Confirm Password</strong></label>
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
						<input type="password" name="c_psw" class="form-control" id="c_psw" value="<?=$password?>" placeholder="Confirm Password" required="">
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class=" col-md-3 r">
					<label for="email"><strong>E-Mail</strong></label>
				</div>
				<div class="col-md-6">
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text">
    							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
  									<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
								</svg>
    						</span>
  						</div>
						<input type="email" name="email" class="form-control" id="email" placeholder="E-Mail Address" value="<?=$email?>" required="">
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class=" col-md-3 r">
					<label for="c_no"><strong>Contact No.</strong></label>
				</div>
				<div class="col-md-6">
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
    						<span class="input-group-text">
    							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
  									<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
								</svg>
    						</span>
  						</div>
						<input type="number" name="c_no" class="form-control" id="c_no" placeholder="(639)" value="<?=$phone?>" required="">
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class="col-md-5"></div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-warning">
						SUBMIT 
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
  							<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
						</svg>
					</button>
				</div>
				<div class="col-md-5"></div>
				<div class="col-md-5"></div>
				<div class="col-md-2">
					<a class="btn btn-primary form" href="login.php">
						LOGIN
					</a>
				</div>
				<div class="col-md-5"></div>
			</div>
		</form>
	</div>	
</body>
</html>