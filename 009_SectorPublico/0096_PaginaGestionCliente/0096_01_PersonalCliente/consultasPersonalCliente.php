<?php
//error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
require "../../../005_Login/conexionPHP.php";
$conexionClientes=ConexionPHP::getConexionCLIENTES();
$BD_tabla=ConexionPHP::getBD_TablaIDClientes();

// ----- SECTOR DE CARGA DE DATOS DEL CLIENTE ------ //
$resulCliente=$conexionClientes->query("SELECT * FROM $BD_tabla")->fetchAll(PDO::FETCH_OBJ);



?>