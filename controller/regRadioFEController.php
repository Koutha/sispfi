<?php
session_start();
date_default_timezone_set('America/caracas');
$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //Validacion de session iniciada
    if ($now > $_SESSION['expire']) { //expiro el tiempo maximo de session
        session_destroy();
        require_once('view/loginView.php');   
    }elseif (isset($_POST['submit'])&&$_POST['submit']=='regRadioFE'){//validacion de session correcta - entrada via post desde formulario de registro
    	require_once('models/radioModel.php');
    	$radioObject = new radioClass();
    	if (isset($_POST['codigo_usuario'])&&$radioObject->getBy("codigo_usuario", htmlspecialchars($_POST['codigo_usuario'], ENT_QUOTES))){//validar si ya existe
    		//ya se encuentra registrado un radio con esa clave
    		$radioCodVal= 1;
    		require_once('view/regRadioFEView.php');
    	}elseif ($radioObject->getBy("serial", htmlspecialchars($_POST['serial'], ENT_QUOTES))){//codigo_usuario disponible para registrar
    		//verificamos si el serial introducido existe
    		$radioSerialVal = 1;
    		require_once('view/regRadioFEView.php');
    		}elseif(isset($_POST['codigo_ip'])&& $radioObject->getBy("codigo_ip", htmlspecialchars($_POST['codigo_ip'],ENT_QUOTES))){//El serial esta disponible para registrar
    			//verificamos si el codigo ip introducido existe
    			$radioCodIpVal = 1;
    			require_once('view/regRadioFEView.php');
    		}else{// codigo IP esta disponible para registrar
    			//registrar el radio
    			// $radioObject->setCodigo_usuario(htmlspecialchars($_POST['codigo_usuario'], ENT_QUOTES));
    			// $radioObject->setStatus(htmlspecialchars($_POST['status'], ENT_QUOTES));
    			// $radioObject->setCentro_trabajo(htmlspecialchars($_POST['centro_trabajo'], ENT_QUOTES));
    			// $radioObject->setTipo_comunicacion(htmlspecialchars($_POST['tipo_comunicacion'], ENT_QUOTES));
    			// $radioObject->setResponsable(htmlspecialchars($_POST['responsable'], ENT_QUOTES));
       //          $radioObject->setEmpresa(htmlspecialchars($_POST['empresa'], ENT_QUOTES));
       //          $radioObject->setCodigo_ip(htmlspecialchars($_POST['codigo_ip'], ENT_QUOTES));
       //          $radioObject->setSerial(htmlspecialchars($_POST['serial'], ENT_QUOTES));
       //          $radioObject->setMarca(htmlspecialchars($_POST['marca'], ENT_QUOTES));
       //          $radioObject->setModelo(htmlspecialchars($_POST['modelo'], ENT_QUOTES));
       //          $radioObject->setEstado(htmlspecialchars($_POST['estado'], ENT_QUOTES));
       //          $radioObject->setSerial_bateria(htmlspecialchars($_POST['serial_bateria'], ENT_QUOTES));
       //          $radioObject->setEst_bateria(htmlspecialchars($_POST['est_bateria'], ENT_QUOTES));
       //          $radioObject->setEst_antena(htmlspecialchars($_POST['est_antena'], ENT_QUOTES));
       //          $radioObject->setEst_perillavol(htmlspecialchars($_POST['est_perillavol'], ENT_QUOTES));
       //          $radioObject->setEst_perillacan(htmlspecialchars($_POST['est_perillacan'], ENT_QUOTES));
       //          $radioObject->setEst_dustcap(htmlspecialchars($_POST['est_dustcap'], ENT_QUOTES));
       //          $radioObject->setEst_beltclip(htmlspecialchars($_POST['est_beltclip'], ENT_QUOTES));
       //          $radioObject->setEst_teclaptt(htmlspecialchars($_POST['est_teclaptt'], ENT_QUOTES));
       //          $radioObject->setEst_cargador(htmlspecialchars($_POST['est_cargador'], ENT_QUOTES));
       //          $radioObject->setEst_adaptador(htmlspecialchars($_POST['est_adaptador'], ENT_QUOTES));
       //          $radioObject->setObservacion(htmlspecialchars($_POST['observacion'], ENT_QUOTES));
     		// 	$radioObject->regRadioFE();
    			$_SESSION['regRadioFE'] = 1 ;
                //require_once('view/regRadioFEView.php');
    			header('Location:?do=regRadioFE'); 
    		}
    }else{//validacion de session correcta - via enlace GET o primera entrada
    		require_once('view/regRadioFEView.php');
    	}
}else {//no hay sesiones iniciadas
    require_once('view/loginView.php');
}
?>