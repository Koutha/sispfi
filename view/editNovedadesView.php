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
						<h1 class="h3 mb-0 text-gray-800">Actualizar Registro de novedad</h1>
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
										<form action="" method="post" class="user" role="form" id="novedadesForm">
											<div class="row">
												<div class="col-md-6">
													<div class="text-center">
														<h1 class="h4 text-gray-900 mt-2">Datos de la Novedad</h1>
														<hr>
														<?php if (isset($_SESSION['editNovedades'])&&$_SESSION['editNovedades']==1) {?>
															<div class="alert alert-success alert-dismissible">
																<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																<strong>Registro Actualizado!</strong> La novedad se ha actualizado exitosamente.
															</div>
															<?php unset($_SESSION['editNovedades']);} ?> 
														</div>
														<div class="p-4">
															<div class="form-group">
																<label for="lugar"><strong>Lugar</strong></label>
																<select name="lugar" class="form-control selectpicker show-tick" required="required" id="lugar" data-live-search="true" title="Seleccione un lugar">
																	<option value="CEAPOCA" <?php echo (isset($novedad[0]['lugar'])&&$novedad[0]['lugar']=="CEAPOCA")?'selected':'';?>>CEAPOCA</option>
																	<option value="LA PARREÑA" <?php echo (isset($novedad[0]['lugar'])&&$novedad[0]['lugar']=="LA PARREÑA")?'selected':'';?>>LA PARREÑA</option>
																	<option value="LOS CERRITOS 1" <?php echo (isset($novedad[0]['lugar'])&&$novedad[0]['lugar']=="LOS CERRITOS 1")?'selected':'';?>>LOS CERRITOS 1</option>
																	<option value="LOS CERRITOS 2" <?php echo (isset($novedad[0]['lugar'])&&$novedad[0]['lugar']=="LOS CERRITOS 2")?'selected':'';?>>LOS CERRITOS 2</option>
																	<option value="MATACARMELERA" <?php echo (isset($novedad[0]['lugar'])&&$novedad[0]['lugar']=="MATACARMELERA")?'selected':'';?>>MATACARMELERA</option>
																	<option value="OJO DE AGUA" <?php echo (isset($novedad[0]['lugar'])&&$novedad[0]['lugar']=="OJO DE AGUA")?'selected':'';?>>OJO DE AGUA</option>
																	<option value="URIMAN 1" <?php echo (isset($novedad[0]['lugar'])&&$novedad[0]['lugar']=="URIMAN 1")?'selected':'';?>>URIMAN 1</option>
																	<option value="URIMAN 2" <?php echo (isset($novedad[0]['lugar'])&&$novedad[0]['lugar']=="URIMAN 2")?'selected':'';?>>URIMAN 2</option>
																	<option value="VILLA DE JULIA" <?php echo (isset($novedad[0]['lugar'])&&$novedad[0]['lugar']=="VILLA DE JULIA")?'selected':'';?>>VILLA DE JULIA</option>
																</select>
															</div>
															<div class="form-group row">
																<div class="col-sm-6">
																	<label for="fecha_hecho"><strong>Fecha y hora de la novedad</strong></label>
																	<div class="input-group date" id="fecha_hecho" data-target-input="nearest">
																		<input type="text" name="fecha_hecho" id="fecha_hecho" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#fecha_hecho" autocomplete="off" value="<?php echo isset($novedad[0]['fecha_hecho'])?date_format(date_create($novedad[0]['fecha_hecho']), 'd/m/Y h:i A'):'';?>" required>
																		<div class="input-group-append" >
																			<div class="input-group-text">
																				<i class="fa fa-calendar"></i>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<label for="fecha_reporte"><strong>Fecha y hora del reporte</strong></label>
																	<div class="input-group date" id="fecha_reporte" data-target-input="nearest">
																		<input type="text" name="fecha_reporte" id="fecha_reporte" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#fecha_reporte" autocomplete="off" value="<?php echo isset($novedad[0]['fecha_reporte'])?date_format(date_create($novedad[0]['fecha_reporte']), 'd/m/Y h:i A'):'';?>" required>
																		<div class="input-group-append" >
																			<div class="input-group-text">
																				<i class="fa fa-calendar"></i>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label for="descripcion"><strong>Descripción</strong></label>
																<textarea name="descripcion" id="descripcion" class="form-control" rows="8" placeholder="Breve resumen del hecho ocurrido" autocomplete="off" onKeyUp="mayusculas(this);" required><?php echo isset($novedad[0]['descripcion'])?$novedad[0]['descripcion']:''; ?></textarea>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="text-center">
															<h1 class="h4 text-gray-900 mt-2">Detalles del robo</h1>
															<hr>  
															<div class="alert alert-warning  fade show" style="display:none;" id="n1">
																<strong>Complete los datos!</strong> debe llenar los datos en al menos una seccion.
															</div>  
														</div>
														<div class="p-4">
															<div class="form-group">
																<label for="seccion"><strong>Sección</strong></label>
																<div class="container">
																	<div class="row">
																		<div class="dual-list list-left col-md-5">
																			<div class="well">
																				<ul class="list-group">
																					<?php
																					$bat = 0;$eng = 0; $mat =0; $rec = 0; 
																					foreach ($novedad as $key => $value){
																						if($value['seccion']=='Batería'){
																							$bat = 1;
																							$batc = $value['cantidad'];
																							$batk = $value['kilos'];
																							$batu = $value['ubicacion'];
																						}elseif($value['seccion']=='Engorde'){
																							$eng = 1;
																							$engc = $value['cantidad'];
																							$engk = $value['kilos'];
																							$engu = $value['ubicacion'];
																						}elseif($value['seccion']=='Maternidad'){
																							$mat = 1;
																							$matc = $value['cantidad'];
																							$matk = $value['kilos'];
																							$matu = $value['ubicacion'];
																						}elseif($value['seccion']=='Recría'){
																							$rec = 1;
																							$recc = $value['cantidad'];
																							$reck = $value['kilos'];
																							$recu = $value['ubicacion'];
																						}
																					}
																					if($bat==0){
																						echo '<li class="list-group-item bat">Batería</li>';
																					}
																					if($eng==0){
																						echo '<li class="list-group-item eng">Engorde</li>';
																					}
																					if($mat==0){
																						echo '<li class="list-group-item mat">Maternidad</li>';
																					}
																					if($rec==0){
																						echo '<li class="list-group-item rec">Recría</li>';
																					}
																					?>
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
																					<?php foreach ($novedad as $key => $value) {
																						if($value['seccion']=='Batería'){
																							echo '<li class="list-group-item bat active">Batería</li>';
																						}elseif ($value['seccion']=='Engorde') {
																							echo '<li class="list-group-item eng active">Engorde</li>';
																						}elseif ($value['seccion']=='Maternidad') {
																							echo '<li class="list-group-item mat active">Maternidad</li>';
																						}elseif ($value['seccion']=='Recría') {
																							echo '<li class="list-group-item rec active">Recría</li>';
																						}
																					} ?>
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
																			<div class="alert alert-warning  fade show" style="display:none;" id="alert_B">
																				<strong>Complete los datos!</strong> Debe introducir los datos solicitados.
																			</div>
																			<div class="alert alert-warning  fade show" style="display:none;" id="alert_B1">
																				<strong>Los datos invalidos!</strong> Verifique que los datos sean correctos.
																			</div>
																			<div class="p-1">
																				<input type="hidden" name="bateria" value="Batería" <?php if($bat==0){echo 'Disabled';} ?>>
																				<div class="form-group row">
																					<div class="col-sm-6 mb-3 mb-sm-0">
																						<label for="cantidad_B">Cantidad de cerdos</label>
																						<input type="number" name="cantidad_B" class="form-control" id="cantidad_B" value="<?php echo isset($batc)?$batc:''; ?>" <?php if($bat==0){echo 'Disabled';} ?>>
																					</div>
																					<div class="col-sm-6 mb-3 mb-sm-0">
																						<label for="kilos_B">Total de kilos</label>
																						<input type="number" name="kilos_B" class="form-control" id="kilos_B" value="<?php echo isset($batk)?$batk:''; ?>" <?php if($bat==0){echo 'Disabled';} ?>>
																					</div>
																				</div>
																				<div class="form-group">
																					<label for="ubicacion_B">Ubicación</label>
																					<textarea name="ubicacion_B" id="ubicacion_B" class="form-control" rows="3" placeholder="Galpon, Corral, Fila Etc..." autocomplete="off" onKeyUp="mayusculas(this);" <?php if($bat==0){echo 'Disabled';} ?>><?php echo isset($batu)?$batu:''; ?></textarea>
																				</div> 
																			</div>
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-primary" data-dismiss="modal" id="Add">Agregar</button>
																			<button type="button" class="btn btn-secondary" data-dismiss="modal" >Volver</button>
																			<button type="button" class="btn btn-danger" data-dismiss="modal" id="dismissB">Quitar</button>
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
																			<div class="alert alert-warning  fade show" style="display:none;" id="alert_E">
																				<strong>Complete los datos!</strong> Debe introducir los datos solicitados.
																			</div>
																			<div class="alert alert-warning  fade show" style="display:none;" id="alert_E1">
																				<strong>Los datos invalidos!</strong> Verifique que los datos sean correctos.
																			</div>
																			<div class="p-1">
																				<input type="hidden" name="engorde" value="Engorde" <?php if($eng==0){echo 'Disabled';} ?>>
																				<div class="form-group row">
																					<div class="col-sm-6 mb-3 mb-sm-0">
																						<label for="cantidad_E">Cantidad de cerdos</label>
																						<input type="number" name="cantidad_E" class="form-control" id="cantidad_E" value="<?php echo isset($engc)?$engc:''; ?>" <?php if($eng==0){echo 'Disabled';} ?>>
																					</div>
																					<div class="col-sm-6 mb-3 mb-sm-0">
																						<label for="kilos_E">Total de kilos</label>
																						<input type="number_E" name="kilos_E" class="form-control" id="kilos_E" value="<?php echo isset($engk)?$engk:''; ?>" <?php if($eng==0){echo 'Disabled';} ?>>
																					</div>
																				</div>
																				<div class="form-group">
																					<label for="ubicacion_E">Ubicación</label>
																					<textarea name="ubicacion_E" id="ubicacion_E" class="form-control" rows="3" placeholder="Galpon, Corral, Fila Etc..." autocomplete="off" onKeyUp="mayusculas(this);" <?php if($eng==0){echo 'Disabled';} ?>><?php echo isset($engu)?$engu:''; ?></textarea>
																				</div> 
																			</div>
																		</div>
																		<div class="modal-footer">
																			<!-- <a class="btn btn-primary" href="">Agregar</a> -->
																			<button type="button" class="btn btn-primary" data-dismiss="modal">Agregar</button>
																			<button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
																			<button type="button" class="btn btn-danger" data-dismiss="modal" id="dismissE">Quitar</button>
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
																			<div class="alert alert-warning  fade show" style="display:none;" id="alert_M">
																				<strong>Complete los datos!</strong> Debe introducir los datos solicitados.
																			</div>
																			<div class="alert alert-warning  fade show" style="display:none;" id="alert_M1">
																				<strong>Los datos invalidos!</strong> Verifique que los datos sean correctos.
																			</div>
																			<div class="p-1">
																				<input type="hidden" name="maternidad" value="Maternidad" <?php if($mat==0){echo 'Disabled';} ?>>
																				<div class="form-group row">
																					<div class="col-sm-6 mb-3 mb-sm-0">
																						<label for="cantidad_M">Cantidad de cerdos</label>
																						<input type="number" name="cantidad_M" class="form-control" id="cantidad_M" value="<?php echo isset($matc)?$matc:''; ?>" <?php if($mat==0){echo 'Disabled';} ?>>
																					</div>
																					<div class="col-sm-6 mb-3 mb-sm-0">
																						<label for="kilos_M">Total de kilos</label>
																						<input type="number" name="kilos_M" class="form-control" id="kilos_M" value="<?php echo isset($matk)?$matk:''; ?>" <?php if($mat==0){echo 'Disabled';} ?>>
																					</div>
																				</div>
																				<div class="form-group">
																					<label for="ubicacion_M">Ubicación</label>
																					<textarea name="ubicacion_M" id="ubicacion_M" class="form-control" rows="3" placeholder="Galpon, Corral, Fila Etc..." autocomplete="off" onKeyUp="mayusculas(this);" <?php if($mat==0){echo 'Disabled';} ?>><?php echo isset($matu)?$matu:'';?></textarea>
																				</div> 
																			</div>
																		</div>
																		<div class="modal-footer">
																			<!-- <a class="btn btn-primary" href="">Agregar</a> -->
																			<button type="button" class="btn btn-primary" data-dismiss="modal">Agregar</button>
																			<button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
																			<button type="button" class="btn btn-danger" data-dismiss="modal" id="dismissM">Quitar</button>
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
																			<div class="alert alert-warning" style="display:none;" id="alert_R">
																				<strong>Complete los datos!</strong> Debe introducir los datos solicitados.
																			</div>
																			<div class="alert alert-warning  fade show" style="display:none;" id="alert_R1">
																				<strong>Los datos invalidos!</strong> Verifique que los datos sean correctos.
																			</div>
																			<div class="p-1">
																				<input type="hidden" name="recria" value="Recría" <?php if($rec==0){echo 'Disabled';} ?>>
																				<div class="form-group row">
																					<div class="col-sm-6 mb-3 mb-sm-0">
																						<label for="cantidad_R">Cantidad de cerdos</label>
																						<input type="number" name="cantidad_R" class="form-control" id="cantidad_R" value="<?php echo isset($recc)?$recc:''; ?>" <?php if($rec==0){echo 'Disabled';} ?>>
																					</div>
																					<div class="col-sm-6 mb-3 mb-sm-0">
																						<label for="kilos_R">Total de kilos</label>
																						<input type="number" name="kilos_R" class="form-control" id="kilos_R" value="<?php echo isset($reck)?$reck:''; ?>" <?php if($rec==0){echo 'Disabled';} ?>>
																					</div>
																				</div>
																				<div class="form-group">
																					<label for="ubicacion_R">Ubicación</label>
																					<textarea name="ubicacion_R" id="ubicacion_R" class="form-control" rows="3" placeholder="Galpon, Corral, Fila Etc..." autocomplete="off" onKeyUp="mayusculas(this);" <?php if($rec==0){echo 'Disabled';} ?>><?php echo isset($recu)?$recu:''; ?></textarea>
																				</div> 
																			</div>
																		</div>
																		<div class="modal-footer">
																			<!-- <a class="btn btn-primary" href="">Agregar</a> -->
																			<button type="button" class="btn btn-primary" data-dismiss="modal">Agregar</button>
																			<button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
																			<button type="button" class="btn btn-danger" data-dismiss="modal" id="dismissR">Quitar</button>
																		</div>
																	</div>
																</div>
															</div>
														</div><!-- End of p-5 class div -->
													</div><!-- End of  div class col-lg-6 -->
												</div><!-- End of div class row -->
												<hr>
												<input type="hidden" name="id" value = "<?php echo $id; ?>">
												<div class="form-group" style="margin-left: 40%;">
													<div class="text-center">
														<div class="col-sm-5">
															<button type="submit" name="submit" value="editNovedades" id="btnregNovedades" class="btn btn-primary btn-user btn-block">Actualizar</button>
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