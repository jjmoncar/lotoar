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
        $nivel = trim($_POST['nivel']);
        $estatus = trim($_POST['estatus']);
        $id_cedula = trim($_POST['id_cedula']);
	
	if( $objUsuario->actualizarTodo(array($pass,$nivel,$estatus,$id_cedula),$id) == true){
		echo "<script type='text/javascript'>
				alert('Datos Guardados');
				window.location='../vista/usuario.php';
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
    $("#frmActualizarUsuarioTodo").hide();
    $("#tablas").show();
    return false;
}
</script>
<form class="form-horizontal" id="frmActualizarUsuarioTodo" name="frmActualizarUsuarioTodo" method="post" 
      action="usuario_actualizarTodo.php">
    <input type="text" name="usuario" id="usuario" value="<?php echo $_GET['usuario']?>">
    <fieldset>
        <legend class="col-sm-8 col-sm-offset-2">Editar Datos del Usuario</legend>


<div class="form-group">
  <label class="col-sm-3 control-label" for="pass">Contraseña:</label>
  <div class="col-sm-4">
      <input id="pass" name="pass" type="text" maxlength="12" autocomplete="off" value="<?php echo $usua['pass']?>" 
             class="form-control input-large">    
  </div>
</div>
        
        <div class="form-group">
                        <label class="col-sm-3 control-label">Nivel</label>
                        <div class="col-sm-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="nivel" value="1" /> Administrador
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="nivel" value="2" /> Usuario
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Estatus</label>
                        <div class="col-sm-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="estatus" value="1" /> Activo
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="estatus" value="-1" /> Inactivo
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Cedula(DNI):</label>
                        <div class="col-sm-5">
                            <input list="id_cedu" id="id_cedula" name="id_cedula" class="form-control"/>
                                <datalist id="id_cedu">
                                    <?php require('../modelo/modeloCliente.php');
                                        $objCliente=new Clientes();
                                        $consul = $objCliente->mostrar_clientes();
                                            while ($gra = mysql_fetch_array($consul)){
                                                echo'<option value="'.$gra['dni'].'" label="'.strtoupper($gra['nombre'])." ".
                                                        strtoupper($gra['apellido']).'" />';
                                            }
                                    ?>
                                </datalist>
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