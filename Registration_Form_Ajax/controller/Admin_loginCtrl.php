<?php
	require_once('../db/connection.php');
    session_start();
    $u_name = $_POST['u_name'];
    $psw = $_POST['psw'];

    $qry = "SELECT * FROM admin WHERE user_name = '".$u_name."' AND password= '".$psw."'";
    $data = mysqli_query($conn, $qry);

    if(mysqli_num_rows($data) > 0){
        $data2 = mysqli_fetch_assoc($data);
        $qry2 = "SELECT * FROM student_details";
        $data3 = mysqli_query($conn,$qry2);
        $data4 = mysqli_fetch_assoc($data3);

        $qry3= "INSERT INTO login_log(student_id, user_id, login_type) VALUES('".$data2['id']."','".$u_name."', 'A')";
        $insert = mysqli_query($conn, $qry3);

        $_SESSION['id'] = $data4['id'];
        
        $return['key'] = 'S';
        $return['msg'] = 'Login Successfull.';
    }else{
        $return['key'] = 'E';
        $return['msg'] = 'Credential not match.';
    }
    echo json_encode($return);
?>