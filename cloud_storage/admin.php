<?php
    require_once('./db/connection.php');
    if(!isset($_SESSION['a_id'])){
		header('Location: ./admin_login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="assets/css-cdn/bootstrap.min.css">
    <link href="assets/css-cdn/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css-cdn/toastr.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <h1><u><center>User Details</center></u><h1></h1>
    <a href="controller/AdminLogoutCtrl.php" class="btn btn-outline-warning">Log Out</a>
    <button class="btn btn-outline-primary" id="package_add_btn">Add Package</button>
    <table style="width: 100%;" class="table table-dark table-striped">
        <tr>
            <th>Srl. No.</th>
            <th>NAME</th>
            <th>Email</th>
            <th>Package</th>
            <th>Used</th>
            <th>Resistration Date & Time</th>
            <th>Is Ative</th>
        </tr>
        <?php
        $srl_no = 0;
        $qry = mysqli_query($conn,"SELECT resistration.*,package.package_name FROM resistration INNER JOIN package
        ON resistration.package_id = package.id");
        while($data = mysqli_fetch_assoc($qry)){
            $srl_no++;
    ?>
        <tr>
            <td><?=$srl_no?></td>
            <td><?=$data["name"]?></td>
            <td><?=$data["email"]?></td>
            <td><?=$data["package_name"]?></td>
            <td>
                <?php
                    $id = $data["id"];
                    $used_memory_byte = 0;
                    $qry_size = mysqli_query($conn, "SELECT photo_size FROM photo_upload WHERE fk_user_id = '".$id."'");
                    while ($data_size = mysqli_fetch_assoc($qry_size)){
                        $used_memory_byte = $used_memory_byte + $data_size['photo_size'];
                    }

                    $qry_size= mysqli_query($conn, "SELECT size FROM package INNER JOIN resistration ON package.id = resistration.package_id WHERE resistration.id = '".$id."'");
                    $data_size = mysqli_fetch_assoc($qry_size);
                    $total_memory_byte = $data_size['size'];
                    $used_memory_parsentage = ($used_memory_byte / $total_memory_byte) * 100;
                ?>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?=$used_memory_parsentage?>%"></div>
                </div>
            </td>
            <td><?=$data["date_time"]?></td>
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
            </td>
        </tr>
        <?php
        }
    ?>
    </table>
    <!-- MODAL Start -->
    <div class="modal fade" id="package_add_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Package</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="get" id="package_add_form" action="controller/Package_addCtrl.php">
                        <label for="package_name"><strong>Package Name</strong></label>
                        <input type="text" name="package_name" class="form-control" id="package_name" placeholder="Enter Package Name"
                            value="">
                        <label for="size_mb"><strong>Package Size(MB)</strong></label>
                        <input type="number" name="size_mb" class="form-control" id="size_mb" placeholder="Enter The Size(MB)"
                            value="">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL Closes -->
    <script src="assets/js-cdn/jquery.min.js"></script>
  	<script src="assets/js-cdn/bootstrap.min.js"></script>
	<script src="assets/js-cdn/jquery.validate.min.js"></script>
	<script src="assets/js-cdn/toastr.min.js"></script>
    <script>
        //Modal Add package
        $("#package_add_btn").on('click', function() {
            $('#package_add_Modal').modal('show');
            $("#package_add_form").validate({
                submitHandler: function(form) {
                    var data = $("#package_add_form").serialize();
                    var action = $("#package_add_form").attr('action');
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
    </script>
</body>

</html>