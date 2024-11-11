<?php
//error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
session_start();
require "../../../005_Login/conexionPHP.php";
$conexionClientes=ConexionPHP::getConexionCLIENTES();
$BD_tabla=ConexionPHP::getBD_TablaIDClientes();

if(isset($_POST["registrar"]))
{
    $registroNombre=$_POST["nombre"];
    $registroContrasenia=$_POST["contrasenia"];
    $registroContraseniaAgain=$_POST["contraseniaagain"];
    $registroTelefono=$_POST["telefono"];
    $registroDireccion=$_POST["direccion"];
    $registroEntidad=$_POST["entidad"];
    $registroCorreo=$_POST["correo"];
    $registroCompras=0;   //Al ser primer contacto con la corporación, se deja a 0 el número de compras

    if(empty($registroNombre) || empty($registroContrasenia) || empty($registroContraseniaAgain) || empty($registroTelefono) || empty($registroDireccion) || empty($registroEntidad) || empty($registroCorreo))
    {
        $_SESSION["activadorPersonal"]=3; //SE ACTIVA LETRERO DE DATOS CARGADOS CORRECTAMENTE
        header("Location:../../../009_SectorPublico/0096_PaginaGestionCliente/0096_03_RegistroCliente/registroCliente.php");
    }
    else
    {
        if(strcmp($registroContrasenia,$registroContraseniaAgain)==0)
        {
            // ----- SECTOR DE COMPROBACIÓN QUE AMBAS CONTRASENIAS SON LAS MISMAS//
            $resulCliente=$conexionClientes->query("INSERT INTO $BD_tabla(USUARIO,CONTRASENIA,TELEFONO,DIRECCION,ENTIDAD,CORREO,NUMERO_COMPRAS)VALUES('$registroNombre','$registroContrasenia','$registroTelefono','$registroDireccion','$registroEntidad',' $registroCorreo','$registroCompras')");
            $_SESSION["activadorPersonal"]=1; //SE ACTIVA LETRERO DE DATOS CARGADOS CORRECTAMENTE
            $resulCliente->closeCursor();
        }
        else
        {
            $_SESSION["activadorPersonal"]=2; //SE ACTIVA LETRERO DE CONTRASENIAS NO COINCIDEN
        }
        header("Location:../../../009_SectorPublico/0096_PaginaGestionCliente/0096_03_RegistroCliente/registroCliente.php");

    }
}
if(isset($_POST["volver"]))
{
    //EN CASO DE TENER QUE VOLVER
    $_SESSION["activadorPersonal"]=0; //NO SE ACTIVA NINGUNA INFORMACIÓN NI LETRERO
    header("location:../../../../007_Menus/0074_MenuOpCLIENTES/OpCLIENTES.php");
}
?>