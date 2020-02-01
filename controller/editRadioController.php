<?php
session_start();
date_default_timezone_set('America/caracas');
$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //Validacion de session iniciada
    if ($now > $_SESSION['expire']) { //expiro el tiempo maximo de session
        session_destroy();
        require_once('view/loginView.php');   
    }elseif (isset($_POST['submit'])&&$_POST['submit']=='editRadio'){//validacion de session correcta - entrada via post desde formulario de registro
    	require_once('models/radioModel.php');
    	$radioObject = new radioClass();
        $id = $_POST['id_radio'];
        $radio = $radioObject->getBy('id_radio', $id); //radio a modificar
        var_dump($_POST['codigo_usuario']);
    	if ($radioObject->getBy("codigo_usuario", htmlspecialchars($_POST['codigo_usuario'], ENT_QUOTES))>0&&$_POST['codigo_usuario']!=$radio['codigo_usuario']){//validar si ya existe
    		//ya se encuentra registrado un radio con esa clave, Ademas no es su misma clave
    		$radioCodVal= 1;
    		require_once('view/editRadioView.php');
    	}elseif ($radioObject->getBy("serial", htmlspecialchars($_POST['serial'], ENT_QUOTES))>0&&$_POST['serial']!=$radio['serial']){//codigo_usuario disponible para registrar
    		//verificamos si el serial introducido existe y ademas no es el mismo del radio
    		$radioSerialVal = 1;
    		require_once('view/editRadioView.php');
    		}elseif($radioObject->getBy("codigo_ip", htmlspecialchars($_POST['codigo_ip'],ENT_QUOTES))>0&&$_POST['codigo_ip']!=$radio['codigo_ip']){//El serial esta disponible para registrar
    			//verificamos si el codigo ip introducido existe y ademas no es el mismo del radio
    			$radioCodIpVal = 1;
    			require_once('view/editRadioView.php');
    		}else{// codigo IP esta disponible para registrar
    			//Actualizar los datos del radio
    			$radioObject->setCodigo_usuario(htmlspecialchars($_POST['codigo_usuario'], ENT_QUOTES));
    			$radioObject->setStatus(htmlspecialchars($_POST['status'], ENT_QUOTES));
    			$radioObject->setCentro_trabajo(htmlspecialchars($_POST['centro_trabajo'], ENT_QUOTES));
    			$radioObject->setTipo_comunicacion(htmlspecialchars($_POST['tipo_comunicacion'], ENT_QUOTES));
    			$radioObject->setResponsable(htmlspecialchars($_POST['responsable'], ENT_QUOTES));
                $radioObject->setEmpresa(htmlspecialchars($_POST['empresa'], ENT_QUOTES));
                $radioObject->setCodigo_ip(htmlspecialchars($_POST['codigo_ip'], ENT_QUOTES));
                $radioObject->setSerial(htmlspecialchars($_POST['serial'], ENT_QUOTES));
                $radioObject->setMarca(htmlspecialchars($_POST['marca'], ENT_QUOTES));
                $radioObject->setModelo(htmlspecialchars($_POST['modelo'], ENT_QUOTES));
                $radioObject->setEstado(htmlspecialchars($_POST['estado'], ENT_QUOTES));
                $radioObject->setSerial_bateria(htmlspecialchars($_POST['serial_bateria'], ENT_QUOTES));
                $radioObject->setEst_bateria(htmlspecialchars($_POST['est_bateria'], ENT_QUOTES));
                $radioObject->setEst_antena(htmlspecialchars($_POST['est_antena'], ENT_QUOTES));
                $radioObject->setEst_perillavol(htmlspecialchars($_POST['est_perillavol'], ENT_QUOTES));
                $radioObject->setEst_perillacan(htmlspecialchars($_POST['est_perillacan'], ENT_QUOTES));
                $radioObject->setEst_dustcap(htmlspecialchars($_POST['est_dustcap'], ENT_QUOTES));
                $radioObject->setEst_beltclip(htmlspecialchars($_POST['est_beltclip'], ENT_QUOTES));
                $radioObject->setEst_teclaptt(htmlspecialchars($_POST['est_teclaptt'], ENT_QUOTES));
                $radioObject->setEst_cargador(htmlspecialchars($_POST['est_cargador'], ENT_QUOTES));
                $radioObject->setEst_adaptador(htmlspecialchars($_POST['est_adaptador'], ENT_QUOTES));
                $radioObject->setObservacion(htmlspecialchars($_POST['observacion'], ENT_QUOTES));
     			$radioObject->editRadio($id);
    			$_SESSION['editRadio'] = 1 ;
                // require_once('view/editRadioView.php');
    			header('Location:?do=radioDetails&id='.$id); 
    		}
    }else {//validacion de session correcta - via enlace GET o primera entrada
        if (isset($_GET['id'])){
            require_once('models/radioModel.php');
            $radioObject = new radioClass();
            $id = htmlspecialchars($_GET['id'], ENT_QUOTES);
            $radio = $radioObject->getBy('id_radio', $id); //radio a modificar
        }
        require_once('view/editRadioView.php');
    }
}else {//no hay sesiones iniciadas
    require_once('view/loginView.php');
}
?>