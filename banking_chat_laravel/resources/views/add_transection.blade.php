<!DOCTYPE html>
<html>
<head>
	<title>Add Transection</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<link href="public/assets/css-cdn/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="public/assets/css-cdn/font-awesome.min.css">
    <link rel="stylesheet" href="public/assets/css-cdn/toastr.min.css"/>
    <link rel="stylesheet" href="public/assets/css-cdn/select2.min.css"/>
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
		<u>Add Transection</u>
	</h1>
	<div class="container">
		<legend></legend>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				{{ Form::open(array('id'=> 'add_transection_form')) }}
                    <div class="form-group">
                        <label for="customer_id">Account No.:</label>
                        <select name="customer_id" class="form-control js-example-basic-multiple" onChange="accountChange(this.value)">
                            <option value="" disabled selected>Enter Account Number</option>
                            @foreach($data as $key=> $customer_data)
                                <option value="{{ $customer_data['id'] }}">{{ $customer_data['account_no'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Customer Name:</label>
                        <input type="text" class="form-control" name="name" id="name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="entry_type">Entry Type (Credit/Debit):</label>
                        <select name="entry_type" class="form-control">
                            <option value="" disabled selected>Choose Entry Type</option>
                            <option value="C">CREDIT</option>
                            <option value="D">DEBIT</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" name="description" placeholder="Description this transection">
                    </div>
					<div class="form-group">
                        <label for="ammount">Amount:</label>
                        <input type="number" class="form-control" name="ammount" placeholder="Enter the Amount">
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
	<script src="public/assets/js-cdn/select2.min.js"></script>
	<script>
		var baseUrl = "{{url('/')}}";

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

        function accountChange(customer_id){
            // console.log(customer_id);
			$.ajax({
				url: baseUrl+"/get-name-data",
				type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				data:{customer_id:customer_id},
                dataType: 'json',
				success: function(res){
                    // console.log(res);
                    $("#name").val(res[0]);
				}
			});
		};

		$("#add_transection_form").validate({
            rules:{
                customer_id:{
                    required:true
                },
				entry_type:{
                    required:true
                },
				ammount:{
					required:true,
					digits: true
				},
				description:{
					required:true
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
					url: baseUrl+"/transection-insert",
					dataType: 'json',
					type: "POST",
					data: data,
					success: function(data){
						// console.log(data);
						if(data.key == 'S'){
							toastr.success(data.msg);
							setTimeout(function(){ 
								location.reload(); 
							}, 3000);
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