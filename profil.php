<?php
include('Action/functions/connexion.php');
$rendezV = $bdd->prepare("SELECT * FROM  reservation INNER JOIN service ON service.Code = reservation.Code INNER JOIN client ON client.idclient = reservation.idclient INNER JOIN paiement ON paiement.idreservation = reservation.idreservation where reservation.idreservation = $_GET[choix]"); 
$rendezV->execute();
   while ($liste = $rendezV->fetch()) { 
include('Action/valide.php');
include ('Variablemessage.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Profile - My Admin Template</title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="assets/styles/style.min.css">
	
	<!-- Material Design Icon -->
	<link rel="stylesheet" href="assets/fonts/material-design/css/materialdesignicons.css">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">
	
	<!-- Dark Themes -->
	<link rel="stylesheet" href="assets/styles/style-dark.min.css">
</head>

<body>
<?php
include ('Menuclien.php');
?>
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-md-3 col-xs-12">
				<div class="box-content bordered primary margin-bottom-20">
					<div class="profile-avatar">
						<img style="width: 750px; height:350px;" class="card-img-top" src="images/<?php echo $liste['imagese'];?>"/>
					</div>
				</div>
			</div>
			<!-- /.col-md-3 col-xs-12 -->
			<div class="col-md-9 col-xs-12">
				<div class="row">
					<div class="col-xs-12">
						<div class="box-content card">
							<div class="card-content">
								<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<div class="card-content">
						<img style="width: 750px; height:350px;" class="card-img-top" src="images/service/<?php echo $liste['image'];?>"/>
					</div>
				<h4 class="box-title">Libelle du service </h4>
					<p> <?php echo $liste['libelle'];?></p>
					<!-- /.card-content -->
				</div>
				<form action="" method="POST">
				<div class="form-group">
								<label for="exampleInputEmail1">Montant </label>
								<input  class="form-control" name="montant" id="exampleInputEmail1">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Code ref </label>
								<input  class="form-control" name="coderef" id="exampleInputPassword1">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Num envoyer</label>
								<input type="int"  class="form-control" name="numenv" id="exampleInputPassword1">
							</div>
							<div class="inputboite2">
                    <input type="submit" name="Valide" value="Connexion">
                </div><br>
			</form>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->

			<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<div class="card-content">
					<div class="form-group">
								<?php
									if($erreurLogin!=""){?>
									<h4><strong>     
									<?php echo $erreurLogin ?>  
									</strong></h4>   
								<?php   } ?>
				            </div>
						<form>
							<div class="form-group">
								<label for="exampleInputEmail1">Nombre des jours</label>
								<input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $liste['Duree'];?> jours" disabled>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Montant à payer par jours</label>
								<input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $liste['prix'];?>$" disabled>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Montant total à payer</label>
								<input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $liste['prix'] * $liste['Duree'];?>$" disabled>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Montant déjà payer</label>
								<input type="int" value="<?php echo $liste['montant'];?>$" class="form-control" id="exampleInputPassword1"disabled="">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Résultat à payer</label>
								<input type="int" value="<?php echo $liste['prix'] * $liste['Duree']-$liste['montant'];?>$" class="form-control" id="exampleInputPassword1"disabled="">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Date de réservation </label>
								<input  class="form-control" value="<?php echo $liste['dateres'];?>" id="exampleInputEmail1" value="<?php echo $liste['prix'];?>$" disabled>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Date d'arrive </label>
								<input value="<?php echo $liste['Datearrive'];?>" class="form-control" id="exampleInputPassword1"disabled="">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Date de sortir</label>
								<input type="int" value="<?php echo $liste['datedapart'];?>" class="form-control" id="exampleInputPassword1"disabled="">
							</div>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->

			</div>
			<!-- /.col-lg-6 col-xs-12 -->
								<!-- /.row -->
							</div>
							<!-- /.card-content -->
						</div>
						<!-- /.box-content card -->
					</div>
					<!-- /.col-md-12 -->
				</div>
			</div>
			<!-- /.col-md-9 col-xs-12 -->
		</div>
	</div>
	<!-- /.main-content -->
</div>
 <?php 
}
 ?>
<!--/#wrapper -->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
</body>
</html>