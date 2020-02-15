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
						<h1 class="h3 mb-0 text-gray-800">Registro de novedades</h1>
					</div>
					
					<!-- <h4>Registrar Estación fija</h4> -->
					<div class="col-md-5">
						<div class="card shadow my-4">
							<div class="card-body">
								<!-- Nested Row within Card Body -->
								<form action="" method="post" class="user" role="form" id="novedadesForm">
									<div class="row">
										<div class="col-md-12">
											<div class="text-center">
												<h1 class="h4 text-gray-900 mt-2">Filtrar</h1>
												<hr>
											</div>
											<div class="p-3">
												<div class="form-group">
													<label for="lugar"><strong>Lugar</strong></label>
													<select name="lugar" class="form-control selectpicker show-tick" required="required" id="lugar" data-live-search="true" title="Seleccione un lugar">
														<option value="CEAPOCA">CEAPOCA</option>
														<option value="LA PARREÑA">LA PARREÑA</option>
														<option value="LOS CERRITOS 1">LOS CERRITOS 1</option>
														<option value="LOS CERRITOS 2">LOS CERRITOS 2</option>
														<option value="MATACARMELERA">MATACARMELERA</option>
														<option value="OJO DE AGUA">OJO DE AGUA</option>
														<option value="URIMAN 1">URIMAN 1</option>
														<option value="URIMAN 2">URIMAN 2</option>
														<option value="VILLA DE JULIA">VILLA DE JULIA</option>
													</select>
												</div>
												<h6><strong>Fecha</strong></h6>
												<div class="form-group row">

													<div class="col-sm-6">
														<label for="fecha_hecho">Desde</label>
														<div class="input-group date" id="fecha_hecho" data-target-input="nearest">
															<input type="text" name="fecha_hecho" id="fecha_hecho" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#fecha_hecho" autocomplete="off" value="<?php echo isset($_POST['fecha_hecho']) ? $_POST['fecha_hecho']:""; ?>" required>
															<div class="input-group-append" >
																<div class="input-group-text">
																	<i class="fa fa-calendar"></i>
																</div>
															</div>
														</div>
													</div>
													<div class="col-sm-6">
														<label for="fecha_reporte">Hasta</label>
														<div class="input-group date" id="fecha_reporte" data-target-input="nearest">
															<input type="text" name="fecha_reporte" id="fecha_reporte" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#fecha_reporte" autocomplete="off" value="<?php echo isset($_POST['fecha_reporte']) ? $_POST['fecha_reporte']:""; ?>" required>
															<div class="input-group-append" >
																<div class="input-group-text">
																	<i class="fa fa-calendar"></i>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div><!-- End of div class row -->
									<hr>
									<div class="form-group" >
										<div class="text-center">
											<div class="col-sm-12">
												<button type="submit" name="submit" value="novedadesReport" id="btnNovedadesReport" class="btn btn-primary btn-user">Buscar</button>
											</div>
										</div>
									</div>
									<hr>
								</form>
								<!-- Area Chart -->
							</div><!-- End of div class card-body p-0 -->
						</div><!-- End of div class card o-hidden border-0 shadow-lg my-5 -->
					</div><!-- End of div class container -->

					<div class="col-md-12 col-lg-12">
						<div class="card shadow mb-4">
							<!-- Card Header - Dropdown -->
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
								<h6 class="m-0 font-weight-bold text-primary">Relacion de robos</h6>
								<div class="dropdown no-arrow">
									<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
										<div class="dropdown-header">Dropdown Header:</div>
										<a class="dropdown-item btn btn-primary" href="#" id="print-chart-btn">Imprimir en pdf </a>
										<button class="dropdown-item btn-primary" id="printBarChart">Print Chart</button>
										<a class="dropdown-item" href="#">Another action</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
							</div>
							<!-- Card Body -->
							<div class="card-body">
								<div class="chart-bar">
									<canvas id="myBarChart"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div><!-- Begin Page Content /.container-fluid -->
			</div><!-- End of Main Content -->
			<?php require_once('core/footer.php'); ?>
