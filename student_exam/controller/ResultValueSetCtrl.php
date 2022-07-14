<?php
	require_once('../db/connection.php');

    if(isset($_GET['s_id'])){
        $s_id=$_GET['s_id'];
        $srl_no=0;
        $qry= mysqli_query($conn,"SELECT date_time FROM exam_exam WHERE fk_student_id='".$s_id."' GROUP BY date_time");
        $result = [];
        while ($data = mysqli_fetch_assoc($qry)) {
            $qry2 =mysqli_query($conn,"SELECT exam_exam.*, exam_question.answer FROM exam_exam INNER JOIN exam_question ON exam_exam.fk_question_id = exam_question.id WHERE exam_exam.fk_student_id='".$s_id."' AND exam_exam.date_time='".$data["date_time"]."'");
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
            $result[]= [
                'srl_no'=>$srl_no,
                'question_set'=>$data3["name"],
                'right_ans'=>$right_ans,
                'wrong_ans'=>$wrong_ans,
                'blank_ans'=>$blank_ans,
                'full_marks'=>$full_marks,
                'your_marks'=>$marks,
                'parsentage'=>$parsentage,
                'date_and_time'=>date("d M Y, h:i:s A",strtotime($data["date_time"]))
            ];
        }
        echo json_encode($result);
    }
?>