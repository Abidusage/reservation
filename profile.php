<?php
include('Action/functions/connexion.php');
include('Action/functions/Session1.php');
$rendezV = $bdd->prepare("SELECT * FROM  reservation INNER JOIN service ON service.Code = reservation.Code INNER JOIN client ON client.idclient = reservation.idclient INNER JOIN paiement ON paiement.idreservation = reservation.idreservation where client.idclient='$_SESSION[idclient]' and paiement.idpaiement = $_GET[idpaiement]"); 
$rendezV->execute();
   while ($liste = $rendezV->fetch()) { 
include('Action/paiement.php');
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
<div class="main-menu">
	<header class="header">
		<a href="index.html" class="logo">Espace de client 
	</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
		<div class="user">
			<a href="#" class="avatar"><img class="card-img-top" src="images/<?php echo $liste['imagese'];?>"/><span class="status online"></span></a>
			<h5 class="name"><a href="profile.html">Client</a></h5>
			
		</div>
		<!-- /.user -->
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">
			<h5 class="title">Menu</h5>
			<!-- /.title -->
			<ul class="menu js__accordion">
	
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-desktop-mac"></i><span>Réservation</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="serviceliste.php">Liste des services</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				
				<li>
					<a class="waves-effect" href="tables.php"><i class="menu-icon mdi mdi-calendar"></i><span>tableau de bord</span></a>
				</li>
				<li>
					<a class="waves-effect" href=""><i class="menu-icon mdi mdi-calendar"></i><span>Déconnexion</span></a>
				</li>
			</ul>
		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">Profile</h1>
		<!-- /.page-title -->
	</div>
</div>
<!-- /.fixed-navbar -->

<!-- /#message-popup -->
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
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->

			<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<div class="card-content">
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