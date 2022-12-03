<?php
if(isset($_POST['service'])) {

	if(isset($_POST['nom'],$_POST['Login'],$_POST['motpasse'])) {
	   if(!empty($_POST['nom']) AND !empty($_POST['Login']) AND !empty($_POST['motpasse'])) {
	      $nom = htmlspecialchars($_POST['nom']);
	      $Login = htmlspecialchars($_POST['Login']);
        $motpasse = htmlspecialchars($_POST['motpasse']);
        $pwd = sha1($_POST['motpasse']);
              $longueurCode = 5;
              $Codeun = "";
                for($i=1;$i<$longueurCode;$i++) {
              $Codeun .= mt_rand(0,9);
           }
           $reqre = $bdd->prepare('SELECT * FROM agent WHERE Login = ? ');
           $reqre->execute(array($Login));
           $Resultats = $reqre->rowCount();
           if($Resultats == 0) {
        
              $ins = $bdd->prepare('INSERT INTO agent (Code,nom,Login,motpasse) VALUES ( ?, ?, ?, ?)');
              $ins->execute(array($Codeun,$nom,$Login,$pwd));
          $_erreur['erreurLogin']="<strong> Message !</strong> L'agent a bien été posté !";
           }else{
      $_erreur['erreurLogin']="<strong>Erreur!</strong> Login déjà enregistrer !";
           }
	 } else {
	      $_erreur['erreurLogin']="<strong>Erreur!</strong> Veuillez compléter tous les champs";
	   }
	} 
}
?>