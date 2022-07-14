<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Dashboard</title>
    <link rel="stylesheet" href="public/assets/css-cdn/bootstrap.min.css">
    <link href="public/assets/css-cdn/font-awesome.min.css">
    <link rel="stylesheet" href="public/assets/css-cdn/toastr.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="public/assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<a class="navbar-brand" href="registration">Resistration</a>
		<a class="navbar-brand" href="login">Login</a>
		<a class="navbar-brand" href="dashboard">Dashboard</a>
	</nav>
    <h1><u><center>User Details</center></u><h1></h1>
    <table style="width: 100%;" class="table table-dark table-striped">
        <tr>
            <th>Srl. No.</th>
            <th>NAME</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Address</th>
            <th>Pin Code</th>
            <th>profile Picture
            <th>Email</th>
            <th>Mobile no.</th>
            <th>Resistration Time</th>
            <th>Action</th>
        </tr>

        @foreach($data as $key=> $register_data)
        <tr>
            <td>{{$key}}</td>
            <td>{{$register_data['first_name']}} {{$register_data['middle_name']}} {{$register_data['last_name']}}</td>
            <td>{{$register_data['gender']}}</td>
            <td>{{$register_data['dob']}}</td>
            <td>{{$register_data['address']}}</td>
            <td>{{$register_data['pin_code']}}</td>
            <td>
                <img src="public/uploads/{{$register_data['picture_name']}}" style="height: 70px">
            </td>
            <td>{{$register_data['email']}}</td>
            <td>{{$register_data['mobile']}}</td>
            <td>{{$register_data['date_time']}}</td>
            <td>
                <button class="edit btn btn-warning" data-id="{{$register_data['id']}}">Edit</button>
                <button class="delete btn btn-danger" data-id="{{$register_data['id']}}">Delete</button>
            </td>
        </tr>
        @endforeach
    </table>
    <!-- MODAL Start -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update From</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('class'=> 'update_form', 'enctype'=> 'multipart/form-data')) }}
                    <input type="hidden" name="h_id" class="h_id">
                    <input type="hidden" name="h_photo" class="h_photo">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="fname">First Name:</label>
								<input type="text" class="form-control fname" name="fname" placeholder="Enter Your First Name">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="mname">Middle Name:</label>
								<input type="text" class="form-control mname" name="mname" placeholder="Enter Your Middle Name">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="lname">Last Name:</label>
								<input type="text" class="form-control lname" name="lname" placeholder="Enter Your Last Name">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="gender">Gender:</label>
								<select name="gender"  class="form-control gender">
									<option value="" disabled>Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Other">Other</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="dob">Date-of-birth (mm/dd/yyyy):</label>
								<input type="date" class="form-control dob" name="dob">
							</div>
						</div>
					</div>		
					<div class="form-group">
						<label for = "address">Address:</label>
						<textarea name="address" placeholder="Eneter Your Address" class="form-control address" rows="5" cols="12"></textarea>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="pcode">Pin-code:</label>
								<input type="number" class="form-control pcode" name="pcode" placeholder="Enter Your Pin-code" maxlength="6">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="pcode">Profile Picture:</label>
								<input type="file" name="profile_picture" class="form-control profile_picture">
							</div>
						</div>
					</div>
                    <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">Email Id:</label>
								<input type="email" class="form-control email" name="email" placeholder="Enter Your Email Id">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="mobile">Mobile No.:</label>
								<input type="number" class="form-control mobile" name="mobile" placeholder="Enter Your Mobile No." oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10">
							</div>
						</div>
					</div>		
                    <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="psw">Password:</label>
								<input type="password" class="form-control psw" name="psw" placeholder="Enter Your Password">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="c_psw">Confirm Password:</label>
								<input type="password" class="form-control c_psw" name="c_psw" placeholder="Enter Your Confirm Password">
							</div>
						</div>
					</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
				    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL Closes -->
    <script src="public/assets/js-cdn/jquery.min.js"></script>
  	<script src="public/assets/js-cdn/bootstrap.min.js"></script>
	<script src="public/assets/js-cdn/jquery.validate.min.js"></script>
	<script src="public/assets/js-cdn/toastr.min.js"></script>
    <script>
		var baseUrl = "{{url('/')}}";
        //Data Delete
        $(".delete").on('click', function(){
            var this_button = $(this); 
            var id = $(this).data('id');
            //  console.log(id);
            $.ajax({
                type: "POST",
                url: baseUrl+"/value-delete",
                data: {
                    u_id: id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response.key == 'S') {
						toastr.success(response.msg);
                        this_button.closest("tr").remove();
                        // setTimeout(function() {
                        //     location.reload();
                        // }, 3000);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(error) {
                    console.log(error.responseText);
                },
            });
        });
        //Modal value set
        $(".edit").on('click', function() {
            $('#exampleModal').modal('show');
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: baseUrl+"/value-select",
                data: {
                    u_id: id
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response[0]);
                    $(".h_id").val(response[0].id);
                    $(".h_photo").val(response[0].picture_name);
                    $(".fname").val(response[0].first_name);
                    $(".mname").val(response[0].middle_name);
                    $(".lname").val(response[0].last_name);
                    $(".gender").val(response[0].gender);
                    $(".dob").val(response[0].dob);
                    $(".address").val(response[0].address);
                    $(".pcode").val(response[0].pin_code);
                    $(".email").val(response[0].email);
                    $(".mobile").val(response[0].mobile);
                    $(".psw").val(response[0].password);
                    $(".c_psw").val(response[0].password);
                },    
                error: function(error) {
                    console.log(error.responseText);
                },
            });
        });
        $(".update_form").validate({
            rules:{
                fname:{
                    required:true
                },
				lname:{
                    required:true
                },
				gender:{
                    required:true
                },
				dob:{
                    required:true
                },
				pcode:{
					required: true,
					digits: true,
					minlength: 6,
					maxlength: 6
				},
				mobile:{
					required: true,
					digits: true,
					minlength: 10
				},
				psw:{
					required: true,
					minlength: 3
				},
				c_psw:{
					required: true,
					equalTo: ".psw"
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
				// var data = $(form).serialize();
				// console.log(data);
				$.ajax({
					url: baseUrl+"/value-update",
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