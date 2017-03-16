<?php
$auth_realm = 'Area Restringida';

require_once ('../controlador/autenticacion.php');
include("../base/base.php");
?>
 <div align="right">
     
    Logueado como: <?php echo "<strong>".strtoupper($_SESSION["username"])."</strong><br>";
 	echo "Estatus: <strong>".strtoupper($_SESSION["estatus"])."</strong>";
    ?>&nbsp;&nbsp;
    <p><a href="?action=logOut">Cerrar Sesion</a></p><br>
 </div>