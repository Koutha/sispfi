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
					</div>
					<!-- Content Row -->
					<div class="row">
						<!-- Content Column -->
						<div class="col-lg-12 mb-4">
							<h4>Registrar Estación fija</h4>
							<div class="container">
								<div class="card o-hidden border-0 shadow-lg my-5">
									<div class="card-body p-0">
										<!-- Nested Row within Card Body -->
										<form action="" method="post" class="user" role="form" id="userForm">
											<div class="row">
												<div class="col-lg-6">
													<div class="text-center">
														<h1 class="h4 text-gray-900 mt-2">Datos del Radio</h1>
														<?php if (isset($_SESSION['regRadioFE'])&&$_SESSION['regRadioFE']==1) {?>
															<div class="alert alert-success alert-dismissible">
																<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																<strong>Registrado!</strong> El usuario ha sido registrado exitosamente.
															</div>
															<?php unset($_SESSION['regRadioFE']);} ?>    
														</div>
														<div class="p-5">
															<div class="form-group">
																<?php if (isset($radioCodVal)&&$radioCodVal==1) {?>
																	<div class="alert alert-danger alert-dismissible">
																		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																		<strong>el Codigo de usuario ya existe</strong> por favor intente con uno diferente
																	</div>
																<?php }?>
																<input type="text" name="codigo_usuario" id="codigo_usuario" class="form-control " placeholder="Codigo o clave de usuario..." autocomplete="off" maxlength="22" required="required" value="<?php echo isset($_POST['codigo_usuario']) ? $_POST['codigo_usuario']:""; ?>" onKeyUp="mayusculas(this);">
															</div>
															<div class="form-group row">
																<div class="col-sm-6">
																	<label for="codigo_ip">Codigo IP del Equipo</label>
																	<?php if (isset($radioCodIpVal)&&$radioCodIpVal==1) {?>
																		<div class="alert alert-danger alert-dismissible">
																			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																			<strong>El Codigo IP ya existe</strong> por favor intente con uno diferente
																		</div>
																	<?php }?>
																	<input type="text" name="codigo_ip" id="codigo_ip" class="form-control " placeholder="Codigo IP" autocomplete="off" pattern="^(IP-)+(?!\.)[0-9]+|(SIN IP-[0-9]+)$" maxlength="8" required="required" value="<?php echo isset($_POST['codigo_ip']) ? $_POST['codigo_ip']:"IP-"; ?>" onKeyUp="mayusculas(this);">
																</div>
																<!-- pattern="^(IP-)+(?!\.)[0-9]+$" -->
																<div class="col-sm-6">
																	<label for="codigo_ip_f">Codigo IP Fuente de Poder</label>
																	<?php if (isset($radioCodIpFEVal)&&$radioCodIpFEVal==1) {?>
																		<div class="alert alert-danger alert-dismissible">
																			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																			<strong>El Codigo IP de la fuente de poder ya existe</strong> por favor intente con uno diferente
																		</div>
																	<?php }?>
																	<input type="text" name="codigo_ip_f" id="codigo_ip_f" class="form-control " placeholder="Codigo IP de la fuente de poder" autocomplete="off" pattern="^(IP-)+(?!\.)[0-9]+|(SIN IP-[0-9]+)$" maxlength="8" required="required" value="<?php echo isset($_POST['codigo_ip_f']) ? $_POST['codigo_ip_f']:"IP-"; ?>" onKeyUp="mayusculas(this);">
																</div>
															</div>
															<h8><strong>Serial</strong> </h8>
															<div class="form-group row">
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="serial">Equipo</label>
																	<?php if (isset($radioSerialVal)&&$radioSerialVal==1) {?>
																		<div class="alert alert-danger alert-dismissible">
																			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																			<strong>El serial ya existe</strong> por favor intente con uno diferente
																		</div>
																	<?php }?>
																	<input type="text" name="serial" id="serial" class="form-control " placeholder="Serial" autocomplete="off" maxlength="22" required="required" value="<?php echo isset($_POST['serial']) ? $_POST['serial']:""; ?>" onKeyUp="mayusculas(this);">
																</div>
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="serial_f">Fuente de Poder</label>
																	<?php if (isset($radioSerialFEVal)&&$radioSerialFEVal==1) {?>
																		<div class="alert alert-danger alert-dismissible">
																			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																			<strong>El serial de la fuente ya existe</strong> por favor intente con uno diferente
																		</div>
																	<?php }?>
																	<input type="text" name="serial_f" id="serial_f" class="form-control " placeholder="Serial fuente de poder" autocomplete="off" maxlength="22" required="required" value="<?php echo isset($_POST['serial_f']) ? $_POST['serial_f']:""; ?>" onKeyUp="mayusculas(this);">
																</div>
															</div>
															<h8><strong>Marca</strong> </h8>
															<div class="form-group row">
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="marca">Equipo</label>
																	<input type="text" name="marca" id="marca" class="form-control " placeholder="Marca del equipo" autocomplete="off" maxlength="22" required="required" value="<?php echo isset($_POST['marca']) ? $_POST['marca']:""; ?>" onKeyUp="mayusculas(this);">
																</div>
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="marca_f">Fuente de Poder</label>
																	<input type="text" name="marca_f" id="marca_f" class="form-control " placeholder="Marca fuente de poder" autocomplete="off" maxlength="22" required="required" value="<?php echo isset($_POST['marca_f']) ? $_POST['marca_f']:""; ?>" onKeyUp="mayusculas(this);">
																</div>
															</div>
															<h8><strong>Modelo</strong> </h8>
															<div class="form-group row">

																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="modelo">Equipo</label>
																	<input type="text" name="modelo" id="modelo" class="form-control " placeholder="Modelo del equipo" autocomplete="off" maxlength="22" required="required" value="<?php echo isset($_POST['modelo']) ? $_POST['modelo']:""; ?>" onKeyUp="mayusculas(this);">
																</div>
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="modelo_f">Fuente de Poder</label>
																	<input type="text" name="modelo_f" id="modelo_f" class="form-control " placeholder="Modelo Fuente de Poder" autocomplete="off" maxlength="22" required="required" value="<?php echo isset($_POST['modelo_f']) ? $_POST['modelo_f']:""; ?>" onKeyUp="mayusculas(this);">
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<input type="text" name="responsable" class="form-control " id="responsable" pattern="^(?!\.)[A-Za-z. ]+$" title="El nombre del responsable debe contener al menos 3 caracteres, no puede contener un caracter numerico ni empezar con espacios" placeholder="Persona responsable" autocomplete="off" minlength="3" maxlength="32" required="required" onkeypress="return letra(event);" value="<?php echo isset($_POST['responsable']) ? $_POST['responsable']:""; ?>" onKeyUp="mayusculas(this);">
																</div>
																<!-- pattern="^(([A-za-z]+[\s]{1}[A-za-z]+[\s]{1}[A-za-z]+[\s]{1}[A-za-z]+)|([A-za-z]+[\s]{1}[A-za-z]+[\s]{1}[A-za-z]+)|([A-za-z]+[\s]{1}[A-za-z]+)|([A-Za-z]+))$" -->
																<div class="col-sm-6 ">
																	<select name="empresa" class="form-control  p-1" required="required">
																		<option value="">Empresa...</option>
																		<option value="AGRICOLA YARITAGUA">AGRICOLA YARITAGUA</option>
																		<option value="AGROPECUARIA LOS CERRITOS">AGROPECUARIA LOS CERRITOS</option>
																		<option value="INVERSIONES PORCINAS C.A.">INVERSIONES PORCINAS C.A.</option>
																		<option value="SERENOS ERM C.A.">SERENOS ERM C.A.</option>
																		<option value="SHELLTER C.A.">SHELLTER C.A.</option>
																	</select>
																</div>
															</div>                            
															<div class="form-group row">
																<div class="col-sm-6">
																	<select name="centro_trabajo" class="form-control selectpicker show-tick p-1" data-live-search="true" title="Centro de trabajo..." data-size="5" data-live-search-placeholder="Buscar" required="required">
																		<option value="AGROPECUARIA LOS CERRITOS">AGROPECUARIA LOS CERRITOS</option>
																		<option value="ALC. PPAL LA PARREÑA">ALC. PPAL LA PARREÑA</option>
																		<option value="ALCABALA HOTEL">ALCABALA HOTEL</option>
																		<option value="ALCABALA PPAL LOS CERRITOS">ALCABALA PPAL LOS CERRITOS</option>
																		<option value="ALCABALA PPAL. URIMANES">ALCABALA PPAL. URIMANES</option>
																		<option value="ALCABALA PRINCIPAL IP">ALCABALA PRINCIPAL IP</option>
																		<option value="ALCABALA ROMANA IP">ALCABALA ROMANA IP</option>
																		<option value="CAAY - ADMINISTRACION">CAAY - ADMINISTRACION</option>
																		<option value="CAAY - CAMPO">CAAY - CAMPO</option>
																		<option value="CAAY - HDA. LA PARREÑA">CAAY - HDA. LA PARREÑA</option>
																		<option value="CAAY - HDA. LAS VEGAS">CAAY - HDA. LAS VEGAS</option>
																		<option value="CAAY - TALLER">CAAY - TALLER</option>
																		<option value="CAMPO IP">CAMPO IP</option>
																		<option value="CEAPOCA 1 - VIGILANCIA">CEAPOCA 1 - VIGILANCIA</option>
																		<option value="CEAPOCA 2 - VIGILANCIA">CEAPOCA 2 - VIGILANCIA</option>
																		<option value="SALA DE CONTROL">SALA DE CONTROL</option>
																		<option value="GCIA. PRODUCCION CERDOS">GCIA. PRODUCCION CERDOS</option>
																		<option value="GRANJA CEAPOCA">GRANJA CEAPOCA</option>
																		<option value="GRANJA LA PARREÑA">GRANJA LA PARREÑA</option>
																		<option value="GRANJA LOS CERRITOS 1">GRANJA LOS CERRITOS 1</option>
																		<option value="GRANJA LOS CERRITOS 2">GRANJA LOS CERRITOS 2</option>
																		<option value="GRANJA MATACARMELERA">GRANJA MATACARMELERA</option>
																		<option value="GRANJA OJO DE AGUA">GRANJA OJO DE AGUA</option>
																		<option value="GRANJA URIMAN 1">GRANJA URIMAN 1</option>
																		<option value="GRANJA URIMAN 2">GRANJA URIMAN 2</option>
																		<option value="GRANJA URIMAN 2 - CIAP">GRANJA URIMAN 2 - CIAP</option>
																		<option value="GRANJA VILLA DE JULIA">GRANJA VILLA DE JULIA</option>
																		<option value="HACIENDA LA ESMERALDA">HACIENDA LA ESMERALDA</option>
																		<option value="MATACARMELERA - ENGORDE 1">MATACARMELERA - ENGORDE 1</option>
																		<option value="MATACARMELERA - ENGORDE 2">MATACARMELERA - ENGORDE 2</option>
																		<option value="MATACARMELERA - ENGORDE 3">MATACARMELERA - ENGORDE 3</option>
																		<option value="PLANTA DE ALIMENTOS">PLANTA DE ALIMENTOS</option>
																		<option value="PRODUCCION CERDOS">PRODUCCION CERDOS</option>
																		<option value="PROTECCION FISICA">PROTECCION FISICA</option>
																		<option value="PROYECTOS">PROYECTOS</option>
																		<option value="SEGURIDAD INDUSTRIAL">SEGURIDAD INDUSTRIAL</option>
																		<option value="VENTAS">VENTAS</option>
																		<option value="VIGILANCIA ARCHIVO MUERTO">VIGILANCIA ARCHIVO MUERTO</option>
																		<option value="VIGILANCIA DISPENSARIO">VIGILANCIA DISPENSARIO</option>
																		<option value="VIGILANCIA NOCTURNA PLANTA">VIGILANCIA NOCTURNA PLANTA</option>
																	</select>
																</div>
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<select name="status" class="form-control  p-1" required="required">
																		<option value="">Status del radio...</option>
																		<option value="ASIGNADO">Asignado</option>
																		<option value="POR ASIGNAR">Por Asignar</option>
																		<option value="REPARADO POR ENTREGAR">Reparado, por entregar</option>
																		<option value="PENDIENTE PARA REPARACIÓN">Pendiente para reparación</option>
																		<option value="EN REPARACIÓN">En reparación</option>
																	</select>
																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="text-center">
															<h1 class="h4 text-gray-900 mt-2">Estado del Equipo</h1>    
														</div>
														<div class="p-5">
															<div class="form-group row">
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<select name="estado" class="form-control  p-1" required="required">
																		<option value="">Equipo...</option>
																		<option value="OPERATIVO">Operativo</option>
																		<option value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option value="DAÑADO">Dañado</option>
																	</select>

																</div>
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<select name="est_antena" class="form-control  p-1" required="required">
																		<option value="">Antena...</option>
																		<option value="OPERATIVO">Operativo</option>
																		<option value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option value="DAÑADO">Dañado</option>
																	</select>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<select name="est_perillavol" class="form-control  p-1" required="required">
																		<option value="">Perilla de volumen...</option>
																		<option value="OPERATIVO">Operativo</option>
																		<option value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option value="DAÑADO">Dañado</option>
																	</select>
																</div>
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<select name="est_perillacan" class="form-control  p-1" required="required">
																		<option value="">Perilla de canales...</option>
																		<option value="OPERATIVO">Operativo</option>
																		<option value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option value="DAÑADO">Dañado</option>
																	</select>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<select name="est_dustcap" class="form-control  p-1" required="required">
																		<option value="">Protector de polvo (Dustcap)...</option>
																		<option value="OPERATIVO">Operativo</option>
																		<option value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option value="DAÑADO">Dañado</option>
																	</select>
																</div>
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<select name="est_beltclip" class="form-control  p-1" required="required">
																		<option value="">Gancho para cinturon (Beltclip)...</option>
																		<option value="OPERATIVO">Operativo</option>
																		<option value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option value="DAÑADO">Dañado</option>
																	</select>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<select name="est_teclaptt" class="form-control  p-1" required="required">
																		<option value="">Tecla lateral PTT ...</option>
																		<option value="OPERATIVO">Operativo</option>
																		<option value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option value="DAÑADO">Dañado</option>
																	</select>
																</div>
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<select name="est_cargador" class="form-control  p-1" required="required">
																		<option value="">Cargador ...</option>
																		<option value="OPERATIVO">Operativo</option>
																		<option value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option value="DAÑADO">Dañado</option>
																	</select>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<select name="est_adaptador" class="form-control  p-1" required="required">
																		<option value="">Adaptador del cargador ...</option>
																		<option value="OPERATIVO">Operativo</option>
																		<option value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option value="DAÑADO">Dañado</option>
																	</select>
																</div>
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<select name="est_bateria" class="form-control  p-1" required="required">
																		<option value="">Bateria ...</option>
																		<option value="OPERATIVO">Operativo</option>
																		<option value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option value="DAÑADO">Dañado</option>
																	</select>
																</div>
																
															</div>
															<div class="form-group">
																<label for="observacion">Observaciones</label>
																<textarea name="observacion" id="observacion" class="form-control" rows="3" placeholder="Informacion adicional" autocomplete="off" onKeyUp="mayusculas(this);"></textarea>
															</div>
														</div><!-- End of p-5 class div -->
													</div><!-- End of  div class col-lg-6 -->
												</div><!-- End of div class row -->
												<input type="hidden" name="portatil" value="1">
												<hr>
												<div class="form-group" style="margin-left: 40%;">
													<div class="text-center">
														<div class="col-sm-5">
															<button type="submit" name="submit" value="regRadioFE" id="btnRegRadioFE" class="btn btn-primary btn-user btn-block" disabled>Registrar</button>
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