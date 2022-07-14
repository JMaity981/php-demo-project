<?PHP
    session_start();
    require_once('db/connection.php');
    if(!isset($_SESSION['id'])){
		header('Location: ./login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<linl href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        $studentid = base64_decode($_GET['student_id']);
        $qry ="SELECT student_details.*,login.is_active FROM student_details INNER JOIN login
        ON student_details.id = login.fk_student_id WHERE student_details.id='".$studentid."'";
        $data = mysqli_query($conn, $qry);
        $data2 = mysqli_fetch_assoc($data);
        //print_r($data2);
       // die;
        $f_name = $data2['first_name'];
        $l_name = $data2['last_name'];
        $deparment = $data2['deparment'];
        $email = $data2['email'];
        $phone = $data2['phone_no'];
        $profile_pic = $data2['profile_pic'];
        //echo $profile_pic;
        //die;
    ?>
    <div class="container">
        <h2 style="text-align: center;">Profile</h2>
        <div class="row">
            <div class="col-md-8">
                <table style="width:100%" class="table">
                    <tr>
                        <th>NAME</th>
                        <td>
                            <?php
                                echo $f_name." ".$l_name;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Department</th>
                        <td>
                            <?php
                                echo $deparment;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>
                            <?php
                                echo $email;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Phone No.</th>
                        <td>
                            <?php
                                echo $phone;
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4">
                <img src="uploads/<?=$profile_pic;?>" style="height: 200px;">
            </div>
        </div>
        <label class="switch">
            <input type="checkbox" <?php echo $data2['is_active'] == 'Y' ? 'checked' : ''; ?> class="is_active" data-id="<?php echo $data2["id"];?>">
            <span class="slider"></span>
        </label>
        <a class="btn btn-secondary" href="resistration.php?student_id=<?=$studentid?>">Edit</a>
        <button class="btn btn-warning" id="log_out">Log Out</button>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>
    
    <script>
        $('.is_active').on('change', function(e) {
            var is_checked = '';
            var id= $(this).data('id');
            if(e.target.checked){
                is_checked = "Y";
            }else{
                is_checked = "N";
            }
            $.ajax({
				url: 'controller/CheckedCtrl.php',
				dataType: 'json',
				type: "GET",
				data: {id: id, is_active: is_checked},
                success: function(data){
					console.log(data);
					if(data.key == 'S'){
						toastr.success(data.msg);
					}else{
						toastr.error('error');
					}
				},
				error: function(error){
					console.log(error.responseText);
				},
            });
        });
        //logout
        $('#log_out').on('click',function(){
            $.ajax({
                url: 'controller/logoutCtrl.php',
                type: "GET",
                dataType: 'json',
                success:function(data){
                    console.log(data);
                    if(data.key == 'S'){
                        toastr.success(data.msg);
                        setTimeout(function(){ 
							window.location.href = "./login.php"; 
						}, 3000);
                    }
				},
				error: function(error){
					console.log(error.responseText); 
                },
            });
        });
    </script>
</body>
</html>

