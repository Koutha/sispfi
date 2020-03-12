<?php require_once('core/header.php'); ?>
<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">
		<?php require_once('core/sideBar.php'); ?>
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
			<div id="content">
				<?php require_once('core/topBar.php');?>
				<!-- Begin Page Content -->
				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Registro de Novedades</h1>
						<a href="?do=novedadesDetailsReport" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Imprimir en PDF</a>
					</div>
					<div class="row">
						<div class="col-md-12" >
							<h4>Información de la Novedad</h4>
							<?php if (isset($_SESSION['editNovedades'])&&$_SESSION['editNovedades']==1) {?>
								<div class="alert alert-success alert-dismissible">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>Actualizado!</strong> los datos han sido actualizados exitosamente.
								</div>
								<?php unset($_SESSION['editNovedades']);} ?> 
								<nav>
									<div class="nav nav-tabs justify-content-end">
										<!-- <a class="btn btn-danger" href="?do=editRadio&id=<?php echo $id; ?>">Modificar</a> -->
										<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editRadioModal" data-id="?do=editNovedades&id=<?php echo $id; ?>">Modificar</button>
										<a class="btn btn-danger" href="?do=novedadesList">Volver</a>
									</div>
									<div class="nav nav-tabs" id="nav-tab" role="tablist">
										<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Datos de la Novedad</a>
										<!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Inspecciones</a> -->
									</div>
								</nav>
								<div class="tab-content" id="nav-tabContent">
									<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
										<div class="row mt-3">
											<div class="col-md-3">
												<p><span class="fa fa-tag"></span><strong> Numero de Control: </strong><?php echo $nov[0]['id_novedades']; ?></p>
												<p><span class="fa fa-bookmark"></span> <strong>Lugar: </strong> <?php echo $nov[0]['lugar']; ?></p>
												<p><span class="fa fa-bookmark"></span> <strong>Fecha: </strong> <?php echo $nov[0]['fecha_hecho']; ?></p>
												<p><span class="fa fa-bookmark"></span> <strong>Reportado el: </strong> <?php echo $nov[0]['fecha_reporte']; ?></p>
												<p><span class="fa fa-tags"></span><strong> Descripción: </strong><?php echo $nov[0]['descripcion']; ?></p>
											</div>
											<div class="col-md-9">
												<div class="row">
											<?php foreach ($nov as $key => $value) { ?>
												<div class="col-md-6 border">
													<label><strong>Seccion : <?php echo $value['seccion']; ?></strong></label>
													<p><span class="fa fa-credit-card"></span> <strong>Cantidad de Animales: </strong> <?php echo $value['cantidad']; ?></p>
													<p><span class="fa fa-plus"></span> <strong>Total Kg: </strong> <?php echo $value['kilos']; ?></p>
													<p><span class="fa fa-edit"></span> <strong>Lugar: </strong> <?php echo $value['ubicacion'];?></p>
													<p><span class="fas fa-chart-line"></span> <strong>Promedio por Animal: </strong> <?php echo $value['avgan'];?></p>
												</div>
											<?php } ?>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
										datos de inspecciones
									</div>
								</div>	
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</div>
				<!-- End of Main Content -->
				<!-- contenido del Modal MODIFICAR -->
				<div class="modal fade" id="editRadioModal" tabindex="-1" role="dialog" aria-labelledby="editRadioModal">
					<div class="modal-dialog modal-sm" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Confirmación</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
							</div>
							<div class="modal-body">
								<p>¿Estas segur@ que quieres modificar los datos de la novedad?</p> 
							</div>
							<div class="modal-footer">
								<a class="btn btn-primary" href="">Modificar</a>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Volver</button>
							</div>
						</div>
					</div>
				</div>
				<!-- End of contenido del Modal MODIFICAR -->
				<?php require_once('core/footer.php'); ?>