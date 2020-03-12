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
        require_once('models/novedadesModel.php');
        $novObject = new novedadesClass();
        $nov = $novObject->getBy($id);
        // var_dump($nov);
        require_once('view/novedadesDetailsView.php');
    }     
} 
else {//no hay sesiones iniciadas
    require_once('view/loginView.php');
}
?>
  