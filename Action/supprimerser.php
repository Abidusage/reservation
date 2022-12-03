<?php 
		require_once('functions/connexion.php');
		$choix = $_GET['choix'];
		$insertpseudo = $bdd->query("DELETE FROM service WHERE Code = '$choix' ");;
      	header("Location:../service.php");
?>