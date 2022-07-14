<?php
	require_once('../db/connection.php');

    $u_name = $_POST['u_name'];
    $email = $_POST['email'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $adress = $_POST['adress'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $p_code = $_POST['p_code'];
    $about_me = $_POST['about_me'];
    $photo_name = '';
    if($_FILES['photo']['name'] != ''){
        $test = explode('.', $_FILES['photo']['name']);
        $extension = end($test);    
        $photo_name = rand(100,999).'.'.$extension;
        $location = '../uploads/'.$photo_name;
        move_uploaded_file($_FILES['photo']['tmp_name'], $location);
        $photo = basename($_FILES["photo"]["name"]);
    }
    $qry = "INSERT INTO registration (u_name, email, f_name, l_name, photo, adress, city, country, p_code, about_me) VALUES ('".$u_name."', '".$email."', '".$f_name."', '".$l_name."', '".$photo_name."', '".$adress."', '".$city."', '".$country."', '".$p_code."', '".$about_me."')";
    $insert = mysqli_query($conn, $qry);
    if($insert){
        $return= ['key'=> "S" , 'msg'=>"Registration Sucessfully."];
    }else{
        $return= ['key'=> "E" , 'msg'=>"Registration Un-sucessfully."];
    }
    echo json_encode($return);
    
?>