<?php
if(isset($_POST['payer'])) {

	if(isset($_POST['Numtel'],$_POST['nom'],$_POST['postnom'],$_POST['prenom'],$_POST['nationalite'],$_POST['lieuness'],$_POST['datenaiss'],$_POST['nomadressesecre'],$_POST['adessecompleetranger'],$_POST['piceid'],$_POST['lieudeliv'],$_POST['Etatacompagner'],$_POST['Deccclaration'],$_POST['adressemain'])) {

	   if(!empty($_POST['Numtel']) AND !empty($_POST['nom']) AND !empty($_POST['postnom']) AND !empty($_POST['prenom']) AND !empty($_POST['nationalite']) AND !empty($_POST['lieuness']) AND !empty($_POST['datenaiss']) and !empty($_POST['nomadressesecre']) AND !empty($_POST['adessecompleetranger']) AND !empty($_POST['piceid']) AND !empty($_POST['lieudeliv']) AND !empty($_POST['Etatacompagner']) AND !empty($_POST['Deccclaration']) AND !empty($_POST['adressemain'])) {
	      $Numtel = htmlspecialchars($_POST['Numtel']);
	      $nom = htmlspecialchars($_POST['nom']);
        $postnom = htmlspecialchars($_POST['postnom']);
        $nationalite = htmlspecialchars($_POST['nationalite']);
        $lieuness = htmlspecialchars($_POST['lieuness']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $datenaiss = htmlspecialchars($_POST['datenaiss']);
        $adressemain = htmlspecialchars($_POST['adressemain']);

        $etatcivil = htmlspecialchars($_POST['etatcivil']);
        $nomadressesecre = htmlspecialchars($_POST['nomadressesecre']);
        $adessecompleetranger = htmlspecialchars($_POST['adessecompleetranger']);
        $piceid = htmlspecialchars($_POST['piceid']);
        $lieudeliv = htmlspecialchars($_POST['lieudeliv']);
        $Etatacompagner = htmlspecialchars($_POST['Etatacompagner']);
        $Deccclaration = htmlspecialchars($_POST['Deccclaration']);
        $Etatacompagner = htmlspecialchars($_POST['Etatacompagner']);

        $Datearrive = htmlspecialchars($_POST['Datearrive']);
        $Duree = htmlspecialchars($_POST['Duree']);
        $motoifsejour = htmlspecialchars($_POST['motoifsejour']);
        $datedapart = htmlspecialchars($_POST['datedapart']);
              $longueurCode = 5;
              $Codeun = "";
                for($i=1;$i<$longueurCode;$i++) {
              $Codeun .= mt_rand(0,9);
           }
                  $longueurCod = 5;
              $Codeu = "";
                for($i=1;$i<$longueurCod;$i++) {
              $Codeu .= mt_rand(0,9);
           }
           $reqre = $bdd->prepare('SELECT * FROM client WHERE Numtel = ? ');
           $reqre->execute(array($Numtel));
           $Resultats = $reqre->rowCount();
           if($Resultats == 0) {
        if(isset($_FILES['image']) AND !empty($_FILES['image']['name'])) {
             $tailleMax = 2097152;
             $extensionsValides = array('png','jpg');
             if($_FILES['image']['size'] <= $tailleMax) {
                $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
                if(in_array($extensionUpload, $extensionsValides)) {
                   $chemin = "images/".$Codeun.".".$extensionUpload;
                   $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
                   if($resultat) {
$ins = $bdd->prepare('INSERT INTO client (idclient,Numtel,nom,postnom,nationalite,lieuness,prenom,datenaiss,etatcivil,nomadressesecre,adessecompleetranger,piceid,lieudeliv,Etatacompagner,Deccclaration,adressemain,imagese) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$ins->execute(array($Codeun,$Numtel,$nom,$postnom,$nationalite,$lieuness,$prenom,$datenaiss,$etatcivil,$nomadressesecre,$adessecompleetranger,$piceid,$lieudeliv,$Etatacompagner,$Deccclaration,$adressemain,$Codeun.".".$extensionUpload));
$inst = $bdd->prepare('INSERT INTO reservation (idreservation,Datearrive,Duree,motoifsejour,Code,idclient,datedapart,dateres) VALUES ( ?, ?, ?, ?, ?, ?, ?,NOW())');
              $inst->execute(array($Codeu,$Datearrive,$Duree,$motoifsejour,$_GET['choix'],$Codeun,$datedapart));

          header("Location:paiment.php?idreservation=$Codeu");
              
                   } else {
                      $_erreur['erreurLogin'] = "<strong>Erreur!</strong> Erreur durant l'importation de votre photo de profil";
                   }
                } else {
                   $_erreur['erreurLogin'] = "<strong>Erreur!</strong> Votre photo de profil doit être au format png";
                }
             } else {
                $_erreur['erreurLogin'] = "<strong>Erreur!</strong> Votre photo de profil ne doit pas dépasser 2Mo";
             }
      }else {
     $_erreur['erreurLogin']="<strong>Erreur!</strong> Veuillez compléter toutes les champs du mot de passée ou sélectionnez une image";
      }
              
           }else{
      $_erreur['erreurLogin']="<strong>Erreur!</strong> datenaiss déjà enregistrer !";
           }
	 } else {
	      $_erreur['erreurLogin']="<strong>Erreur!</strong> Veuillez compléter tous les champs";
	   }
	}  else {
        $_erreur['erreurLogin']="<strong>Erreur!</strong> Veuillez compléter";
     }
}
?>