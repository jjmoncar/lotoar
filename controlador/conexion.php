<?php

session_start();
/*
Documento: conexion
Creado en: 20/06/2015
Author: julio montaño (jjmoncar@gmail.com)
Description:
    Modulo de conexion para los sistemas de gestión de base de datos mas comunes,
    tales como mysql, MariaDB y Postgresql. Por defecto se encuentra activado
    el modulo para Postgresql, pero si desea utilizar otro gestor de base de
    datos, simplemente comente el modulo que NO desea utilizar.
*/

class Conectar
{
	function con()
	{
		$con=mysql_connect("localhost","root","1234");
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("lotoar"); 
            
                //conexion remota
                //$con=mysql_connect("jjmoncar.com.ve","jjmoncar_root","Cesar2004$");
		//mysql_query("SET NAMES 'utf8'");
		//mysql_select_db("jjmoncar_loteria");
		return $con;
	}
}

?>
