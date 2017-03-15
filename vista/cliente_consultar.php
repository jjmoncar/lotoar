<?php
header("Content-type: text/html; charset=utf-8");
session_start();
error_reporting(0);
include('../base/base.php');
require('../modelo/modeloCliente.php');
$objCliente=new Clientes();
$consulta=$objCliente->mostrar_clientes();
?>

<script type="text/javascript">
$(document).ready(function(){
    
    $('#tabla').dataTable({
	"bSort": false,        // Disable sorting
	"iDisplayLength": 10,   // records per page
	"sDom": "t<'row'<'col-md-6'i><'col-md-6'p>>",
	"sPaginationType": "bootstrap"
    });
	
	// mostrar formulario de actualizar datos

	$("table tr .modi a").click(function(){
		$('#tablas').hide();
		$("#formulario").show();
		$.ajax({
			url: this.href,
			type: "GET",
			success: function(datos){
				$("#formulario").html(datos);
			}
		});
		return false;
	});
});

</script>
<style>
    .pagination {
    margin:0 ! important;
	}
</style>

<div class="container" style="width:auto;">
<table border="0" class="table table-hover table-striped" id="tabla">
    <thead>
   	<tr>
            <th>Cedula</th>
            <th>Nombre y Apellido</th>
            <th>Dirección</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Celular</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
<?php
if($consulta) {
	while($user = mysql_fetch_array($consulta)){
	?>
	
            <tr id="fila-<?php echo trim($user['cedula']) ?>">
                          <td><?php echo $user['cedula'] ?></td>
			  <td><?php echo strtoupper($user['nombre'])." ".strtoupper($user['apellido']) ?></td>
			  <td><?php echo strtoupper($user['direccion']) ?></td>
			  <td><?php echo strtoupper($user['correo']) ?></td>
                          <td><?php echo $user['telefono'] ?></td>
                          <td><?php echo $user['celular'] ?></td>
                          <td><span class="modi"><a href="../controlador/cliente_actualizar.php?cedula=<?php echo $user['cedula'] ?>"><img src="../src/imagenes/png/16x16/database_process.png" 
                            title="Editar" alt="Editar" /></a></span></td>
            </tr>
	<?php
	}
}
?>
    </tbody>
</table>
</div>
