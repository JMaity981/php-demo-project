<!DOCTYPE html>
<html>
<head>
	<title>Add Customer</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="public/assets/css-cdn/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="public/assets/css-cdn/font-awesome.min.css">
    <link rel="stylesheet" href="public/assets/css-cdn/toastr.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="public/assets/css/style.css">
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<a class="navbar-brand" href="add-customer-view">Add Customer</a>
		<a class="navbar-brand" href="add-transection-view">Add Transection</a>
		<a class="navbar-brand" href="bot-chat-view">Bot Chat</a>
		<a class="navbar-brand" href="chat-view">Chat</a>
	</nav>
	<h1 style="text-align: center;">
		<u>Add Customer</u>
	</h1>
	<div class="container">
		<legend></legend>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				{{ Form::open(array('id'=> 'add_customer_form')) }}
                    <div class="form-group">
                        <label for="name">Customer Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Customer Name">
                    </div>
                    <div class="form-group">
                        <label for="a_no">Account No.:</label>
                        <input type="number" class="form-control" name="a_no" placeholder="Enter Account No.">
                    </div>
                    <div class="form-group">
                        <label for="pan">Pan No.:</label>
                        <input type="text" class="form-control" name="pan" placeholder="Enter Pan number">
                    </div>
                    <div class="form-group">
                        <label for="dob">Date-of-birth (mm/dd/yyyy):</label>
                        <input type="date" class="form-control" name="dob">
                    </div>
                    <div class="form-group">
                        <label for="ammount">Strating Deposit Amount:</label>
                        <input type="number" class="form-control" name="ammount" placeholder="Enter Starting Deposit Amount">
                    </div>
					<input type="submit" value="Submit" name="submit" class="btn btn-primary">
					<input type="reset" value="Reset" name="Reset" class="btn btn-secondary">
				{{ Form::close() }}
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
	<script src="public/assets/js-cdn/jquery.min.js"></script>
	<script src="public/assets/js-cdn/bootstrap.min.js"></script>
	<script src="public/assets/js-cdn/jquery.validate.min.js"></script>
	<script src="public/assets/js-cdn/toastr.min.js"></script>
	<script>
		var baseUrl = "{{url('/')}}";
		$("#add_customer_form").validate({
            rules:{
                name:{
                    required:true
                },
				a_no:{
                    required:true,
                    digits:true,
                    minlength: 10,
					maxlength: 10
                },
				pan:{
                    required:true,
                    minlength: 10,
					maxlength: 10
                },
				dob:{
                    required:true
                },
				ammount:{
					required:true,
					digits: true
				}
            },
            highlight:function(element,errorClass){
				$(element).parent().addClass('error');
				$(element).addClass('error');
			},
			unhighlight:function(element,errorClass,validClass){
				$(element).parent().removeClass('error');
				$(element).removeClass('error');
			},
            submitHandler: function (form){
				var data = $(form).serialize();
				console.log(data);
				$.ajax({
					url: baseUrl+"/customer-details-insert",
					dataType: 'json',
					type: "POST",
					data: data,
					success: function(data){
						// console.log(data);
						if(data.key == 'S'){
							toastr.success(data.msg);
							setTimeout(function(){ 
								location.reload(); 
							}, 1500);
						}else if(data.key== 'E'){
							toastr.error(data.msg);
						}
						else{
							toastr.error('error');
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