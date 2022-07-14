<?php
	require_once('db/connection.php');
    if(!isset($_SESSION['a_id'])){
		header('Location: ./admin.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Resistration</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" />
  	<link rel="stylesheet" href="css/style.css">
</head>
<body> 
    
	<div class="container">
		<a href="controller/Admin_logoutCtrl.php" class="btn btn-warning">Log Out</a>
    	<!-- <button class="btn btn-warning" id="log_out">Log Out</button> -->
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 form-section">
				<h2><center>Student Registration</center></h2>
			</div>
		</div>
		<form method="POST" id="registration" enctype="multipart/form-data">
			<div class="row">
				<div class=" col-md-3 r">
					<label for="name"><strong>Name:</strong></label>
				</div>
				<div class="col-md-6">
					<div class="input-group mb-3">
						<input type="text" name="name" class="form-control" id="name" placeholder="Enter the Name">
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class=" col-md-3 r">
					<label for="class"><strong>Class:</strong></label>
				</div>
				<div class="col-md-6">
					<div class="input-group mb-3">
                        <?php
							$qry = mysqli_query($conn,"SELECT * FROM class");
						?>
						<select name="class_id" class="form-control">
                            <option value="" disabled selected>Choose Class</option>
                            <?php
                                while ($data = mysqli_fetch_assoc($qry)) {
                            ?>
                                <option value="<?php echo $data['id'];?>"><?php echo $data['class'];?></option>
                            <?php
                                }
                            ?>
                        </select>
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class=" col-md-3 r">
					<label for="roll_no"><strong>Roll No.:</strong></label>
				</div>
				<div class="col-md-6">
					<div class="input-group mb-3">
					    <input type="number" name="roll_no" class="form-control" id="roll_no" placeholder="Enter the Roll No.">
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class=" col-md-3 r">
					<label for="user_id"><strong>User Id:</strong></label>
				</div>
				<div class="col-md-6">
					<div class="input-group mb-3">
						<input type="text" name="user_id" class="form-control" id="user_id" placeholder="Enter the User Id">
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class=" col-md-3 r">
					<label for="password"><strong>Password:</strong></label>
				</div>
				<div class="col-md-6">
                    <div class="input-group mb-3">
					    <input type="text" name="password" class="form-control" id="password" placeholder="Enter the Password">
                    </div>
				</div>
				<div class="col-md-3"></div>
                <div class="col-md-8"></div>
                <div class="col_md_1">
				    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </div>
                <div class="col-md-3"></div>
            </div>
		</form>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>
	<script>
		$("#registration").validate({
			rules: {
				name: {
					required: true
				},
				class: {
					required: true
				},
				roll_no:{
					required: true,
					digits: true
				},
				user_id:{
					required: true,
					minlength: 3
				},
				password:{
					required: true,
					minlength: 3
				}
			},

			highlight:function(element,errorClass){
				$(element).parent().addClass('has-error');
				$(element).addClass('has-error');
			},
			unhighlight:function(element,errorClass,validClass){
				$(element).parent().removeClass('has-error');
				$(element).removeClass('has-error');
			},
			submitHandler: function (form){
				var data = $('form').serialize();//no file in the form
				//var data = new FormData($(form)[0]);//only file upload
				//var action = $("#registration").attr('action');
				console.log(data);
				$.ajax({
					url: "./controller/RegistrationCtrl.php" ,
					dataType: 'json',
					type: "POST",
					data: data,
					success: function(data){
						console.log(data);
						if(data.key == 'S'){
							toastr.success(data.msg);
							//$('#registration')[0].reset();
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
						// console.log(error);
					},
				});
			},
		});
		//logout
        // $('#log_out').on('click',function(){
        //     $.ajax({
        //         url: 'controller/logoutCtrl.php',
        //         type: "GET",
        //         dataType: 'json',
        //         success:function(data){
        //             console.log(data);
        //             if(data.key == 'S'){
        //                 toastr.success(data.msg);
        //                 setTimeout(function(){ 
        //                     window.location.href = "./admin.php"; 
        //                 }, 3000);
        //             }
        //         },
        //         error: function(error){
        //             console.log(error.responseText); 
        //         },
        //     });
        // });
	</script>	
</body>
</html>