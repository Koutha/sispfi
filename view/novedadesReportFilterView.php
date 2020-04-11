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
						<h1 class="h3 mb-0 text-gray-800">Control de Robos - Busqueda de reportes</h1>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-5">
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
														<label for="fecha_inicio">Desde</label>
														<div class="input-group date" id="fecha_inicio" data-target-input="nearest">
															<input type="text" name="fecha_inicio" id="fecha_inicio" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#fecha_inicio" autocomplete="off" value="<?php echo isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio']:""; ?>" required>
															<div class="input-group-append" >
																<div class="input-group-text">
																	<i class="fa fa-calendar"></i>
																</div>
															</div>
														</div>
													</div>
													<div class="col-sm-6">
														<label for="fecha_fin">Hasta</label>
														<div class="input-group date" id="fecha_fin" data-target-input="nearest">
															<input type="text" name="fecha_fin" id="fecha_fin" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#fecha_fin" autocomplete="off" value="<?php echo isset($_POST['fecha_fin']) ? $_POST['fecha_fin']:""; ?>" required>
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
												<button type="submit" name="submit" value="novedadesReportFilter" id="btnNovedadesReport" class="btn btn-primary btn-user">Buscar</button>
											</div>
										</div>
									</div>
									<hr>
								</form>
							</div><!-- End of div class card-body p-0 -->
						</div><!-- End of div class card o-hidden border-0 shadow-lg my-5 -->
					</div><!-- End of div class container -->
					<!-- <div class="row"> -->
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
							<div class="card shadow mb-4">
								<!-- Card Header - Dropdown -->
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">Relacion de robos en Kg</h6>
									<div class="dropdown no-arrow">
										<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
											<div class="dropdown-header">Dropdown Header:</div>
											<!-- <a class="dropdown-item btn btn-primary" href="#" id="print-chart-btn">Imprimir en pdf </a> -->
											<button class="dropdown-item btn-primary" id="printBarChart">Imprimir en pdf</button>
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
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
							<div class="card shadow mb-4">
								<!-- Card Header - Dropdown -->
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">Relacion de robos por cantidad de Animales</h6>
									<div class="dropdown no-arrow">
										<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
											<div class="dropdown-header">Dropdown Header:</div>
											<!-- <a class="dropdown-item btn btn-primary" href="#" id="print-chart-btn">Imprimir en pdf </a> -->
											<button class="dropdown-item btn-primary" id="printBarChartAnimales">Imprimir en pdf</button>
											<a class="dropdown-item" href="#">Another action</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#">Something else here</a>
										</div>
									</div>
								</div>
								<!-- Card Body -->
								<div class="card-body">
									<div class="chart-bar">
										<canvas id="BarChartAnimales"></canvas>
									</div>
								</div>
							</div>
						</div>
						
						
					<!-- </div> -->
				</div><!-- Begin Page Content /.container-fluid -->
			</div><!-- End of Main Content -->
<script type="text/javascript">
//variables con datos para los graficos
var datos = { //datos para total en kg
	labels: ["Total",<?php  foreach ($ejeX as $key => $value) {echo '"'.$value.'"'.",";}?>],
	datasets: [{
		datalabels: {
			anchor: 'end',
			align: 'top'
		},
		label: "<?php echo 'Desde '.$inicio.' hasta '.$fechaFin; ?>",
		backgroundColor: "#4e73df",
		hoverBackgroundColor: "#2e59d9",
		borderColor: "#4e73df",
		data: [<?php echo $total1['total_kilos'].",";
			foreach ($totalYear1 as $key => $value) {
				if (!empty($value['total_kilos'])&&$key!=sizeof($totalYear1)-1) {
				  echo $value['total_kilos'].',';
				}elseif(!empty($value['total_kilos'])){
				  echo $value['total_kilos'];
				}elseif($key!=sizeof($totalYear1)-1){
				  echo '0,';
				}else{
				  echo '0';
				}
			  }?>],
	}],
  };

var totalesGranjas = <?php echo $total1['total_kilos'];?>;
var totalesGranjasAnimales = <?php echo $total1['total_cerdos'];?>;
</script>			
<?php require_once('core/footer.php'); ?>
