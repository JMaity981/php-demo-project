<?php
	require_once('db/connection.php');
?>
<!--
=========================================================
 Material Dashboard - v2.1.1
=========================================================

 Product Page: https://www.creative-tim.com/product/material-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/material-dashboard/blob/master/LICENSE.md)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="stylesheet" href="assets/css/style.css">
  <title>
    Material Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <style>
    .form-group input[type=file] {
      opacity: 4 !important;
      position: revert !important;
    }
    .loader {
      position: absolute;
      left: 50%;
      top: 50%;
      z-index: 1;
      width: 120px;
      height: 120px;
      margin: -76px 0 0 -76px;
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid #3498db;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite;
      border-top: 16px solid blue;
      border-bottom: 16px solid blue;
      /* border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid blue;
      border-bottom: 16px solid blue;
      width: 120px;
      height: 120px;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite; */
    }
    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>
</head>

<body class="">
  <div class="wrapper ">
    <!-- ============ Side menu start ==============-->
	
		<?php include('./common/sidebar.php');?>
		
	<!-- =============Side menu end =============-->
    <div class="main-panel">
      <!-- ============= Header start ======== -->
		<?php include('./common/header.php')?>
		<!-- =========== Header end ==============-->
      <!-- End Navbar -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">
          <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Registration Your Profile</h4>
                  <p class="card-category">Complete your profile</p>
                  <p class="card-category"> * Fields are Required</p>
                </div>
                <div class="card-body">
                
                  <form method="POST" action="controller/RegistrationCtrl.php" id="registration" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company (disabled)</label>
                          <input type="text" class="form-control" readonly name="company">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username *</label>
                          <input type="text" class="form-control" name="u_name" id="u_name">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address *</label>
                          <input type="email" class="form-control" name="email" id="email">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fist Name *</label>
                          <input type="text" class="form-control" name="f_name" id="f_name">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name *</label>
                          <input type="text" class="form-control" name="l_name" id="l_name">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Profile Picture </label>
                          <input type="file" class="form-control" name="photo" id="photo" onchange="photo_preview()">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input type="text" class="form-control" name="adress" id="adress">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City *</label>
                          <input type="text" class="form-control" name="city" id="city">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Country *</label>
                          <input type="text" class="form-control" name="country" id="country">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Postal Code *</label>
                          <input type="number" class="form-control" name="p_code" id="p_code">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>About Me</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label>
                            <textarea class="form-control" rows="5" name="about_me" id="about_me"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="loader d-none"></div>
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="" id="frame" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray" id="result"></h6>
                  <h4 class="card-title setfirstname"> <span class="firstname">  </span> <span class="lastname"> </span> </h4>
                  
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                </div>
              </div>
            </div>
				</div>
			</div>
		</div>
      <!--========== Footer & core js Start =========-->
		<?php include('./common/footer.php');?>
	  <!-- =========== Footer & core js End =======-->
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>
  <script>
    $('.nav-item').removeClass('.active');
    $('.dashboard-li').addClass('.active');
    $("#registration").validate({
      rules:{
        u_name: {
          required: true,
          minlength: 4
        },
        email: {
          required: true,
          email: true
        },
        f_name: {
          required: true
        },
        l_name: {
          required: true
        },
        city: {
          required: true
        },
        country: {
          required: true
        },
        p_code: {
          required: true,
          digits: true,
          minlength: 6
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
        var data = new FormData($(form)[0]);
				var action = $("#registration").attr('action');
				$.ajax({
					url: action,
					dataType: 'json',
					type: "POST",
					data: data,
          cache: false,//only file upload
					contentType: false,//only file upload
					processData: false,//only file upload
          //Loader
          beforeSend:function(){
            $(".loader").removeClass("d-none");
					},
					complete:function(){
            $(".loader").addClass("d-none");
					},
					success: function(data){
						console.log(data);
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
					}
				});
      } 
    });
    //Photo Preview
    function photo_preview() {
			frame.src=URL.createObjectURL(event.target.files[0]);
		}
    
    //First Name Priview
    /*const source = document.getElementById('source');
    const result = document.getElementById('result');

    const inputHandler = function(e) {
      result.innerHTML = e.target.value;
    }*/

    /*source.addEventListener('input', inputHandler);
    source.addEventListener('propertychange', inputHandler);*/ // for IE8
    // Firefox/Edge18-/IE9+ don’t fire on <select><option>
    // source.addEventListener('change', inputHandler); 


    $("#l_name").keyup(function(){
      var dInput = $('input:text[name=l_name]').val();
      //alert(dInput);
      $('.lastname').html(dInput);
    });

    $("#f_name").keyup(function(){
      var firstname = $('input:text[name=f_name]').val();
      //alert(dInput);
      $('.firstname').html(firstname);
    });
  </script>
</body>

</html>
