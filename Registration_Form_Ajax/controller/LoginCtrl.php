<?php
	require_once('../db/connection.php');
    session_start();
    $u_name = $_POST['u_name'];
    $psw = $_POST['psw'];

    $qry = "SELECT * FROM login WHERE user_name = '".$u_name."' AND password= '".$psw."'";
    $data = mysqli_query($conn, $qry);

    if(mysqli_num_rows($data) > 0){
        $data2 = mysqli_fetch_assoc($data);
        $fk_student_id = $data2['fk_student_id'];
        $qry2 = "SELECT * FROM student_details WHERE id= '".$fk_student_id."'";
        $data3 = mysqli_query($conn,$qry2);
        $data4 = mysqli_fetch_assoc($data3);
        
        $qry3= "INSERT INTO login_log(student_id, user_id, login_type) VALUES('".$fk_student_id."','".$u_name."', 'U')";
        $insert = mysqli_query($conn, $qry3);

        $_SESSION['id'] = $data4['id'];
        $_SESSION['name'] = $data4['first_name'];
        //print_r($_SESSION['name']);die;
        $return['key'] = 'S';
        $return['msg'] = 'Login Successfull.';
        $return['stidentid'] = base64_encode( $fk_student_id );
        
        
        //header("Location: ../profile.php?student_id=$fk_student_id");
    }else{
        $return['key'] = 'E';
        $return['msg'] = 'Credential not match.';
    }
    echo json_encode($return);
?>