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
    <title>Student Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css-cdn/bootstrap.min.css">
    <link href="assets/css-cdn/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css-cdn/toastr.min.css" />
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        $qry=mysqli_query($conn,"SELECT * FROM exam_registration WHERE id='".$_SESSION['s_id']."'");
        $data=mysqli_fetch_assoc($qry);
        $name=$data['name'];
        $class_id=$data['class_id'];
    ?>
    <div class="container">
        <h4>Welcome, <?=$name?></h4>
        <a href="all_result.php" class="btn btn-info">RESULT</a><br>
        <label for="question_set_id"><strong>Choose Your Question Set:</strong></label>
        <?php
            $qry = mysqli_query($conn,"SELECT * FROM exam_question_set WHERE fk_class_id='".$class_id."'");
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
    </div>
<script src="assets/js-cdn/jquery.min.js"></script>
<script src="assets/js-cdn/bootstrap.min.js"></script>
<script src="assets/js-cdn/jquery.validate.min.js"></script>
<script src="assets/js-cdn/toastr.min.js"></script>
<script>
    $('#start_exam').click(function(){

        var question_set_id= $('#question_set_id').val();
        console.log(question_set_id);
        if(question_set_id==null){
            toastr.error("Please Select the Question Set");
        }else{
            window.location.href = "./exam.php?question_set_id="+question_set_id;
        }
    });
</script>
</body>
</html>