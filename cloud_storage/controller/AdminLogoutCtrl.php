<?php
	require_once('../db/connection.php');
    if(isset($_SESSION["a_id"])){
        unset($_SESSION["a_id"]);
        header('Location: ../admin_login.php');
    }
?>