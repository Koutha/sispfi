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
							<h4>Modificando datos del Radio</h4>
							<div class="container">
								<div class="card o-hidden border-0 shadow-lg my-5">
									<div class="card-body p-0">
										<!-- Nested Row within Card Body -->
										<form action="" method="post" class="user" role="form" id="userForm">
											<div class="row">
												<div class="col-lg-6">
													<div class="text-center">
														<h1 class="h4 text-gray-900 mt-2">Datos del Equipo</h1>
														   
														</div>
														<div class="p-5">
															<div class="form-group">
																<label for="codigo_usuario">Codigo o clave de usuario</label>
																<?php if (isset($radioCodVal)&&$radioCodVal==1) {?>
																	<div class="alert alert-danger alert-dismissible">
																		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																		<strong>El Codigo o Clave de usuario ya existe</strong> por favor intente con uno diferente
																	</div>
																<?php }?>
																<input type="text" name="codigo_usuario" id="codigo_usuario" class="form-control " placeholder="Codigo o clave de usuario..." autocomplete="off" maxlength="22" required="required" value="<?php echo isset($_POST['codigo_usuario']) ? $_POST['codigo_usuario']:$radio['codigo_usuario']; ?>" onKeyUp="mayusculas(this);">
															</div>
															<div class="form-group row">
																<div class="col-sm-6">
																	<label for="codigo_ip">Codigo IP</label>
																	<?php if (isset($radioCodIpVal)&&$radioCodIpVal==1) {?>
																		<div class="alert alert-danger alert-dismissible">
																			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																			<strong>El Codigo IP ya existe</strong> por favor intente con uno diferente
																		</div>
																	<?php }?>
																	<input type="text" name="codigo_ip" id="codigo_ip" class="form-control " placeholder="Codigo IP" autocomplete="off" pattern="^(IP-)+(?!\.)[0-9]+|(SIN IP-[0-9]+)$" maxlength="8" required="required" value="<?php echo isset($_POST['codigo_ip']) ? $_POST['codigo_ip']:$radio['codigo_ip']; ?>" onKeyUp="mayusculas(this);">
																</div>
																<!-- Pattern="^(IP-)+(?!\.)[0-9]+$" -->
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="serial">Serial</label>
																	<?php if (isset($radioSerialVal)&&$radioSerialVal==1) {?>
																		<div class="alert alert-danger alert-dismissible">
																			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																			<strong>El serial ya existe</strong> por favor intente con uno diferente
																		</div>
																	<?php }?>
																	<input type="text" name="serial" id="serial" class="form-control " placeholder="Serial" autocomplete="off" maxlength="22" required="required" value="<?php echo isset($_POST['serial']) ? $_POST['serial']:$radio['serial']; ?>" onKeyUp="mayusculas(this);">
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="marca">Marca del equipo</label>
																	<input type="text" name="marca" id="marca" class="form-control " placeholder="Marca del equipo" autocomplete="off" maxlength="22" required="required" value="<?php echo isset($_POST['marca']) ? $_POST['marca']:$radio['marca']; ?>" onKeyUp="mayusculas(this);">
																</div>
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="modelo">Modelo del equipo</label>
																	<input type="text" name="modelo" id="modelo" class="form-control " placeholder="Modelo del equipo" autocomplete="off" maxlength="22" required="required" value="<?php echo isset($_POST['modelo']) ? $_POST['modelo']:$radio['modelo']; ?>" onKeyUp="mayusculas(this);">
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="serial_bateria">Serial de la bateria</label>
																	<input type="text" name="serial_bateria" id="serial_bateria" class="form-control" placeholder="Serial de la bateria" autocomplete="off" maxlength="22" required="required" value="<?php echo isset($_POST['serial_bateria']) ? $_POST['serial_bateria']:$radio['serial_bateria']; ?>" onKeyUp="mayusculas(this);">
																</div>
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="responsable">Persona responsable</label>
																	<input type="text" name="responsable" class="form-control " id="responsable" pattern="^(?!\.)[A-Za-z. ]+$" title="El nombre del responsable debe contener al menos 3 caracteres, no puede contener un caracter numerico ni empezar con espacios" placeholder="Persona responsable" autocomplete="off" minlength="3" maxlength="32" required="required" onkeypress="return letra(event);" value="<?php echo isset($_POST['responsable']) ? $_POST['responsable']:$radio['responsable']; ?>" onKeyUp="mayusculas(this);">
																</div>
																<!-- pattern="^(([A-za-z]+[\s]{1}[A-za-z]+[\s]{1}[A-za-z]+[\s]{1}[A-za-z]+)|([A-za-z]+[\s]{1}[A-za-z]+[\s]{1}[A-za-z]+)|([A-za-z]+[\s]{1}[A-za-z]+)|([A-Za-z]+))$" -->
															</div>                            
															<div class="form-group row">
																<div class="col-sm-6 ">
																	<label for="empresa">Empresa</label>
																	<select name="empresa" class="form-control p-1" id="empresa" required="required">
																		<option value="">Empresa...</option>
																		<option <?php if(isset($radio)&&$radio['empresa']=='AGRICOLA YARITAGUA'){echo 'selected';}elseif (isset($_POST['empresa'])&&$_POST['empresa']=='AGRICOLA YARITAGUA') {echo 'selected';} ?> value="AGRICOLA YARITAGUA">AGRICOLA YARITAGUA</option>
																		<option <?php if(isset($radio)&&$radio['empresa']=='AGROPECUARIA LOS CERRITOS'){echo 'selected';}elseif (isset($_POST['empresa'])&&$_POST['empresa']=='AGROPECUARIA LOS CERRITOS') {echo 'selected';} ?> value="AGROPECUARIA LOS CERRITOS">AGROPECUARIA LOS CERRITOS</option>
																		<option <?php if(isset($radio)&&$radio['empresa']=='INVERSIONES PORCINAS C.A.'){echo 'selected';}elseif (isset($_POST['empresa'])&&$_POST['empresa']=='INVERSIONES PORCINAS C.A.') {echo 'selected';} ?> value="INVERSIONES PORCINAS C.A.">INVERSIONES PORCINAS C.A.</option>
																		<option <?php if(isset($radio)&&$radio['empresa']=='SERENOS ERM C.A.'){echo 'selected';}elseif (isset($_POST['empresa'])&&$_POST['empresa']=='SERENOS ERM C.A.') {echo 'selected';} ?> value="SERENOS ERM C.A.">SERENOS ERM C.A.</option>
																		<option <?php if(isset($radio)&&$radio['empresa']=='SHELLTER C.A.'){echo 'selected';}elseif (isset($_POST['empresa'])&&$_POST['empresa']=='SHELLTER C.A.') {echo 'selected';} ?> value="SHELLTER C.A.">SHELLTER C.A.</option>
																	</select>
																</div>
																<div class="col-sm-6">
																	<label for="tipo_comunicacion">Centro de trabajo</label>
																	<select name="centro_trabajo" class="form-control p-1" id="tipo_comunicacion" required="required">
																		<option value="">Centro de trabajo...</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='AGROPECUARIA LOS CERRITOS'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='AGROPECUARIA LOS CERRITOS') {echo 'selected';} ?> value="AGROPECUARIA LOS CERRITOS">AGROPECUARIA LOS CERRITOS</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='ALC. PPAL LA PARREÑA'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='ALC. PPAL LA PARREÑA') {echo 'selected';} ?> value="ALC. PPAL LA PARREÑA">ALC. PPAL LA PARREÑA</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='ALCABALA HOTEL'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='ALCABALA HOTEL') {echo 'selected';} ?> value="ALCABALA HOTEL">ALCABALA HOTEL</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='ALCABALA PPAL LOS CERRITOS'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='ALCABALA PPAL LOS CERRITOS') {echo 'selected';} ?> value="ALCABALA PPAL LOS CERRITOS">ALCABALA PPAL LOS CERRITOS</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='ALCABALA PPAL. URIMANES'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='ALCABALA PPAL. URIMANES') {echo 'selected';} ?> value="ALCABALA PPAL. URIMANES">ALCABALA PPAL. URIMANES</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='ALCABALA PRINCIPAL IP'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='ALCABALA PRINCIPAL IP') {echo 'selected';} ?> value="ALCABALA PRINCIPAL IP">ALCABALA PRINCIPAL IP</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='ALCABALA ROMANA IP'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='ALCABALA ROMANA IP') {echo 'selected';} ?> value="ALCABALA ROMANA IP">ALCABALA ROMANA IP</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='CAAY - ADMINISTRACION'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='CAAY - ADMINISTRACION') {echo 'selected';} ?> value="CAAY - ADMINISTRACION">CAAY - ADMINISTRACION</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='CAAY - CAMPO'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='CAAY - CAMPO') {echo 'selected';} ?> value="CAAY - CAMPO">CAAY - CAMPO</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='CAAY - HDA. LA PARREÑA'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='CAAY - HDA. LA PARREÑA') {echo 'selected';} ?> value="CAAY - HDA. LA PARREÑA">CAAY - HDA. LA PARREÑA</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='CAAY - HDA. LAS VEGAS'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='CAAY - HDA. LAS VEGAS') {echo 'selected';} ?> value="CAAY - HDA. LAS VEGAS">CAAY - HDA. LAS VEGAS</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='CAAY - TALLER'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='CAAY - TALLER') {echo 'selected';} ?> value="CAAY - TALLER">CAAY - TALLER</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='CAMPO IP'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='CAMPO IP') {echo 'selected';} ?> value="CAMPO IP">CAMPO IP</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='CEAPOCA 1 - VIGILANCIA'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='CEAPOCA 1 - VIGILANCIA') {echo 'selected';} ?> value="CEAPOCA 1 - VIGILANCIA">CEAPOCA 1 - VIGILANCIA</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='CEAPOCA 2 - VIGILANCIA'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='CEAPOCA 2 - VIGILANCIA') {echo 'selected';} ?> value="CEAPOCA 2 - VIGILANCIA">CEAPOCA 2 - VIGILANCIA</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='SALA DE CONTROL'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='SALA DE CONTROL') {echo 'selected';} ?> value="SALA DE CONTROL">SALA DE CONTROL</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='GCIA. PRODUCCION CERDOS'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='GCIA. PRODUCCION CERDOS') {echo 'selected';} ?> value="GCIA. PRODUCCION CERDOS">GCIA. PRODUCCION CERDOS</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='GRANJA CEAPOCA'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='GRANJA CEAPOCA') {echo 'selected';} ?> value="GRANJA CEAPOCA">GRANJA CEAPOCA</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='GRANJA LA PARREÑA'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='GRANJA LA PARREÑA') {echo 'selected';} ?> value="GRANJA LA PARREÑA">GRANJA LA PARREÑA</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='GRANJA LOS CERRITOS 1'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='GRANJA LOS CERRITOS 1') {echo 'selected';} ?> value="GRANJA LOS CERRITOS 1">GRANJA LOS CERRITOS 1</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='GRANJA LOS CERRITOS 2'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='GRANJA LOS CERRITOS 2') {echo 'selected';} ?> value="GRANJA LOS CERRITOS 2">GRANJA LOS CERRITOS 2</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='GRANJA MATACARMELERA'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='GRANJA MATACARMELERA') {echo 'selected';} ?> value="GRANJA MATACARMELERA">GRANJA MATACARMELERA</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='GRANJA OJO DE AGUA'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='GRANJA OJO DE AGUA') {echo 'selected';} ?> value="GRANJA OJO DE AGUA">GRANJA OJO DE AGUA</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='GRANJA URIMAN 1'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='GRANJA URIMAN 1') {echo 'selected';} ?> value="GRANJA URIMAN 1">GRANJA URIMAN 1</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='GRANJA URIMAN 2'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='GRANJA URIMAN 2') {echo 'selected';} ?> value="GRANJA URIMAN 2">GRANJA URIMAN 2</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='GRANJA URIMAN 2 - CIAP'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='GRANJA URIMAN 2 - CIAP') {echo 'selected';} ?> value="GRANJA URIMAN 2 - CIAP">GRANJA URIMAN 2 - CIAP</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='GRANJA VILLA DE JULIA'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='GRANJA VILLA DE JULIA') {echo 'selected';} ?> value="GRANJA VILLA DE JULIA">GRANJA VILLA DE JULIA</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='HACIENDA LA ESMERALDA'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='HACIENDA LA ESMERALDA') {echo 'selected';} ?> value="HACIENDA LA ESMERALDA">HACIENDA LA ESMERALDA</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='MATACARMELERA - ENGORDE 1'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='MATACARMELERA - ENGORDE 1') {echo 'selected';} ?> value="MATACARMELERA - ENGORDE 1">MATACARMELERA - ENGORDE 1</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='MATACARMELERA - ENGORDE 2'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='MATACARMELERA - ENGORDE 2') {echo 'selected';} ?> value="MATACARMELERA - ENGORDE 2">MATACARMELERA - ENGORDE 2</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='MATACARMELERA - ENGORDE 3'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='MATACARMELERA - ENGORDE 3') {echo 'selected';} ?> value="MATACARMELERA - ENGORDE 3">MATACARMELERA - ENGORDE 3</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='PLANTA DE ALIMENTOS'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='PLANTA DE ALIMENTOS') {echo 'selected';} ?> value="PLANTA DE ALIMENTOS">PLANTA DE ALIMENTOS</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='PRODUCCION CERDOS'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='PRODUCCION CERDOS') {echo 'selected';} ?> value="PRODUCCION CERDOS">PRODUCCION CERDOS</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='PROTECCION FISICA'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='PROTECCION FISICA') {echo 'selected';} ?> value="PROTECCION FISICA">PROTECCION FISICA</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='PROYECTOS'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='PROYECTOS') {echo 'selected';} ?> value="PROYECTOS">PROYECTOS</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='SEGURIDAD INDUSTRIAL'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='SEGURIDAD INDUSTRIAL') {echo 'selected';} ?> value="SEGURIDAD INDUSTRIAL">SEGURIDAD INDUSTRIAL</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='VENTAS'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='VENTAS') {echo 'selected';} ?> value="VENTAS">VENTAS</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='VIGILANCIA ARCHIVO MUERTO'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='VIGILANCIA ARCHIVO MUERTO') {echo 'selected';} ?> value="VIGILANCIA ARCHIVO MUERTO">VIGILANCIA ARCHIVO MUERTO</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='VIGILANCIA DISPENSARIO'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='VIGILANCIA DISPENSARIO') {echo 'selected';} ?> value="VIGILANCIA DISPENSARIO">VIGILANCIA DISPENSARIO</option>
																		<option <?php if(isset($radio)&&$radio['centro_trabajo']=='VIGILANCIA NOCTURNA PLANTA'){echo 'selected';}elseif (isset($_POST['centro_trabajo'])&&$_POST['centro_trabajo']=='VIGILANCIA NOCTURNA PLANTA') {echo 'selected';} ?> value="VIGILANCIA NOCTURNA PLANTA">VIGILANCIA NOCTURNA PLANTA</option>
																	</select>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-6">
																	<label for="tipo_comunicacion">Tipo de radio</label>
																	<select name="tipo_comunicacion" class="form-control p-1" id="tipo_comunicacion" required="required">
																		<option value="">Tipo de radio...</option>
																		<option <?php if(isset($radio)&&$radio['tipo_comunicacion']=='PORTATIL'){echo 'selected';}elseif (isset($_POST['tipo_comunicacion'])&&$_POST['tipo_comunicacion']=='PORTATIL') {echo 'selected';} ?> value="PORTATIL">Portatil</option>
																		<option <?php if(isset($radio)&&$radio['tipo_comunicacion']=='PORTATIL CON PANTALLA'){echo 'selected';}elseif (isset($_POST['tipo_comunicacion'])&&$_POST['tipo_comunicacion']=='PORTATIL CON PANTALLA') {echo 'selected';} ?> value="PORTATIL CON PANTALLA">Portatil con pantalla</option>
																		<option <?php if(isset($radio)&&$radio['tipo_comunicacion']=='ESTACION FIJA'){echo 'selected';}elseif (isset($_POST['tipo_comunicacion'])&&$_POST['tipo_comunicacion']=='ESTACION FIJA') {echo 'selected';} ?> value="ESTACION FIJA">Estacíon Fija</option>
																		<option <?php if(isset($radio)&&$radio['tipo_comunicacion']=='PUNTO A PUNTO'){echo 'selected';}elseif (isset($_POST['tipo_comunicacion'])&&$_POST['tipo_comunicacion']=='PUNTO A PUNTO') {echo 'selected';} ?> value="PUNTO A PUNTO">Punto a Punto</option>
																	</select>
																</div>
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="status">Status del radio</label>
																	<select name="status" class="form-control p-1" id="status" required="required">
																		<option value="">Status del radio...</option>
																		<option <?php if(isset($radio)&&$radio['status']=='ASIGNADO'){echo 'selected';}elseif (isset($_POST['status'])&&$_POST['status']=='ASIGNADO') {echo 'selected';} ?> value="ASIGNADO">Asignado</option>
																		<option <?php if(isset($radio)&&$radio['status']=='POR ASIGNAR'){echo 'selected';}elseif (isset($_POST['status'])&&$_POST['status']=='POR ASIGNAR') {echo 'selected';} ?> value="POR ASIGNAR">Por Asignar</option>
																		<option <?php if(isset($radio)&&$radio['status']=='REPARADO POR ENTREGAR'){echo 'selected';}elseif (isset($_POST['status'])&&$_POST['status']=='REPARADO POR ENTREGAR') {echo 'selected';} ?> value="REPARADO POR ENTREGAR">Reparado, por entregar</option>
																		<option <?php if(isset($radio)&&$radio['status']=='PENDIENTE PARA REPARACIÓN'){echo 'selected';}elseif (isset($_POST['status'])&&$_POST['status']=='PENDIENTE PARA REPARACIÓN') {echo 'selected';} ?> value="PENDIENTE PARA REPARACIÓN">Pendiente para reparación</option>
																		<option <?php if(isset($radio)&&$radio['status']=='EN REPARACIÓN'){echo 'selected';}elseif (isset($_POST['status'])&&$_POST['status']=='EN REPARACIÓN') {echo 'selected';} ?> value="EN REPARACIÓN">En reparación</option>
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
																	<label for="estado">Equipo</label>
																	<select name="estado" class="form-control p-1" id="estado" required="required">
																		<option value="">Equipo...</option>
																		<option <?php if(isset($radio)&&$radio['estado']=='OPERATIVO'){echo 'selected';}elseif (isset($_POST['estado'])&&$_POST['estado']=='OPERATIVO') {echo 'selected';} ?> value="OPERATIVO">Operativo</option>
																		<option <?php if(isset($radio)&&$radio['estado']=='OPERATIVO CON DEFECTO'){echo 'selected';}elseif (isset($_POST['estado'])&&$_POST['estado']=='OPERATIVO CON DEFECTO') {echo 'selected';} ?> value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option <?php if(isset($radio)&&$radio['estado']=='DAÑADO'){echo 'selected';}elseif (isset($_POST['estado'])&&$_POST['estado']=='DAÑADO') {echo 'selected';} ?> value="DAÑADO">Dañado</option>
																	</select>
																</div>
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="est_antena">Perilla de volumen</label>
																	<select name="est_antena" class="form-control p-1" id="est_antena" required="required">
																		<option value="">Antena...</option>
																		<option <?php if(isset($radio)&&$radio['est_antena']=='OPERATIVO'){echo 'selected';}elseif (isset($_POST['est_antena'])&&$_POST['est_antena']=='OPERATIVO') {echo 'selected';} ?> value="OPERATIVO">Operativo</option>
																		<option <?php if(isset($radio)&&$radio['est_antena']=='OPERATIVO CON DEFECTO'){echo 'selected';}elseif (isset($_POST['est_antena'])&&$_POST['est_antena']=='OPERATIVO CON DEFECTO') {echo 'selected';} ?> value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option <?php if(isset($radio)&&$radio['est_antena']=='DAÑADO'){echo 'selected';}elseif (isset($_POST['est_antena'])&&$_POST['est_antena']=='DAÑADO') {echo 'selected';} ?> value="DAÑADO">Dañado</option>
																	</select>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="est_perillavol">Perilla de volumen</label>
																	<select name="est_perillavol" class="form-control p-1" id="est_perillavol" required="required">
																		<option value="">Perilla de volumen...</option>
																		<option <?php if(isset($radio)&&$radio['est_perillavol']=='OPERATIVO'){echo 'selected';}elseif (isset($_POST['est_perillavol'])&&$_POST['est_perillavol']=='OPERATIVO') {echo 'selected';} ?> value="OPERATIVO">Operativo</option>
																		<option <?php if(isset($radio)&&$radio['est_perillavol']=='OPERATIVO CON DEFECTO'){echo 'selected';}elseif (isset($_POST['est_perillavol'])&&$_POST['est_perillavol']=='OPERATIVO CON DEFECTO') {echo 'selected';} ?> value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option <?php if(isset($radio)&&$radio['est_perillavol']=='DAÑADO'){echo 'selected';}elseif (isset($_POST['est_perillavol'])&&$_POST['est_perillavol']=='DAÑADO') {echo 'selected';} ?> value="DAÑADO">Dañado</option>
																	</select>
																</div>
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="est_perillacan">Perilla de canales</label>
																	<select name="est_perillacan" class="form-control p-1" id="est_perillacan" required="required">
																		<option value="">Perilla de canales...</option>
																		<option <?php if(isset($radio)&&$radio['est_perillacan']=='OPERATIVO'){echo 'selected';}elseif (isset($_POST['est_perillacan'])&&$_POST['est_perillacan']=='OPERATIVO') {echo 'selected';} ?> value="OPERATIVO">Operativo</option>
																		<option <?php if(isset($radio)&&$radio['est_perillacan']=='OPERATIVO CON DEFECTO'){echo 'selected';}elseif (isset($_POST['est_perillacan'])&&$_POST['est_perillacan']=='OPERATIVO CON DEFECTO') {echo 'selected';} ?> value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option <?php if(isset($radio)&&$radio['est_perillacan']=='DAÑADO'){echo 'selected';}elseif (isset($_POST['est_perillacan'])&&$_POST['est_perillacan']=='DAÑADO') {echo 'selected';} ?> value="DAÑADO">Dañado</option>
																	</select>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="est_dustcap">Protector de polvo (Dustcap)</label>
																	<select name="est_dustcap" class="form-control p-1" id="est_dustcap" required="required">
																		<option value="">Protector de polvo (Dustcap)...</option>
																		<option <?php if(isset($radio)&&$radio['est_dustcap']=='OPERATIVO'){echo 'selected';}elseif (isset($_POST['est_dustcap'])&&$_POST['est_dustcap']=='OPERATIVO') {echo 'selected';} ?> value="OPERATIVO">Operativo</option>
																		<option <?php if(isset($radio)&&$radio['est_dustcap']=='OPERATIVO CON DEFECTO'){echo 'selected';}elseif (isset($_POST['est_dustcap'])&&$_POST['est_dustcap']=='OPERATIVO CON DEFECTO') {echo 'selected';} ?> value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option <?php if(isset($radio)&&$radio['est_dustcap']=='DAÑADO'){echo 'selected';}elseif (isset($_POST['est_dustcap'])&&$_POST['est_dustcap']=='DAÑADO') {echo 'selected';} ?> value="DAÑADO">Dañado</option>
																	</select>
																</div>
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="est_beltclip">Gancho para cinturon (Beltclip)</label>
																	<select name="est_beltclip" class="form-control p-1" id="est_beltclip" required="required">
																		<option value="">Gancho para cinturon (Beltclip)...</option>
																		<option <?php if(isset($radio)&&$radio['est_beltclip']=='OPERATIVO'){echo 'selected';}elseif (isset($_POST['est_beltclip'])&&$_POST['est_beltclip']=='OPERATIVO') {echo 'selected';} ?> value="OPERATIVO">Operativo</option>
																		<option <?php if(isset($radio)&&$radio['est_beltclip']=='OPERATIVO CON DEFECTO'){echo 'selected';}elseif (isset($_POST['est_beltclip'])&&$_POST['est_beltclip']=='OPERATIVO CON DEFECTO') {echo 'selected';} ?> value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option <?php if(isset($radio)&&$radio['est_beltclip']=='DAÑADO'){echo 'selected';}elseif (isset($_POST['est_beltclip'])&&$_POST['est_beltclip']=='DAÑADO') {echo 'selected';} ?> value="DAÑADO">Dañado</option>
																	</select>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="est_teclaptt">Tecla lateral PTT</label>
																	<select name="est_teclaptt" class="form-control p-1" id="est_teclaptt" required="required">
																		<option value="">Tecla lateral PTT ...</option>
																		<option <?php if(isset($radio)&&$radio['est_teclaptt']=='OPERATIVO'){echo 'selected';}elseif (isset($_POST['est_teclaptt'])&&$_POST['est_teclaptt']=='OPERATIVO') {echo 'selected';} ?> value="OPERATIVO">Operativo</option>
																		<option <?php if(isset($radio)&&$radio['est_teclaptt']=='OPERATIVO CON DEFECTO'){echo 'selected';}elseif (isset($_POST['est_teclaptt'])&&$_POST['est_teclaptt']=='OPERATIVO CON DEFECTO') {echo 'selected';} ?> value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option <?php if(isset($radio)&&$radio['est_teclaptt']=='DAÑADO'){echo 'selected';}elseif (isset($_POST['est_teclaptt'])&&$_POST['est_teclaptt']=='DAÑADO') {echo 'selected';} ?> value="DAÑADO">Dañado</option>
																	</select>
																</div>
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="est_cargador">Cargador</label>
																	<select name="est_cargador" class="form-control p-1" id="est_cargador" required="required">
																		<option value="">Cargador ...</option>
																		<option <?php if(isset($radio)&&$radio['est_cargador']=='OPERATIVO'){echo 'selected';}elseif (isset($_POST['est_cargador'])&&$_POST['est_cargador']=='OPERATIVO') {echo 'selected';} ?> value="OPERATIVO">Operativo</option>
																		<option <?php if(isset($radio)&&$radio['est_cargador']=='OPERATIVO CON DEFECTO'){echo 'selected';}elseif (isset($_POST['est_cargador'])&&$_POST['est_cargador']=='OPERATIVO CON DEFECTO') {echo 'selected';} ?> value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option <?php if(isset($radio)&&$radio['est_cargador']=='DAÑADO'){echo 'selected';}elseif (isset($_POST['est_cargador'])&&$_POST['est_cargador']=='DAÑADO') {echo 'selected';} ?> value="DAÑADO">Dañado</option>
																	</select>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="est_adaptador">Adaptador / Transformador</label>
																	<select name="est_adaptador" class="form-control p-1" id="est_adaptador" required="required">
																		<option value="">Adaptador del cargador ...</option>
																		<option <?php if(isset($radio)&&$radio['est_adaptador']=='OPERATIVO'){echo 'selected';}elseif (isset($_POST['est_adaptador'])&&$_POST['est_adaptador']=='OPERATIVO') {echo 'selected';} ?> value="OPERATIVO">Operativo</option>
																		<option <?php if(isset($radio)&&$radio['est_adaptador']=='OPERATIVO CON DEFECTO'){echo 'selected';}elseif (isset($_POST['est_adaptador'])&&$_POST['est_adaptador']=='OPERATIVO CON DEFECTO') {echo 'selected';} ?> value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option <?php if(isset($radio)&&$radio['est_adaptador']=='DAÑADO'){echo 'selected';}elseif (isset($_POST['est_adaptador'])&&$_POST['est_adaptador']=='DAÑADO') {echo 'selected';} ?> value="DAÑADO">Dañado</option>
																	</select>
																</div>
																<div class="col-sm-6 mb-3 mb-sm-0">
																	<label for="est_bateria">Batería</label>
																	<select name="est_bateria" class="form-control p-1" id="est_bateria" required="required">
																		<option value="">Bateria ...</option>
																		<option <?php if(isset($radio)&&$radio['est_bateria']=='OPERATIVO'){echo 'selected';}elseif (isset($_POST['est_bateria'])&&$_POST['est_bateria']=='OPERATIVO') {echo 'selected';} ?> value="OPERATIVO">Operativo</option>
																		<option <?php if(isset($radio)&&$radio['est_bateria']=='OPERATIVO CON DEFECTO'){echo 'selected';}elseif (isset($_POST['est_bateria'])&&$_POST['est_bateria']=='OPERATIVO CON DEFECTO') {echo 'selected';} ?> value="OPERATIVO CON DEFECTO">Operativo con defecto</option>
																		<option <?php if(isset($radio)&&$radio['est_bateria']=='DAÑADO'){echo 'selected';}elseif (isset($_POST['est_bateria'])&&$_POST['est_bateria']=='DAÑADO') {echo 'selected';} ?> value="DAÑADO">Dañado</option>
																	</select>
																</div>
																
															</div>
															<div class="form-group">
																<label for="observacion">Observaciones</label>
																<textarea name="observacion" id="observacion" class="form-control" rows="3" placeholder="Informacion adicional" autocomplete="off" onKeyUp="mayusculas(this);"><?php echo isset($_POST['observacion']) ? $_POST['observacion']:$radio['observacion']; ?></textarea>

															</div>
															<input type="hidden" name="id_radio" value="<?php echo $id; ?>">
														</div><!-- End of p-5 class div -->
													</div><!-- End of  div class col-lg-6 -->
												</div><!-- End of div class row -->
												<hr>
												<div class="form-group" style="margin-left: 40%;">
													<div class="text-center">
														<div class="col-sm-5">
															<button type="submit" name="submit" value="editRadio" id="btnEditRadio" class="btn btn-primary btn-user btn-block">Actualizar Datos</button>
															<a class="btn btn-info btn-user btn-block" href="?do=radioList">Volver</a>
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