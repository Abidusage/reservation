<?php
	session_start();
	if(!isset($_SESSION['login'])){	//si la variable $_SESSION['user'] n'existe pas
		header('location:../index.php');
		exit();
	}
?>                             