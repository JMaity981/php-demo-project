<?php
    require_once('../db/connection.php');

    $qry=mysqli_query($conn,"SELECT * FROM exam_question_set WHERE fk_class_id='".$_POST['class_id']."'");
    $var=[];
    while($row=mysqli_fetch_assoc($qry)){
        $var[]=$row;
    }
    echo json_encode($var);
?>