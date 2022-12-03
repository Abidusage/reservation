<?php
include('Action/functions/connexion.php');
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
    <a href="#" class="logo"><span>Beau lieu</span>Hôtel</a>
    <div class="menutoggle" onclick="toggleMenu();"></div>
    <ul class="navbar">
        <li><a href="#banniere" onclick="toggleMenu();">Home</a></li>
        <li><a href="#apropo"onclick="toggleMenu();">Apropos</a></li>
        <li><a href="#menu" onclick="toggleMenu();">salle de conference</a></li>
        <li><a href="#expert" onclick="toggleMenu();">Chambre à coucher</a></li>
        <li class="btn-con"><a href="connexion.php">connexion</a></li>
        <li><a href="index.php" onclick="toggleMenu();"></a></li>
    </ul>
</header>

    <section class="banniere" id="banniere">
        <div class="contenu">
            <h2>Que de plats Délicieux</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id laudantium modi unde quos deserunt quaerat nesciunt, quibusdam molestiae minus blanditiis nemo, consectetur consequuntur pariatur deleniti. Voluptatem voluptates sunt minus fuga?</p>
        </div>

    </section>
    <section class="apropo" id="apropo">
        <div class="row">
            <div class="col50">
                <h2 class="titre-texte"><span>A</span>propos de Nous</h2>
                <p style="color: rgb(160, 63, 63);">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat impedit nulla sequi sunt molestias, voluptas enim voluptates tempore pariatur sapiente omnis accusantium, dignissimos nihil dolorem quia voluptatem facilis expedita ratione?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, recusandae quidem laboriosam nisi fugiat reprehenderit, voluptatibus quas minus facilis cum laudantium omnis enim facere similique quisquam. Asperiores quibusdam sunt autem?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga possimus nobis ex nostrum sint repudiandae vero cupiditate atque sunt adipisci nesciunt animi optio ab deserunt voluptate, eius cumque impedit nemo?
                </p>
            </div>
            <div class="col50">
                <div class="img">
                    <!-- <img src="{{url_for('static', filename='image/hotel.jpg')}}" alt=""> -->
                    <img src="image/hotel.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    

    <section class="menu" id="menu">


        
            <div class="titre">
            <h2 class="titre-texte"><span>Nos </span>salle de conference</h2>
            <p style="color: rgb(160, 63, 63);">Lorem, ipsum dolor sit amet consectetur adipisicing elit..</p>
            </div>
            
       <div class="contenu">
                     <?php
$requse = $bdd->query("SELECT * FROM service where type ='Salle Standard' or type ='Salle VIP'");
    while ($userinf=$requse->fetch()) {?> 
    <a href="reservation.php?choix=<?php echo $userinf['Code'];?>" class="res"> 
            <div class="box">
                <div class="imbox">
                    <img  class="card-img-top" src="images/service/<?php echo $userinf['image'];?>"/>
                </div>
                <div class="reservation">
                    <input type="button" value="Reserver" name="reserv" class="res" >
                </div>
            </div>
    </a>
            <?php } ?>
            
        </div>

    </section>

    <section class="expert" id="expert">
        <div class="titre">
            <h2 class="titre-texte">Nos <span>c</span>chambre à coucher</h2>
            <p style="color: rgb(160, 63, 63);">vous pouvez faire une reservation en choisiçant une champre qui vous convient.</p>
        </div>
        <div class="contenu">
                     <?php
$requse = $bdd->query("SELECT * FROM service where  type ='Chambre VIP' or type ='Chambre Standard' ");
    while ($userinf=$requse->fetch()) {?> 
    <a href="reservation.php?choix=<?php echo $userinf['Code'];?>" class="res"> 
            <div class="box">
                <div class="imbox">
                    <img class="card-img-top" src="images/service/<?php echo $userinf['image'];?>"/>
                </div>
                <div class="reservation">
                    <input type="button" value="Reserver" name="reserv" class="res" >
                </div>
            </div>
    </a>
            <?php } ?>
            
        </div>    
        
    </section>
  
    <div class="copyright">
        <p>&copy; {{ now.year}} &middot; <a href="#">Kasage Abidu</a>Tout droits reservé</p>
    </div>


    <script>
        function toggleMenu(){
            const menutoggle = document.querySelector('.menutoggle');
            const navbar = document.querySelector('.navbar');
            navbar.classlist.toggle('active');
            menutoggle.classList.toggle('active');
        }
    </script>

    </body>
</html>
    
 