<?php
	require_once('../db/connection.php');
    if(isset($_GET['u_id'])){
        $id=$_GET['u_id'];
        $qry = "SELECT * FROM student_details WHERE id= '".$id."'";
        $data = mysqli_query($conn, $qry);
        $data2 = mysqli_fetch_assoc($data);
        echo json_encode($data2);
    }
?>