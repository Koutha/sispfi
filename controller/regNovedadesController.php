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
			$novObject->setId_usuario($_SESSION['id_usuario']);
			$novObject->setLugar(htmlspecialchars($_POST['lugar'], ENT_QUOTES));
			$novObject->setFecha_hecho(htmlspecialchars($_POST['fecha_hecho'], ENT_QUOTES));
			$novObject->setFecha_reporte(htmlspecialchars($_POST['fecha_reporte'], ENT_QUOTES));
			$novObject->setDescripcion(htmlspecialchars($_POST['descripcion'], ENT_QUOTES));
			$novObject->regNovedades();
			if(isset($_POST['bateria'])){
				$novObject->setSeccion(htmlspecialchars($_POST['bateria'], ENT_QUOTES));
				$novObject->setCantidad(htmlspecialchars($_POST['cantidad_B'], ENT_QUOTES));
				$novObject->setKilos(htmlspecialchars($_POST['kilos_B'], ENT_QUOTES));
				$novObject->setUbicacion(htmlspecialchars($_POST['ubicacion_B'], ENT_QUOTES));
				$novObject->regRoboCerdos();
			}
			if(isset($_POST['engorde'])){
				$novObject->setSeccion(htmlspecialchars($_POST['engorde'], ENT_QUOTES));
				$novObject->setCantidad(htmlspecialchars($_POST['cantidad_E'], ENT_QUOTES));
				$novObject->setKilos(htmlspecialchars($_POST['kilos_E'], ENT_QUOTES));
				$novObject->setUbicacion(htmlspecialchars($_POST['ubicacion_E'], ENT_QUOTES));
				$novObject->regRoboCerdos();
			}
			if(isset($_POST['maternidad'])){
				$novObject->setSeccion(htmlspecialchars($_POST['maternidad'], ENT_QUOTES));
				$novObject->setCantidad(htmlspecialchars($_POST['cantidad_M'], ENT_QUOTES));
				$novObject->setKilos(htmlspecialchars($_POST['kilos_M'], ENT_QUOTES));
				$novObject->setUbicacion(htmlspecialchars($_POST['ubicacion_M'], ENT_QUOTES));
				$novObject->regRoboCerdos();
			}
			if(isset($_POST['recria'])){
				$novObject->setSeccion(htmlspecialchars($_POST['recria'], ENT_QUOTES));
				$novObject->setCantidad(htmlspecialchars($_POST['cantidad_R'], ENT_QUOTES));
				$novObject->setKilos(htmlspecialchars($_POST['kilos_R'], ENT_QUOTES));
				$novObject->setUbicacion(htmlspecialchars($_POST['ubicacion_R'], ENT_QUOTES));
				$novObject->regRoboCerdos();
			}
			$_SESSION['regNovedades'] = 1 ;
			
			//var_dump($_POST);
			//require_once('view/regNovedadesView.php');
			header('Location:?do=regNovedades');
		}else{//validacion de session correcta - via enlace GET o primera entrada
			require_once('view/regNovedadesView.php');
		}
}else {//no hay sesiones iniciadas
	require_once('view/loginView.php');
}
?>