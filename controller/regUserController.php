<?php
session_start();
date_default_timezone_set('America/caracas');
$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //Validacion de session iniciada
    if ($now > $_SESSION['expire']) { //expiro el tiempo maximo de session
        session_destroy();
        require_once('view/loginView.php');   
    }elseif (isset($_POST['submit'])&&$_POST['submit']=='regUser'){//validacion de session correcta - entrada via post desde formulario de registro
    	require_once('models/userModel.php');
    	$userObject = new userClass();
    	if (isset($_POST['password']) && $_POST['password']!=$_POST['rpass']) {//validar si contraseñas coinciden
    		//contraseñas no coinciden
    		$pass= 0;
    		require_once('view/regUserView.php');
    	}elseif ($userObject->getByUsername(htmlspecialchars($_POST['username'], ENT_QUOTES))){//contraseñas coinciden
    		//verificamos si el usuario existe
    		$userExists = 1;
    		require_once('view/regUserView.php');
    		}elseif(isset($_POST['cedula'])&& $userObject->getByCed(htmlspecialchars($_POST['cedula'],ENT_QUOTES))){//el usuario esta disponible para registrar
    			//verificamos si la cedula ya se encuentra registrada
    			$cedExists = 1;
    			require_once('view/regUserView.php');
    		}else{// la cedula esta disponible para registrar
    			#code...
    			//registrar usuario
    			$userObject->setUsername(htmlspecialchars($_POST['username'], ENT_QUOTES));
    			$userObject->setNombres(htmlspecialchars($_POST['nombres'], ENT_QUOTES));
    			$userObject->setApellidos(htmlspecialchars($_POST['apellidos'], ENT_QUOTES));
    			$userObject->setCedula(htmlspecialchars($_POST['cedula'], ENT_QUOTES));
    			$userObject->setEmail(htmlspecialchars($_POST['email'], ENT_QUOTES));
    			$userObject->setPassword(password_hash(htmlspecialchars($_POST['password'], ENT_QUOTES),PASSWORD_DEFAULT));
    			$userObject->regUser();
    			$_SESSION['regUser'] = 1 ;
    			header('Location:?do=regUser'); 
    		}
    }else{//validacion correcta - via enlace GET o primera entrada
    		require_once('view/regUserView.php');
    	}
}else {//no hay sesiones iniciadas
    require_once('view/loginView.php');
}
?>