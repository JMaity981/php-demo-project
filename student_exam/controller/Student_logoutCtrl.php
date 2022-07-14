<?php
	require_once('../db/connection.php');
    if(isset($_SESSION["s_id"])){
        unset($_SESSION["s_id"]);
        unset($_SESSION["name"]);
        header('Location: ../student.php');
    }
?>