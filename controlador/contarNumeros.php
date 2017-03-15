<?php
error_reporting(0);
require('../modelo/modeloNumeros.php');
$objNumeros=new Numeros;
$consulta=$objNumeros->contar_numeros($loto, $hora);

if($consulta){
    while($cuenta = mysql_fetch_array($consulta)){
        
        switch ($cuenta['num1']){
         case 0:
             $num0++;
         case 1:
             $num1++;
         case 2:
             $num2++;
         case 3:
             $num3++;
         case 4:
             $num4++;
         case 5:
             $num5++;
         case 6:
             $num6++;
         case 7:
             $num7++;
         case 8:
             $num8++;
         case 9:
             $num9++;
        }
        switch ($cuenta['num2']){
         case 0:
             $num00++;
         case 1:
             $num11++;
         case 2:
             $num22++;
         case 3:
             $num33++;
         case 4:
             $num44++;
         case 5:
             $num55++;
         case 6:
             $num66++;
         case 7:
             $num77++;
         case 8:
             $num88++;
         case 9:
             $num99++;
        }
        switch ($cuenta['num3']){
         case 0:
             $num000++;
         case 1:
             $num111++;
         case 2:
             $num222++;
         case 3:
             $num333++;
         case 4:
             $num444++;
         case 5:
             $num555++;
         case 6:
             $num666++;
         case 7:
             $num777++;
         case 8:
             $num888++;
         case 9:
             $num999++;
        }
        switch ($cuenta['num4']){
         case 0:
             $num0000++;
         case 1:
             $num1111++;
         case 2:
             $num2222++;
         case 3:
             $num3333++;
         case 4:
             $num4444++;
         case 5:
             $num5555++;
         case 6:
             $num6666++;
         case 7:
             $num7777++;
         case 8:
             $num8888++;
         case 9:
             $num9999++;
        }
        //reunir todos los numeros y enviarlos para ordenar por burbuja de menor a mayor
        //aplicar metodo de la burbuja a todos los numeros capturados, luego concatenar y mostrar
    }
}
?>