<?php
header("Content-type: text/html; charset=utf-8");
session_start();
error_reporting(0);
include('../base/base.php');
require('../modelo/modeloConsultaTriple.php');
$id=  date('m/d/Y');
$objTriple=new Consultas();
$consu=$objTriple->mostrar_triple($id);
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
    <legend>Pronosticos para Hoy</legend>
<table border="0" class="table table-hover table-striped" id="tabla">
    <thead>
   	<tr>
            <th>Loteria</th>
            <th>Hora</th>
            <th>Mas Probable</th>
            <th>Medio Probable</th>
            <th>Poco Probable</th>
        </tr>
    </thead>
    <tbody>
<?php
if($consu) {
	while($user = mysql_fetch_array($consu)){
	?>
	
            <tr id="fila-<?php echo trim($user['id']) ?>">
                          <td><?php echo strtoupper($user['loteria']). " - ".strtoupper($user['tipo']) ?></td>
			  <td><?php echo $user['hora'] ?></td>
                          <td><?php echo $user['triplemas'] ?></td>
                          <td><?php echo $user['tripleprob'] ?></td>
                          <td><?php echo $user['triplemenos'] ?></td>
            </tr>
	<?php
	}
}
?>
    </tbody>
</table>
</div>


