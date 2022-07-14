<?php
	require_once('./db/connection.php');
    if(!isset($_SESSION['id'])){
		header('Location: ./login.php');
	}
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
    <link rel="stylesheet" href="assets/css-cdn/bootstrap.min.css">
    <link href="assets/css-cdn/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css-cdn/toastr.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title>
        Photo Upload
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
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
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Create Folder</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" id="create_folder">
                                        <label for="folder"><strong>Folder Name:</strong></label>
			                            <input type="text" name="folder" class="form-control" id="folder">
                                        <button type="submit" class="btn btn-outline-primary pull-right create" data-original-title="Create Folder" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Photo Upload</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" id="photo_upload" enctype="multipart/form-data">
                                        <label for="folder_id"><strong>Select Folder:</strong></label>
                                        <select name="folder_id" class="form-control" id="folder_id">
                                            <option value="" disabled selected>Choose the Folder</option>
                                            <?php
                                                $qry = mysqli_query($conn,"SELECT * FROM folder WHERE fk_user_id = '".$_SESSION['id']."'");
                                                while ($data = mysqli_fetch_assoc($qry)) {
                                            ?>
                                                <option value="<?=$data['id']?>"><?=$data['folder_name']?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <label for="photo" class="bmd-label-floating"><strong>Upload Picture:</strong></label>
                                        <input type="file" class="form-control" name="photo[]" id="photo" max_file_uploads="5" multiple>
                                        <button type="submit" class="btn btn-outline-success pull-right upload" data-toggle="tooltip" data-placement="bottom" data-original-title="Upload"><i class="fa fa-cloud-upload" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
            <!--========== Footer & core js Start =========-->
            <?php include('./common/footer.php');?>
            <!-- =========== Footer & core js End =======-->
        </div>
    </div>
    <script src="assets/js-cdn/jquery.min.js"></script>
  	<script src="assets/js-cdn/bootstrap.min.js"></script>
	<script src="assets/js-cdn/jquery.validate.min.js"></script>
	<script src="assets/js-cdn/toastr.min.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });

        $('.nav-item').removeClass('active');
        $('.photoupload-li').addClass('active');
        $("#create_folder").validate({
            rules:{
                folder:{
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
				var data = $('form').serialize();
				console.log(data);
				$.ajax({
					url: "./controller/FolderCreateCtrl.php",
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
        $("#photo_upload").validate({
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
					url: "./controller/PhotoUploadCtrl.php",
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
