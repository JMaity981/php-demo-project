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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        $right_ans=0;
        $wrong_ans=0;
        $blank_ans=0;
        $question_count=0;
        // $sql= "SELECT exam.*, question.answer FROM exam INNER JOIN question ON exam.fk_question_id = question.id WHERE exam.fk_student_id='".$_SESSION['s_id']."' ORDER BY id DESC GROUP BY date_time LIMIT 1";
        // print_r($sql);die;
        $qry =mysqli_query($conn,"SELECT exam.*, question.answer FROM exam INNER JOIN question ON exam.fk_question_id = question.id WHERE exam.fk_student_id='".$_SESSION['s_id']."' ORDER BY id DESC LIMIT 10");
       
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
        <!-- <button class="btn btn-warning" id="log_out">Log Out</button> -->
        <a href="controller/Student_logoutCtrl.php" class="btn btn-warning">Log Out</a>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>
    <script>
        //LOG OUT
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
</body>
</html>