<?php
header("Content-type: text/html; charset=utf-8");
session_start();
error_reporting(0);
include('../base/base.php');
require('../modelo/modeloUsuario.php');
$objUsuario=new Usuarios;
$consulta=$objUsuario->mostrar_usuarios();
?>

<script type="text/javascript">
$(document).ready(function(){
    
    $('#tabla').dataTable({
	"bSort": false,        // Disable sorting
	"iDisplayLength": 5,   // records per page
	"sDom": "t<'row'<'col-md-6'i><'col-md-6'p>>",
	"sPaginationType": "bootstrap"
    });

});

</script>
<style>
    .pagination {
    margin:0 ! important;
	}
</style>

<div class="container" style="width:auto;">
    <span class="modi"><a href="../vista/usuario_enviar.php"><img src="../src/imagenes/png/24x24/accept.png" 
                            title="Agregar Usuarios" alt="Agregar Usuarios" /></a></span>
<table border="0" class="table table-hover table-striped" id="tabla">
    <thead>
   	<tr>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Nivel</th>
            <th>Estatus</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
<?php
if($consulta) {
	while($user = mysql_fetch_array($consulta)){
	?>
	
            <tr id="fila-<?php echo trim($user['usuario']) ?>">
			  <td><?php echo trim(strtoupper($user['usuario'])) ?></td>
			  <td><?php echo md5($user['pass']) ?></td>
			  <td><?php echo $user['nivel'] ?></td>
                          <td><?php if ($user['estatus']=='1') {
                              echo "Activo";
                                }else{
                                    echo "Inactivo";
                                }?></td>
                          <td></td>
                          <td><span class="modi"><a href="../controlador/usuario_actualizar.php?usuario=<?php echo $user['usuario'] ?>"><img src="../src/imagenes/png/16x16/database_process.png" 
                            title="Editar" alt="Editar" /></a></span></td>
            </tr>
	<?php
	}
}
?>
    </tbody>
</table>
</div>