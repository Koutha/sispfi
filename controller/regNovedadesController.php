<?php
session_start();
date_default_timezone_set('America/caracas');
$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {//Validacion de session iniciada
	if ($now > $_SESSION['expire']) { //expiro el tiempo maximo de session
		session_destroy();
		require_once('view/loginView.php');   
	}elseif (isset($_POST['submit'])&&$_POST['submit']=='regNovedades'){//validacion de session correcta - entrada via post desde formulario de registro
			require_once('models/novedadesModel.php');
			$novObject = new novedadesClass();

			$_SESSION['regNovedades'] = 1 ;
			var_dump($_POST);
			require_once('view/regNovedadesView.php');
			// header('Location:?do=regNovedades');
		}else{//validacion de session correcta - via enlace GET o primera entrada
			require_once('view/regNovedadesView.php');
		}
}else {//no hay sesiones iniciadas
	require_once('view/loginView.php');
}
?>