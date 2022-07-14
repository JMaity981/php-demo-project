<?php
    require_once('./connection.php');
    
    $name = $_POST['name'];
    $father_name = $_POST['father_name'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $state =$_POST['state'];
    $city =$_POST['city'];
    $dob =$_POST['dob'];
    $pin =$_POST['pin'];
    $course =$_POST['course'];
    $email =$_POST['email'];

    $qry = "INSERT INTO student_details (name, father_name, address, gender, state, city, dob, pin, course, email) VALUES ('".$name."', '".$father_name."', '".$address."', '".$gender."', '".$state."', '".$city."', '".$dob."', '".$pin."', '".$course."', '".$email."')";
    //print_r($qry);die;
    $insert = mysqli_query($conn, $qry);
?>