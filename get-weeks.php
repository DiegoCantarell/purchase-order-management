<?php
//Método para obtener semanas de un añó
//$week = date("W","2017/05/02");
$fechaIngresada = ("2022/04/03");
$fecha = new DateTime("2022/04/03");
$semana = $fecha->format('W');
//Con esto vemos la semana del año indicado que contiene el día que ingresamos
echo("La fecha ingresada es:  ");
echo $fechaIngresada;
echo("<br>");
echo("La semana resultado es : ");
echo $semana;
echo("<br>");
//EJERCICIO
/*
CREAR UN MÉTODO
AL ELEGIR UNA SEMANA DEBEMOS REGRESAR EL NÚMERO DE DÍAS QUE ESTAN EN ELLA
EJEMPLO
INGRESAMOS LA SEMANA #13 DEL ANYO 2022
DICHA SEMANA INCLUYE LAS FECHAS DEL 28 AL 2 - 3 DE ABRIL
DE LUNES A SÁBADO - DOMINGO 
PODEMOS TENER EN CUENTA QUE UN ANYO TIENE 52 SEMANAS
POR LO CUAL PODEMOS GENERAR UN ARREGLO QUE LAS CONTENGA
DEBEMOS USAR 2 PARAMETROS
NUMERO DE SEMANA
ANYO*/
$fecha->modify('+1 day');
#echo $semana."<br>";
echo("La siguiente fecha a la ingresada es: ". $fecha->format("Y-m-d"));


?>