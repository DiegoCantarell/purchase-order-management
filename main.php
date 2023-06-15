<?php
//ARCHIVO PARA CORRER EL OBJETO DE LA CLASE calendario
/*
PARA PODER LEER UN OBJETO LO HACEMOS CON LA PROPIEDAD INCLUDE
*/
include 'valida.php';
include 'calendario.php';

$anyo = isset($_GET["anyo"])?$_GET["anyo"]:"2022";
$semana = isset($_GET["semana"])?$_GET["semana"]:1;

//Para invocarlo
//Usamos el constructor
$c = new calendario($anyo);
//Ahora con $c voy a mandar a llamar al método
$c->calcular();

//Para imprimirlo en este caso para pruebas llamo a la etiqueta <pre>
/*
<pre> = Así como te lo doy, así lo tienes que validar
*/
//echo "<pre>";
//Podemos usar la opción print_r
//Con este proceso hablamos del objeto, en este caso, semanas
//Trabajando con string
#print_r($c->semanas["01"]->dia["Lunes"]);
//Ya convertido a entero
//print_r($c->semanas["1"]->dia["Lunes"]);
//print_r($c->semanas["1"]);

//Podemos usar la opción print_r
//Con este proceso hablamos del objeto, en este caso, semanas
#print_r($c);
#print_r($c->semanas);
#print_r($c->semanas["01"]);
#print_r($c->semanas["01"]->dia);
#print_r($c->semanas["01"]->dia["Domingo"]);
//echo "</pre>";
//De esta manera pintamos el calendario



#echo "<pre>";
$fechaInicio = new DateTime($c->semanas[$semana]->dia["Lunes"]);
$fechaFin = new DateTime($c->semanas[$semana]->dia["Sabado"]);
//echo $fechaInicio->format("d/m/Y")." - ".$fechaFin->format("d/m/Y");

#echo "</pre>";
//De esta manera pintamos el calendario
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min2.css">
    <style>
    .ui-autocomplete {
    position: absolute;
    z-index: 1055;
    cursor: default;
    padding: 0;
    margin-top: 2px;
    list-style: none;
    background-color: #ffffff;
    border: 1px solid #ccc
    -webkit-border-radius: 5px;
       -moz-border-radius: 5px;
            border-radius: 5px;
    -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
       -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }
    .ui-autocomplete > li {
    padding: 3px 20px;
    }
    .ui-autocomplete > li.ui-state-focus {
    background-color: #DDD;
    }
    .ui-helper-hidden-accessible {
    display: none;
    }
    </style>
