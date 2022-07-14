<?php
	require_once('../db/connection.php');
    $u_name = $_POST['u_name'];
    $psw = $_POST['psw'];

    $qry = "SELECT * FROM exam_registration WHERE user_id = '".$u_name."' AND password= '".$psw."'";
    $data = mysqli_query($conn, $qry);

    if(mysqli_num_rows($data) > 0){
        $data2 = mysqli_fetch_assoc($data);
        $_SESSION['s_id'] = $data2['id'];
        $_SESSION['name'] = $data2['name'];
        $student_id = $data2['id'];
        $class_id = $data2['class_id'];
        $return['key'] = 'S';
        $return['msg'] = 'Login Successfull.';
        $return['student_id'] = base64_encode($student_id);
    }else{
        $return['key'] = 'E';
        $return['msg'] = 'Credential not match.';
    }
    echo json_encode($return);
?>