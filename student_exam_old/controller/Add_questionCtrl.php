<?php
	require_once('../db/connection.php');

    //$class_id = $_POST['class_id'];
    $set_id = $_POST['set_id'];
    $question = $_POST['question'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $answer = $_POST['answer'];
    //print_r($_POST);die;

    $qry = "INSERT INTO question (fk_question_set_id, question, answer) VALUES ('".$set_id."', '".$question."', '".$answer."')";
    $insert = mysqli_query($conn, $qry);
    $fk_question_id = $conn->insert_id;
    $qry2 = "INSERT INTO option (fk_question_id, a, b, c, d) VALUES ('".$fk_question_id."', '".$a."', '".$b."', '".$c."', '".$d."')";
    $insert2 = mysqli_query($conn, $qry2);
    if($insert AND $insert2){
        $return= ['key'=> "S" , 'msg'=>"Question Add Sucessfully."];
    }else{
        $return= ['key'=> "E" , 'msg'=>"Question Add Un-sucessfully."];
    }
    echo json_encode($return);
    
?>