<?php 
if(isset($_POST['Annuler'])) {

		$choix = $_GET['choix'];
		$EtatCompte='1';

		  $requete="SELECT * FROM  credit INNER JOIN client ON client.login = credit.login where credit.IDcredit = ?"; 
		  $param=array($choix);  
		  $resultat = $bdd->prepare($requete);    
		  $resultat->execute($param); 
		  if($user=$resultat->fetch())
		  {
		  	$Telephone = $user['telephoneclient'];
		  	$reqrecherche = $bdd->prepare("SELECT * FROM  creditvalide WHERE IDcredit = ?");
              $reqrecherche->execute(array($choix));
              $Resultats_exist = $reqrecherche->rowCount();
            if($Resultats_exist == 0) {
            	$longueurCode = 5;
            	$Codeun = "";
                for($i=1;$i<$longueurCode;$i++) {
              $Codeun .= mt_rand(0,9);
           }
		  	$Datevalide = date("d/m/Y");

		  	$Daterab = mktime(0, 0, 0, date("m"), date("d")+$user['temps'], date("Y"));
            $Datera = date("d/m/Y", $Daterab);
				
				$ins = $bdd->prepare('INSERT INTO creditvalide (codevalide,Datevalide,Daterab,IDcredit,login) VALUES ( ?, ?, ?, ?, ?)');
		        $ins->execute(array($Codeun,$Datevalide,$Datera,$choix,$user['login']));
		        ob_start();
   header("Location:https://programmationchris.000webhostapp.com?num=$Telephone&message= Bonjour cher(e) client(e) ");
		    }else{
      $_erreur['erreurLogin']="<strong>Erreur!</strong> Demande déjà valider !";
           }  
		  }

}  
?>