<?php
	require_once('../db/connection.php');

    $id = $_POST['h_id'];
    $u_name = $_POST['u_name'];
    $email = $_POST['email'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $p_code = $_POST['p_code'];
    
    $qry= "UPDATE registration SET u_name = '".$u_name."', email = '".$email."', f_name = '".$f_name."', l_name = '".$l_name."', city = '".$city."', country = '".$country."', p_code = '".$p_code."' WHERE id = '".$id."'";
    $update = mysqli_query($conn, $qry);
    if($update){
        $return= ['key'=> "S" , 'msg'=>"Update Sucessfully."];
    }else{
        $return= ['key'=> "E" , 'msg'=>"Not Update"];
    }
    echo json_encode($return);
?>