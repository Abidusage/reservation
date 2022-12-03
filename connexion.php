<?php
include('Action/functions/connexion.php');
include('Action/script_loginuser.php');
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
    <a href="home.html" class="logo"><span>Beau lieu</span>Hôtel</a>
    <ul class="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Apropos</a></li>
        <li><a href="#">salle de conference</a></li>
        <li><a href="#">Chambre à coucher</a></li>
        <li class="btn-con"><a href="connexion.php">connexion</a></li>
        <li><a href="index.php" onclick="toggleMenu();"></a></li>
    </ul>
</header>
    <section class="contact" id="contact">
        <form action="" method="POST">
            <div class="contactform">
                <h1>Connexion</h1>
                <div class="inputboite">
                    <input type="email" name="email" id="utilisateur" placeholder="Adresse mail">
                </div>
                <div class="inputboite">
                    <input type="password" name="motdepasse" id="phone" placeholder="Numero de téléphone ou mot de passer">
                </div>
                <div class="inputboite">
                    <input type="submit" name="connexion" value="Connexion">
                </div>
            <div class="inputboite">
                <?php
                if($erreurLogin!=""){?>
                <h4><strong>     
                <?php echo $erreurLogin ?>  
                </strong></h4>   
                <?php   } ?>
            </div>
</div>
        </form>

    </section>
    <div class="copyright">
        <p>&copy; {{ now.year}} &middot; <a href="#">Kasage Abidu</a>Tout droits reservé</p>
    </div>

    </body>
</html>