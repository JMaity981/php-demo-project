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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                <?php
                    $used_memory_byte = 0;
                    $qry = mysqli_query($conn, "SELECT photo_size FROM photo_upload WHERE fk_user_id = '".$_SESSION['id']."'");
                    while ($data = mysqli_fetch_assoc($qry)){
                        $used_memory_byte = $used_memory_byte + $data['photo_size'];
                    }

                    $qry= mysqli_query($conn, "SELECT size FROM package INNER JOIN resistration ON package.id = resistration.package_id WHERE resistration.id = '".$_SESSION['id']."'");
                    $data = mysqli_fetch_assoc($qry);
                    $total_memory_byte = $data['size'];

                    $used_memory_mb = ($used_memory_byte/1024)/1024;
                    $total_memory_mb = ($total_memory_byte/1024)/1024;
                    $free_memory_mb = (($total_memory_byte-$used_memory_byte)/1024)/1024;
                    $used_memory_parsentage = ($used_memory_byte / $total_memory_byte) * 100;
                ?>
                <div class="row">
                    <div class="col-md-5">
                        <p style="color:red; font-weight: bold;">Used: <?=round("$used_memory_mb",2)?> mb</p>
                    </div>
                    <div class="col-md-3">
                        <p style="color:#8817F0; font-weight: bold;">Total: <?=round("$total_memory_mb",2)?> mb</p>
                    </div>
                    <div class="col-md-4"> 
                        <p class="pull-right" style="color:green; font-weight: bold;">Free: <?=round("$free_memory_mb",2)?> mb</p>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?=$used_memory_parsentage?>%"></div>
                </div>
                <?php
                    $folder_qry = mysqli_query($conn, "SELECT * FROM folder WHERE fk_user_id = '".$_SESSION['id']."'");
                    while($folder_data = mysqli_fetch_assoc($folder_qry)){
                        $folder_size_byte = 0;
                        $size_qry = mysqli_query($conn, "SELECT photo_size FROM photo_upload WHERE fk_folder_id = '".$folder_data['id']."'");
                            while ($data = mysqli_fetch_assoc($size_qry)){
                                $folder_size_byte = $folder_size_byte + $data['photo_size'];
                            }
                            $folder_size_mb = ($folder_size_byte/1024)/1024;
                ?>
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2 class="card-title">Folder: <?=$folder_data['folder_name']?> (size: <?=round($folder_size_mb,2)?>mb)</h2>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-success f_share" data-id="<?=$folder_data["id"]?>">Share</button>
                                    <button class="btn btn-danger f_delete" id="delete" data-id="<?=$folder_data["id"]?>">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <?php
                                        $photo_qry = mysqli_query($conn, "SELECT * FROM photo_upload WHERE fk_user_id = '".$_SESSION['id']."' AND fk_folder_id = '".$folder_data['id']."'");
                                        while($photo_data = mysqli_fetch_assoc($photo_qry)){
                                            $photo_size_kb = $photo_data['photo_size'] / 1024;
                                            $photo_name = $photo_data['photo_name'];
                                    ?>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="uploads/<?=$photo_name?>" height="210px" data-photo_name="<?=$photo_name?>" class= "photo_preview">
                                                <p>Size:<?=(int)$photo_size_kb?> kb</p>
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" class="btn btn-outline-success btn-sm share" data-id="<?=$photo_data["id"]?>" data-photo_name="<?=$photo_name?>" data-placement="bottom" data-toggle="tooltip"  data-original-title="Share"><i class="fa fa-share-square-o" aria-hidden="true"></i></button>
                                                <a herf="javascript:void(0)" class="btn btn-outline-danger btn-light-google btn-sm delete" id="delete" data-id="<?=$photo_data["id"]?>" data-name="<?=$photo_data["photo_name"]?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
                <?php
                    }
                ?>
                <div class="container-fluid">
                    <div class="card" style="background-color:#AABCBF;">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Default Folder</h4>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <?php
                                        $photo_qry = mysqli_query($conn, "SELECT * FROM photo_upload WHERE fk_user_id = '".$_SESSION['id']."' AND fk_folder_id = '0'");
                                        while($photo_data = mysqli_fetch_assoc($photo_qry)){
                                            $photo_size_kb = $photo_data['photo_size'] / 1024;
                                            $photo_name = $photo_data['photo_name'];
                                    ?>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body" style="background-color:#DAF7A6;">
                                                <img src="uploads/<?=$photo_name?>" height="210px" data-photo_name="<?=$photo_name?>" class= "photo_preview">
                                                <p style="color:blue; font-weight: bold;">Size:<?=(int)$photo_size_kb?> kb</p>
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" class="btn btn-outline-success btn-sm share" data-id="<?=$photo_data["id"]?>" data-photo_name="<?=$photo_name?>" data-placement="bottom" data-toggle="tooltip"  data-original-title="Share"><i class="fa fa-share-square-o" aria-hidden="true"></i></button>

                                                <a herf="javascript:void(0)" class="btn btn-outline-danger btn-light-google btn-sm delete" data-toggle="tooltip" id="delete" data-theme="dark" data-placement="bottom"  data-id="<?=$photo_data["id"]?>" data-name="<?=$photo_data["photo_name"]?>" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
    <!-- PHOTO SHARE MODAL Start -->
    <div class="modal fade share_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Share Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="get" class="share_form">
                        <input type="hidden" name="h_photo_id" class="h_photo_id">
                        <input type="hidden" name="h_photo_name" class="h_photo_name">
                        <label><strong>Email Id:</strong></label>
                        <select class="form-control email_id" name="email_id">
                            <option value="" disabled selected>Select Email id</option>
                            <?php
                                $qry = mysqli_query($conn,"SELECT id, email FROM resistration WHERE id != '".$_SESSION['id']."'");
                                while ($data = mysqli_fetch_assoc($qry)) {
                            ?>
                                <option value="<?=$data['id']?>"><?=$data['email']?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Share</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- PHOTO SHARE MODAL Closes -->
    <!-- FOLDER SHARE MODAL Start -->
    <div class="modal fade folder_share_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Share Folder</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="get" class="folder_share_form">
                        <input type="hidden" name="h_folder_id" class="h_folder_id">
                        <label><strong>Email Id:</strong></label>
                        <select class="form-control email_id" name="email_id">
                            <option value="" disabled selected>Select Email id</option>
                            <?php
                                $qry = mysqli_query($conn,"SELECT id, email FROM resistration WHERE id != '".$_SESSION['id']."'");
                                while ($data = mysqli_fetch_assoc($qry)) {
                            ?>
                                <option value="<?=$data['id']?>"><?=$data['email']?></option>
                            <?php
                                }
                            ?>
                        </select>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Share</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--FOLDER SHARE MODAL Closes -->
    <script src="assets/js-cdn/jquery.min.js"></script>
  	<script src="assets/js-cdn/bootstrap.min.js"></script>
	<script src="assets/js-cdn/jquery.validate.min.js"></script>
	<script src="assets/js-cdn/toastr.min.js"></script>
	<script src="assets/js-cdn/sweetalert.min.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });

        $(".photo_preview").on('click', function() {
            var photo_name = $(this).data('photo_name');
            // console.log("uploads/"+photo_name);
			window.location.href = "uploads/"+photo_name;
        });
        //Delete Photo
        $(".delete").on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: "GET",
                            url: "controller/PhotoDeleteCtrl.php",
                            data: {
                                photo_id: id,
                                photo_name: name
                            },
                            dataType: 'json',
                            success: function(response) {
                                console.log(response);
                                if (response.key == 'S') {
                                    swal("Deleted!", "Your Photo has been deleted.",
                                        "success");
                                    setTimeout(function() {
                                        location.reload();
                                    });
                                } else {
                                    toastr.error(response.message);
                                }
                            },
                            error: function(error) {
                                console.log(error.responseText);
                            },
                        });
                    } else {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                }
            );
        });
        //Share Photo
        $(".share").on('click', function() {
            var id = $(this).data('id');
            var photo_name = $(this).data('photo_name');
            $('.share_Modal').modal('show');
            $(".h_photo_id").val(id);
            $(".h_photo_name").val(photo_name);
            $(".share_form").validate({
                rules:{
                    email_id:{
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
                submitHandler: function(form) {
                    var data = $(".share_form").serialize();
                    $.ajax({
                        url: "controller/PhotoShareCtrl.php",
                        type: "POST",
                        dataType: 'json',
                        data: data,
                        success: function(data) {
                            if (data.key == 'S') {
                                toastr.success(data.msg);
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else {
                                toastr.error(data.msg);
                            }
                        },
                        error: function(error) {
                            console.log(error.responseText);
                        },
                    });
                },
            });
        });
        //SHARE FOLDER
        $(".f_share").on('click', function() {
            var id = $(this).data('id');
            $('.folder_share_Modal').modal('show');
            $(".h_folder_id").val(id);
            $(".folder_share_form").validate({
                rules:{
                    email_id:{
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
                submitHandler: function(form) {
                    var data = $(".folder_share_form").serialize();
                    $.ajax({
                        url: "controller/FolderShareCtrl.php",
                        type: "POST",
                        dataType: 'json',
                        data: data,
                        success: function(data) {
                            if (data.key == 'S') {
                                toastr.success(data.msg);
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else {
                                toastr.error(data.msg);
                            }
                        },
                        error: function(error) {
                            console.log(error.responseText);
                        },
                    });
                },
            });
        });
        //DELETE FOLDER
        $(".f_delete").on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: "GET",
                            url: "controller/FolderDeleteCtrl.php",
                            data: {
                                folder_id: id,
                            },
                            dataType: 'json',
                            success: function(response) {
                                console.log(response);
                                if (response.key == 'S') {
                                    swal("Deleted!", "Your Folder has been deleted.",
                                        "success");
                                    setTimeout(function() {
                                        location.reload();
                                    });
                                } else {
                                    toastr.error(response.message);
                                }
                            },
                            error: function(error) {
                                console.log(error.responseText);
                            },
                        });
                    } else {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                }
            );
        });
    </script>
</body>
</html>
