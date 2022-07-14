<!DOCTYPE html>
<html>
<head>
	<title>BotChat</title>
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
    <link rel="stylesheet" href="public/assets/css/chat.css">
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
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="card card-bordered">
                        <div class="card-header">
                            <h4 class="card-title"><strong>Chat</strong></h4>
                        </div>
                        <div class="ps-container ps-theme-default ps-active-y" id="chat-content" style="overflow-y: scroll !important; height:400px !important;">
                            {{-- <div class="media media-chat"> <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                                <div class="media-body">
                                    <p>Okay i will meet you on Sandon Square </p>
                                </div>
                            </div>
                            <div class="media media-chat media-chat-reverse">
                                <div class="media-body">
                                    <p>Do you have pictures of Matley Marriage?</p>
                                </div>
                            </div> --}}
                        </div>
                        <div class="publisher bt-1 border-light"> <img class="avatar avatar-xs" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                            {{ Form::open(array('id'=> 'chat_form')) }}
                                <input type="hidden" name="h_input" id="h_input">
                                <input type="hidden" name="h_id" id="h_id">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <input type="text" class="form-control value_reset" name="chat" placeholder="Type a message">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="submit" value="send" name="submit" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="container">
		<legend></legend>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                    <div>

                    </div>
                </div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>

    {{-- ACCOUNT BALANCE VIEW MODAL START --}}
    {{-- <div class="modal fade balanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
    </div> --}}
    {{-- ACCOUNT BALANCE VIEW MODAL CLOSE --}}

    {{--Transection Table MODAL START--}}
    {{-- <div class="modal fade transectionModal" tabindex="-1" role="dialog" aria-hidden="true">
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
    </div> --}}
    {{--Transection Table MODAL CLOSE --}}
	<script src="public/assets/js-cdn/jquery.min.js"></script>
	<script src="public/assets/js-cdn/bootstrap.min.js"></script>
	<script src="public/assets/js-cdn/jquery.validate.min.js"></script>
	<script src="public/assets/js-cdn/toastr.min.js"></script>
	<script src="public/assets/js-cdn/select2.min.js"></script>
	<script>
		var baseUrl = "{{url('/')}}";

		$("#chat_form").validate({
            submitHandler: function (form){
				var data = $(form).serialize();
				// console.log(data);
				$.ajax({
					url: baseUrl+"/chat-reply",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
					dataType: 'json',
					type: "POST",
					data: data,
					success: function(data){
                        $(".value_reset").val('');
						console.log(data);
                        $("#h_input").val(data.h_input);
                        $("#h_id").val(data.h_id);

                        var chatHtml = `<div class="media media-chat">
                                                                    <div class="media-body">
                                                                        <p>${data.qst}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="media media-chat media-chat-reverse">
                                                                    <div class="media-body">
                                                                        <p>${data.reply}</p>
                                                                    </div>
                                                                </div>`;

                        if($('.media-chat').length > 0){
                            $(".media-chat:last-child").after(chatHtml);
                        }
                        else{
                            $('#chat-content').html(chatHtml);
                        }

                        $('#chat-content').animate({
                            scrollTop: $('#chat-content .media-chat:last-child').position().top
                        }, 'slow');

                        /*<div class="media media-chat"> <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                                <div class="media-body">
                                    <p>Okay i will meet you on Sandon Square </p>
                                </div>*/
						// if(data.key == 'B'){
                        //     $('.balanceModal').modal('show');
                        //     h2 = '<h2 class="modal-title" id="exampleModalLabel">Account Balance= <p class="blue">'+data.a_balance+'/-</p></h2>';
                        //     $('.a_bal').html(h2);
						// }else if(data.key== 'T'){
                        //     $('.transectionModal').modal('show');
                        //     var tbody = '';
                        //     $.each(data.t_data, function( index, value ) {
                        //         if(value.debit == null){
                        //             var debit = ' ';
                        //         }else{
                        //             var debit = value.debit;
                        //         }
                        //         if(value.credit == null){
                        //             var credit = ' ';
                        //         }else{
                        //             var credit = value.credit;
                        //         }
                        //         tbody += '<tr><td>'+value.date_time+'</td><td>'+value.description+'</td><td class="red">'+debit+'</td><td class="green">'+credit+'</td><td class="blue">'+value.balance+'</td></tr>';
                        //         console.log(value);
                        //     });
                        //     $('.transection_tbody').html(tbody);
                        // }else if(data.key== 'E'){
						// 	toastr.error(data.msg);
						// }
						// else{
						// 	toastr.error('error');
						// }
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