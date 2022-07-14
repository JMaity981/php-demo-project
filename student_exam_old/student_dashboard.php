<?PHP
    require_once('db/connection.php');
    if(!isset($_SESSION['s_id'])){
		header('Location: ./student.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
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
        $student_id = base64_decode($_GET['student_id']);
        $qry=mysqli_query($conn,"SELECT * FROM registration WHERE id='".$student_id."'");
        $data=mysqli_fetch_assoc($qry);
        $name=$data['name'];
        $class_id=$data['class_id'];
    ?>
    <div class="container">
        <h4>Welcome, <?=$name?></h4>
        <a href="all_result.php" class="btn btn-info">RESULT</a><br>
        <label for="question_set_id"><strong>Choose Your Question Set:</strong></label>
        <?php
            $qry = mysqli_query($conn,"SELECT * FROM question_set WHERE fk_class_id='".$class_id."'");
        ?>
        <select name="question_set_id" id="question_set_id" class="form-control">
            <option value="" disabled selected>Choose question Set</option>
            <?php
                while ($data = mysqli_fetch_assoc($qry)) {
            ?>
                <option value="<?php echo $data['id'];?>"><?php echo $data['name'];?></option>
            <?php
                }
            ?>
        </select>
        <button id="start_exam" class="start_exam">Start Exam</button>
        <a href="controller/Student_logoutCtrl.php" class="btn btn-warning">Log Out</a>
        <!-- <button class="btn btn-warning" id="log_out">Log Out</button> -->
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>
<script>
    $('#start_exam').click(function(){
        var question_set_id= $('#question_set_id').val();
        window.location.href = "./exam.php?question_set_id="+question_set_id;
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
    //                     window.location.href = "./student.php"; 
    //                 }, 3000);
    //             }
    //         },
    //         error: function(error){
    //             console.log(error.responseText); 
    //         },
    //     });
    // });
</script>
</html>