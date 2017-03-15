<?php

    require('../modelo/modeloNumeros.php');
	
    $numUno = trim($_POST['numUno']);
    $numDos = trim($_POST['numDos']);
    $numTres = trim($_POST['numTres']);
    $numCuatro = trim($_POST['numCuatro']);
    $loteria = trim($_POST['loteria']);
    $fecha = trim($_POST['datetimePicker']);
    $hora = trim($_POST['hora']);

	$objNumeros=new Numeros();
        
        //$verificacion=$objNumeros->mostrar_consulta(array($numUno,$numDos,$numTres,$numCuatro,$loteria,$fecha,$hora));
        
        //if($verificacion>0){
            
            if ( $objNumeros->insertar(array($numUno,$numDos,$numTres,$numCuatro,$loteria,$fecha,$hora)) == true){
		echo "<script type='text/javascript'>
				alert('Datos Registrados con Exito!');
				window.location='../vista/resultado_agregar.php';
                              </script>";
            }else{
		echo "<script type='text/javascript'>
				alert('Error en los Datos!');
				window.location='../vista/principal.php';
                              </script>";
            }
        //}else{
            
        //    echo "<script type='text/javascript'>
	//			alert('Estos Datos ya estan Registrados!');
	//			window.location='../vista/resultado_agregar.php';
        //                      </script>";
        //}
        
?>