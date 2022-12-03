<?php
if(isset($_POST['payer'])) {

	if(isset($_POST['coderef'],$_POST['numenv'],$_POST['montant'])) {
	   if(!empty($_POST['coderef']) AND !empty($_POST['numenv']) AND !empty($_POST['montant'])) {
	      $coderef = htmlspecialchars($_POST['coderef']);
	      $numenv = htmlspecialchars($_POST['numenv']);
        $montant = htmlspecialchars($_POST['montant']);
        $idreservation = htmlspecialchars($_GET['idreservation']);
              $longueurCode = 5;
              $Codeun = "";
                for($i=1;$i<$longueurCode;$i++) {
              $Codeun .= mt_rand(0,9);
           }
           $reqre = $bdd->prepare('SELECT * FROM paiement WHERE coderef = ? ');
           $reqre->execute(array($coderef));
           $Resultats = $reqre->rowCount();
           if($Resultats == 0) {
        
              $ins = $bdd->prepare('INSERT INTO paiement (idpaiement,coderef,numenv,montant,idreservation) VALUES ( ?, ?, ?, ?, ?)');
              $ins->execute(array($Codeun,$coderef,$numenv,$montant,$idreservation));
              
                $requet="SELECT * FROM  reservation INNER JOIN service ON service.Code = reservation.Code INNER JOIN client ON client.idclient = reservation.idclient where idreservation = ?"; 
                  $para=array($_GET['idreservation']);  
                  $resulta = $bdd->prepare($requet);    
                  $resulta->execute($para); 
                if($usA=$resulta->fetch()){ 
                  session_start();   
                    $_SESSION['idclient']=$usA['idclient'];
                    ob_start();
                    header("Location:profile.php?idpaiement=$Codeun");
                }

           }else{
      $_erreur['erreurLogin']="<strong>Erreur!</strong> Login déjà enregistrer !";
           }
	 } else {
	      $_erreur['erreurLogin']="<strong>Erreur!</strong> Veuillez compléter tous les champs";
	   }
	} 
}
?>