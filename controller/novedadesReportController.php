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
				$totalYear1[$i] = $novObject->totalMesAño($year1, $i);
				$totalYear2[$i] = $novObject->totalMesAño($year2, $i);
			}
			$total1 = $novObject->totalAño($year1);
			$total2 = $novObject->totalAño($year2);
			$totalAñoGranjas1 = $novObject->totalAñoGranjas($year1);
			$totalAñoGranjas2 = $novObject->totalAñoGranjas($year2);
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
			//llenar el arreglo con los valores de base de datos
			for ($i=0; $i < 9 ; $i++) { 
				if (isset($totalAñoGranjas1[$i])) {
					switch ($totalAñoGranjas1[$i]['lugar']) {
						case 'CEAPOCA':
							$valGranjas1['CEAPOCA']=$totalAñoGranjas1[$i]['total_kilos'].','; 
							break;
						case 'LA PARREÑA':
							$valGranjas1['CEAPOCA']=$totalAñoGranjas1[$i]['total_kilos'].','; 
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
							$valGranjas2['CEAPOCA']=$totalAñoGranjas2[$i]['total_kilos'].','; 
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
			require_once('view/novedadesReportView.php');
		}
	}else {//no hay sesiones iniciadas
		require_once('view/loginView.php');
	}
	?>