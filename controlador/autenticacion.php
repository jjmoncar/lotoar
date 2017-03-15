<?php
require_once("conexion.php");

session_start();

$url_action = (empty($_REQUEST['action'])) ? 'logIn' : $_REQUEST['action'];
$auth_realm = (isset($auth_realm)) ? $auth_realm : '';

if (isset($url_action)) {
    if (is_callable($url_action)) {
        call_user_func($url_action);
    } else {
        echo 'Function does not exist, request terminated';
    };
};

function logIn() {
    global $auth_realm;

    if (!isset($_SESSION['username'])) {
        if (!isset($_SESSION['login'])) {
            $_SESSION['login'] = TRUE;
            header('WWW-Authenticate: Basic realm="'.$auth_realm.'"');
            header('HTTP/1.0 401 Unauthorized');
            echo "<script type='text/javascript'>
				alert('Debe Ingresar un Usuario y Password Valido!');
				window.location='../index.php';
                              </script>";
            //echo 'Debe Ingresar un Usuario y Password Valido';
            //echo '<p><a href="?action=logOut">Intente de Nuevo</a></p>';
            exit;
        } else {
            //revisar estas dos lineas
            $user = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : '';
            $password = isset($_SERVER['PHP_AUTH_PW']);
            $result = authenticate($user, $password);
            if ($result == 0) {
                $_SESSION['username'] = $user;
            } else {
                session_unset($_SESSION['login']);
                errMes($result);
                echo '<p><a href="">Intente de Nuevo</a></p>';
                exit;
            };
        };
    };
}

function authenticate($user, $password) {
    global $_user_;
    global $_password_;
    global $_estatus_;
    
    		$sql="select * from usuarios where usuario ='".$_SERVER['PHP_AUTH_USER']."' and pass='".$_SERVER['PHP_AUTH_PW']."'";
			$res=mysql_query($sql,Conectar::con());	
			if (mysql_num_rows($res)>0)
			{
				$reg=mysql_fetch_array($res);
				$_user_=$reg["usuario"];
				$_password_=$reg["pass"];
				$_SESSION['estatus']=$reg["estatus"];
                                $_SESSION['session_cedula']=$reg["cedula"];
                                $_SESSION['nivel']=$reg["nivel"];
			}

    if (($user == $_user_)&&($password == $_password_)&&($_SESSION['estatus']=='Activo')) { return 0; }
    else { return 1; };
}

function errMes($errno) {
    switch ($errno) {
        case 0:
            break;
        case 1:
            echo "<script type='text/javascript'>
                        alert('Usurio o Contraseña Erroneos!');
                        window.location='../index.php';
                  </script>";
            break;
        default:
            echo 'Error Desconocido';
    };
}

function logOut() {

    session_destroy();
    if (isset($_SESSION['username'])) {
        session_unset($_SESSION['username']);
        echo "<script type='text/javascript'>
                    alert('Usted se ha deslogueado Exitosamente!');
                    window.location='../index.php';
              </script>";
        //echo '<p><a href="?action=logIn">LogIn</a></p>';
    } else {
        header("Location: ?action=logIn", TRUE, 301);
    };
    if (isset($_SESSION['login'])) { session_unset($_SESSION['login']); };
    exit;
}
?>