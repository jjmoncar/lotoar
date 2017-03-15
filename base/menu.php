<!--
Documento: menu
Creado en: 20/06/2015
Author: julio montaño (jjmoncar@gmail.com)
Description:
    Modulo que contiene la estructura basica de un menu hecho para su visualizacion con bootstrap3.
    Puede modificar o sustituir este menu segun su conveniencia o de acuerdo a las exigencias
    del desarrollo que este realizando.
-->
<?php
header("Content-type: text/html; charset=utf-8");
?>
<meta charset="UTF-8">
<script>
function construccion(){
	alert("Modulo en Construcción!");
	}
</script>
<div class="opciones">
            <ul class="nav nav-pills">
                <li class="active"><a href="../vista/principal.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        <span class="glyphicon glyphicon-ok-circle"></span> Opiones <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="../vista/resultado_agregar.php">Agregar Resultado</a></li>
                        <li><a href="#" onclick="construccion();">Modulo Clientes</a></li>
                        <li><a href="../vista/usuario.php">Modulo Usuarios</a></li>
                        <li><a href="../vista/usuario_consultar.php">Editar Contraseña</a></li>
                        <li><a href="../controlador/logout.php">Salir</a></li>
                    </ul>
                </li>
                <li class=""><a href="../vista/pronostico.php"><span class="glyphicon glyphicon-bell"></span> Pronosticos</a></li>
                <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                    <span class="glyphicon glyphicon-edit"></span> Resultados <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="../controlador/repo_fecha.php">Por Fecha</a></li>
                        <li><a href="../controlador/repo_loteria.php">Por Loteria</a></li>
                        <li><a href="../vista/resultado_anterior.php">Resultados Anteriores</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                    <span class="glyphicon glyphicon-info-sign"></span> Ayuda <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" onclick="construccion();">Manual Oficial</a></li>
                        <li><a href="../vista/licencia.html" target="_blank">Licencia</a></li>
                        <li class="divider"></li>
                        <li><a href="../vista/acercade.html" target="__blank">Acerca de</a></li>
                    </ul>
                </li>
            </ul>
        </div>
