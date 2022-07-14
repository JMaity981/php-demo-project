<?php
	require_once('../db/connection.php');
    $u_name = $_POST['u_name'];
    $psw = $_POST['psw'];

    $qry = "SELECT * FROM admin WHERE user_name = '".$u_name."' AND password= '".$psw."'";
    $data = mysqli_query($conn, $qry);
    $data2 = mysqli_fetch_assoc($data);

    if(mysqli_num_rows($data) > 0){
        $_SESSION['a_id'] = $data2['id'];
        $_SESSION['is_admin']= 'Y';
        $return['key'] = 'S';
        $return['msg'] = 'Login Successfull.';
    }else{
        $return['key'] = 'E';
        $return['msg'] = 'Credential not match.';
    }
    echo json_encode($return);
?>