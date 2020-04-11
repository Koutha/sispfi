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
						<h1 class="h3 mb-0 text-gray-800">Control de Robos - Reportes Consolidados </h1>
					</div>
					
					<!-- <div class="row"> -->
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
							<div class="card shadow mb-4">
								<!-- Card Header - Dropdown -->
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">Relacion de robos Anual en Kg</h6>
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
									<h6 class="m-0 font-weight-bold text-primary">Relacion de robos Anual por cantidad de Animales</h6>
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
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
							<div class="card shadow mb-4">
								<!-- Card Header - Dropdown -->
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">Relacion de robos Anual en Kg por granjas</h6>
									<div class="dropdown no-arrow">
										<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
											<div class="dropdown-header">Dropdown Header:</div>
											<!-- <a class="dropdown-item btn btn-primary" href="#" id="print-chart-btn">Imprimir en pdf </a> -->
											<button class="dropdown-item btn-primary" id="printBarChartG">Imprimir en pdf</button>
											<a class="dropdown-item" href="#">Another action</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#">Something else here</a>
										</div>
									</div>
								</div>
								<!-- Card Body -->
								<div class="card-body">
									<div class="chart-bar">
										<canvas id="barChartGranjas"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
							<div class="card shadow mb-4">
								<!-- Card Header - Dropdown -->
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">Relacion de robos Anual en Cantidad de animales por granjas</h6>
									<div class="dropdown no-arrow">
										<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
											<div class="dropdown-header">Dropdown Header:</div>
											<!-- <a class="dropdown-item btn btn-primary" href="#" id="print-chart-btn">Imprimir en pdf </a> -->
											<button class="dropdown-item btn-primary" id="printBarChartGA">Imprimir en pdf</button>
											<a class="dropdown-item" href="#">Another action</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#">Something else here</a>
										</div>
									</div>
								</div>
								<!-- Card Body -->
								<div class="card-body">
									<div class="chart-bar">
										<canvas id="barChartGranjasAnimales"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
							<div class="card shadow mb-4">
								<!-- Card Header - Dropdown -->
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">Relacion de robos Anual en Kg por seccion</h6>
									<div class="dropdown no-arrow">
										<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
											<div class="dropdown-header">Dropdown Header:</div>
											<!-- <a class="dropdown-item btn btn-primary" href="#" id="print-chart-btn">Imprimir en pdf </a> -->
											<button class="dropdown-item btn-primary" id="printBarChartSec">Imprimir en pdf</button>
											<a class="dropdown-item" href="#">Another action</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#">Something else here</a>
										</div>
									</div>
								</div>
								<!-- Card Body -->
								<div class="card-body">
									<div class="chart-bar">
										<canvas id="barChartSeccion"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
							<div class="card shadow mb-4">
								<!-- Card Header - Dropdown -->
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">Relacion de robos Anual en Cantidad de Animales por seccion</h6>
									<div class="dropdown no-arrow">
										<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
											<div class="dropdown-header">Dropdown Header:</div>
											<!-- <a class="dropdown-item btn btn-primary" href="#" id="print-chart-btn">Imprimir en pdf </a> -->
											<button class="dropdown-item btn-primary" id="printBarChartSecA">Imprimir en pdf</button>
											<a class="dropdown-item" href="#">Another action</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#">Something else here</a>
										</div>
									</div>
								</div>
								<!-- Card Body -->
								<div class="card-body">
									<div class="chart-bar">
										<canvas id="barChartSeccionAnimales"></canvas>
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
	labels: ["Total","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
	datasets: [{
		datalabels: {
			anchor: 'end',
			align: 'top'
		},
		label: "Año 2019",
		backgroundColor: "#4e73df",
		hoverBackgroundColor: "#2e59d9",
		borderColor: "#4e73df",
		data: [<?php echo $total1['total_kilos'].",";
			foreach ($totalYear1 as $key => $value) {
				if (!empty($value['total_kilos'])&&$key!=12) {
				  echo $value['total_kilos'].',';
				}elseif(!empty($value['total_kilos'])){
				  echo $value['total_kilos'];
				}elseif($key!=12){
				  echo '0,';
				}else{
				  echo '0';
				}
			  }?>],
	},{
	  label: "Año 2020",
	  backgroundColor: "#71140b",
	  hoverBackgroundColor: "#480b05",
	  borderColor: "#71140b",
	  data: [<?php echo $total2['total_kilos'].",";
			foreach ($totalYear2 as $key => $value) {
				if (!empty($value['total_kilos'])&&$key!=12) {
				  echo $value['total_kilos'].',';
				}elseif(!empty($value['total_kilos'])){
				  echo $value['total_kilos'];
				}elseif($key!=12){
				  echo '0,';
				}else{
				  echo '0';
				}
			  }?>],
	}],
  };

