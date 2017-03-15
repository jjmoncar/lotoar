<?php
session_start();
error_reporting(0);

require('../modelo/modeloCliente.php');
	$objCliente=new Clientes();

	$cedula = trim($_POST['cedula']);
	$nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $direccion = trim($_POST['direccion']);
        $email = trim($_POST['email']);
        $telefono = trim($_POST['telefono']);
        $celular = trim($_POST['celular']);
	
	if( $objCliente->actualizar(array($nombre,$apellido,$direccion,$email,$telefono,$celular),$cedula) == true){
		echo "<script type='text/javascript'>
				alert('Datos Guardados');
				window.location='../vista/principal.php';
                              </script>";
	}else{
		echo "<script type='text/javascript'>
				alert('Se produjo un error. Intente de Nuevo');
				window.location='../vista/principal.php';
                              </script>";
	}

?>