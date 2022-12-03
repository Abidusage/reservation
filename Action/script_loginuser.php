<?php
  
  if (isset($_POST['connexion'])) {
    if(!empty($_POST['email']) AND !empty($_POST['motdepasse'])) {
    $email = htmlspecialchars($_POST['email']);
  $motdepasse = htmlspecialchars($_POST['motdepasse']);
  $requete="SELECT * FROM admin where  adressemail = ? and Mdp=sha1(?)"; 
  $param=array($email,$motdepasse);  
  $resultat = $bdd->prepare($requete);    
  $resultat->execute($param); 
  if($user=$resultat->fetch()){
       $_SESSION['adressemail']=$user['adressemail'];
        ob_start();
        header("Location:service.php");
  
  }else{
      $requet="SELECT * FROM client where adressemain = ? and Numtel = ?"; 
      $para=array($email,$motdepasse);  
      $resulta = $bdd->prepare($requet);    
      $resulta->execute($para); 
      if($usA=$resulta->fetch()){

         session_start();   
                    $_SESSION['idclient']=$usA['idclient'];
                    ob_start();
                    header("Location:serviceliste.php");

      }else{

    $requet="SELECT * FROM agent where Login = ? and motpasse=sha1(?)"; 
    $para=array($email,$motdepasse);  
    $resulta = $bdd->prepare($requet);    
    $resulta->execute($para); 
      if($us=$resulta->fetch()){
        
        
        ob_start();
        header("Location:servicelist.php");

      }else {
        $_erreur['erreurLogin']="<strong>Erreur!</strong> Tous les champs de la scomplétés!";
        
    }
     }
    } 
        } else {
          $_erreur['erreurLogin']="<strong>Erreur!</strong> Tous les champs de la connexion doivent être complétés!";
          
      }
  }
  
 ?> 