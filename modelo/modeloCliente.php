<?php
header("Content-type: text/html; charset=utf-8");
include_once("../controlador/conexion.php");

class Clientes{
 //constructor
 	var $conex;
 	function Clientes(){
 		$this->conex=new Conectar;
 	}
        
        function insertar($campos){
            if($this->conex->con()==true){
                //print_r($campos);
                return mysql_query("INSERT INTO miembros (dni,nombre,apellido,direccion,correo,telefono,celular)
		VALUES ('".$campos[0]."','".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."','".$campos[5]."',"
                        . "'".$campos[6]."')");
            }
	}

	function actualizar($campos,$id){
		if($this->conex->con()==true){
                        //echo $id;
			//print_r($campos);
			return mysql_query("UPDATE miembros SET nombre = '".$campos[0]."',apellido = '".$campos[1]."',"
                                . "direccion = '".$campos[2]."',correo = '".$campos[3]."',telefono = '".$campos[4]."',"
                                . "celular = '".$campos[5]."' WHERE cedula = '".$id."'");
		}
	}

	function mostrar_clientes(){
		if($this->conex->con()==true){
                    if($_SESSION["nivel"]==1){
			return mysql_query("SELECT * FROM miembros ORDER BY dni ASC");
                    }else{
                        return mysql_query("SELECT * FROM miembros WHERE dni='".$_SESSION["session_cedula"]."' ORDER BY dni ASC");
                    }
		}
	}
}
?>

