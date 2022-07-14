<?php
	require_once('../db/connection.php');

    $question_set_id = $_POST['set_id'];

    $query = "SELECT exam_question.*, exam_option.a, exam_option.b, exam_option.c, exam_option.d FROM exam_question INNER JOIN exam_option ON exam_question.id = exam_option.fk_question_id WHERE exam_question.fk_question_set_id= '".$question_set_id."'";

    $result = mysqli_query($conn, $query);
    $array = [];
    while($row = mysqli_fetch_assoc($result)){
        $array[] = $row;
    }
    echo json_encode($array);
?>