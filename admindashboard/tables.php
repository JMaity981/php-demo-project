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
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
        integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title>
        Material Dashboard by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Simple Table</h4>
                                    <p class="card-category"> Here is a subtitle for this table</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Country
                                                </th>
                                                <th>
                                                    City
                                                </th>
                                                <th>
                                                    Email
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $qry = mysqli_query($conn, "SELECT * FROM `registration`");
                                                    //echo $base_url;die;
                                                    while($data = mysqli_fetch_assoc($qry)){
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?=$data["id"];?>
                                                    </td>
                                                    <td>
                                                        <?=$data["f_name"]." ".$data["l_name"];?>
                                                    </td>
                                                    <td>
                                                        <?=$data["country"];?>
                                                    </td>
                                                    <td>
                                                        <?=$data["city"];?>
                                                    </td>
                                                    <td class="text-primary">
                                                        <?=$data["email"];?>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-info view" id="view"
                                                            data-id="<?php echo $data["id"];?>" data-u_name="<?php echo $data["u_name"];?>" data-email="<?php echo $data["email"];?>" data-f_name="<?php echo $data["f_name"];?>" data-l_name="<?php echo $data["l_name"];?>" data-photo="<?php echo $base_url.'/uploads/'.$data["photo"];?>" data-adress="<?php echo $data["adress"];?>" data-city="<?php echo $data["city"];?>" data-country="<?php echo $data["country"];?>" data-p_code="<?php echo $data["p_code"];?>" data-about_me="<?php echo $data["about_me"];?>" data-created_date_time="<?php echo $data["created_date_time"];?>">View</button>
                                                        <button type="button" class="btn btn-warning edit" id="edit"
                                                            data-id="<?php echo $data["id"];?>">Edit</button>
                                                        <button class="btn btn-danger delete" id="delete"
                                                            data-id="<?php echo $data["id"];?>">Delete</button>
                                                    </td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- EDIT MODAL Start -->
            <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
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
                            <form method="POST" id="edit_form">
                                <input type="hidden" name="h_id" id="h_id">
                                <label for="u_name"><strong>User Name</strong></label>
                                <input type="text" name="u_name" class="form-control" id="u_name">
                                <label for="email"><strong>Email</strong></label>
                                <input type="email" name="email" class="form-control" id="email">
                                <label for="f_name"><strong>First Name</strong></label>
                                <input type="text" name="f_name" class="form-control" id="f_name">
                                <label for="l_name"><strong>Last Name</strong></label>
                                <input type="text" name="l_name" class="form-control" id="l_name">
                                <label for="city"><strong>City</strong></label>
                                <input type="text" name="city" class="form-control" id="city">
                                <label for="country"><strong>Country</strong></label>
                                <input type="text" name="country" class="form-control" id="country">
                                <label for="p_code"><strong>Postal Code</strong></label>
                                <input type="number" name="p_code" class="form-control" id="p_code">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="save">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- EDIT MODAL Closes -->

            <!-- Profile View Modal START -->
            <div tabindex="-1" class="modal pmd-modal fade" id="profile_modal" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
        
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h2 class="modal-title" id="test_f_name"></h2>&nbsp;&nbsp;&nbsp;
                            <h2 class="modal-title" id="test_l_name"></h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <img class="img" src="" id="test_photo" style="height: 80px;"/>
                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        </div>
        
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <table class="table table-striped table-bordered" style="width: 100%;">
                                <tr>
                                    <th>Id:</th>
                                    <td id="test_id"></td>
                                </tr>
                                <tr>
                                    <th>User Name:</th>
                                    <td id="test_u_name"></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td id="test_email"></td>
                                </tr>
                                <tr>
                                    <th>Adress:</th>
                                    <td id="test_adress"></td>
                                </tr>
                                <tr>
                                    <th>City:</th>
                                    <td id="test_city"></td>
                                </tr>
                                <tr>
                                    <th>Country:</th>
                                    <td id="test_country"></td>
                                </tr>
                                <tr>
                                    <th>Postal Code:</th>
                                    <td id="test_p_code"></td>
                                </tr>
                                <tr>
                                    <th>About Me:</th>
                                    <td id="test_about_me"></td>
                                </tr>
                                <tr>
                                    <th>Rigistration Date & Time:</th>
                                    <td id="test_created_date_time"></td>
                                </tr>
                            </table>
                        </div>
        
                        <!-- Modal Footer -->
                        <div class="modal-footer pmd-modal-border text-right">
                            <button data-dismiss="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-dark" type="button">Close</button>
                        </div>
        
                    </div>
                </div>
            </div>
            <!-- Profile View Modal Close -->
        
            <!--========== Footer & core js Start =========-->
            <?php include('./common/footer.php');?>
            <!-- =========== Footer & core js End =======-->
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        $('.nav-item').removeClass('active');
        $('.table-li').addClass('active');
        //PROFILE VIEW
        $(".view").on('click', function() {
            $('#profile_modal').modal('show');
            var id = $(this).data('id');
            var u_name = $(this).data('u_name');
            var email = $(this).data('email');
            var f_name = $(this).data('f_name');
            var l_name = $(this).data('l_name');
            var photo = $(this).data('photo');
            var adress = $(this).data('adress');
            var city = $(this).data('city');
            var country = $(this).data('country');
            var p_code = $(this).data('p_code');
            var about_me = $(this).data('about_me');
            var created_date_time = $(this).data('created_date_time');
            $("#test_id").html(id);
            $("#test_u_name").html(u_name);
            $("#test_email").html(email);
            $("#test_f_name").html(f_name);
            $("#test_l_name").html(l_name);
            $("#test_photo").attr('src',photo);
            $("#test_adress").html(adress);
            $("#test_city").html(city);
            $("#test_country").html(country);
            $("#test_p_code").html(p_code);
            $("#test_about_me").html(about_me);
            $("#test_created_date_time").html(created_date_time);
        });
        //Modal value set
        $(".edit").on('click', function() {
            $('#edit_modal').modal('show');
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "controller/valueSetCtrl.php",
                data: {
                    u_id: id
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $("#h_id").val(response.id);
                    $("#u_name").val(response.u_name);
                    $("#email").val(response.email);
                    $("#f_name").val(response.f_name);
                    $("#l_name").val(response.l_name);
                    $("#city").val(response.city);
                    $("#country").val(response.country);
                    $("#p_code").val(response.p_code);
                },
                error: function(error) {
                    console.log(error.responseText);
                },
            });
        });
        //Modal value update
        $("#edit_form").validate({
            submitHandler: function(form) {
                var data = $("#edit_form").serialize();
                var action = 'controller/EditCtrl.php';
                //var action = $("#edit").attr('action');
                $.ajax({
                    url: action,
                    type: "POST",
                    dataType: 'json',
                    data: data,
                    success: function(data) {
                        console.log(data);
                        if (data.key == 'S') {
                            toastr.success(data.msg);
                            setTimeout(function() {
                                location.reload();
                            }, 3000);
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
        //DELETE
        $(".delete").on('click', function() {
            var id = $(this).data('id');
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
                            url: "controller/DeleteCtrl.php",
                            data: {
                                u_id: id
                            },
                            dataType: 'json',
                            success: function(response) {
                                console.log(response);
                                if (response.key == 'S') {
                                    swal("Deleted!", "Your imaginary file has been deleted.",
                                        "success");
                                    setTimeout(function() {
                                        location.reload();
                                    }, 3000);
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