<?php
session_start();
date_default_timezone_set('America/caracas');
$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {//Validacion de session iniciada
	if ($now > $_SESSION['expire']) { //expiro el tiempo maximo de session
		session_destroy();
		require_once('view/loginView.php');   
	}elseif (isset($_POST['submit'])&&$_POST['submit']=='novedadesReport'){//validacion de session correcta - entrada via post desde formulario de registro
		require_once('models/novedadesModel.php');
		$novObject = new novedadesClass();
		require_once('view/novedadesReportView.php');
		}else{//validacion de session correcta - via enlace GET o primera entrada
			require_once('models/novedadesModel.php');
			$novObject = new novedadesClass();
			$year1 = '2019-01-01';
			$year2 = '2020-01-01';
			for ($i=1; $i <= 12 ; $i++) { 
				$totalYear1[$i] = $novObject->totalMesAño($year1, $i); //total año por mes
				$totalYear2[$i] = $novObject->totalMesAño($year2, $i); //total año por mes
			}
			$total1 = $novObject->totalAño($year1); //total año 
			$total2 = $novObject->totalAño($year2); //total año
			$totalAñoGranjas1 = $novObject->totalAñoGranjas($year1);
			$totalAñoGranjas2 = $novObject->totalAñoGranjas($year2);
			$totalAñoSeccion1 = $novObject->totalAñoSeccion($year1);
			$totalAñoSeccion2 = $novObject->totalAñoSeccion($year2);
			//inicializar el arreglo de los valores ordenados segun el grafico en 0 
			$valGranjas1 = Array("CEAPOCA"=>"0,",
				"LA PARREÑA"=>"0,",
				"LOS CERRITOS 1"=>"0,",
				"LOS CERRITOS 2"=>"0,",
				"MATACARMELERA"=>"0,",
				"OJO DE AGUA"=>"0,",
				"URIMAN 1"=>"0,",
				"URIMAN 2"=>"0,",
				"VILLA DE JULIA"=>"0");
			$valGranjas2 = $valGranjas1;
			//inicializar el arreglo de los valores ordenados segun el grafico en 0 
			$valSeccion1 = Array("BATERIA"=>"0,",
				"ENGORDE"=>"0,",
				"MATERNIDAD"=>"0,",
				"RECRIA"=>"0");
			$valSeccion2 = $valSeccion1;
			//llenar el arreglo con los valores de base de datos
			for ($i=0; $i < 9 ; $i++) { 
				if (isset($totalAñoGranjas1[$i])) {
					switch ($totalAñoGranjas1[$i]['lugar']) {
						case 'CEAPOCA':
							$valGranjas1['CEAPOCA']=$totalAñoGranjas1[$i]['total_kilos'].','; 
							break;
						case 'LA PARREÑA':

							$valGranjas1['LA PARREÑA']=$totalAñoGranjas1[$i]['total_kilos'].','; 
							break;
						case 'LOS CERRITOS 1':
							$valGranjas1['LOS CERRITOS 1']=$totalAñoGranjas1[$i]['total_kilos'].','; 
							break;
						case 'LOS CERRITOS 2':
							$valGranjas1['LOS CERRITOS 2']=$totalAñoGranjas1[$i]['total_kilos'].','; 
							break;
						case 'MATACARMELERA':
							$valGranjas1['MATACARMELERA']=$totalAñoGranjas1[$i]['total_kilos'].','; 
							break;
						case 'OJO DE AGUA':
							$valGranjas1['OJO DE AGUA']=$totalAñoGranjas1[$i]['total_kilos'].','; 
							break;
						case 'URIMAN 1':
							$valGranjas1['URIMAN 1']=$totalAñoGranjas1[$i]['total_kilos'].','; 
							break;
						case 'URIMAN 2':
							$valGranjas1['URIMAN 2']=$totalAñoGranjas1[$i]['total_kilos'].','; 
							break;
						case 'VILLA DE JULIA':
							$valGranjas1['VILLA DE JULIA']=$totalAñoGranjas1[$i]['total_kilos']; 
							break;
						default:
							echo '0,';
						break;
					}
				}
				if (isset($totalAñoGranjas2[$i])) {
					switch ($totalAñoGranjas2[$i]['lugar']) {
						case 'CEAPOCA':
							$valGranjas2['CEAPOCA']=$totalAñoGranjas2[$i]['total_kilos'].','; 
							break;
						case 'LA PARREÑA':
							$valGranjas2['LA PARREÑA']=$totalAñoGranjas2[$i]['total_kilos'].','; 
							break;
						case 'LOS CERRITOS 1':
							$valGranjas2['LOS CERRITOS 1']=$totalAñoGranjas2[$i]['total_kilos'].','; 
							break;
						case 'LOS CERRITOS 2':
							$valGranjas2['LOS CERRITOS 2']=$totalAñoGranjas2[$i]['total_kilos'].','; 
							break;
						case 'MATACARMELERA':
							$valGranjas2['MATACARMELERA']=$totalAñoGranjas2[$i]['total_kilos'].','; 
							break;
						case 'OJO DE AGUA':
							$valGranjas2['OJO DE AGUA']=$totalAñoGranjas2[$i]['total_kilos'].','; 
							break;
						case 'URIMAN 1':
							$valGranjas2['URIMAN 1']=$totalAñoGranjas2[$i]['total_kilos'].','; 
							break;
						case 'URIMAN 2':
							$valGranjas2['URIMAN 2']=$totalAñoGranjas2[$i]['total_kilos'].','; 
							break;
						case 'VILLA DE JULIA':
							$valGranjas2['VILLA DE JULIA']=$totalAñoGranjas2[$i]['total_kilos']; 
							break;
						default:
							echo '0,';
						break;
					}
				}

			}
			//llenado de valores en el arreglo
			for ($i=0; $i < 4 ; $i++) { 
				if (isset($totalAñoSeccion1[$i])) {
					switch ($totalAñoSeccion1[$i]['seccion']) {
						case 'Batería':
							$valSeccion1['BATERIA']=$totalAñoSeccion1[$i]['total_kilos'].','; 
							break;
						case 'Engorde':
							$valSeccion1['ENGORDE']=$totalAñoSeccion1[$i]['total_kilos'].','; 
							break;
						case 'Maternidad':
							$valSeccion1['MATERNIDAD']=$totalAñoSeccion1[$i]['total_kilos'].','; 
							break;
						case 'Recría':
							$valSeccion1['RECRIA']=$totalAñoSeccion1[$i]['total_kilos']; 
							break;
						default:
							echo '0,';
						break;
					}
				}
				if (isset($totalAñoSeccion2[$i])) {
					switch ($totalAñoSeccion2[$i]['seccion']) {
						case 'Batería':
							$valSeccion2['BATERIA']=$totalAñoSeccion2[$i]['total_kilos'].','; 
							break;
						case 'Engorde':
							$valSeccion2['ENGORDE']=$totalAñoSeccion2[$i]['total_kilos'].','; 
							break;
						case 'Maternidad':
							$valSeccion2['MATERNIDAD']=$totalAñoSeccion2[$i]['total_kilos'].','; 
							break;
						case 'Recría':
							$valSeccion2['RECRIA']=$totalAñoSeccion2[$i]['total_kilos']; 
							break;
						default:
							echo '0,';
						break;
					}
				}
			}
			require_once('view/novedadesReportView.php');
		}
	}else {//no hay sesiones iniciadas
		require_once('view/loginView.php');
	}
	?>