<?php
include("../base/base.php");
?>

<head>
<meta charset="UTF-8" />
<style>
    #mensaje {
	margin: 15px auto;
        text-align: center;
        font-size: 24px;
    }
</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="page-header">
                    <h2>Agregar Resultado</h2>
                </div>
                <div id="mensaje"></div>
                <form id="frmResultadoAgregar" class="form-horizontal" method="POST" action="../controlador/resultado_guardar.php">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Numero 1:</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="numUno" id="numUno">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                        <label class="col-sm-2 control-label">Numero 2:</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="numDos" id="numDos">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Numero 3:</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="numTres" id="numTres">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                        <label class="col-sm-2 control-label">Numero 4:</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="numCuatro" id="numCuatro">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Loteria:</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="loteria" id="loteria">
                                <option value="loto1">Loteria 1</option>
                                <option value="loto2">Loteria 2</option>
                                <option value="loto3">Loteria 3</option>
                                <option value="loto4">Loteria 4</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                    	<label class="col-sm-3 control-label">Fecha:</label>
                        <div class="col-sm-4">
                            <div class="input-group date">
                           	<input type="text" class="form-control datepicker" id="datetimePicker" name="datetimePicker" />
                              	<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                    <script type="text/javascript">
                                        $('.datepicker').datepicker()
                                    </script>                              	
                              	</span>
                              </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Hora:</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="hora" id="hora">
                                <option value="hora1">Hora 1</option>
                                <option value="hora2">Hora 2</option>
                                <option value="hora3">Hora 3</option>
                                <option value="hora4">Hora 4</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="submit" id="enviar" name="enviar" class="btn btn-primary" value="Enviar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha
    $('#frmResultadoAgregar').formValidation({
        message: 'Este Valor no es Valido',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            datetimePicker: {
                validators: {
                    notEmpty: {
                        message: 'Fecha requerida y no puede ser vacio'
                    },
                    date: {
                        format: 'MM/DD/YYYY'
                    }
                }
            }
        }
    });
});
</script>
</body>