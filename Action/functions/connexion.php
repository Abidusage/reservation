<?php
try {  
$bdd = new PDO('mysql:host=127.0.0.1;dbname=gestionhot', 'root', '');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(!$bdd){
    echo "Impossible de se connecter à la BDD";
} else {
    return $bdd;
}
} catch (Exception $ex) {
	include_once 'Pages/page-erreur.php';
    die();
}

?>