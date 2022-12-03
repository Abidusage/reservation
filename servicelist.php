<?php
include('Action/functions/connexion.php');
include('Action/Ajouterservice.php');
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

	<title>Form elements - My Admin Template</title>

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
	<!-- Data Tables -->
	<link rel="stylesheet" href="assets/plugin/datatables/media/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">


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
			<div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Liste des service</h4>
					<!-- /.box-title -->
					<div class="card-content">
					<table id="example-row-grouping" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Montant par jours</th>
								<th>Numbre de se jour</th>
								<th>Office</th>
								<th>Totalité</th>
								<th>Montant déjà payer</th>
								<th>Re</th>
								<th>Etat</th>
							</tr>
						</thead>
						<tbody>
							<?php
$rendezV = $bdd->prepare("SELECT * FROM  reservation INNER JOIN service ON service.Code = reservation.Code INNER JOIN client ON client.idclient = reservation.idclient INNER JOIN paiement ON paiement.idreservation = reservation.idreservation"); 
$rendezV->execute();
   while ($liste = $rendezV->fetch()) {?>
							<tr>
								<td><?php echo $liste['prix'];?></td>
								<td><?php echo $liste['Duree'];?></td>
								<td><?php echo $liste['type'];?></td>
								<td><?php echo $liste['Duree'] * $liste['prix'];?>$</td>
								<td><?php echo $liste['montant'];?>$</td>
								<td><?php echo $liste['Duree'] * $liste['prix']-$liste['montant'];?>$</td>
								<td>
									<?php if ($liste['Etat']=='0') {?>

										Encours<br>
										<a type="button" href="profil.php?choix=<?php echo $liste['idreservation'];?>" class="btn btn-primary btn-xs waves-effect waves-light">Valide</a>
									<?php }else {?>
										Déjà valider
									<?php }

									?>
								</td>
							</tr>
							 <?php 
}
 ?>
						</tbody>
					</table>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->

				<!-- /.box-content card white -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->

			
		</div>
		
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
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

	<!-- Data Tables -->
	<script src="assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
	<script src="assets/scripts/datatables.demo.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
</body>
</html>