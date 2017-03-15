<?php

    require('../modelo/modeloUsuario.php');
	
    $usuario = trim($_POST['usuarios']);
    $pass = trim($_POST['pass']);
    $nivel = trim($_POST['nivel']);
    $estatus = trim($_POST['estatus']);
    $cedula = trim($_POST['id_cedula']);

	$objUsuarios=new Usuarios();
        
            if ( $objUsuarios->insertar(array($usuario,$pass,$nivel,$estatus,$cedula)) == true){
		echo "<script type='text/javascript'>
				alert('Datos Registrados con Exito!');
				window.location='../vista/usuario_enviar.php';
                              </script>";
            }else{
		echo "<script type='text/javascript'>
				alert('Error en los Datos!');
				window.location='../vista/principal.php';
                              </script>";
            }
        
?>