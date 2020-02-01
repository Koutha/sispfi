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
						<h1 class="h3 mb-0 text-gray-800">Inventario de Radios</h1>
						<a href="?do=radioListReport" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Acta de Entrega</a>
					</div>
					<div class="row">
						<div class="col-md-12" >
							<h4>Información del Radio</h4>
							<?php if (isset($_SESSION['editRadio'])&&$_SESSION['editRadio']==1) {?>
								<div class="alert alert-success alert-dismissible">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>Actualizado!</strong> los datos han sido actualizados exitosamente.
								</div>
								<?php unset($_SESSION['editRadio']);} ?> 
							<nav>
								<div class="nav nav-tabs justify-content-end">
									<!-- <a class="btn btn-danger" href="?do=editRadio&id=<?php echo $id; ?>">Modificar</a> -->
									<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editRadioModal" data-id="?do=editRadio&id=<?php echo $id; ?>">Modificar</button>
									<a class="btn btn-danger" href="?do=radioList">Volver</a>
								</div>
								<div class="nav nav-tabs" id="nav-tab" role="tablist">
									<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Datos del Equipo</a>
									<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Inspecciones</a>
								</div>
							</nav>
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<div class="row mt-3">
										<div class="col-md-4">
											<p><span class="fa fa-tag"></span><strong> Codigo de usuario: </strong>CLAVE <?php echo $radio['codigo_usuario']; ?></p>
											<p><span class="fa fa-bookmark"></span> <strong>Responsable: </strong> <?php echo $radio['responsable']; ?></p>
											<p><span class="fa fa-bookmark"></span> <strong>Centro de Trabajo: </strong> <?php echo $radio['centro_trabajo']; ?></p>
											<p><span class="fa fa-bookmark"></span> <strong>Empresa: </strong> <?php echo $radio['empresa']; ?></p>
											<p><span class="fa fa-tags"></span><strong> Status: </strong><?php echo $radio['status']; ?></p>
											<!-- <p><span class="fa fa-phone"></span><strong> Telefono movil:</strong>  </p>
												<p><span class="fa fa-phone-alt"></span> <strong> Telefono fijo:</strong>  </p> -->
											</div>
											<div class="col-md-4">
												<p><span class="fa fa-credit-card"></span> <strong>Tipo de Radio: </strong> <?php echo $radio['tipo_comunicacion']; ?></p>
												<p><span class="fa fa-plus"></span> <strong>Marca: </strong> <?php echo $radio['marca']; ?></p>
												<p><span class="fa fa-edit"></span> <strong>Modelo: </strong> <?php echo $radio['modelo'];?></p>
												<p><span class="fa fa-credit-card"></span> <strong>Codigo IP: </strong> <?php echo $radio['codigo_ip']; ?></p>
												<p><span class="fa fa-credit-card"></span> <strong>Serial: </strong> <?php echo $radio['serial']; ?></p>
												<p><span class="fa fa-credit-card"></span> <strong>Serial de Bateria: </strong> <?php echo $radio['serial_bateria']; ?></p>
											<!-- <p><span class="fa fa-envelope"></span> <strong> Correo:</strong>  </p>
											<p><span class="fa fa-heart"></span> <strong> Sexo:</strong> </p>
											<div>
												<p><span class="fa fa-image"></span> <strong> Imagen de Cedula:</strong></p>
											</div> -->
										</div>
										<div class="col-md-4">
											<p><span class="fa fa-check-circle"></span><strong> Estado del Equipo: </strong> <?php echo $radio['estado'];?></p>
											<p><span class="fa fa-check-circle"></span> <strong> Bateria: </strong> <?php echo $radio['est_bateria'];?></p>
											<p><span class="fa fa-check-circle"></span><strong> Antena: </strong> <?php echo $radio['est_antena'];?></p>
											<p><span class="fa fa-check-circle"></span> <strong> Perilla de volumen: </strong> <?php echo $radio['est_perillavol'];?></p>
											<p><span class="fa fa-check-circle"></span> <strong> Perilla de canales: </strong>  <?php echo $radio['est_perillacan'];?></p>
											<p><span class="fa fa-check-circle"></span><strong> Protector de polvo (Dustcap): </strong> <?php echo $radio['est_dustcap'];?></p>
											<p><span class="fa fa-check-circle"></span> <strong> Gancho para cinturon (Beltclip): </strong> <?php echo $radio['est_beltclip'];?></p>
											<p><span class="fa fa-check-circle"></span> <strong> Tecla lateral PTT: </strong> <?php echo $radio['est_teclaptt'];?></p>
											<p><span class="fa fa-check-circle"></span> <strong> Cargador: </strong> <?php echo $radio['est_cargador'];?></p>
											<p><span class="fa fa-check-circle"></span> <strong> Adaptador del cargador: </strong> <?php echo $radio['est_adaptador'];?></p>
											<p><span class="fa fa-check-circle"></span> <strong> Observaciones: </strong> <?php echo $radio['observacion'];?></p>
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
				<p>¿Estas segur@ que quieres modificar los datos del radio?</p> 
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