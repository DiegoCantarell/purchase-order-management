<?php
#explicación de ¿QUÉ ES UNA CLASE?
/*
UNA CLASE, NOS VA A PERMITIR TRABAJAR LOS DATOS, PERO
VAMOS A TRABAJARLOS/TRAERLOS EN MODO DE OBJETO, DE
ESTA MANERA, SI SE SOLICITA ALGO, EL OBJETO REQUERIDO
NOS VA A DAR LA PROPIEDAD, ESA ES LA IDEA PRINCIPAL
*/
    class calendario
    {
        //Vamos a definir los objetos
        /*HAY QUE RECORDAR QUE SI HABLAMOS DE UN ELEMENTO QUE ESTA EN LA CLASE
        Y FUERA DEL MÉTODO LO TRATAMOS/LLAMAMOS CON THIS*/
        public $anyo, $semanas, $fecha_inicial, $fecha_final;


        public function __construct($anyo)
        {
            $this->anyo = $anyo;
            //Las semanas las puedo traer sobre un objeto o estructura
            //En este caso lo voy a definir como un arreglo
            $this->semanas = [];
            $this->fecha_inicial = $this->getFirstDay($anyo);
            //Variable para saber cual es la fecha del fin
            $this->fecha_final = $this->getLastDay($anyo);
        }

        //Ahora generamos el método para calcular
        //Como ya tenemos la clase en este apartado,
        //No se necesitan los argumentos    
        public function calcular()
        {
            
            $fecha = new DateTime($this->fecha_inicial->format("Y-m-d"));
             /*Esto es un extra, ya que los días vienen en ingles, y para tenerlos en espanol hacemos esto*/
            $dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");

            while (true)
            {
                if ($fecha->format("w") == "1")
                {
                    //DEFINIMOS EXACTAMENTE QUE ES LO QUE QUEREMOS USAR
                    //DEFINIMOS EL ARREGLO COMO ARREGLO DE OBJETOS
                    $this->semanas[intval($fecha->format("W"))] = new stdClass;
                    //DIA ES DE ARREGLOS Y PERTENECE A ESE OBJETO
                    $this->semanas[intval($fecha->format("W"))]->dia = [];
                }
                //En this semanas, vamos a hablar de las fechas
                //Con este objeto que estamos creando, va a llevar posisiones y muchos elementos, por lo que necesito incrementarlo
                #$this->semanas[$fecha->format("W")]->dia[$dias[$fecha->format("w")]] = $fecha->format("Y-m-d"); 
                $this->semanas[intval($fecha->format("W"))]->dia[$dias[$fecha->format("w")]] = $fecha->format("Y-m-d");
                //Para incrementar el objeto previo
                //Aquí es donde termina el anyo
                //se compara con lo obtenido en la funcion end()
                if ($fecha->format("Y-m-d") == $this->fecha_final->format("Y-m-d"))
                    break;
                else
                    $fecha->modify("+1 day");
            }
        }

        public function getFirstDay($anyo)
        {
            $fecha = new DateTime($anyo . "/01/01");

            if ($fecha->format("W") == "01")
                while ($fecha->format("w") != "1")
                    $fecha->modify("-1 day");
            else
                while ($fecha->format("W") != "01")
                    $fecha->modify("+1 day");

            return $fecha;
        }

        public function getLastDay($anyo)
        {
            /*
            Tengo la fecha y tengo el anyo, se que puedo terminar el 31 del 12
            Pero en ocasiones necesitamos que la fecha de fin sea 1, lo que quiere 
            decir que es domingo
            ¿Esta fecha es L,A,M,J,V,S?
            */
            return $this->getFirstDay($anyo + "1")->modify("-1 day");
        }
    }
?>