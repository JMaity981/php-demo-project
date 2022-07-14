<?php
	require_once('../db/connection.php');

    if(isset($_GET['u_id'])){
        $id=$_GET['u_id'];
        $qry = mysqli_query($conn,"SELECT * FROM registration WHERE id= '".$id."'");
        $data = mysqli_fetch_assoc($qry);
        echo json_encode($data);
    }
?>