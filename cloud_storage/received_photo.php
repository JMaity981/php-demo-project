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
    <link rel="stylesheet" href="assets/css-cdn/sweetalert.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title>
        Gallery
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
                    <div class="card" style="background-color:#AABCBF;">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">RECEIVED PHOTO</h4>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <?php
                                        $photo_qry = mysqli_query($conn, "SELECT photo_upload.photo_name, resistration.name FROM ((share_photo INNER JOIN photo_upload ON share_photo.fk_photo_id = photo_upload.id) INNER JOIN resistration ON share_photo.fk_user_id = resistration.id) WHERE share_person_user_id = '".$_SESSION['id']."'");
                                        while($photo_data = mysqli_fetch_assoc($photo_qry)){
                                            $photo_name = $photo_data['photo_name'];
                                    ?>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body" style="background-color:#DAF7A6;">
                                                <img src="uploads/<?=$photo_name?>" height="210px" data-photo_name="<?=$photo_name?>" class= "photo_preview">&nbsp;
                                                <h6>share by <u><?=$photo_data['name']?></u></h6>
                                            </div>
                                            <div class="card-footer" style="flex-direction: row-reverse;">
                                            <a href="download.php?file=<?=urlencode($photo_name)?>" class="btn btn-outline-info btn-light-google btn-sm download float-right" data-toggle="tooltip" data-placement="bottom" data-original-title="Click to download"><i class="fa fa-download" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
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
    <script src="assets/js-cdn/jquery.min.js"></script>
  	<script src="assets/js-cdn/bootstrap.min.js"></script>
	<script src="assets/js-cdn/jquery.validate.min.js"></script>
	<script src="assets/js-cdn/toastr.min.js"></script>
	<script src="assets/js-cdn/sweetalert.min.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });

        $('.nav-item').removeClass('active');
        $('.receivedphoto-li').addClass('active');
        $(".photo_preview").on('click', function() {
            var photo_name = $(this).data('photo_name');
            // console.log("uploads/"+photo_name);
			window.location.href = "uploads/"+photo_name;
        });
    </script>
</body>
</html>
