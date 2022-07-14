<?php
    require_once('../db/connection.php');
    // print_r ($_POST);
    date_default_timezone_set('Asia/Kolkata');
    $date_time = date('Y-m-d h:i:s');
    // echo $date_time;die;
    $student_id= $_SESSION['s_id'];
    $question_id_arr = $_POST['question_id'];
    //print_r($_POST);die;
    // unset($_POST['question_id']);
    // $x = [];
    // for($i = 0; $i< count($question_id_arr); $i++){
    // print_r($question_id_arr);die;
    foreach($question_id_arr as $key => $question){
        // $ques_single_id = $question_id_arr[$i];
        // $x[] = [
        //     'question_id' => $question_id_arr[$i],
        //     'answer' => $_POST[$question_id_arr[$i].'option'],
        //     'fk_student_id' => $student_id
        // ];
        if(isset($_POST[$question.'option'])){
            $choose_answer=$_POST[$question.'option'];
        }else{
            $choose_answer= '';
        }
        $sql = "INSERT INTO exam(fk_student_id,fk_question_id,choose_answer,date_time) VALUES('".$student_id."','".$question."','".$choose_answer."','".$date_time."')";
        
        $insert=mysqli_query($conn,$sql);
        
    }
    if($insert){
        $return= ['key'=> "S" , 'msg'=>"Your Exam Submited."];
    }else{
        $return= ['key'=> "E" , 'msg'=>"Your Exam not Submited."];
    }
    echo json_encode($return);
?>