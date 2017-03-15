<?php
session_start();
header("Content-type: text/html; charset=utf-8");
require_once("conexion.php");

class Usua
{
	
	public function logueo()
	{
		if (empty($_POST["usuario"]) or empty($_POST["pass"]))
		{
			echo "<script type='text/javascript'>
				alert('Ud debe llenar los campos');
				window.location='../index.html';
			</script>";
		}else
		{
			$sql="select * from usuarios where usuario ='".$_POST["usuario"]."' and pass='".$_POST["pass"]."'";
			$res=mysql_query($sql,Conectar::con());	
			if (mysql_num_rows($res)==0)
			{
				echo "<script type='text/javascript'>
					alert('Usuario o Contraseña Invalida');
					window.location='../index.php';
				</script>";
			}else
			{
				if ($reg=mysql_fetch_array($res))
				{
					$_SESSION["session_user"]=$reg["usuario"];
					$_SESSION["session_nivel"]=$reg["nivel"];
                                        $_SESSION["session_estatus"]=$reg["estatus"];
                                        $_SESSION["session_cedula"]=$reg["cedula"];
                                        if($_SESSION["session_estatus"]=="Activo"){
                                            header("Location: ../vista/principal.php");
                                        }else{
                                            echo "<script type='text/javascript'>
                                                alert('Usuario Suspendido!');
                                                window.location='../index.php';
                                                </script>";
                                        }
				}
			}
		}
		
	} 

}

?>