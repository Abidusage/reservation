<?php
if(isset($_POST['connexion'])) {

	if(isset($_POST['login'],$_POST['nomclient'],$_POST['postnomclient'],$_POST['prenomclient'],$_POST['motpasse'])) {
	   if(!empty($_POST['login']) AND !empty($_POST['nomclient']) AND !empty($_POST['postnomclient']) AND !empty($_POST['prenomclient']) AND !empty($_POST['motpasse'])) {

	      $login = htmlspecialchars($_POST['login']);
	      $nomclient = htmlspecialchars($_POST['nomclient']);
        $postnomclient = htmlspecialchars($_POST['postnomclient']);
        $motpasse = sha1($_POST['motpasse']);
        $prenomclient = htmlspecialchars($_POST['prenomclient']);
              
              $longueurCode = 5;
              $Codeun = "";
                for($i=1;$i<$longueurCode;$i++) {
              $Codeun .= mt_rand(0,9);
           }
           $reqre = $bdd->prepare('SELECT * FROM client WHERE login = ? ');
           $reqre->execute(array($login));
           $Resultats = $reqre->rowCount();
           if($Resultats == 0) {
        
              $ins = $bdd->prepare('INSERT INTO client (Codeclient,login,nomclient,postnomclient,motpasse,prenomclient,avatar) VALUES ( ?, ?, ?, ?, ?, ?, ?)');
              $ins->execute(array($Codeun,$login,$nomclient,$postnomclient,$motpasse,$prenomclient,'avatar.png'));
          $_erreur['erreurLogin']="<strong>Message!</strong> Votre compte a bien été créé ! <a href=\"index.php\">Me connecter</a>";
           }else{
      $_erreur['erreurLogin']="<strong>Erreur!</strong> Login déjà utiliser !";
           }
	 } else {
	      $_erreur['erreurLogin']="<strong>Erreur!</strong> Veuillez compléter tous les champs";
	   }
	} 
}
?>