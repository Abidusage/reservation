<?php
if(isset($_POST['service'])) {

	if(isset($_POST['libelle'],$_POST['prix'],$_POST['type'],$_POST['num'])) {
	   if(!empty($_POST['libelle']) AND !empty($_POST['prix']) AND !empty($_POST['type']) AND !empty($_POST['num'])) {
	      $libelle = htmlspecialchars($_POST['libelle']);
	      $prix = htmlspecialchars($_POST['prix']);
        $type = htmlspecialchars($_POST['type']);
        $num = htmlspecialchars($_POST['num']);
              $longueurCode = 5;
              $Codeun = "";
                for($i=1;$i<$longueurCode;$i++) {
              $Codeun .= mt_rand(0,9);
           }
           $reqre = $bdd->prepare('SELECT * FROM service WHERE num = ? and type = ?');
           $reqre->execute(array($num,$type));
           $Resultats = $reqre->rowCount();
           if($Resultats == 0) {
        
        if(isset($_FILES['image']) AND !empty($_FILES['image']['name'])) {
             $tailleMax = 2097152;
             $extensionsValides = array('png','jpg');
             if($_FILES['image']['size'] <= $tailleMax) {
                $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
                if(in_array($extensionUpload, $extensionsValides)) {
                   $chemin = "images/service/".$Codeun.".".$extensionUpload;
                   $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
                   if($resultat) {

                        $ins = $bdd->prepare('INSERT INTO service (Code,libelle,prix,type,num,image) VALUES ( ?, ?, ?, ?, ?, ?)');
                        $ins->execute(array($Codeun,$libelle,$prix,$type,$num,$Codeun.".".$extensionUpload));
                        $_erreur['erreurLogin']="<strong> Message !</strong> La service a bien été enregistrer  !";
              
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
      $_erreur['erreurLogin']="<strong>Erreur!</strong> service déjà enregistrer !";
           }
	 } else {
	      $_erreur['erreurLogin']="<strong>Erreur!</strong> Veuillez compléter tous les champs";
	   }
	} 
}
?>