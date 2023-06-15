<?php
session_start();

$nom = $_SESSION["nom"];
$foto = $_SESSION["foto"];
$usuario = $_SESSION["usuario"];

if (isset($_SESSION["misession"]))
{
    if ($_SESSION["misession"] != "")
    {
        //
    }
    else
    {
        header("Location: login.php");
    }
}
else
{
    header("Location: login.php");
}
?>