<?php
//error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
require "../../../005_Login/conexionPHP.php";
$conexionClientes=ConexionPHP::getConexionCLIENTES();
$BD_tabla=ConexionPHP::getBD_TablaIDClientes();
function cambiaFranjaHoraria()
{
    if(date("G")>=7 && date("G")<13)  //Por la mañana
    {
        echo "Buenos Días, ".date("D d-M-Y H:i:s");
    }
    if(date("G")>=13 && date("G")<21)  //Por la tarde
    {
        echo "Buenas Tardes, ".date("D d-M-Y H:i:s");
    }
    if(date("G")>=21 || date("G")<7)  //Por la noche
    {
        echo "Buenas Noches, ".date("D d-M-Y H:i:s");
    }
}
if(!isset($_POST["actualizar"]) && !isset($_POST["eliminar"]) && !isset($_POST["volver"]))
{
    $usuarioOnline=$_SESSION["usuario"];
    // ----- SECTOR DE CARGA DE DATOS DEL CLIENTE de forma automática ------ //
    $resulCliente=$conexionClientes->query("SELECT * FROM $BD_tabla WHERE USUARIO='$usuarioOnline'")->fetchAll(PDO::FETCH_OBJ);
    foreach($resulCliente as $clienteFila)
    {
        $_SESSION["nombrePersonal"]=$clienteFila->USUARIO;
        $_SESSION["telefonoPersonal"]=$clienteFila->TELEFONO;
        $_SESSION["direccionPersonal"]=$clienteFila->DIRECCION;
        $_SESSION["entidadPersonal"]=$clienteFila->ENTIDAD;
        $_SESSION["tarjetaPersonal"]=$clienteFila->TARJETA_BANCARIA;
        $_SESSION["correoPersonal"]=$clienteFila->CORREO;
        $_SESSION["fotoPersonal"]=$clienteFila->FOTO;
        $_SESSION["numeroCompras"]=$clienteFila->NUMERO_COMPRAS;
    }
}
if(isset($_POST["actualizar"]))
{

}
if(isset($_POST["eliminar"]))
{
    //EN CASO DE HABER ELIMINADO AL USUARIO DE LA BBDD
    $usuarioOnline= $_GET["usuario"];
    $_SESSION["activadorPersonal"]=1; //SE ACTIVA LETRERO EN LA ZONA DE LA PAGINA PRINCIPAL COMO USUARIO ELIMINADO
    $resulCliente=$conexionClientes->query("DELETE FROM $BD_tabla WHERE USUARIO='$usuarioOnline'");
    header("Location:../../../005_Login/salidaPagina.php");
}
if(isset($_POST["volver"]))
{
    //EN CASO DE TENER QUE VOLVER
    $_SESSION["activadorPersonal"]=0; //NO SE ACTIVA NINGUNA INFORMACIÓN NI LETRERO
    header("location:../../../007_Menus/0074_MenuOpCLIENTES/OpCLIENTES.php");
}
?>