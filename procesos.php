<?php
include ("class/sql.php");
include ("class/programa.php");
include ("calendario.php");

$tipo = isset($_GET["tipo"])?$_GET["tipo"]:"0";

//Para gestionar el proceso de los elementos aplicamos:
if($tipo == "1"){
    $comprador = isset($_GET["comprador"])?$_GET["comprador"]:"0";
    $orden = isset($_GET["orden"])?$_GET["orden"]:"0";
    $fecha = isset($_GET["fecha"])?$_GET["fecha"]:"0";
    $proveedor = isset($_GET["proveedor"])?$_GET["proveedor"]:"0";
    $producto = isset($_GET["producto"])?$_GET["producto"]:"0";
    $cantidad = isset($_GET["cantidad"])?$_GET["cantidad"]:"0";
    $comentario = isset($_GET["comentario"])?$_GET["comentario"]:"0";


    $semana = isset($_GET["s"])?$_GET["s"]:"0";
    
    $p = new programa();
    $p->alta($comprador, $orden,$fecha,$proveedor, $producto,$cantidad,$comentario);

    //Para invocarlo
    //Usamos el constructor
    $c = new calendario("2022");
    //Ahora con $c voy a mandar a llamar al método
    $c->calcular();
    $i = $c->semanas[$semana]->dia["Lunes"];
    $f = $c->semanas[$semana]->dia["Domingo"];
    
    $p->muestra($comprador, $i, $f);
    #http://localhost/Task13Semanas/procesos.php?tipo=1&comprador=CHECOPEREZ&orden=123&fecha=20/04/2022&proveedor=castores&producto=polines&cantidad=7&comentario=son de mandera
    //echo "Se creó el elemento exitosamente";
}
else if($tipo == "2"){
    $id = isset($_GET["u"])?$_GET["u"]:"0"; 
    $semana = isset($_GET["s"])?$_GET["s"]:"0";

    //$p = new programa();
    //$p->muestra($id, $semana);

    $p = new programa();
    //$p->alta($comprador, $orden,$fecha,$proveedor, $producto,$cantidad,$comentario);
    $c = new calendario("2022");
    $c->calcular();
    $i = $c->semanas[$semana]->dia["Lunes"];
    $f = $c->semanas[$semana]->dia["Domingo"];
    $p->muestra($id, $i, $f);


    #http://localhost/Task13Semanas/procesos.php?tipo=2

}
else if($tipo == "3"){
    $id = isset($_GET["id"])?$_GET["id"]:"0";
    $u = isset($_GET["u"])?$_GET["u"]:"0";

    $semana = isset($_GET["s"])?$_GET["s"]:"0";

    $p = new programa();
    $p->baja($id,$u);
    //$p->muestra($u, $semana);

    $c = new calendario("2022");
    $c->calcular();
    $i = $c->semanas[$semana]->dia["Lunes"];
    $f = $c->semanas[$semana]->dia["Domingo"];
    $p->muestra($u, $i, $f);
}

#$p = new programa();
#$p->alta("JUAN LUNA", "2324","20/04/2022","CASTORES", "TARIMA","12","SON UNIDADES");
?>