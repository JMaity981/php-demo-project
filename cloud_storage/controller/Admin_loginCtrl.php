<?php
	require_once('../db/connection.php');
    $u_name = $_POST['u_name'];
    $psw = $_POST['psw'];

    $qry = mysqli_query($conn, "SELECT * FROM admin_login WHERE user_name = '".$u_name."' AND password= '".$psw."'");

    if(mysqli_num_rows($qry) > 0){
        $data = mysqli_fetch_assoc($qry);
        $_SESSION['a_id'] = $data['id'];
        
        $return['key'] = 'S';
        $return['msg'] = 'Login Successfull.';
    }else{
        $return['key'] = 'E';
        $return['msg'] = 'Credential not match.';
    }
    echo json_encode($return);
?>