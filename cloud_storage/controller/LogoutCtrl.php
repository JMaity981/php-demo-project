<?php
	require_once('../db/connection.php');
    if(isset($_SESSION["id"])){
        $u_qry = "UPDATE resistration SET now_login = 'N' WHERE id = '".$_SESSION["id"]."'";
	    $update= mysqli_query($conn, $u_qry);
        unset($_SESSION["id"]);
        unset($_SESSION["name"]);
        header('Location: ../login.php');
    }
?>