<?php
	require_once('../db/connection.php');

    $u_name = $_POST['u_name'];
    $psw = $_POST['psw'];

    $qry = "SELECT id, name, is_active, now_login FROM resistration WHERE user_name = '".$u_name."' AND password= '".$psw."'";
    $data = mysqli_query($conn, $qry);

    if(mysqli_num_rows($data) > 0){
        $data2 = mysqli_fetch_assoc($data);
        if($data2['is_active']=='N'){
            $return= ['key'=> "E" , 'msg'=>"Your Acount is Not Active"];
            echo json_encode($return);
            die;
        }
        if($data2['now_login']=='Y'){
            $return= ['key'=> "E" , 'msg'=>"Someone Else Login Now"];
            echo json_encode($return);
            die;
        }
        $u_qry = "UPDATE resistration SET now_login = 'Y' WHERE id = '".$data2['id']."'";
	    $update= mysqli_query($conn, $u_qry);
        $_SESSION['id'] = $data2['id'];
        $_SESSION['name'] = $data2['name'];
        //print_r($_SESSION['name']);die;
        $return['key'] = 'S';
        $return['msg'] = 'Login Successfull.';
    }else{
        $return['key'] = 'E';
        $return['msg'] = 'User Name, Password Not Match';
    }
    echo json_encode($return);
?>