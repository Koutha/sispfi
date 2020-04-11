		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">
			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="?do=index">
				<div class="sidebar-brand-icon rotate-n-10">
					<i class="fas fa-chalkboard-teacher"></i>
				</div>
				<div class="sidebar-brand-text mx-3">SISPFI</div>
			</a>
			<!-- Divider -->
			<hr class="sidebar-divider my-0">
			<!-- Nav Item - Dashboard -->
			<li class="nav-item <?php if(isset($_GET['do'])&&$_GET['do']=="index"){echo "active";} ?>">
				<a class="nav-link" href="?do=index">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Cartelera Principal</span></a>
				</li>
				<!-- Divider -->
				<hr class="sidebar-divider">
				<!-- Heading -->
				<div class="sidebar-heading">
					Administrar
				</div>
				<!-- Nav Item - Usuarios Collapse Menu -->
				<li class="nav-item <?php if(isset($_GET['do'])&&$_GET['do']=="regUser"||$_GET['do']=="userList"){echo "active";} ?>">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
						<i class="fas fa-fw fa-cog"></i>
						<span>Usuarios</span>
					</a>
					<div id="collapseTwo" class="collapse <?php if(isset($_GET['do'])&&$_GET['do']=="regUser"||$_GET['do']=="userList"){echo "show";} ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Gestión de usuario</h6>
							<a class="collapse-item <?php if(isset($_GET['do'])&&$_GET['do']=='regUser'){echo "active";} ?>" href="?do=regUser">Registrar</a>
							<a class="collapse-item <?php if(isset($_GET['do'])&&$_GET['do']=='userList'){echo "active";} ?>" href="?do=userList">Consultas</a>
						</div>
					</div>
				</li>
				<!-- Nav Item - Bitacora Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
						<i class="fas fa-fw fa-wrench"></i>
						<span>Bitacoras</span>
					</a>
					<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Seguimientos</h6>
							<a class="collapse-item" href="#">Vehiculos</a>
							<a class="collapse-item" href="#">Escoltas</a>
							<a class="collapse-item" href="#">Novedades</a>
							<a class="collapse-item" href="#">Radios</a>
						</div>
					</div>
				</li>
				<!-- Divider -->
				<hr class="sidebar-divider">
				<!-- Heading -->
				<div class="sidebar-heading">
					Registros
				</div>
				<!-- Nav Item - Radios Collapse Menu -->
				<li class="nav-item <?php if(isset($_GET['do'])&&$_GET['do']=="regRadio"||$_GET['do']=="radioList"||$_GET['do']=="regRadioFE"){echo "active";} ?>">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRadios" aria-expanded="true" aria-controls="collapseRadios">
						<i class="fas fa-broadcast-tower"></i>
						<span>Banco de Radios</span>
					</a>
					<div id="collapseRadios" class="collapse <?php if(isset($_GET['do'])&&$_GET['do']=="regRadio"||$_GET['do']=="radioList"||$_GET['do']=="regRadioFE"){echo "show";} ?>" aria-labelledby="headingRadios" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Gestion de radios</h6>
							<!-- Nav Item - Registros Collapse Menu -->
							<ul class="navbar-nav accordion" id="accordionSidebarR">
								<li class="nav-item <?php if(isset($_GET['do'])&&$_GET['do']=="regRadio"||$_GET['do']=="regRadioFE"){echo "active";} ?>" style="margin-bottom: 0px;">
									<a class="nav-link <?php if(isset($_GET['do'])&&$_GET['do']=="regRadio"||$_GET['do']=="regRadioFE"){echo "";}else{echo "collapsed";} ?>" href="#" data-toggle="collapse" data-target="#collapseR" aria-expanded="true" aria-controls="collapse" style="padding-right: 17px;color: #1f1c1c;">
										<i class="fas fa-pen" style="color: rgba(0,0,0,.9);"></i>
										<span>Registrar</span>
									</a>
									<div id="collapseR" class="collapse <?php if(isset($_GET['do'])&&$_GET['do']=="regRadio"||$_GET['do']=="regRadioFE"){echo "show";} ?>" aria-labelledby="headingR" data-parent="#accordionSidebarR">
										<div class="bg-white py-2 collapse-inner rounded">
											<h6 class="collapse-header">Tipo de radio</h6>
											<a class="collapse-item <?php if(isset($_GET['do'])&&$_GET['do']=='regRadio'){echo "active";} ?>" href="?do=regRadio"><i class="fas fa-mobile"></i> Portatil</a>
											<a class="collapse-item <?php if(isset($_GET['do'])&&$_GET['do']=='regRadioFE'){echo "active";} ?>" href="?do=regRadioFE"><i class="fas fa-fax"></i> Estación Fija</a>
										</div>
									</div>
								</li>
							</ul>
							<a class="collapse-item <?php if(isset($_GET['do'])&&$_GET['do']=='radioList'){echo "active";} ?>" href="?do=radioList"><i class="fas fa-book"></i> Inventario</a>
							<a class="collapse-item" href="?do=revRadio"><i class="fas fa-file-invoice"></i> Inspecciones</a>
						</div>
					</div>
				</li>
				<!-- Nav Item - Novedades Collapse Menu -->
				<li class="nav-item <?php if(isset($_GET['do'])&&$_GET['do']=="regNovedades"||$_GET['do']=="novedadesReport"||$_GET['do']=="novedadesList"||$_GET['do']=="novedadesDetails"||$_GET['do']=="novedadesReportFilter"){echo "active";} ?>">
					<a class="nav-link <?php if(isset($_GET['do'])&&$_GET['do']=="regNovedades"||$_GET['do']=="novedadesReport"||$_GET['do']=="novedadesList"||$_GET['do']=="novedadesDetails"||$_GET['do']=="novedadesReportFilter"){echo "";}else{echo "collapsed";} ?>" href="#" data-toggle="collapse" data-target="#collapseNovedades" aria-expanded="true" aria-controls="collapseNovedades">
						<i class="fas fa-layer-group"></i>
						<span>Novedades</span>
					</a>
					<div id="collapseNovedades" class="collapse <?php if(isset($_GET['do'])&&$_GET['do']=="regNovedades"||$_GET['do']=="novedadesReport"||$_GET['do']=="novedadesList"||$_GET['do']=="novedadesDetails"||$_GET['do']=="novedadesReportFilter"){echo "show";} ?>" aria-labelledby="headingNovedades" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Gestion de Novedades</h6>
							<ul class="navbar-nav accordion" id="accordionSidebarNV">
								<li class="nav-item <?php if(isset($_GET['do'])&&$_GET['do']=="regNovedades"){echo "active";} ?>" style="margin-bottom: 0px;">
									<a class="nav-link <?php if(isset($_GET['do'])&&$_GET['do']=="regNovedades"||$_GET['do']=="regNovedadesRobos"){echo "";}else{echo "collapsed";} ?>" href="#" data-toggle="collapse" data-target="#collapseNV" aria-expanded="true" aria-controls="collapse" style="padding-right: 17px;color: #1f1c1c;">
										<i class="fas fa-edit" style="color: rgba(0,0,0,.9);"></i>
										<span>Registrar</span>
									</a>
									<div id="collapseNV" class="collapse <?php if(isset($_GET['do'])&&$_GET['do']=="regNovedades"||$_GET['do']=="regNovedadesRobos"){echo "show";} ?>" aria-labelledby="headingNV" data-parent="#accordionSidebarNV">
										<div class="bg-white py-2 collapse-inner rounded">
											<h6 class="collapse-header">Tipo de robo</h6>
											<a class="collapse-item <?php if(isset($_GET['do'])&&$_GET['do']=='regNovedades'){echo "active";} ?>" href="?do=regNovedades"><i class="fas fa-piggy-bank"></i> Robo de cerdos</a>
											<a class="collapse-item <?php if(isset($_GET['do'])&&$_GET['do']=='regNovedadesRobos'){echo "active";} ?>" href="?do=regNovedadesRobos"><i class="fas fa-business-time"></i> Materiales y otros</a>
										</div>
									</div>
								</li>
							</ul>
							<a class="collapse-item <?php if(isset($_GET['do'])&&$_GET['do']=='novedadesList'||$_GET['do']=="novedadesDetails"){echo "active";} ?>" href="?do=novedadesList"><i class="fas fa-book"></i> Consultas</a>
							<!-- <a class="collapse-item <?php if(isset($_GET['do'])&&$_GET['do']=='novedadesReport'){echo "active";} ?>" href="?do=novedadesReport"><i class="far fa-chart-bar"></i> Estadísticas</a> -->
							<ul class="navbar-nav accordion" id="accordionSidebarE">
								<li class="nav-item <?php if(isset($_GET['do'])&&$_GET['do']=="novedadesReport"||$_GET['do']=="novedadesReportFilter"){echo "active";} ?>" style="margin-bottom: 0px;">
									<a class="nav-link <?php if(isset($_GET['do'])&&$_GET['do']=="novedadesReport"||$_GET['do']=="novedadesReportFilter"){echo "";}else{echo "collapsed";} ?>" href="#" data-toggle="collapse" data-target="#collapseE" aria-expanded="true" aria-controls="collapse" style="padding-right: 17px;color: #1f1c1c;">
										<i class="far fa-chart-bar" style="color: rgba(0,0,0,.9);"></i>
										<span>Estadísticas</span>
									</a>
									<div id="collapseE" class="collapse <?php if(isset($_GET['do'])&&$_GET['do']=="novedadesReport"||$_GET['do']=="novedadesReportFilter"){echo "show";} ?>" aria-labelledby="headingE" data-parent="#accordionSidebarE">
										<div class="bg-white py-2 collapse-inner rounded">
											<h6 class="collapse-header">Gestion de Estadisticas</h6>
											<a class="collapse-item <?php if(isset($_GET['do'])&&$_GET['do']=='novedadesReport'){echo "active";} ?>" href="?do=novedadesReport"><i class="fas fa-chart-line"></i> Consolidadas</a>
											<a class="collapse-item <?php if(isset($_GET['do'])&&$_GET['do']=='novedadesReportFilter'){echo "active";} ?>" href="?do=novedadesReportFilter"><i class="fas fa-chart-pie"></i> Busquedas</a>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</li>
				<!-- Nav Item - Registros Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRegistros" aria-expanded="true" aria-controls="collapseRegistros">
						<i class="fas fa-fw fa-wrench"></i>
						<span>Reportes por Radio</span>
					</a>
					<div id="collapseRegistros" class="collapse" aria-labelledby="headingRegistros" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Gestion de reportes</h6>
							<a class="collapse-item" href="#">Guardia Diurna</a>
							<a class="collapse-item" href="#">Guardia nocturna</a>
						</div>
					</div>
				</li>
				<!-- Nav Item - Registros Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEscoltas" aria-expanded="true" aria-controls="collapseEscoltas">
						<i class="fas fa-fw fa-wrench"></i>
						<span>Escoltas</span>
					</a>
					<div id="collapseEscoltas" class="collapse" aria-labelledby="headingEscoltas" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Gestion de Escoltas</h6>
							<a class="collapse-item" href="#">Ruta del Semen</a>
							<a class="collapse-item" href="#">Alimentos</a>
							<a class="collapse-item" href="#">Animales</a>
						</div>
					</div>
				</li>
				<!-- Divider -->
				<hr class="sidebar-divider d-none d-md-block">
				<!-- Sidebar Toggler (Sidebar) -->
				<div class="text-center d-none d-md-inline">
					<button class="rounded-circle border-0" id="sidebarToggle"></button>
				</div>
			</ul> 
		<!-- End of Sidebar -->