var datosAA = { //grafico para total en cantidad de animales por año
	labels: ["Total","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
	datasets: [{
		datalabels: {
			anchor: 'end',
			align: 'top'
		},
		label: "Año 2019",
		backgroundColor: "#4e73df",
		hoverBackgroundColor: "#2e59d9",
		borderColor: "#4e73df",
		data: [<?php echo $total1['total_cerdos'].",";
			foreach ($totalYear1 as $key => $value) {
				if (!empty($value['total_cerdos'])&&$key!=12) {
				  echo $value['total_cerdos'].',';
				}elseif(!empty($value['total_cerdos'])){
				  echo $value['total_cerdos'];
				}elseif($key!=12){
				  echo '0,';
				}else{
				  echo '0';
				}
			  }?>],
	},{
	  label: "Año 2020",
	  backgroundColor: "#71140b",
	  hoverBackgroundColor: "#480b05",
	  borderColor: "#71140b",
	  data: [<?php echo $total2['total_cerdos'].",";
			foreach ($totalYear2 as $key => $value) {
				if (!empty($value['total_cerdos'])&&$key!=12) {
				  echo $value['total_cerdos'].',';
				}elseif(!empty($value['total_cerdos'])){
				  echo $value['total_cerdos'];
				}elseif($key!=12){
				  echo '0,';
				}else{
				  echo '0';
				}
			  }?>],
	}],
  };

var datosGranjas = { //grafico para total de kg por granjas
	labels: ["Total","CE", "LP", "LC1", "LC2", "MC","ODA", "U1", "U2", "VDJ"],
	datasets: [{
		label: "Año 2019",
		backgroundColor: "#4e73df",
		hoverBackgroundColor: "#2e59d9",
		borderColor: "#4e73df",
		data: [<?php echo $total1['total_kilos'].',';foreach($valGranjas1 as $key => $value){echo $value;}?>],
	},
		{
		label: "Año 2020",
		backgroundColor: "#71140b",
	  	hoverBackgroundColor: "#480b05",
	  	borderColor: "#71140b",
		data: [<?php echo $total2['total_kilos'].',';foreach($valGranjas2 as $key => $value){echo $value;}?>],
		}],
  };

var datosGranjasAA = { //datos para el grafico anual en cantidad de animales por granjas
	labels: ["Total","CE", "LP", "LC1", "LC2", "MC","ODA", "U1", "U2", "VDJ"],
	datasets: [{
		label: "Año 2019",
		backgroundColor: "#4e73df",
		hoverBackgroundColor: "#2e59d9",
		borderColor: "#4e73df",
		data: [<?php echo $total1['total_cerdos'].',';foreach($valGranjasAnimales1 as $key => $value){echo $value;}?>],
	},
		{
		label: "Año 2020",
		backgroundColor: "#71140b",
	  	hoverBackgroundColor: "#480b05",
	  	borderColor: "#71140b",
		data: [<?php echo $total2['total_cerdos'].',';foreach($valGranjasAnimales2 as $key => $value){echo $value;}?>],
		}],
  };

 var datosSeccion = {
	labels: ["Total", "Batería", "Engorde", "Maternidad",  "Recría"],
	datasets: [{
		label: "Año 2019",
		backgroundColor: "#4e73df",
		hoverBackgroundColor: "#2e59d9",
		borderColor: "#4e73df",
		data: [<?php echo $total1['total_kilos'].',';foreach($valSeccion1 as $key => $value){echo $value;}?>],
	},
		{
		label: "Año 2020",
		backgroundColor: "#71140b",
	  	hoverBackgroundColor: "#480b05",
	  	borderColor: "#71140b",
		data: [<?php echo $total2['total_kilos'].',';foreach($valSeccion2 as $key => $value){echo $value;}?>],
		}],
  };

var datosSeccionAnimales = {
	labels: ["Total", "Batería", "Engorde", "Maternidad",  "Recría"],
	datasets: [{
		label: "Año 2019",
		backgroundColor: "#4e73df",
		hoverBackgroundColor: "#2e59d9",
		borderColor: "#4e73df",
		data: [<?php echo $total1['total_cerdos'].',';foreach($valSeccionAnimales1 as $key => $value){echo $value;}?>],
	},
		{
		label: "Año 2020",
		backgroundColor: "#71140b",
	  	hoverBackgroundColor: "#480b05",
	  	borderColor: "#71140b",
		data: [<?php echo $total2['total_cerdos'].',';foreach($valSeccionAnimales2 as $key => $value){echo $value;}?>],
		}],
  };
var totalesGranjas = <?php if ($total1>=$total2){echo $total1['total_kilos'];}else{echo $total2['total_kilos'];}?>;
var totalesGranjasAnimales = <?php if ($total1>=$total2){echo $total1['total_cerdos'];}else{echo $total2['total_cerdos'];}?>;
</script>			
<?php require_once('core/footer.php'); ?>
