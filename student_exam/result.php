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
    <title>RESULT</title>
    <link rel="stylesheet" href="assets/css-cdn/bootstrap.min.css">
    <link href="assets/css-cdn/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css-cdn/toastr.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        $right_ans=0;
        $wrong_ans=0;
        $blank_ans=0;
        $question_count=0;
        $qry =mysqli_query($conn,"SELECT exam_exam.*, exam_question.answer FROM exam_exam INNER JOIN exam_question ON exam_exam.fk_question_id = exam_question.id WHERE exam_exam.fk_student_id='".$_SESSION['s_id']."' ORDER BY id DESC LIMIT 10");
        while($data= mysqli_fetch_assoc($qry)){
            $question_count++;
            //print_r($data);
            if($data["choose_answer"]==$data["answer"]){
                $right_ans++;
            }elseif($data["choose_answer"]==NULL){
                $blank_ans++;
            }else{
                $wrong_ans++;
            }
        }
        $full_marks=$question_count*5;
        $marks=$right_ans*5-$wrong_ans*3;
        $parsentage=($marks/$full_marks)*100;
        // echo($right_ans);echo($wrong_ans);echo($blank_ans);
    ?>
    <div class="container border">
        <h2>Welcome, <?=$_SESSION['name']?>. Your last exam result- </h4>
        <h3 style="color:green;">Right Answer: <?=$right_ans?></h3>
        <h3 style="color:red;">Wrong Answer: <?=$wrong_ans?></h3>
        <h3>Blank Answer: <?=$blank_ans?></h3>
        <h3 style="color: green;">Full Marks: <?=$full_marks?></h3>
        <h3 style="color: blue;">Your Marks: <?=$marks?></h3>
        <h3 style="color: blue;">Your Parsentage: <?=$parsentage?>%</h3>
        <a href="controller/Student_logoutCtrl.php" class="btn btn-warning">Log Out</a>
    </div>
    <script src="assets/js-cdn/jquery.min.js"></script>
  	<script src="assets/js-cdn/bootstrap.min.js"></script>
	<script src="assets/js-cdn/jquery.validate.min.js"></script>
	<script src="assets/js-cdn/toastr.min.js"></script>
    <script>
    </script>
</body>
</html>