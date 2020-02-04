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
					<!-- Content Row -->
					<div class="row">
						<!-- Content Column -->
						<div class="col-lg-12 mb-4">
							<!-- <h4>Registrar Estación fija</h4> -->
							<div class="container">
								<div class="card o-hidden border-0 shadow-lg my-5">
									<div class="card-body p-0">
										<!-- Nested Row within Card Body -->
										<form action="" method="post" class="user" role="form" id="userForm">
											<div class="row">
												<div class="col-md-6">
													<div class="text-center">
														<h1 class="h4 text-gray-900 mt-2">Datos de la Novedad</h1>
														<?php if (isset($_SESSION['regNovedades'])&&$_SESSION['regNovedades']==1) {?>
															<div class="alert alert-success alert-dismissible">
																<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																<strong>Registro Completado!</strong> La novedad se ha registrado exitosamente.
															</div>
															<?php unset($_SESSION['regNovedades']);} ?>    
														</div>
														<div class="p-5">
															<div class="form-group">
																<label for="lugar">Lugar</label>
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
															<div class="form-group row">
																<div class="col-sm-6">
																	<label for="fecha_hecho">Fecha y hora de la novedad</label>
																	<div class="input-group date" id="fecha_hecho" data-target-input="nearest">
																		<input type="text" name="fecha_hecho" id="fecha_hecho" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#fecha_hecho" autocomplete="off" value="<?php echo isset($_POST['fecha_hecho']) ? $_POST['fecha_hecho']:""; ?>">
																		<div class="input-group-append" >
																			<div class="input-group-text">
																				<i class="fa fa-calendar"></i>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<label for="fecha_reporte">Fecha y hora del reporte</label>
																	<div class="input-group date" id="fecha_reporte" data-target-input="nearest">
																		<input type="text" name="fecha_reporte" id="fecha_reporte" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#fecha_reporte" autocomplete="off" value="<?php echo isset($_POST['fecha_reporte']) ? $_POST['fecha_reporte']:""; ?>">
																		<div class="input-group-append" >
																			<div class="input-group-text">
																				<i class="fa fa-calendar"></i>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label for="descripcion">Descripción</label>
																<textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Breve resumen del hecho ocurrido" autocomplete="off" onKeyUp="mayusculas(this);"></textarea>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="text-center">
															<h1 class="h4 text-gray-900 mt-2">Detalles del robo</h1>    
														</div>
														<div class="p-4">
															<div class="form-group">
																<label for="seccion">Sección</label>
																<!-- <select name="seccion" class="form-control  p-1" required="required">
																	<option value="">Seleccione...</option>
																	<option value="BATERIA">Batería</option>
																	<option value="ENGORDE">Engorde</option>
																	<option value="MATERNIDAD">Maternidad</option>
																	<option value="RECRIA">Recría</option>
																</select> -->
																<div class="container">
																	<div class="row">
																		<div class="dual-list list-left col-md-5">
																			<div class="well">
																				<ul class="list-group">
																					<li class="list-group-item bat">Batería</li>
																					<li class="list-group-item eng">Engorde</li>
																					<li class="list-group-item mat">Maternidad</li>
																					<li class="list-group-item rec">Recría</li>
																				</ul>
																			</div>
																		</div>
																		<div class="list-arrows col-md-1 text-center">
																			<button type="button" class="btn btn-primary btn-sm move-right">
																				<span class="fas fa-chevron-right"></span>
																			</button>
																			<button type="button" class="btn btn-outline-secondary btn-sm move-left">
																				<span class="fas fa-chevron-left"></span>
																			</button>
																		</div>
																		<div class="dual-list list-right col-md-5">
																			<div class="well">
																				<ul class="list-group">
																				</ul>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<!-- contenido del Modal BATERÍA -->
															<div class="modal fade" id="bateriaModal" tabindex="-1" role="dialog" aria-labelledby="bateriaModal">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h4 class="modal-title">Seccion Bateria</h4>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
																		</div>
																		<div class="modal-body">
																			<p>Indique la información</p>
																			<div class="p-1">
																				<div class="form-group row">
																					<div class="col-sm-6 mb-3 mb-sm-0">
																						<label for="cantidad_B">Cantidad de cerdos</label>
																						<input type="number" name="cantidad_B" class="form-control" id="cantidad_B">
																					</div>
																					<div class="col-sm-6 mb-3 mb-sm-0">
																						<label for="kilos_B">Total de kilos</label>
																						<input type="number" name="kilos_B" class="form-control" id="kilos_B">
																					</div>
																				</div>
																				<div class="form-group">
																					<label for="ubicacion_B">Ubicación</label>
																					<textarea name="ubicacion_B" id="ubicacion_B" class="form-control" rows="3" placeholder="Galpon, Corral, Fila Etc..." autocomplete="off" onKeyUp="mayusculas(this);"></textarea>
																				</div> 
																			</div>
																		</div>
																		<div class="modal-footer">
																			<!-- <a class="btn btn-primary" href="#">Agregar</a> -->
																			<button type="button" class="btn btn-primary" data-dismiss="modal">Agregar</button>
																			<button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
																		</div>
																	</div>
																</div>
															</div>
															<!-- End of contenido del Modal BATERIA -->
															<!-- contenido del Modal ENGORDE -->
															<div class="modal fade" id="engordeModal" tabindex="-1" role="dialog" aria-labelledby="engordeModal">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h4 class="modal-title">Seccion Engorde</h4>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
																		</div>
																		<div class="modal-body">
																			<p>Indique la información</p>
																			<div class="p-1">
																				<div class="form-group row">
																					<div class="col-sm-6 mb-3 mb-sm-0">
																						<label for="cantidad_E">Cantidad de cerdos</label>
																						<input type="number" name="cantidad_E" class="form-control" id="cantidad_E">
																					</div>
																					<div class="col-sm-6 mb-3 mb-sm-0">
																						<label for="kilos_E">Total de kilos</label>
																						<input type="number_E" name="kilos_E" class="form-control" id="kilos_E">
																					</div>
																				</div>
																				<div class="form-group">
																					<label for="ubicacion_E">Ubicación</label>
																					<textarea name="ubicacion_E" id="ubicacion_E" class="form-control" rows="3" placeholder="Galpon, Corral, Fila Etc..." autocomplete="off" onKeyUp="mayusculas(this);"></textarea>
																				</div> 
																			</div>
																		</div>
																		<div class="modal-footer">
																			<!-- <a class="btn btn-primary" href="">Agregar</a> -->
																			<button type="button" class="btn btn-primary" data-dismiss="modal">Agregar</button>
																			<button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
																		</div>
																	</div>
																</div>
															</div>
															<!-- End of contenido del Modal ENGORDE -->
															<!-- contenido del Modal MATERNIDAD -->
															<div class="modal fade" id="maternidadModal" tabindex="-1" role="dialog" aria-labelledby="maternidadModal">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h4 class="modal-title">Seccion Maternidad</h4>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
																		</div>
																		<div class="modal-body">
																			<p>Indique la información</p>
																			<div class="p-1">
																				<div class="form-group row">
																					<div class="col-sm-6 mb-3 mb-sm-0">
																						<label for="cantidad_M">Cantidad de cerdos</label>
																						<input type="number" name="cantidad_M" class="form-control" id="cantidad_M">
																					</div>
																					<div class="col-sm-6 mb-3 mb-sm-0">
																						<label for="kilos_M">Total de kilos</label>
																						<input type="number" name="kilos_M" class="form-control" id="kilos_M">
																					</div>
																				</div>
																				<div class="form-group">
																					<label for="ubicacion_M">Ubicación</label>
																					<textarea name="ubicacion_M" id="ubicacion_M" class="form-control" rows="3" placeholder="Galpon, Corral, Fila Etc..." autocomplete="off" onKeyUp="mayusculas(this);"></textarea>
																				</div> 
																			</div>
																		</div>
																		<div class="modal-footer">
																			<!-- <a class="btn btn-primary" href="">Agregar</a> -->
																			<button type="button" class="btn btn-primary" data-dismiss="modal">Agregar</button>
																			<button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
																		</div>
																	</div>
																</div>
															</div>
															<!-- End of contenido del Modal MATERNIDAD -->
															<!-- contenido del Modal RECRIA -->
															<div class="modal fade" id="recriaModal" tabindex="-1" role="dialog" aria-labelledby="recriaModal">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h4 class="modal-title">Seccion Recría</h4>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
																		</div>
																		<div class="modal-body">
																			<p>Indique la información</p>
																			<div class="p-1">
																				<div class="form-group row">
																					<div class="col-sm-6 mb-3 mb-sm-0">
																						<label for="cantidad_R">Cantidad de cerdos</label>
																						<input type="number" name="cantidad_R" class="form-control" id="cantidad_R">
																					</div>
																					<div class="col-sm-6 mb-3 mb-sm-0">
																						<label for="kilos_R">Total de kilos</label>
																						<input type="number" name="kilos_R" class="form-control" id="kilos_R">
																					</div>
																				</div>
																				<div class="form-group">
																					<label for="ubicacion_R">Ubicación</label>
																					<textarea name="ubicacion_R" id="ubicacion_R" class="form-control" rows="3" placeholder="Galpon, Corral, Fila Etc..." autocomplete="off" onKeyUp="mayusculas(this);"></textarea>
																				</div> 
																			</div>
																		</div>
																		<div class="modal-footer">
																			<!-- <a class="btn btn-primary" href="">Agregar</a> -->
																			<button type="button" class="btn btn-primary" data-dismiss="modal">Agregar</button>
																			<button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
																		</div>
																	</div>
																</div>
															</div>
															<!-- End of contenido del Modal ENGORDE -->
															<!-- <div class="form-group row">
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="cantidad">Cantidad de cerdos</label>
																	<input type="number" name="cantidad" class="form-control" id="cantidad">
																</div>
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="kilos">Total de kilos</label>
																	<input type="number" name="kilos" class="form-control" id="kilos">
																</div>
															</div>
															<div class="form-group">
																<label for="ubicacion">Ubicación</label>
																<textarea name="ubicacion" id="ubicacion" class="form-control" rows="3" placeholder="Galpon, Corral, Fila Etc..." autocomplete="off" onKeyUp="mayusculas(this);"></textarea>
															</div> -->
														</div><!-- End of p-5 class div -->
														
													</div><!-- End of  div class col-lg-6 -->
													
												</div><!-- End of div class row -->
												<hr>
												<div class="form-group" style="margin-left: 40%;">
													<div class="text-center">
														<div class="col-sm-5">
															<button type="submit" name="submit" value="regNovedades" id="btnregNovedades" class="btn btn-primary btn-user btn-block">Registrar</button>
														</div>
													</div>
												</div>
												<hr>
											</form>
										</div><!-- End of div class card-body p-0 -->
									</div><!-- End of div class card o-hidden border-0 shadow-lg my-5 -->
								</div><!-- End of div class container -->
							</div><!-- End of Content Column -->
						</div><!-- End of Content Row -->
					</div><!-- Begin Page Content /.container-fluid -->
				</div><!-- End of Main Content -->
				<?php require_once('core/footer.php'); ?>