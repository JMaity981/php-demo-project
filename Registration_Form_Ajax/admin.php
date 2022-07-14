<?php
    session_start();
    require_once('./db/connection.php');
    if(!isset($_SESSION['id'])){
		header('Location: ./admin_login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student_details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
        integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1><u>Student Details</u>
        <h1></h1>
        <button class="btn btn-outline-warning" id="log_out">Log Out</button>
        <table style="width: 100%;" class="table table-dark table-striped">
            <tr>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Profile Picture</th>
                <th>Department</th>
                <th>Email</th>
                <th>Phone No.</th>
                <th>Created date and time</th>
                <th>Action</th>
            </tr>
            <?php
            //$qry = mysqli_query($conn, "SELECT * FROM `student_details`");
            $qry = mysqli_query($conn,"SELECT student_details.*,login.is_active FROM student_details INNER JOIN login
            ON student_details.id = login.fk_student_id");
            while($data = mysqli_fetch_assoc($qry)){
        ?>
            <tr>
                <td><?=$data["id"];?></td>
                <td><?=$data["first_name"];?></td>
                <td><?=$data["last_name"];?></td>
                <td><img src="uploads/<?=$data["profile_pic"];?>" style="height: 100px;"></td>
                <td><?=$data["deparment"];?></td>
                <td><?=$data["email"];?></td>
                <td><?=$data["phone_no"];?></td>
                <td><?=$data["created_date_time"];?></td>
                <td>
                    <?php
                if($data['is_active'] == 'Y'){
                ?>
                    <label class="switch">
                        <input type="checkbox" checked class="is_active" data-id="<?php echo $data["id"];?>">
                        <span class="slider"></span>
                    </label>
                    <?php } else { ?>
                    <label class="switch">
                        <input type="checkbox" class="is_active" data-id="<?php echo $data["id"];?>">
                        <span class="slider"></span>
                    </label>
                    <?php } ?>
                    <button type="button" class="btn btn-secondary update"
                        data-id="<?php echo $data["id"];?>">Edit</button>
                    <button class="btn btn-danger delete" id="delete"
                        data-id="<?php echo $data["id"];?>">Delete</button>
                </td>
            </tr>
            <?php
            }
        ?>
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
                        <form method="get" id="registration" action="controller/RegistrationCtrl.php">
                            <input type="hidden" name="h_id" id="h_id">
                            <label for="f_name"><strong>First Name</strong></label>
                            <input type="text" name="f_name" class="form-control" id="f_name" placeholder="First Name"
                                value="">
                            <label for="l_name"><strong>Last Name</strong></label>
                            <input type="text" name="l_name" class="form-control" id="l_name" placeholder="Last Name"
                                value="">
                            <label for="depar"><strong>Department/Office</strong></label>
                            <select class="custom-select" id="depar" name="depar">
                                <option value="" disabled>Select your Department/Office</option>
                                <option value="php">Php Developer</option>
                                <option value="python">Python Developer</option>
                                <option value="android">Android Developer</option>
                            </select>
                            <label for="email"><strong>E-Mail</strong></label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="E-Mail Address" value="">
                            <label for="c_no"><strong>Contact No.</strong></label>
                            <input type="number" name="c_no" class="form-control" id="c_no" placeholder="(639)"
                                value="">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="save">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL Closes -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"
            integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

        <script>
        //Delete
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
                });
        });
        //Modal value set
        $(".update").on('click', function() {
            $('#exampleModal').modal('show');
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "controller/EditCtrl.php",
                data: {
                    u_id: id
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $("#h_id").val(response.id);
                    $("#f_name").val(response.first_name);
                    $("#l_name").val(response.last_name);
                    $("#depar").val(response.deparment);
                    $("#email").val(response.email);
                    $("#c_no").val(response.phone_no);
                },
                error: function(error) {
                    console.log(error.responseText);
                },
            });
        });
        //Modal value update
        $("#registration").validate({
            submitHandler: function(form) {
                var data = $("#registration").serialize();
                var action = $("#registration").attr('action');
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
        /*$("#save").on('click', function(){
            var data = $('#registration').serialize();
            console.log(data);
			var action = $("#registration").attr('action');
			$.ajax({
				url: action,
				dataType: 'json',
				type: "GET",
				data: data,
				success: function(data){
					console.log(data);
					if(data.key == 'S'){
						toastr.success(data.msg);
						$('#registration')[0].reset();
                        $('#exampleModal').modal('hide');
                        setTimeout(function(){ 
							window.location.reload(); 
						}, 3000);
					}else{
						toastr.error('error');
					}
				},
				error: function(error){
					console.log(error.responseText);
					// console.log(error);
				},
			});
		});*/
        //Switch Checked
        $('.is_active').on('change', function(e) {
            var is_checked = '';
            var id = $(this).data('id');
            if (e.target.checked) {
                is_checked = "Y";
            } else {
                is_checked = "N";
            }
            $.ajax({
                url: 'controller/CheckedCtrl.php',
                dataType: 'json',
                type: "GET",
                data: {
                    id: id,
                    is_active: is_checked
                },
                success: function(data) {
                    console.log(data);
                    if (data.key == 'S') {
                        toastr.success(data.msg);
                    } else {
                        toastr.error('error');
                    }
                },
                error: function(error) {
                    console.log(error.responseText);
                },
            });
        });
        //logout
        $('#log_out').on('click', function() {
            $.ajax({
                url: 'controller/AdminlogoutCtrl.php',
                type: "GET",
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data.key == 'S') {
                        toastr.success(data.msg);
                        setTimeout(function() {
                            window.location.href = "./admin_login.php";
                        }, 3000);
                    }
                },
                error: function(error) {
                    console.log(error.responseText);
                },
            });
        });
        </script>
</body>

</html>