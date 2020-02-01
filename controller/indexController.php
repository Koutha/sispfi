<?php
session_start();
date_default_timezone_set('America/caracas');
$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {//Validacion de session iniciada
    if ($now > $_SESSION['expire']) { //expiro el tiempo maximo de session
        session_destroy();
        require_once('view/loginView.php');   
    }else { //validacion correcta
    	require_once('core/header.php');
    	require_once('view/indexView.php');
        require_once('core/footer.php');
    	//header('Location:?action=sindex');
        //require('vistas/vista_sindex.php');
    }
} 
else{//no hay sesiones iniciadas
	require_once('core/header.php');
    require_once('view/loginView.php');
}
?>