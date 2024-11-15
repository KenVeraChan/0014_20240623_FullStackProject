<?php
//error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
session_start();
require "../../../005_Login/conexionPHP.php";
$conexionClientes=ConexionPHP::getConexionCLIENTES();
$BD_tabla=ConexionPHP::getBD_TablaClientes();

//CARGA NATURAL TRAS CARGAR LA MISMA PAGINA WEB
$usuario="Juan Perez"; //$_SESSION["usuario"];
$conectar=$conexionClientes->query("SELECT NOMBRE,NUMERO,TELEFONO,DIRECCION,CORREO FROM $BD_tabla WHERE NOMBRE='$usuario'");
$datosPersonales=$conectar->fetchAll(PDO::FETCH_OBJ);
    foreach($datosPersonales as $puntero)
    {
        $_SESSION["nombreCompra"]=$puntero->NOMBRE;
        $_SESSION["numeroCompra"]=$puntero->NUMERO;
        $_SESSION["telefonoCompra"]=$puntero->TELEFONO;
        $_SESSION["direccionCompra"]=$puntero->DIRECCION;
        $_SESSION["correoCompra"]=$puntero->CORREO;
    }
$conectar->closeCursor();   //Para habilitar las siguientes busquedas

if(isset($_POST["cargar"]))
{ 
    //Primero se hace un sondeo de la cantidad de referencias que se han detectado de compras

    $usuario="Juan Perez"; //$_SESSION["usuario"];
    $conectar=$conexionClientes->query("SELECT NOMBRE,NUMERO,TELEFONO,DIRECCION,CORREO FROM $BD_tabla WHERE NOMBRE='$usuario'");
    $datosPersonales=$conectar->fetchAll(PDO::FETCH_OBJ);

    
    $_SESSION["despliegue"]=1;   //Mostrar la cantidad de compras que se han realizado
    $_SESSION["activadorPersonal"]=1;  //Compras cargadas
    header("Location:../../../009_SectorPublico/0096_PaginaGestionCliente/0096_02_ComprasCliente/comprandoCliente.php");
}
if(isset($_POST["volver"]))
{
    //EN CASO DE TENER QUE VOLVER
    $_SESSION["letreroCompras"]=0; //NO SE ACTIVA NINGUNA INFORMACIÓN NI LETRERO
    header("location:../../../../007_Menus/0074_MenuOpCLIENTES/OpCLIENTES.php");
}
?>