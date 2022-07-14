<?php
	require_once('../db/connection.php');

    $question_set_id = $_POST['set_id'];

    $query = "SELECT question.*, option.a, option.b, option.c, option.d FROM question INNER JOIN option ON question.id = option.fk_question_id WHERE question.fk_question_set_id= '".$question_set_id."'";

    $result = mysqli_query($conn, $query);
    $array = [];
    while($row = mysqli_fetch_assoc($result)){
        $array[] = $row;
    }
    echo json_encode($array);
?>