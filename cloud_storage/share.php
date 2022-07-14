<?php
	require_once('./db/connection.php');
    if(!isset($_SESSION['id'])){
		header('Location: ./login.php');
	}
?>