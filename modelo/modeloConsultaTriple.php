<?php
header("Content-type: text/html; charset=utf-8");
include_once("../controlador/conexion.php");

class Consultas{
 //constructor

 	var $conex;
 	function Consultas(){
 		$this->conex=new Conectar;
 	}

	function mostrar_triple($id){
		if($this->conex->con()==true){
			return mysql_query("SELECT * FROM consultaTriple WHERE fecha='".$id."' ORDER BY loteria DESC");
		}
	}
}
?>

