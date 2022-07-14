<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
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
    <style>
        .red{
            
            color: red;
        }
        .green{
            color: green;
        }
        .blue{
            color: blue;
        }
    </style>
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<a class="navbar-brand" href="add-customer-view">Add Customer</a>
		<a class="navbar-brand" href="add-transection-view">Add Transection</a>
		<a class="navbar-brand" href="bot-chat-view">Bot Chat</a>
		<a class="navbar-brand" href="chat-view">Chat</a>
	</nav>
	<h1 style="text-align: center;">
		<u>Chat System</u>
	</h1>
	<div class="container">
		<legend></legend>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				{{ Form::open(array('id'=> 'chat_form')) }}
                    <div class="form-group">
                        <label for="question">Select Your Option:</label>
                        <select name="question" class="form-control">
                            <option value="B">Show Account Balance</option>
                            <option value="T">Show Last 10 Transection</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="a_no">Account No.:</label>
                        <input type="number" class="form-control" name="a_no" id="a_no" placeholder="Enter Acount Number">
                    </div>
                    <div class="form-group">
                        <label for="pan">Pan No.:</label>
                        <input type="text" class="form-control" name="pan" placeholder="Enter Pan number">
                    </div>
                    <div class="form-group">
                        <label for="dob">Date-of-birth (mm/dd/yyyy):</label>
                        <input type="date" class="form-control" name="dob">
                    </div>
                    
					<input type="submit" value="Submit" name="submit" class="btn btn-primary">
					<input type="reset" value="Reset" name="Reset" class="btn btn-secondary">
				{{ Form::close() }}
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>

    {{-- ACCOUNT BALANCE VIEW MODAL START --}}
    <div class="modal fade balanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header a_bal">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- ACCOUNT BALANCE VIEW MODAL CLOSE --}}

    {{--Transection Table MODAL START--}}
    <div class="modal fade transectionModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Last 10 Transection</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped" style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Date & Time</th>
                                <th>Particulars</th>
                                <th>Withdrawl</th>
                                <th>Deposit</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody class="transection_tbody"></tbody>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{--Transection Table MODAL CLOSE--}}
	<script src="public/assets/js-cdn/jquery.min.js"></script>
	<script src="public/assets/js-cdn/bootstrap.min.js"></script>
	<script src="public/assets/js-cdn/jquery.validate.min.js"></script>
	<script src="public/assets/js-cdn/toastr.min.js"></script>
	<script src="public/assets/js-cdn/select2.min.js"></script>
	<script>
		var baseUrl = "{{url('/')}}";

		$("#chat_form").validate({
            rules:{
                question:{
                    required:true
                },
				a_no:{
                    required:true,
                    digits: true,
                    minlength: 10,
					maxlength: 10
                },
				pan:{
                    required: true,
                    minlength: 10,
					maxlength: 10
                },
				dob:{
                    required:true
                },
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
				// console.log(data);
				$.ajax({
					url: baseUrl+"/chat-search",
					dataType: 'json',
					type: "POST",
					data: data,
					success: function(data){
						// console.log(data);
						if(data.key == 'B'){
                            $('.balanceModal').modal('show');
                            h2 = '<h2 class="modal-title" id="exampleModalLabel">Account Balance= <p class="blue">'+data.a_balance+'/-</p></h2>';
                            $('.a_bal').html(h2);
						}else if(data.key== 'T'){
                            $('.transectionModal').modal('show');
                            var tbody = '';
                            $.each(data.t_data, function( index, value ) {
                                if(value.debit == null){
                                    var debit = ' ';
                                }else{
                                    var debit = value.debit;
                                }
                                if(value.credit == null){
                                    var credit = ' ';
                                }else{
                                    var credit = value.credit;
                                }
                                tbody += '<tr><td>'+value.date_time+'</td><td>'+value.description+'</td><td class="red">'+debit+'</td><td class="green">'+credit+'</td><td class="blue">'+value.balance+'</td></tr>';
                                console.log(value);
                            });
                            $('.transection_tbody').html(tbody);
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