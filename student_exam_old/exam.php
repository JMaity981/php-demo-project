<?php
    require_once('db/connection.php');
    if(!isset($_SESSION['s_id'])){
		header('Location: ./student.php');
	}
    $question_set_id= $_GET['question_set_id'];
    $qry =mysqli_query($conn,"SELECT option.*,question.question FROM `question` INNER JOIN `option` ON question.id = option.fk_question_id WHERE question.fk_question_set_id= '".$question_set_id."'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXAM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" />
  	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/exam_style.css">
</head>
<body>
    <div class="container">
        <h4>Welcome, <?=$_SESSION['name']?></h4>
        <div><h2>Exam closes in <span id="time">05:00</span> minutes!</h2></div> 
        <a href="controller/Student_logoutCtrl.php" class="btn btn-warning">Log Out</a>
        <h3><center>EXAM</center></h3>
        <form method="POST" action="controller/ExamCtrl.php" id="exam">
            <?php
                $question_no=0;
                while($data = mysqli_fetch_assoc($qry)){
                //echo $data['question'];
                $question_id = $data['fk_question_id'];
                $question_no++;
            ?>
            <p id="qtext"><?=$question_no?>. <?=$data['question'];?></p><br>
            <input type="hidden" name="question_id[]" value="<?=$question_id?>">
            <div style="position:relative;width:100%;">
                <div id="altcontainer" class="notranslate">
                    <label class='radiocontainer' id='label1'>
                        <?=$data['a']?>
                        <input type='radio' name='<?=$question_id?>option' id='<?=$question_id?>a' value='a' data-q_id="<?=$question_id?>" class="option_value" />
                        <span class='checkmark'></span>
                    </label>
                    <label class='radiocontainer' id='label2'>
                        <?=$data['b']?>
                        <input type='radio' name='<?=$question_id?>option' id='<?=$question_id?>b'  value='b' data-q_id="<?=$question_id?>" class="option_value" />
                        <span class='checkmark'></span>
                    </label>
                    <label class='radiocontainer' id='label3'>
                        <?=$data['c']?> 
                        <input type='radio' name='<?=$question_id?>option' id='<?=$question_id?>c' class="option_value"  value='c' data-q_id="<?=$question_id?>" />
                        <span class='checkmark'></span>
                    </label>
                    <label class='radiocontainer' id='label4'>
                        <?=$data['d']?>
                        <input type='radio' name='<?=$question_id?>option' id='<?=$question_id?>d' class="option_value"  value='d' data-q_id="<?=$question_id?>" />
                        <span class='checkmark'></span>
                    </label>
                </div>
            </div>
            <!-- <input type="radio" name="option[]" value="a"><?=$data['a']?><br>
            <input type="radio" name="option[]" value="b"><?=$data['b']?><br>
            <input type="radio" name="option[]" value="c"><?=$data['c']?><br>
            <input type="radio" name="option[]" value="d"><?=$data['d']?><br> -->
            <?php
                }
            ?>
            <div id="answerbuttoncontainer">
                <button class="answerbutton w3-btn ws-green" type="submit">Submit Your Anser</button>
                <!-- <input type="text" readonly id="timespent" value="0:00"> -->
            </div>
            <!-- <button type="submit">Submit</button> -->
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>
	<script>
		$("#exam").validate({
			submitHandler: function (form){
				var data = $('form').serialize();//no file in the form
				//var data = new FormData($(form)[0]);//only file upload
				var action = $("#exam").attr('action');
				console.log(data);
				$.ajax({
					url: action ,
					dataType: 'json',
					type: "POST",
					data: data,
					success: function(data){
						console.log(data);
						if(data.key == 'S'){
							toastr.success(data.msg);
							//$('#registration')[0].reset();
							setTimeout(function(){ 
								window.location.href = "./result.php";  
							}, 3000);
						}else if(data.key== 'E'){
							toastr.error(data.msg);
						}
						else{
							toastr.error('error');
						}
					},
					error: function(error){
						console.log(error.responseText);
						// console.log(error);
					},
				});
			},
		});
        // function get_option_id(){
        //     console.log($(this).val());
        // }
        var array = [];
        $(".option_value").on('click', function(){
            // console.log($(this).val());
            // //var abc = $(this).data('value');
            // console.log($(this).data('q_id'));
            var question_id = $(this).data('q_id');
            var answer_value = $(this).val();
            var answer_set = {
                'question_id': question_id,
                'answer_value': answer_value
            }
            array.push(answer_set);
            //console.log(array);
        })
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                    $("#exam").submit();
                    display = '';
                }
            }, 1000);
        }

        window.onload = function () {
            var fiveMinutes = 60 *5,
                display = document.querySelector('#time');
            startTimer(fiveMinutes, display);
        };  
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