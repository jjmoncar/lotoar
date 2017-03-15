<?php
session_start();
error_reporting(0);
header("Content-type: text/html; charset=utf-8");
//redifinir el formulario y dividirlo para que cargue en uno y edite en otro
include('../base/base.php');
require('../modelo/modeloCliente.php');


$objCliente=new Clientes();
$consulta = $objCliente->mostrar_clientes(trim($_GET['cedula']));
$usua = mysql_fetch_array($consulta);
?>

<div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="page-header">
                    <h2>Editar Cliente</h2>
                </div>

                <form class="form-horizontal" id="frmActualizarCliente" name="frmActualizarCliente" method="post" action="cliente_actualizar_data.php">
                    <input type="hidden" name="cedula" id="cedula" value="<?php echo $usua['cedula']?>">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nombre</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="nombre" value="<?php echo $usua['nombre']?>" />
                        </div>
                        <label class="col-sm-1 control-label">Apellido</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="apellido" value="<?php echo $usua['apellido'] ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Dirección:</label>
                        <div class="col-sm-5">
                            <textarea class="form-control" name="direccion" cols="5" rows="4"><?php echo $usua['direccion'] ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="email" value="<?php echo $usua['correo'] ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Telefono:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="telefono" value="<?php echo $usua['telefono'] ?>" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Celular:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="celular" value="<?php echo $usua['celular'] ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                             <button id="enviar" type="submit" class="btn btn-success">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha

    $('#frmActualizarCliente').formValidation({
        message: 'Este Valor no es Valido',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombre: {
                row: '.col-sm-4',
                validators: {
                    notEmpty: {
                        message: 'El Nombre es Requerido'
                    }
                }
            },
            apellido: {
                row: '.col-sm-4',
                validators: {
                    notEmpty: {
                        message: 'El Apellido es Requerido'
                    }
                }
            },
            direccion: {
                message: 'La Dirección no es Valido',
                validators: {
                    notEmpty: {
                        message: 'La Dirección es Requerida'
                    },
                    stringLength: {
                        min: 8,
                        max: 40,
                        message: 'La Dirección debe contener minimo 8 y maximo 40 caracteres'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'El Email es requerido'
                    },
                    emailAddress: {
                        message: 'Email no Valido'
                    }
                }
            },
            telefono: {
                row: '.col-sm-4',
                validators: {
                    notEmpty: {
                        message: 'El Telefono es Requerido'
                    },
                    stringLength: {
                        min: 7,
                        max: 11,
                        message: 'El Telefono debe contener minimo 7 y maximo 11 caracteres'
                    }
                }
            },
            celular: {
                row: '.col-sm-4',
                validators: {
                    notEmpty: {
                        message: 'El celular es Requerido'
                    },
                    stringLength: {
                        min: 11,
                        message: 'El Celular debe contener 11 caracteres'
                    }
                }
            }
        }
    });
});
</script>