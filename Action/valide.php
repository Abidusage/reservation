<?php 
	require_once('functions/connexion.php');
	if (isset($POST['Valide'])) {
	$choix = $_GET['choix'];
	$coderef = htmlspecialchars($_POST['coderef']);
	$numenv = htmlspecialchars($_POST['numenv']);
    $montant = htmlspecialchars($_POST['montant']);
	
	$reqre = $bdd->prepare("SELECT * FROM  paiement  where idreservation = '$choix' AND coderef='$coderef' and  numenv='$numenv' and montant='$montant'");
    $reqre->execute(array());
    $Resultats = $reqre->rowCount();
        if($Resultats == 0) {
			$insertpseudo = $bdd->prepare("UPDATE paiement SET Etat = '1' WHERE idreservation = ?");
			$insertpseudo->execute(array($_GET['choix']));
		}else{
			$_erreur['erreurLogin']="<strong>Erreur!</strong> Login déjà enregistrer !";
		}  	
}
?>²