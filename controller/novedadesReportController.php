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
			require_once('view/novedadesReportView.php');
		}
	}else {//no hay sesiones iniciadas
	require_once('view/loginView.php');
}
?>