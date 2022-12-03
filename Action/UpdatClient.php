<?php
if(isset($_POST['service'])) {
  $requser = $bdd->prepare("SELECT * FROM  service where Code = ?");
  $requser->execute(array($_GET['choix']));
  $user = $requser->fetch();
if(isset($_POST['libelle']) AND !empty($_POST['libelle']) AND $_POST['libelle'] != $user['libelle']) 
{
      $newpseudo = htmlspecialchars($_POST['libelle']);
      $insertpseudo = $bdd->prepare("UPDATE service SET libelle = ? WHERE Code = ?");
      $insertpseudo->execute(array($newpseudo, $_GET['choix']));

      $_erreur['erreurLogin']="<strong> Félicitations. Les information de  l'service été mis à jour ! </strong>";
}
if(isset($_POST['prix']) AND !empty($_POST['prix']) AND $_POST['prix'] != $user['prix']) 
{
      $newBiographie = htmlspecialchars($_POST['prix']);
      $insertpseudo = $bdd->prepare("UPDATE service SET prix = ? WHERE Code = ?");
      $insertpseudo->execute(array($newBiographie, $_GET['choix']));

         $_erreur['erreurLogin']="<strong> Félicitations. Les information de  l'service été mis à jour ! </strong>";
}
if(isset($_POST['type']) AND !empty($_POST['type']) AND $_POST['type'] != $user['type']) 
{
      $newtype = htmlspecialchars($_POST['type']);
      $insertpseudo = $bdd->prepare("UPDATE service SET type = ? WHERE Code = ?");
      $insertpseudo->execute(array($newtype, $_GET['choix']));

      $_erreur['erreurLogin']="<strong> Félicitations. Les information de  l'service été mis à jour ! </strong>";
}
if(isset($_POST['num']) AND !empty($_POST['num']) AND $_POST['num'] != $user['num']) 
{
      $newLieuNaissance = htmlspecialchars($_POST['num']);
      $insertpseudo = $bdd->prepare("UPDATE service SET num = ? WHERE Code = ?");
      $insertpseudo->execute(array($newLieuNaissance, $_GET['choix']));
      $_erreur['erreurLogin']="<strong> Félicitations. Les information de  l'service été mis à jour ! </strong>";
}
if(isset($_FILES['image']) AND !empty($_FILES['image']['name'])) {
             $tailleMax = 2097152;
             $extensionsValides = array('png','jpg');
             if($_FILES['image']['size'] <= $tailleMax) {
                $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
                if(in_array($extensionUpload, $extensionsValides)) {
                   $chemin = "images/service/".$user['Code'].".".$extensionUpload;
                   $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
                   if($resultat) {
                      $insertSexe = $bdd->prepare("UPDATE service SET image = ? WHERE Code = ?");
                $insertSexe->execute(array($user['Code'].".".$extensionUpload, $_GET['choix']));

                      $_erreur['erreurLogin'] = "<strong>Félicitations. !</strong> Le information été mis à jour ! ";
                   } else {
                      $_erreur['erreurLogin'] = "<strong>Erreur!</strong> Erreur durant l'importation de votre photo de profil";
                   }
                } else {
                   $_erreur['erreurLogin'] = "<strong>Erreur!</strong> Votre photo de profil doit être au format png";
                }
             } else {
                $_erreur['erreurLogin'] = "<strong>Erreur!</strong> Votre photo de profil ne doit pas dépasser 2Mo";
             }
      }
?><?php
}
?>