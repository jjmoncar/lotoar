<?php
header("Content-type: text/html; charset=utf-8");
include_once("../controlador/conexion.php");

class Numeros{
 //constructor
 	var $conex;
 	function numeros(){
 		$this->conex=new Conectar;
 	}
        
        function insertar($campos){
            if($this->conex->con()==true){
                //print_r($campos);
                return mysql_query("INSERT INTO numeros (num1,num2,num3,num4,loteria,fecha,hora)
		VALUES ('".$campos[0]."','".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."','".$campos[5]."',"
                        . "'".$campos[6]."')");
            }
	}

	function mostrar_loteria(){
		if($this->conex->con()==true){
			return mysql_query("SELECT * FROM numeros ORDER BY loteria ASC");
		}
	}
        
        function mostrar_consulta($campos){
            if($this->conex->con()==true){
                print_r($campos);
                return mysql_query("SELECT * FROM numeros WHERE num1='".$campos[0]."' and num2='".$campos[1]."' and num3='".$campos[2]."' and num4='".$campos[3]."' and loteria='".$campos[4]."' and fecha='".$campos[5]."' and hora='".$campos[6]."'");
            }
        }
        
        function contar_numeros($loto,$hora){
            if($this->conex->con()==true){
                return mysql_query("SELECT * FROM numeros WHERE loteria = '".$loto."' and hora='".$hora."'");
            }
        }
        
        function mostrar_por_fecha(){
            if($this->conex->con()==true){
                return mysql_query("SELECT * FROM numeros ORDER BY fecha ASC");
            }
        }
}
?>

