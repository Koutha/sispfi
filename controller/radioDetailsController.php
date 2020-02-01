<?php
session_start();
date_default_timezone_set('America/caracas');
$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {//Validacion de session iniciada
    if ($now > $_SESSION['expire']) { //expiro el tiempo maximo de session
        session_destroy();
        require_once('view/loginView.php');
    } elseif (isset($_GET['id'])) { 
        $id = htmlspecialchars($_GET['id'],ENT_QUOTES);
        require_once('models/radioModel.php');
        $radioObject = new radioClass();
        $radio = $radioObject->getBy("id_radio",$id);
        require_once('view/radioDetailsView.php');
    }     
} 
else {//no hay sesiones iniciadas
    require_once('view/loginView.php');
}
?>
  