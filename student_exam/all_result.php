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
    <title>All result</title>
    <link rel="stylesheet" href="assets/css-cdn/bootstrap.min.css">
    <link href="assets/css-cdn/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css-cdn/toastr.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?=$_SESSION['name']?>.<br/> Your all examination result- </h4>
        <table style="width: 100%;" class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Question Set</th>
                    <th>Right Ans.</th>
                    <th>Wrong Ans.</th>
                    <th>Blank Ans.</th>
                    <th>Full Marks</th>
                    <th>Your Marks</th>
                    <th>Parsentage</th>
                    <th>Date and Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $srl_no=0;
                    $qry= mysqli_query($conn,"SELECT date_time FROM exam_exam WHERE fk_student_id='".$_SESSION['s_id']."' GROUP BY date_time");
                    while ($data = mysqli_fetch_assoc($qry)) {
                        $qry2 =mysqli_query($conn,"SELECT exam_exam.*, exam_question.answer FROM exam_exam INNER JOIN exam_question ON exam_exam.fk_question_id = exam_question.id WHERE exam_exam.fk_student_id='".$_SESSION['s_id']."' AND exam_exam.date_time='".$data["date_time"]."'");
                        $right_ans=0;
                        $wrong_ans=0;
                        $blank_ans=0;
                        $question_count=0;
                        while($data2= mysqli_fetch_assoc($qry2)){
                            $question_count++;
                            //print_r($data);
                            if($data2["choose_answer"]==$data2["answer"]){
                                $right_ans++;
                            }elseif($data2["choose_answer"]==NULL){
                                $blank_ans++;
                            }else{
                                $wrong_ans++;
                            }
                            $question_id= $data2["fk_question_id"];
                        }
                        $full_marks=$question_count*5;
                        $marks=$right_ans*5-$wrong_ans*3;
                        $parsentage=($marks/$full_marks)*100;
                        $srl_no++;
                        $qry3=mysqli_query($conn,"SELECT exam_question_set.name FROM exam_question_set INNER JOIN exam_question ON exam_question_set.id = exam_question.fk_question_set_id WHERE exam_question.id='".$question_id."'");
                        $data3= mysqli_fetch_assoc($qry3);
                ?>
                <tr>
                    <td><?=$srl_no?></td>
                    <td><?=$data3["name"]?></td>
                    <td><?=$right_ans?></td>
                    <td><?=$wrong_ans?></td>
                    <td><?=$blank_ans?></td>
                    <td><?=$full_marks?></td>
                    <td><?=$marks?></td>
                    <td><?=$parsentage?>%</td>
                    <td><?=date("d M Y, h:i:s A",strtotime($data["date_time"]))?></td>
                </tr>
                <?php  
                    }
                ?>
            </tbody>
        </table>
        <a href="controller/Student_logoutCtrl.php" class="btn btn-warning">Log Out</a>
    </div>
    <script src="assets/js-cdn/jquery.min.js"></script>
  	<script src="assets/js-cdn/bootstrap.min.js"></script>
	<script src="assets/js-cdn/jquery.validate.min.js"></script>
	<script src="assets/js-cdn/toastr.min.js"></script>
</body>
</html>