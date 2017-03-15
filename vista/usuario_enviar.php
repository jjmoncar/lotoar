<?php
include("../base/base.php");
?>

<head>
<meta charset="UTF-8" />

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="page-header">
                    <h2>Agregar Usuarios</h2>
                </div>

                <form id="defaultForm" method="post" class="form-horizontal" action="../controlador/usuario_guardar.php">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Usuario</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="usuarios" autocomplete="off" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contraseña</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="pass" />
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

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" id="enviar" class="btn btn-primary">Agregar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script type="text/javascript">
$(document).ready(function() {
    $('#defaultForm').formValidation({
        message: 'Este Valor no es Valido',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            usuarios: {
                message: 'El Usuario no es Valido',
                validators: {
                    notEmpty: {
                        message: 'El Usuario es Requerido'
                    },
                    stringLength: {
                        min: 6,
                        max: 12,
                        message: 'El Usuario debe contener minimo 6 y maximo 12 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'El Usuario solo puede tener letras y numeros, no guiones bajos'
                    }
                }
            },
            pass: {
                message: 'La Contraseña no es Valida',
                validators: {
                    notEmpty: {
                        message: 'Contraseña Requerida'
                    },
                    stringLength: {
                        min: 6,
                        max: 12,
                        message: 'El Usuario debe contener minimo 6 y maximo 12 caracteres'
                    },
                    different: {
                        field: 'usuarios',
                        message: 'La Contraseña no puede ser el mismo Usuario'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'El Usuario solo puede tener letras y numeros, no guiones bajos'
                    }
                }
            },
            
            nivel: {
                validators: {
                    notEmpty: {
                        message: 'El Nivel es Requerido'
                    }
                }
            },
            estatus: {
                validators: {
                    notEmpty: {
                        message: 'El Estatus es Requerido'
                    }
                }
            }
        }
    });
});
</script>

</body>