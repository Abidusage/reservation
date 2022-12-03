<?php
	session_start();
	if(!isset($_SESSION['Codeetudiabt'])){	//si la variable $_SESSION['user'] n'existe pas
		header('location:../../../index.php');
		exit();
	}
?>                             