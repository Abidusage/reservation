<?php
include('Action/functions/connexion.php');
include('Action/paiement.php');
include ('Variablemessage.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
 <?php
$rendezV = $bdd->prepare("SELECT * FROM  reservation INNER JOIN service ON service.Code = reservation.Code INNER JOIN client ON client.idclient = reservation.idclient where idreservation='$_GET[idreservation]'"); 
$rendezV->execute();
   while ($liste = $rendezV->fetch()) { ?>
<div class="container">

    <div class="card-container">

        <div class="front">
            <div class="image">
                <img src="image/chip.png" alt="">
                <img src="image/visa.png" alt="">
            </div>
            <div class="card-number-box">+243 977598156<br>+243 893211124<br>+243 811767543</div>
            <div class="flexbox">
                <div class="box">
                    <span><?php echo $liste['type']." ".$liste['num'];?></span>
                    <div class="card-holder-name"><?php echo $liste['nom']." ".$liste['postnom'];?></div>
                </div>
                
            </div>
        </div>

        <div class="back">
            <div class="stripe"></div>
            <div class="box">
                <span>cvv</span>
                <div class="cvv-box"></div>
                <img src="image/visa.png" alt="">
            </div>
        </div>

    </div>

    <form action="" method="POST">
        <div class="inputBox">
            <span>card number</span>
            <input type="text" value="Votre numéro est <?php echo $liste['Numtel'];?>$" maxlength="16" class="card-number-input" disabled>
        </div>
        <div class="inputBox">
            <span>Numero qui as Effectuer la transaction</span>
            <input type="text" name="numenv" class="card-holder-input" placeholder="+243 977598156">
        </div>
        <div class="flexbox">
            <div class="inputBox">
                <span><?php echo $liste['type'];?></span>
                <span>Montant par jours <?php echo $liste['prix'];?></span>
                <span>Nombre de sejours <?php echo $liste['Duree'];?>jours</span>
                <span>Montant total</span>
                <input type="" value="<?php echo $liste['prix']*$liste['Duree'];?>$" id="" class="month-input" disabled>
            </div>
            <div class="inputBox">
                <span>Montant enoyer</span>
                <input type="" id="" class="year-input" name="montant" placeholder="$$$$$$$$$$$$$$">
            </div>
            <div class="inputBox">
                <span>referance</span>
                <input type="text" maxlength="25" name="coderef" class="cvv-input" placeholder="referance Airtel Orange et vodacom ">
            </div>

        </div>
        <div class="inputBox">
                                <?php
                                    if($erreurLogin!=""){?>
                                    <h4><strong>     
                                    <?php echo $erreurLogin ?>  
                                    </strong></h4>   
                                <?php   } ?>
                            </div>
        <input type="submit" value="Envoyer" name="payer" class="submit-btn">
    </form>

</div>    
 <?php 
}
 ?>




<script>

document.querySelector('.card-number-input').oninput = () =>{
    document.querySelector('.card-number-box').innerText = document.querySelector('.card-number-input').value;
}

document.querySelector('.card-holder-input').oninput = () =>{
    document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
}

document.querySelector('.month-input').oninput = () =>{
    document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
}

document.querySelector('.year-input').oninput = () =>{
    document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
}

document.querySelector('.cvv-input').onmouseenter = () =>{
    document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
    document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
}

document.querySelector('.cvv-input').onmouseleave = () =>{
    document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
    document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
}

document.querySelector('.cvv-input').oninput = () =>{
    document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
}

</script>







</body>
</html>