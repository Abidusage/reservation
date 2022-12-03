<?php
if(isset($_GET['choix'])) {
  $requser = $bdd->prepare("SELECT * FROM  agent where Id_agent = ?");
  $requser->execute(array($_GET['choix']));
  $user = $requser->fetch();
if(isset($_POST['nom']) AND !empty($_POST['nom']) AND $_POST['nom'] != $user['nom']) 
{
      $newpseudo = htmlspecialchars($_POST['nom']);
      $insertpseudo = $bdd->prepare("UPDATE agent SET nom = ? WHERE Id_agent = ?");
      $insertpseudo->execute(array($newpseudo, $_GET['choix']));

      $_erreur['erreurLogin']="<strong> Félicitations. Profil de l'agent été mis à jour ! </strong>";
}
if(isset($_POST['postnom']) AND !empty($_POST['postnom']) AND $_POST['postnom'] != $user['postnom']) 
{
      $newBiographie = htmlspecialchars($_POST['postnom']);
      $insertpseudo = $bdd->prepare("UPDATE agent SET postnom = ? WHERE Id_agent = ?");
      $insertpseudo->execute(array($newBiographie, $_GET['choix']));

         $_erreur['erreurLogin']="<strong> Félicitations. Profil de l'agent été mis à jour ! </strong>";
}
if(isset($_POST['prenom']) AND !empty($_POST['prenom']) AND $_POST['prenom'] != $user['prenom']) 
{
      $newprenom = htmlspecialchars($_POST['prenom']);
      $insertpseudo = $bdd->prepare("UPDATE agent SET prenom = ? WHERE Id_agent = ?");
      $insertpseudo->execute(array($newprenom, $_GET['choix']));

      $_erreur['erreurLogin']="<strong> Félicitations. Profil de l'agent été mis à jour ! </strong>";
}
if(isset($_POST['sexe']) AND !empty($_POST['sexe']) AND $_POST['sexe'] != $user['sexe']) 
{
      $newLieuNaissance = htmlspecialchars($_POST['sexe']);
      $insertpseudo = $bdd->prepare("UPDATE agent SET sexe = ? WHERE Id_agent = ?");
      $insertpseudo->execute(array($newLieuNaissance, $_GET['choix']));
      $_erreur['erreurLogin']="<strong> Félicitations. Profil de l'agent été mis à jour ! </strong>";
}
if(isset($_POST['telephone']) AND !empty($_POST['telephone']) AND $_POST['telephone'] != $user['telephone']) 
{
      $newLieuNaissance = htmlspecialchars($_POST['telephone']);
      $insertpseudo = $bdd->prepare("UPDATE agent SET telephone = ? WHERE Id_agent = ?");
      $insertpseudo->execute(array($newLieuNaissance, $_GET['choix']));
      $_erreur['erreurLogin']="<strong> Félicitations. Profil de l'agent été mis à jour ! </strong>";
}
if(isset($_POST['login']) AND !empty($_POST['login']) AND $_POST['login'] != $user['login']) 
{
      $newLieuNaissance = htmlspecialchars($_POST['login']);
      $insertpseudo = $bdd->prepare("UPDATE agent SET login = ? WHERE Id_agent = ?");
      $insertpseudo->execute(array($newLieuNaissance, $_GET['choix']));
      $_erreur['erreurLogin']="<strong> Félicitations. Profil de l'agent été mis à jour ! </strong>";
}
if(isset($_POST['fonction']) AND !empty($_POST['fonction']) AND $_POST['fonction'] != $user['fonction']) 
{
      $newLieuNaissance = htmlspecialchars($_POST['fonction']);
      $insertpseudo = $bdd->prepare("UPDATE agent SET fonction = ? WHERE Id_agent = ?");
      $insertpseudo->execute(array($newLieuNaissance, $_GET['choix']));
      $_erreur['erreurLogin']="<strong> Félicitations. Profil de l'agent été mis à jour ! </strong>";
}
?><?php
}
?>