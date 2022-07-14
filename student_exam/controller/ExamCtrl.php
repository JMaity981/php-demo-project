<?php
    require_once('../db/connection.php');
    date_default_timezone_set('Asia/Kolkata');
    $date_time = date('Y-m-d H:i:s');
    $student_id= $_SESSION['s_id'];
    $question_id_arr = $_POST['question_id'];
    foreach($question_id_arr as $key => $question){
        if(isset($_POST[$question.'option'])){
            $choose_answer=$_POST[$question.'option'];
        }else{
            $choose_answer= '';
        }
        $sql = "INSERT INTO exam_exam(fk_student_id,fk_question_id,choose_answer,date_time) VALUES('".$student_id."','".$question."','".$choose_answer."','".$date_time."')";
        
        $insert=mysqli_query($conn,$sql);
        
    }
    if($insert){
        $return= ['key'=> "S" , 'msg'=>"Your Exam Submited."];
    }else{
        $return= ['key'=> "E" , 'msg'=>"Your Exam not Submited."];
    }
    echo json_encode($return);
?>