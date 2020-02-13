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
			
		}else{//validacion de session correcta - via enlace GET o primera entrada
			require_once('view/novedadesReportView.php');
		}
}else {//no hay sesiones iniciadas
	require_once('view/loginView.php');
}
?>