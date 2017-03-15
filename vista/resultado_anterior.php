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
                    <h2>Resultados Anteriores</h2>
                </div>

                <form id="resultado" method="post" class="form-horizontal" action="">
                    <div class="form-group">
                    		<label class="col-sm-3 control-label">Fecha del Sorteo:</label>
                        	<div class="col-sm-5">
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
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#resultado').formValidation({
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