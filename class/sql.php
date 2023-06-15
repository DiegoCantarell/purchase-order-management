<?php
/*
ARCHIVO PARA SQL
SE INSTANCIA COMO CLASE
NO COMO ELEMENTO
ESTO CON EL OBJETIVO DE EVITAR 
COMPORTAMIENTOS NO DESEADOS
*/
//Se define que es lo queremos que haga
class sql{

    public $conn; //Relacionado con la conexión

    //Creación de constructor
    /*
    El constructor tiene que ver cuando se instancia
    la clase, se ejecuta ese contenido
    Normalmente en lenguajes de alto nivel es el mismo
    nombre de la clase, AQUÍ NO ES ASÍ
    TAMPOCO EXISTE EL POLIMORFISMO
    */
    //Lo definimos de manera pública para que se pueda instanciar
    public function __construct(){
        /*Una vez definido el constructor, debo definir los valores
        para que se pueda conectar*/
        //-----------------------------------------------------
        /*Normalmente como XAMPP contiene el sql y el php
        lo vamos a crear desde el mismo */
        $serverName = "localhost"; //Variable para nombre de servidor
        /*Normalmente el MYSQL usa el usuario llamado root
        */
        $userName = "root"; //Variable para el usuario
        /*Por defecto PHP my admin no tiene password, así que no es necesario
        ponerla*/
        $password= ""; //Variable para contrasena
        /*Por último se define la base a la que se va a conectar*/
        $dbName="semanas"; //Esta base de datos se va a llamar SEMANAS
    /*Una vez creados los elementos, se van a definir los eventos*/
    //Se crea la comunicación
        $this->conn=new mysqli($serverName, $userName,$password, $dbName ); //conn igual a una nueva instancia del mysquli
        //De acuerdo a lo anterior se tienen las partes de la instancia
        /*MENSAJE SOLO USADA PARA PRUEBAS
        SI SE HIZO LA INSTANCIA, SE VA A IMPRIMIR OK, DE LO CONTRARIO VA A MARCAR UN runException o simplemente no
        aparece */
        //echo "OK"."<br>";
    }
    //Se puede tomar el objeto completo y validarlo, por lo cual se crea un evento
    //Aquí se va a ejecutar una sentencia de SQL
    //Esta parte trabajara altas, bajas y modificaciones a la DB
    public function ejecutar($sql){
        //podemos retornar lo que tenga mi consulta
        $result=$this->conn->query($sql);
        //echo "OK"."<br>";
        return $result;
    }
    //parte que devuelve los parametros con respecto a una consulta
    public function select($sql){
        //podemos retornar lo que tenga mi consulta
        $result=$this->conn->query($sql);
        return $result;
    }
    

}
/* 
CÓDIGO PARA TABLA DE LA BD SEMANAS
create table programa
(
id int primary key not null AUTO_INCREMENT,
comprador varchar(50),
orden varchar(50),
fecha date,
proveedor varchar(50),
producto varchar(50),
cantidad decimal(16,4),
comentario text
);
*/
/* 
create table usuario
(
id int primary key not null,
usuario varchar(50),
nombre varchar(50),
pass varchar(50),
roll varchar(50),
foto varchar(50)
);
*/
?>