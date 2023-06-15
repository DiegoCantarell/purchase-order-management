<?php
include "class/sql.php";
include "class/usuario.php";
session_start(); 
$id = isset($_POST["correo"])? $_POST["correo"]:"";
$pass = isset($_POST["Password"])? $_POST["Password"]:"";
$usuario = new usuario();

$obj = $usuario->validaUsuario($id , $pass);

if ($id == $obj->uaxuser  && $pass == $obj->auxpass)
{
    $_SESSION["misession"] = $id;
    $_SESSION["nom"] = $obj->nom;
    $_SESSION["foto"] = $obj->foto;
    $_SESSION["usuario"] = $obj->usuario;
    header("Location: main.php");
}
else
{
    header("Location: login.php");
}
?>