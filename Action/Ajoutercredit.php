<?php
if(isset($_POST['connexion'])) {

	if(isset($_POST['montant'],$_POST['descp'],$_POST['type'],$_POST['temps'])) {

	      $montant = htmlspecialchars($_POST['montant']);
	      $descp = htmlspecialchars($_POST['descp']);
        $type = htmlspecialchars($_POST['type']);
        $temps = htmlspecialchars($_POST['temps']);
              $longueurCode = 5;
              $Codeun = "";
                for($i=1;$i<$longueurCode;$i++) {
              $Codeun .= mt_rand(0,9);
           }
           $reqre = $bdd->prepare('SELECT * FROM credit WHERE login = ? ');
           $reqre->execute(array($_SESSION['login']));
           $Resultats = $reqre->rowCount();
           if($Resultats == 0) {
            if (!empty($_POST['montant'])) {
              if ($type="Court terme") {
                  if ($montant > 500) {
                    $_erreur['erreurLogin']="<strong>Erreur!</strong> Le montant n'est doit pas de passer 500$ !";
                  }else{
                    if ($temps >90) {
                      $_erreur['erreurLogin']="<strong>Erreur!</strong> Durée de reboisement n'est doit pas de passer 3 mois !";
                    }else{
                    $interet = $montant * 0.2 / $temps;
                     $ins = $bdd->prepare('INSERT INTO credit (IDcredit,montant,descp,detecredit,type,login,interet) VALUES ( ?, ?, ?, Now(), ?, ?, ?)');
                     $ins->execute(array($Codeun,$montant,$descp,$type,$_SESSION['login'],$interet));
                     $_erreur['erreurLogin']="<strong> Message !</strong> Demande a bien été posté !";
                    }
                    
                  }  
                }
                if ($type="Moyen terme") {
                   if ($montant > 2000) {
                    $_erreur['erreurLogin']="<strong>Erreur!</strong> Le montant n'est doit pas de passer 2000$ !";
                  }else{
                    if ($temps > 90) {
                      $_erreur['erreurLogin']="<strong>Erreur!</strong> Durée de reboisement n'est doit pas de passer 3 mois !";
                    }else{
                      if ($montant < 500) {
                        $_erreur['erreurLogin']="<strong>Erreur!</strong> Le montant doit être entre 500 à 1500$ !";
                      }else{
                    $interet = $montant * 0.2 / $temps;
                     $ins = $bdd->prepare('INSERT INTO credit (IDcredit,montant,descp,detecredit,type,login,interet,temps) VALUES ( ?, ?, ?, Now(), ?, ?, ?, ?)');
                     $ins->execute(array($Codeun,$montant,$descp,$type,$_SESSION['login'],$interet,$temps));
                     $_erreur['erreurLogin']="<strong> Message !</strong> Demande a bien été posté !";
                      }
                    
                    }
                    
                  } 
                } if ($type="Longue terme") {
                   if ($montant >= 2000) {
                      if ($temps > 359) {
                      if ($montant < 2000) {
                        $_erreur['erreurLogin']="<strong>Erreur!</strong> Le montant doit être entre 500 à 1500$ !";
                      }else{
                    $interet = $montant * 0.02 / $temps;
                     $ins = $bdd->prepare('INSERT INTO credit (IDcredit,montant,descp,detecredit,type,login,interet,temps) VALUES ( ?, ?, ?, Now(), ?, ?, ?, ?)');
                     $ins->execute(array($Codeun,$montant,$descp,$type,$_SESSION['login'],$interet,$temps));
                     $_erreur['erreurLogin']="<strong> Message !</strong> Demande a bien été posté !";
                      }
                    
                    }else{
                      $_erreur['erreurLogin']="<strong>Erreur!</strong> Durée de reboisement doit de passer 11 mois !";
                      }
                  }else{
                    $_erreur['erreurLogin']="<strong>Erreur!</strong> Le montant doit être entre supérieur à 2000$ !";
                    
                  }
                }

            }else {
        $_erreur['erreurLogin']="<strong>Erreur!</strong> Veuillez compléter tous les champs";
     }
                
             
           }else{
      $_erreur['erreurLogin']="<strong>Erreur!</strong> Demande déjà enregistrer !";
           }
	 
	} else {
        $_erreur['erreurLogin']="<strong>Erreur!</strong> Veuillez ";
     }
}
?>