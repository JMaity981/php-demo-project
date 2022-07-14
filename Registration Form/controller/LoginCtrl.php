<?php
	require_once('../db/connection.php');
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
        header("Location: ../profile.php?student_id=$fk_student_id");
    }else{
        echo "username or password does not match";
    }