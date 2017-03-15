<?php

session_destroy();
unset($_SESSION["session_user"]);
$_SESSION["session_bandera"]=="False";
header("Location:../index.php");

?>