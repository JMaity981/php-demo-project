<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  	<script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
  	<style type="text/css">
  		.form-section{
  			padding: 150px;
  		}
  		button{
  			margin-top: 20px;
  		}
  	</style>
</head>
<body>
	<form>
		<div class="row form-section">
			<div class="col-md-4">
				<label for="name"><b>Name *</b></label>
				<input type="text" name="name" placeholder="Please enter your name *" class="form-control" required="">
			</div>
			<div class="col-md-4">
				<label for="email"><b>Email *</b></label>
				<input type="email" name="email" placeholder="Please enter Your email *" class="form-control" required="">
			</div>
			<div class="col-md-4">
				<label for="phone"><b>Phone</b></label>
				<input type="number" name="phone" placeholder="Please enter your phone number" class="form-control">
			</div>
			<div class="col-md-12">
				<label for="message"><b>Message *</b></label>
				<textarea name="message" placeholder="Message for me *" rows="5" class="form-control"></textarea>
			</div>
			<div class="col-md-12">
				<button class="btn btn-warning">Send message</button>
			</div>
			<div class="col-md-12 alert-light">
				<p>* Thesese fields are required.</p>
			</div>
		</div>
	</form>
</body>
</html>