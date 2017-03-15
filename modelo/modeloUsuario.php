<?php
header("Content-type: text/html; charset=utf-8");
include_once("../controlador/conexion.php");

class Usuarios{
 //constructor

 	var $conex;
 	function Usuarios(){
 		$this->conex=new Conectar;
 	}
        
        function insertar($campos){
            if($this->conex->con()==true){
                //print_r($campos);
                return mysql_query("INSERT INTO usuarios (usuario,pass,nivel,estatus,cedula)
		VALUES ('".$campos[0]."','".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."')");
            }
	}

	function actualizar($campos,$id){
		if($this->conex->con()==true){
			//print_r($campos);
			return mysql_query("UPDATE usuarios SET pass = '".$campos[0]."' WHERE usuario = '".$id."'");
		}
	}
        
        function actualizarTodo($campos,$id){
		if($this->conex->con()==true){
			//print_r($campos);
			return mysql_query("UPDATE usuarios SET pass = '".$campos[0]."',nivel = '".$campos[1]."',"
                                . "estatus = '".$campos[2]."',cedula = '".$campos[3]."'  WHERE usuario = '".$id."'");
		}
	}

	function mostrar_usuarios(){
		if($this->conex->con()==true){
                    if($_SESSION["nivel"]=="1"){
			return mysql_query("SELECT * FROM usuarios ORDER BY usuario ASC");
                    }else{
                        return mysql_query("SELECT * FROM usuarios WHERE cedula='".$_SESSION["session_cedula"]."' ORDER BY cedula ASC");
                    }
		}
	}
}
?>
