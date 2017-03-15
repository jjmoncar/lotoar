<!DOCTYPE html>
<!--
    Document   : index
    Created on : 20/04/2014, 08:36 pm
    Author     : jjmoncar
-->
<html lang="es">
    <head>
        <title>.::LotoAr::.</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css"/>
        <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <link href="dist/css/inicio.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header id="banner" class="text-center"><img src="src/imagenes/loteria.png" alt="banner loterias"></header>
        <div class="container">
            <form class="form-signin" id="formulario" method="POST" action="vista/principal.php">
                <h2 class="form-signin-heading">Bienvenido!</h2>

                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    <span class="glyphicon glyphicon-log-in"></span> Ingresar</button>
            </form>
        </div>
        <footer id="pie" class="text-center text-info"><ul class="list-inline">
                <li>GNU/GPLv3 2017</li>
                <li> Sistema LotoAr <span class="glyphicon glyphicon-registration-mark"></span></li>
                </ul></footer>
    </body>
</html>
