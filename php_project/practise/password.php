<!DOCTYPE html>
<head>
  <title>Password strength Validation</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="row">
    <div class="col-sm-6">
		<h2 align="center" >Validation Form</h2>
		<p id="ErrorMsg" style="color:red"></p>
		<form class="form-horizontal" action="" onsubmit="return validateform();">
			<div class="form-group">
				<label class="control-label col-sm-2" for="email">Password:</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="pwd">
				</div>
			</div>
			<div class="form-group">        
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	function validateform(){
        var pwd=$('#pwd').val();
        //alert(pwd);
        //return false;
        if(pwd==""){
        	$('#ErrorMsg').text('Please enter your password!');
        	$('#pwd').css('color','red');
			$('#pwd').focus();
			return false;
        }
        if(pwd.length<8 || pwd.length> 16){
        	$('#ErrorMsg').text('Please enter at least 8 character!');
        	$('#pwd').css('color','red');
			$('#pwd').focus();
			return false;
        }
        if (!pwd.match(/[A-z]/) ) {
		    $('#ErrorMsg').text('Please enter at least 1 alphabet letter');
        	$('#pwd').css('color','red');
			$('#pwd').focus();
			return false;
		}
		if (!pwd.match(/[A-Z]/) ) {
		    $('#ErrorMsg').text('Please enter at least 1 capital letter!');
        	$('#pwd').css('color','red');
			$('#pwd').focus();
			return false;
		}
		if (!pwd.match(/([0-9])/) ) {
		    $('#ErrorMsg').text('Please enter at least 1 number!');
        	$('#pwd').css('color','red');
			$('#pwd').focus();
			return false;
		}
		if (!pwd.match(/([!,%,&,@,#,$,^,*,?,_,~])/)){
			$('#ErrorMsg').text('Please enter at least 1 special character!');
        	$('#pwd').css('color','red');
			$('#pwd').focus();
			return false;
		}else{
			$('#pwd').css('color','green');
			return false;
		}
        
	}
 
</script>
 
</body>
</html>