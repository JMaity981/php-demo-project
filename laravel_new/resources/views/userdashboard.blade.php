@php
    $u_id = Session::get('name');
    echo 'Hi '.$u_id;
@endphp
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
		<a class="navbar-brand" href="log-out">Log Out</a>
	</nav>
	<div class="container">
		<div class="card">
			{{ Form::open(array('id'=> 'photo_upload_form', 'enctype'=> 'multipart/form-data')) }}
				<label for="photo" class="bmd-label-floating"><strong>Upload Picture:</strong></label>
				<input type="file" class="form-control" name="photo[]" id="photo" max_file_uploads="10" multiple>
				<button type="submit" class="btn btn-primary pull-right">Upload</button>
			{{ Form::close() }}
		</div>
	</div>
	<script src="public/assets/js-cdn/jquery.min.js"></script>
  	<script src="public/assets/js-cdn/bootstrap.min.js"></script>
	<script src="public/assets/js-cdn/jquery.validate.min.js"></script>
	<script src="public/assets/js-cdn/toastr.min.js"></script>
	<script>
		var baseUrl = "{{url('/')}}";
		$("#photo_upload_form").validate({
            rules:{
                photo:{
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
                var data = new FormData($(form)[0]);//file upload
				// console.log(data);
				$.ajax({
					url: baseUrl+"/photo-upload",
					dataType: 'json',
					type: "POST",
					data: data,
                    cache: false,//only file upload
					contentType: false,//only file upload
					processData: false,//only file upload
					success: function(data){
						console.log(data);
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