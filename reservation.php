<?php
include('Action/functions/connexion.php');
include('Action/reservation.php');
include ('Variablemessage.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<header>
    <a href="index.php" class="logo"><span>Beau lieu</span>Hôtel</a>
    <ul class="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Apropos</a></li>
        <li><a href="#">salle de conference</a></li>
        <li><a href="#">Chambre à coucher</a></li>
        <li class="btn-con"><a href="connexion.php">connexion</a></li>
        <li><a href="index.php"></a></li>
    </ul>
</header>
        <section class="apropo" id="apropo">
            <h2 class="titre-texte"><span>V</span>otre Reservation</h2>
            <div class="row">
                                 <?php
$requse = $bdd->query("SELECT * FROM service where  Code ='$_GET[choix]' ");
    while ($userinf=$requse->fetch()) {?>     
                <div class="col50">
                   <br><br><br><br><br><br>
                    
                        <div class="contenu">
                            <a href="#" class="res">
                            <div class="box">
                                <div class="imbox">
                                     <img style="width: 750px; height:350px;" class="card-img-top" src="images/service/<?php echo $userinf['image'];?>"/>
                                </div>
                                <div class="reservation"><br>
                                </a>
                                <h4>1) Type du service <br><?php echo $userinf['type'];?></h4>
                                <h4>2) Prix du service <br><?php echo $userinf['prix'];?>$<h4>
                                <h4>3) Numéro :  <?php echo $userinf['num'];?><h4>
                                <h4>4) Libelle du service <br><?php echo $userinf['libelle'];?><h4>
                                </div>
                            </div>
                        </div>
                        <p style="color: rgb(160, 63, 63);"> lolo</p>
                </div>
                <?php
}
?>
                <div class="col50">
                 <form action="" method="POST" enctype="multipart/form-data"> 
                    <?php
                if($erreurLogin!=""){?>
                <h4><strong>     
                <?php echo $erreurLogin ?>  
                </strong></h4>   
                <?php   } ?>
                            <BR>
                        <div class="contactform3">
                         
                            <h1>Information sur le Client</h1>
                            <label for="">#N°Tel</label>
                            <div class="inputboite2">
                                <input type="int"  name="Numtel" id="utilisateur" placeholder="N° Téléphone">
                            </div>
                            <label for="">#votre Adresse Mail</label>
                            <div class="inputboite2">
                                <input type="mail" name="adressemain" id="mail" placeholder="Entre votre addresse Mail">
                            </div>
                            <label for="">#Nom</label>
                            <div class="inputboite2">
                                <input type="text" name="nom" id="nom" placeholder="Entre Votre Nom">
                            </div>
                            <label for="">#postNom</label>
                            <div class="inputboite2">
                                <input type="text" name="postnom" id="postnom" placeholder="Entre Votre postNom">
                            </div>
                            <label for="">#Prénom</label>
                            <div class="inputboite2">
                                <input type="text" name="prenom" id="prenom" placeholder="Entre Votre Prénom">
                            </div>
                            <label for="">#Nationalité</label>
                            <div class="inputboite2">
                                <input type="Text" name="nationalite" id="nation" placeholder="Entre Votre Nationnalite">
                            </div>
                            <label for="">#Lieu De Naissance</label>
                            <div class="inputboite2">
                                <input type="Text" name="lieuness" id="Lieu" placeholder="Entre votre Lieu de Naissance">
                            </div>
                            <label for="">#Date De Naissance</label>
                            <div class="inputboite2">
                                <input type="Date" name="datenaiss" id="datenas" placeholder="Entre vottre date de Naissance">
                            </div>
                            <label for="">#Etat Civile</label>
                            <div class="inputboite2">
                                <input type="text" name="etatcivil" id="Civile" placeholder="Entre votre Etat Civile">
                            </div>
                            <label for="">#Nom du service Emploie</label>
                            <div class="inputboite2">
                                <input type="text" name="nomadressesecre" id="servicename" placeholder="Entre Le Nom de votre service">
                            </div>
                            <label for="">#Adresse de la ou vous resider à l'etrager</label>
                            <div class="inputboite2">
                                <input type="phone" name="adessecompleetranger" id="Etranger" placeholder="Entre l'adresse de la ou vous resider à l'etrager">
                            </div>
                            <label for="">#Date de votre Arriver</label>
                            <div class="inputboite2">
                                <input type="date" name="Datearrive" id="Arriver">
                            </div>
                            <label for="">#Date de par</label>
                            <div class="inputboite2">
                                <input type="date" name="datedapart" id="Arriver">
                            </div>
                            <label for="">#Nombre de sejour</label>
                            <div class="inputboite2">
                                <select style="height: 35px; width: 220px;" name="Duree" id="datedepart" class="inputboite2">
                                    <optgroup label="Sélectionner nombre de sejour">
                                            <?php for ($i=1; $i <= 30 ; $i++) { ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?> jours</option>
                                        <?php } ?>
                                    </optgroup>
                                </select>
                            </div>
                            <label for="">#Motif De votre Sejour</label>
                            <div class="inputboite2">
                                <input type="text" name="motoifsejour" id="motif" placeholder="Ecrivez Le Motif Me Votre Sejour">
                            </div>
                            <label for="">#Pièce d'identinté</label>
                            <div class="inputboite2">
                                <input type="text" name="piceid" id="carte" placeholder="Ecrive Votre pièce D'identinté">
                            </div>
                            <label for="">#Lieu Delivre de votre Carte</label>
                            <div class="inputboite2">
                                
                                <input type="Text" name="lieudeliv" id="Liedv" placeholder="Entre Le Lieu Delivre">
                            </div>
                            <label for="">#Etat Accompagner par</label>
                            <div class="inputboite2">
                                <input type="text" name="Etatacompagner" id="accp" placeholder="Indiquez-Nous Si vous Etes Acompagné">
                            </div>
                            <label for="">#Declaration</label>
                            <div class="inputboite2">
                                <input type="text" name="Deccclaration" id="declaration" placeholder="Declaration du Client">
                            </div>
                            <label for="">#Votre photo</label>
                            <div class="inputboite2">
                                <input type="file" name="image">
                            </div><br>
                <div class="inputboite2">
                    <input type="submit" name="payer" value="Connexion">
                </div><br>
                
                 
                       </div>
                    </form>  
                    
                </div>
            </div>
    </section>
    <div class="copyright">
        <p>&copy; 2022  &middot; <a href="#">Kasage Abidu</a>Tout droits reservé</p>
    </div>
    </body>
</html>