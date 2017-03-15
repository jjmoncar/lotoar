<?php
header("Content-type: text/html; charset=utf-8");
session_start();
error_reporting(0);
include('../base/base.php');
require('../modelo/modeloNumeros.php');
$objRepoFecha=new Numeros();
$consulta=$objRepoFecha->mostrar_loteria();
?>

<style>
    #etiqueta{
        margin-left: 340px;
        font-size: 28px;
        margin-bottom: 20px;
    }
</style>

<div id="etiqueta">Reporte Por Loteria</div>

<div class="container" style="width:auto;">
<table border="0" class="table table-hover table-striped" id="tabla">
    <thead>
   	<tr>
            <th>Loteria</th>
            <th>Fecha</th>
            <th>Triple</th>
            <th>Hora</th>
            <th>Tipo</th>
        </tr>
    </thead>
    <tbody>
<?php
if($consulta) {
	while($user = mysql_fetch_array($consulta)){
	?>
	
            <tr id="fila-<?php echo trim($user['loteria']) ?>">
                          <td><?php echo $user['loteria'] ?></td>
                          <td><?php echo $user['fecha'] ?></td>
			  <td><?php echo $user['num1'].$user['num2'].$user['num3'] ?></td>
			  <td><?php echo $user['hora'] ?></td>
                          <td><?php echo strtoupper($user['tipo']) ?></td>
            </tr>
	<?php
	}
}
?>
    </tbody>
</table>
</div>
<footer id="pie" class="text-center text-info">
    <ul class="list-inline">
        <li>CopyLeft <?php echo date('Y') ?></li>
        <li> LotoWeb.</li><br>
        <li>Impreso por: <?php echo strtoupper($_SESSION["session_user"]).' El dia: '.date('d-m-Y \a \l\a\s h:i:s A') ?></li>
        
    </ul>
</footer>