</head>
<body>
    <div class="container">
        <br>
        <div class = "row">
            <p><strong>DIEGO  CANTARELL</strong>  </p>
            <p><strong>PROYECTO GESTIONAR ORDENES DE COMPRA</strong>  </p>
            <div class="col-4 text-center"><b>Semana <?php echo $semana?></b>
            <!--APLICAMOS UN SELECT
                EXISTE UN MÉTODO DE SELECT LLAMADO 'onchange', este elemento nos permite hacer una función
            -->
            <select class="form-select" id="semana" name="semana" aria-label="Default select" onchange="miSemana()">
                <?php
                $semana;
                //echo '<option value="'.$semana.'" selected >SEMANA'.$semana.'</option>';
                for($i=1;$i<53;$i++){
                    if($semana == $i){
                        echo '<option value="'.$semana.'" selected >SEMANA'.$semana.'</option>';
                    }
                    else{
                        echo '<option value="'.$i.'">SEMANA'.$i.'</option>';
                    }
                    
                }
                ?>
            </select>

            </div>
            <div class="col-8 text-center"><b>Programa de Recepcion de Materias Primas</b></div>
        </div>
        <div class="row">
            <div class="col-4">
                PROGRAMA: <?php
                $fechaInicio = new DateTime($c->semanas[$semana]->dia["Lunes"]);
                $fechaFin = new DateTime($c->semanas[$semana]->dia["Sabado"]);
                echo $fechaInicio->format("d/m/Y")." al ".$fechaFin->format("d/m/Y");
                //echo "14/03//2022 al 19/03/2022";

                ?>
                
            </div>
            <div class="col-8">CÓDIGO:</div>
        </div>
        <div class="row">
            <div class="col-4"><?php echo $anyo;?></div>
            <div class="col-8">VERSIÓN:</div>
        </div>
        <div class="row">
            <div class="col-12 text-end">
                <button type="button" class="btn btn-primary" onClick="addmodal()" id="add"> Añadir </button>
                <button type="button" class="btn btn-danger" onClick="salir()" id="salir"> Salir </button>
            </div>
        </div>
        
        <div class="row" id= "mitabla">
            <table class="table table-striped">
               
            </table>
        </div>
    </div>
    <!--MODAL-->
    <div class="modal" id="addModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <!--MODAL HEAD-->
                <div class="modal-header">
                    <h4 class="modal-title">
                        Agregar Fecha
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!--FIN MODAL HEAD-->
                <!--MODAL CUERPO-->
                <div class="modal-body">
                    <div class="row">
                        <!--Div mb-3 me da sangria-->
                        <div class="mb-1 mt-1">
                            <label for="COMPRADOR" class="form-label">COMPRADOR</label>
                            <!--<input type="text" class="form-control" id="COMPRADOR" name="COMPRADOR" value="<?php echo $nom; ?>" readonly>-->
                            <?php  

                                echo '<select class="form-select" id="COMPRADOR" name="COMPRADOR" aria-label="Default select">';
                                
                                echo '<option value="'.$nom.'">'.$nom.'</option>';
                                echo '</select>';

                            ?>
                        
                        </div>
                        <div class="mb-1 mt-1">
                            <label for="ORDEN" class="form-label">ORDEN DE COMPRA</label>
                            <input type="text" class="form-control" id="ORDEN" name="ORDEN">
                        </div>
                        <div class="mb-1 mt-1">
                            <label for="FECHA" class="form-label">FECHA PROGRAMADA</label>
                            <!--<input type="text" class="form-control" id="FECHA" name="FECHA">-->
                            <?php  
                                /*
                                ELEMENTO QUE OBTENEMOS DE WEB
                                LO UTILIZAMOS DESDE BOOTSTRAP
                                OCUPAMOS EL OBJETO SELECT, ESTE OBJETO NOS VA A DAR LOS ELEMENTOS PARA CARGAR LA FECHA
                                 */
                                echo '<select class="form-select" id="FECHA" name="FECHA" aria-label="Default select">';
                                
                                $Lunes = new DateTime($c->semanas[$semana]->dia["Lunes"]);
                                $Martes = new DateTime($c->semanas[$semana]->dia["Martes"]);
                                $Miercoles = new DateTime($c->semanas[$semana]->dia["Miercoles"]);
                                $Jueves = new DateTime($c->semanas[$semana]->dia["Jueves"]);
                                $Viernes = new DateTime($c->semanas[$semana]->dia["Viernes"]);
                                $Sabado = new DateTime($c->semanas[$semana]->dia["Sabado"]);
                                
                                echo '<option value="'.$Lunes->format("d/m/Y").'">'.$Lunes->format("d/m/Y").'</option>';
                                echo '<option value="'.$Martes->format("d/m/Y").'">'.$Martes->format("d/m/Y").'</option>';
                                echo '<option value="'.$Miercoles->format("d/m/Y").'">'.$Miercoles->format("d/m/Y").'</option>';
                                echo '<option value="'.$Jueves->format("d/m/Y").'">'.$Jueves->format("d/m/Y").'</option>';
                                echo '<option value="'.$Viernes->format("d/m/Y").'">'.$Viernes->format("d/m/Y").'</option>';
                                echo '<option value="'.$Sabado->format("d/m/Y").'">'.$Sabado->format("d/m/Y").'</option>';
                                //echo $Lunes->format("d/m/Y").' <br>';
                                //echo $Sabado->format("d/m/Y"). '<br>';
                                echo '</select>';

                            ?>
                        </div>
                        <div class="mb-1 mt-1">
                            <label for="PROVEEDOR" class="form-label">PROVEDOR</label>
                            <input type="text" class="form-control autocomplete2" id="PROVEEDOR" name="PROVEEDOR">
                        </div>
                        <div class="mb-1 mt-1">
                            <label for="PRODUCTO" class="form-label">PRODUCTO</label>
                            <input type="text" class="form-control autocomplete" id="PRODUCTO" name="PRODUCTO">
                        </div>
                        <div class="mb-1 mt-1">
                            <label for="CANTIDAD" class="form-label">CANTIDAD</label>
                            <input type="text" class="form-control" id="CANTIDAD" name="CANTIDAD">
                        </div>
                        <div class="mb-1 mt-1">
                            <label for="COMENTARIOS" class="form-label">COMENTARIOS</label>
                            <input type="text" class="form-control" id="COMENTARIOS" name="COMENTARIOS">
                        </div>
                    </div>
                    
                </div>
                <!--FIN MODAL CUERPO-->
                <!--MODAL FOOTER-->
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" onClick="add()">Agregar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>

    </div>
    <!--FIN MODAL-->

    <script src="js/jquery.js"></script>
    <!--<script src="js/jquery-3.6.0.min.js"></script>-->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    
    <script>
        function addmodal(){
             $("#addModal").modal("show");
        }

    </script>
    <script>
        $(function (){
            var line=["producto 1","producto 2", "producto 3"];
            $(".autocomplete").autocomplete({
                source: line
            });

            var line2=["proveedor 1", "proveedor 2","proveedor 3"];
            $(".autocomplete2").autocomplete({
                source: line2
            });

            //COLOCAMOS AQUÍ LA FUNCION LOAD YA QUE, ES EN TIEMPO DE CARGA
            miload();
        });

        function add(){
            var comprador=$("#COMPRADOR").val();
            var orden=$("#ORDEN").val();
            var fecha=$("#FECHA").val();
            var proveedor=$("#PROVEEDOR").val();
            var producto=$("#PRODUCTO").val();
            var cantidad=$("#CANTIDAD").val();
            var comentario=$("#COMENTARIOS").val();
            //Forma de validar, con fecha da más contratiempos
            var s = "<?php echo $semana; ?>";

            var error = "";
            
            if (comprador == ""){
                error += "Falta comprador \n";
            }
            if (orden == ""){
                error += "Falta orden \n";
            }
            if (fecha == ""){
                error += "Falta fecha\n";
            }
            if (proveedor == ""){
                error += "Falta proveedor\n";
            }
            if (producto == ""){
                error += "Falta producto\n";
            }
            if (cantidad == ""){
                error += "Falta cantidad\n";
            }
            if (comentario == ""){
                error += "Falta comentario\n";
            }

            if (error != ""){
                alert(error);
            }
            else{

                var dir = "procesos.php?tipo=1&comprador="+comprador+"&orden="+orden+"&fecha="+fecha+"&proveedor="+proveedor+"&producto="+producto+"&cantidad="+cantidad+"&comentario="+comentario+"&s="+s+"&ran="+Math.random();
                /*CUANDO SEA EXITOSO, VOY A CREAR UN CALL BACK
                CON EL CALLBACK VOY A LLAMAR A RESULT
                CUANDO TENEMOS UN CALLBACK NO SE PUEDEN PASAR PARAMETROS O RETORNAR
                PARAMETROS SI NO ES PARA ESA VARIABLE*/
                $.ajax({url:dir,success:function(result){
                    //alert(result);
                    /*
                    PARA RESETEAR LOS CAMPOS DE LOS ELEMENTOS USAMOS SUS IDS
                    */
                   alert("Se creó el elemento");
                    $("#COMPRADOR").val("");
                    $("#ORDEN").val("");
                    $("#FECHA").val("");
                    $("#PROVEEDOR").val("");
                    $("#PRODUCTO").val("");
                    $("#CANTIDAD").val("");
                    $("#COMENTARIOS").val("");
                    $("#addModal").modal("hide");
                    //EL RESULT SE VA A IR CON LO QUE TENGA RESPECTO A LA TABLA
                    $("#mitabla").html(result);
                    
                }});
            }
        }
        //Función para cargar la pagina 
        function miload(){
            //var id= "Max";
            
            var id= "<?php echo $nom; ?>";
            var s = "<?php echo $semana; ?>";
            var dir = "procesos.php?tipo=2&u="+id+"&s="+s+"&ran=" + Math.random();
            console.log(dir);
            $.ajax({url:dir,success:function(result){
                $("#mitabla").html(result);
                
            }});
            
        }

        function eliminar(id,comprador){
            var u=$("#COMPRADOR").val();
            //var u=comprador;
            var u= "<?php echo $nom; ?>";
            var id= id;
            var s = "<?php echo $semana; ?>";
            
            
            var dir = "procesos.php?tipo=3&id="+id+"&s="+s+"&u="+u+"&ran=" + Math.random();
            $.ajax({url:dir,success:function(result){
                $("#mitabla").html(result);
                
            }});
            
        }

        function miSemana(){
            var id= "<?php echo $nom; ?>";
            //s es igual a lo que tenga el conector de semanas y nos regresa el valor
            var s = $("#semana").val();
            //Sirve para actualizar la pag automaticamente
            //Hay que tener cuidado con la caché, por eso hay que validarla
            //rand nos ayuda a que la caché se quede colgada y de problemas
            location.href="main.php?semana="+s+"&id="+id+"&r="+Math.random();
           //alert(s);
        }

        function salir(){
            location.href="salir.php";
            
        }
    </script>

</body>
</html>