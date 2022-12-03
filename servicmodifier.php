<?php
include('Action/functions/connexion.php');
include('Action/UpdatClient.php');
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
include('Menu.php');
?>
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<?php
                      		$requse = $bdd->query("SELECT * FROM service where Code = $_GET[choix]");
                            while ($userinf=$requse->fetch()) {?>
			<div class="col-lg-4 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Basic example</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form action="" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label for="exampleInputEmail1">Type de service</label>
								<select class="form-control" name="type">
									<option><?php echo $userinf['type'];?></option>
								<optgroup label="Chambre">
									<option>Chambre Standard</option>
									<option>Chambre VIP</option>
								</optgroup>
								<optgroup label="Salle de conference">
									<option>Chambre Standard</option>
									<option>Salle VIP</option>
								</optgroup>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Numéro</label>
								<select class="form-control" name="num">
									<option><?php echo $userinf['num'];?></option>
										<optgroup label="Liste des numéros">
											<?php for ($i=1; $i <= 20 ; $i++) { ?>
										<option><?php echo $i; ?></option>
										<?php } ?>
										</optgroup>
									</select>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Prix</label>
								<input type="int" class="form-control" value="<?php echo $userinf['prix'];?>" name="prix" id="exampleInputPassword1" placeholder="Prix ... !">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Libelle </label>
								<textarea class="form-control" name="libelle" id="exampleInputPassword1" placeholder="Prix ... !"><?php echo $userinf['libelle'];?></textarea>
							</div>
							<div class="form-group">
								<label for="exampleInputFile">Image </label>
								<input type="file" id="exampleInputFile" name="image">
							</div>
							<div class="form-group">
								<?php
									if($erreurLogin!=""){?>
									<h4><strong>     
									<?php echo $erreurLogin ?>  
									</strong></h4>   
								<?php   } ?>
				            </div>
							<button type="submit" name="service" class="btn btn-primary btn-sm waves-effect waves-light">Enregistrer la modification</button>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->

			<div class="col-lg-8 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Liste des service déjà enregistrer </h4>
					<!-- /.box-title -->
					<div class="card-content">
						<img style=" width: 1000px; height:525px;" class="card-img-top" src="images/service/<?php echo $userinf['image'];?>"/>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->

				<!-- /.box-content card white -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->
<?php } ?>
			
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