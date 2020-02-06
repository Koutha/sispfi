<?php
session_start();
date_default_timezone_set('America/caracas');
$now = time();
if (isset($_POST['submit']) && $_POST['submit'] == 'login'){
    require_once('models/userModel.php');
    $userObject = new userClass();
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES);
    $password = $_POST['password'];
    $query = $userObject->getByUsername($username);
    if ($query>0) { //usuario existe
        # code...
        if (password_verify($password, $query['password'])){//validar contraseña
            $_SESSION['loggedin']   = true;
            $_SESSION['username']   = $username;
            $_SESSION['id_usuario'] = $query['id_usuario'];
            $_SESSION['nombres']    = $query['nombres'];
            $_SESSION['apellidos']  = $query['apellidos'];
            $_SESSION['cedula']     = $query['cedula'];
            $_SESSION['start']      = time();
            $_SESSION['expire']     = $_SESSION['start'] + (60*720);
            header('Location:?do=index');
        }else{ // contraseña incorrecta
            $_SESSION['loginFailed']=1;
            require_once('view/loginView.php');
        }
    }else{ //usuario no registrado
        $_SESSION['loginFailed']=1;
        require_once('view/loginView.php');
    }
}
else{//no hay sesiones iniciadas
    require_once('view/loginView.php');
}
?>