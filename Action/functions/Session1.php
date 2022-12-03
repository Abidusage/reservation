<?php
	session_start();
	if(!isset($_SESSION['idclient'])){	//si la variable $_SESSION['user'] n'existe pas
		header('location:index.php');
		exit();
	}
?>                             