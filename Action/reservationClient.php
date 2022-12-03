<?php
if(isset($_POST['payer'])) {

	if(isset($_POST['Datearrive'],$_POST['datedapart'],$_POST['motoifsejour'],$_POST['Duree'])) {

	   if(!empty($_POST['Datearrive']) AND !empty($_POST['datedapart']) AND !empty($_POST['motoifsejour']) AND !empty($_POST['Duree'])) {
	
        $Datearrive = htmlspecialchars($_POST['Datearrive']);
        $Duree = htmlspecialchars($_POST['Duree']);
        $motoifsejour = htmlspecialchars($_POST['motoifsejour']);
        $datedapart = htmlspecialchars($_POST['datedapart']);
              $longueurCod = 5;
              $Codeu = "";
                for($i=1;$i<$longueurCod;$i++) {
              $Codeu .= mt_rand(0,9);
           }
          $inst = $bdd->prepare('INSERT INTO reservation (idreservation,Datearrive,Duree,motoifsejour,Code,idclient,datedapart,dateres) VALUES ( ?, ?, ?, ?, ?, ?, ?,NOW())');
              $inst->execute(array($Codeu,$Datearrive,$Duree,$motoifsejour,$_GET['choix'],$_SESSION['idclient'],$datedapart));

          header("Location:paiment.php?idreservation=$Codeu");
	 } else {
	      $_erreur['erreurLogin']="<strong>Erreur!</strong> Veuillez compléter tous les champs";
	   }
	}  else {
        $_erreur['erreurLogin']="<strong>Erreur!</strong> Veuillez compléter";
     }
}
?>