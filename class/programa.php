<?php
class programa{
    public $sql;
    public function __construct(){
        $this->sql=new sql();
    }
    public function alta($comprador, $orden,$fecha,$proveedor, $producto,$cantidad,$comentario){
        $sql = "insert into programa (comprador, orden,fecha,proveedor, producto,cantidad,comentario) values ('".$comprador."','".$orden."',str_to_date('".$fecha."', '%d/%m/%Y'),'".$proveedor."','".$producto."','".$cantidad."','".$comentario."')";
        #$sql = "insert into programa (comprador, orden,fecha,proveedor, producto,cantidad,comentario) values ('".$comprador."','".$orden."','".$fecha."','".$proveedor."','".$producto."','".$cantidad."','".$comentario."')";
        #insert into programa (comprador, orden,fecha,proveedor, producto,cantidad,comentario) values ('juan','123',str_to_date('20/04/2022', '%d/%m/%Y'),'castores','polines','100','son de mandera')
        
        #echo $sql;
        $result=$this->sql->ejecutar($sql);
    }
    public function baja($id,$u){
        $sql="delete from programa where id = '".$id."'and comprador='".$u."'";
        echo $sql."<br>";
        $result=$this->sql->ejecutar($sql);
       

    }
    public function muestra($id, $inicio, $fin){
        echo $id;
        $sql = "select id,comprador, orden,fecha,proveedor, producto,cantidad,comentario from programa where fecha between '".$inicio."' and '".$fin."' order by fecha";
        $result=$this->sql->ejecutar($sql);
        #return $result;
        #TENGA O NO TENGA ELEMENTOS VA A CREAR LA TABLA
        #para consumirlo creamos un JSON
        echo ' 
        <table class="table table-striped">
            <tr>
                <th>COMPRADOR</th>
                <th>ORDEN DE COMPRA</th>
                <th>FECHA PROGRAMADA</th>
                <th>PROVEEDOR</th>
                <th>PRODUCTO</th>
                <th>CANTIDAD</th>
                <th>COMENTARIOS</th>
                <th></th>

            </tr>';
        
        if($result->num_rows>0){
            //Vamos a validar que tenga los elementos
            while($row = $result->fetch_assoc()){
                echo '
                <tr>
                    <td>'.$row["comprador"].'</td>
                    <td>'.$row["orden"].'</td>
                    <td>'.$row["fecha"].'</td>
                    <td>'.$row["proveedor"].'</td>
                    <td>'.$row["producto"].'</td>
                    <td>'.$row["cantidad"].'</td>
                    <td>'.$row["comentario"].'</td>';
                    //AQUÍ DISTINGUIMOS QUIENES PUEDEN TENER BÓTON
                if($id ==$row["comprador"]){
                    echo '<td><button type="button" class="btn btn-primary" onClick="eliminar('.$row["id"].')" id="del">Eliminar</button></td>
                   
                </tr>';
                }
                else{
                    #echo '  <td>'.$row["id"].'</td>
                    echo '  <td></td>
                   
                </tr>';
                }
            }
        }

        echo '</table>';
    }
}
?>