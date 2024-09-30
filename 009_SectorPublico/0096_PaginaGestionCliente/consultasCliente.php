<?php
session_start();   //Uso de la variable GLOBAL
error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
$_SESSION["concesion"];  //Semaforo de concesion de activacion del catalogo


// ----- SECTOR DE BOTON DE COMPRAR ACTIVADO ------ //
if(isset($_GET["comprar"]))
{
    $idCarrito=$_GET["idPEDIDO"];
}
?>