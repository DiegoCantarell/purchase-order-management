<?php
class usuario 
{
    public $sql;
    public function __construct()
    {
        $this->sql = new sql();
    }

    public function validaUsuario($user , $pass)
    {
        $obj = new stdClass();
        $obj->auxpass = "";
        $obj->nom = "";
        $obj->uaxuser = "";
        $obj->roll = "";
        $obj->foto = "";
        $obj->usuario = "";

        $estado = "0";

        $sql1 = "SELECT id, usuario, nombre , pass, roll, foto  FROM usuario WHERE usuario = '" . $user. "'";

        $result = $this->sql->ejecutar($sql1);

        if ($result->num_rows >0 )
        {
            while ($row = $result->fetch_assoc())
            {
                $obj->auxpass = $row["pass"];
                $obj->uaxuser = $row["usuario"];
                $obj->nom = $row["nombre"];
                $obj->roll = $row["roll"];
                $obj->foto = $row["foto"];
                $obj->usuario = $row["id"];
            }
        }

        return $obj;
        /*
        if (($uaxuser == $user) && ($auxpass == $pass))
        {
            $estado = 1;

            echo "usuario: " . $user. "<br>";
            echo "password: " . $pass . "<br>";
        }
        else
        {
            echo "error no existe";
        }*/

    }
}

?>