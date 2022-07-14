<?php
	require_once('../db/connection.php');
    
    if(isset($_GET['u_id'])){
        $id=$_GET['u_id'];
        $qry = "DELETE FROM student_details WHERE id= '".$id."'";
        $delete= mysqli_query($conn,$qry);
        if($delete){
            $data= ['key'=>"S", 'message'=>"Delete Successfully"];
        }else{
            $data= ['key'=>"E", 'message'=>"Delete Unsuccessfully"];
        }
        $qry2 = "DELETE FROM login WHERE fk_student_id= '".$id."'";
        $delete2= mysqli_query($conn,$qry2);
        if($delete2){
            $data= ['key'=>"S", 'message'=>"Delete Successfully"];
        }else{
            $data= ['key'=>"E", 'message'=>"Delete Unsuccessfully"];
        }
        echo json_encode($data);
    }
?>