<?php
session_start();
error_reporting(0);
header("Content-type: text/html; charset=utf-8");
include('../base/base.php');
if(isset($_POST['submit'])){
	require('../modelo/modeloUsuario.php');
	$objUsuario=new Usuarios;

	$id = trim($_POST['usuario']);
	$pass = trim($_POST['pass']);
	
	if( $objUsuario->actualizarTodo(array($pass),$id) == true){
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
}else{
	if(isset($_GET['usuario'])){
		
		require('../modelo/modeloUsuario.php');
		$objUsuario=new Usuarios;
		$consulta = $objUsuario->mostrar_usuarios(trim($_GET['usuario']));
		$usua = mysql_fetch_array($consulta);
?>
<script>
function Cancelar(){
    $("#frmActualizarUsuario").hide();
    $("#tablas").show();
    return false;
}
</script>
<form class="form-horizontal" id="frmActualizarUsuario" name="frmActualizarUsuario" method="post" action="usuario_actualizar.php">
    <input type="hidden" name="usuario" id="usuario" value="<?php echo $usua['usuario']?>">
    <fieldset>
        <legend class="col-sm-8 col-sm-offset-2">Editar Usuario</legend>


<div class="control-group">
  <label class="col-sm-3 control-label" for="pass">Contraseña:</label>
  <div class="col-sm-4">
      <input id="pass" name="pass" type="text" maxlength="12" autocomplete="off" value="<?php echo $usua['pass']?>" 
             class="form-control input-large">    
  </div>
</div>
 
<div class="control-group">
    <div class="col-sm-9 col-sm-offset-3">
        <br>
        <label class="control-label" for="enviar"></label>
        <button id="enviar" type="submit" name="submit" class="btn btn-success">Enviar</button>
        <button id="cancelar" type="reset" name="cancelar" class="btn btn-danger" onclick="Cancelar();">Cancelar</button>
    </div>
</div>
</fieldset>
</form>
	<?php
	}
}
?>