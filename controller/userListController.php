<?php
session_start();
date_default_timezone_set('America/caracas');
$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //Validacion de session iniciada
    if ($now > $_SESSION['expire']) { //expiro el tiempo maximo de session
        session_destroy();
        require_once('view/loginView.php');   
    }else{//validacion correcta - via enlace GET o primera entrada
    		require_once('models/userModel.php');
            $userObject = new userClass();
            $allUsers = $userObject->getAll();
            require_once('view/userListView.php');
    }
}else {//no hay sesiones iniciadas
    require_once('view/loginView.php');
}
?>