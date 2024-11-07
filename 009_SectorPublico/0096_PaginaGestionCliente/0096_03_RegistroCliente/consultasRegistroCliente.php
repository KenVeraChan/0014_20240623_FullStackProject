<?php
//error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
session_start();
require "../../../005_Login/conexionPHP.php";
$conexionClientes=ConexionPHP::getConexionCLIENTES();
$BD_tabla=ConexionPHP::getBD_TablaIDClientes();
$tablaDatosBancarios=ConexionPHP::getBD_DatosBancarios();
$carpeta_destino=$_SERVER["DOCUMENT_ROOT"]."/009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/images/imagenesCliente/";

if(isset($_POST["cargar"]))
{
    $usuarioOnline=$_SESSION["usuario"];
    // ----- SECTOR DE CARGA DE DATOS DEL CLIENTE de forma automática ------ //
    $resulCliente=$conexionClientes->query("SELECT * FROM $BD_tabla WHERE USUARIO='$usuarioOnline'");
    $cargaCliente=$resulCliente->fetchAll(PDO::FETCH_OBJ);
    foreach($cargaCliente as $clienteFila)
    {
        $_SESSION["nombrePersonal"]=$clienteFila->USUARIO;
        $_SESSION["telefonoPersonal"]=$clienteFila->TELEFONO;
        $_SESSION["direccionPersonal"]=$clienteFila->DIRECCION;
        $_SESSION["entidadPersonal"]=$clienteFila->ENTIDAD;
        $_SESSION["correoPersonal"]=$clienteFila->CORREO;
        $_SESSION["fotoPersonal"]=$clienteFila->FOTO;
        $_SESSION["numeroCompras"]=$clienteFila->NUMERO_COMPRAS;
    }
    $_SESSION["activadorPersonal"]=4; //SE ACTIVA LETRERO DE DATOS CARGADOS CORRECTAMENTE
    $resulCliente->closeCursor();
    header("Location:../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/personalClientes.php");
}
if(isset($_POST["creditcard"]))
{
    header("Location:../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/0096_01_01_TarjetaBanco/tarjetaBancaria.php");
}
if(isset($_POST["actualizar"]))
{
    //Adquisición de datos
    $nombrePersonal=$_POST["nombre"];
    $telefonoPersonal=$_POST["telefono"];
    $direccionPersonal=$_POST["direccion"];
    $entidadPersonal=$_POST["entidad"];
    $correoPersonal=$_POST["correo"];
    $numeroComprasPersonal=$_POST["numCompras"];

    $nombreImagen=$_FILES["imagenfile"]["name"];
    $tipoImagen=$_FILES["imagenfile"]["type"];
    $tamanioImagen=$_FILES["imagenfile"]["size"];

    if(!empty($nombrePersonal) && !empty($telefonoPersonal) && !empty($direccionPersonal) && !empty($correoPersonal) && !empty($numeroComprasPersonal))
    {
        if(empty($nombreImagen))
        {
        //Envio a la BBDD de los datos recopilados SIN FOTO DE PERFIL
        //Carga datos de la BBDD para rellenar automaticamente el formulario si es que existen sus datos
        $consultaDatos=$conexionClientes->query("UPDATE $BD_tabla SET USUARIO='$nombrePersonal',TELEFONO='$telefonoPersonal',DIRECCION='$direccionPersonal',ENTIDAD='$entidadPersonal',CORREO='$correoPersonal',NUMERO_COMPRAS='$numeroComprasPersonal' WHERE USUARIO='$nombrePersonal'");
        $consultaDatos->closeCursor();
        $_SESSION["activadorPersonal"]=1;  //datos actualizados correctamente
        header("Location:../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/personalClientes.php");
        }
        else
        {
            if($tamanioImagen<=3000000)   //LIMITANDO el Tamanio a 3MG
            {
                if($tipoImagen=="image/jpeg" || $tipoImagen=="image/jpg" || $tipoImagen=="image/png" || $tipoImagen=="image/gif")
                {
                    //Como siempre se añaden las descargas a la carpeta TEMPORAL, se le indica al servidor de moverlas a la carpeta señalada
                    //Envio a la BBDD de los datos recopilados CON FOTO DE PERFIL
                    //Carga datos de la BBDD para rellenar automaticamente el formulario si es que existen sus datos
                    move_uploaded_file($_FILES["imagenfile"]["tmp_name"],$carpeta_destino.$nombreImagen);
                    $consultaDatos=$conexionClientes->query("UPDATE $BD_tabla SET USUARIO='$nombrePersonal',TELEFONO='$telefonoPersonal',DIRECCION='$direccionPersonal',ENTIDAD='$entidadPersonal',CORREO='$correoPersonal',FOTO='$nombreImagen',NUMERO_COMPRAS='$numeroComprasPersonal' WHERE USUARIO='$nombrePersonal'");
                    $consultaDatos->closeCursor();
                    $_SESSION["activadorPersonal"]=7;  //datos actualizados correctamente
                }
                else
                {
                    $_SESSION["activadorPersonal"]=5;  //LA IMAGEN QUE SE INTENTA SUBIR ES OTRO TIPO DIFERENTE
                }
            }
            else
            {
                $_SESSION["activadorPersonal"]=6;  //LA IMAGEN QUE SE INTENTA SUBIR ES OTRO TIPO DIFERENTE
            }
        header("Location:../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/personalClientes.php");
        }
    }
    else
    {
        $_SESSION["activadorPersonal"]=2;  //datos no introducidos correctamente, es un error
        header("Location:../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/personalClientes.php");
    }
}
if(isset($_POST["eliminar"]))
{
    //SE BUSCA AL USUARIO EN CUESTIÓN PARA ELIMINAR LA FOTO, SABIENDO EL NOMBRE DE LA FOTO
    $usuarioOnline= $_GET["usuario"];
    // ----- SECTOR DE CARGA DE DATOS DEL CLIENTE de forma automática ------ //
    $resulCliente=$conexionClientes->query("SELECT * FROM $BD_tabla WHERE USUARIO='$usuarioOnline'");
    $cargaCliente=$resulCliente->fetchAll(PDO::FETCH_OBJ);
    $resulCliente->rowCount();
    $resulCliente->closeCursor();
    if($resulCliente==0) 
    {
        //SI EL USUARIO NO EXISTE COSA QUE IMPOSIBLE PORQUE NI SIQUIERA HABRÍA ENTRADO AQUI
        $_SESSION["loginCLIENTES"]=1;  //Sale del todo de la zona del cliente
        header("location:../../../005_Login/salidaPagina.php");
    }
    else
    {
        foreach($cargaCliente as $clienteFila)
        {
            $_SESSION["fotoPersonal"]=$clienteFila->FOTO;
        }
        //EN CASO DE HABER ELIMINADO AL USUARIO DE LA BBDD
        $_SESSION["activadorPersonal"]=3; //SE ACTIVA LETRERO EN LA ZONA DE LA PAGINA PRINCIPAL COMO USUARIO ELIMINADO
        $_SESSION["loginCLIENTES"]=1;  //Sale del todo de la zona del cliente y destruye la sesión
        //Borrado de la base de datos completa
        $resulCliente=$conexionClientes->query("DELETE FROM $BD_tabla WHERE USUARIO='$usuarioOnline'");
        unlink($carpeta_destino.$_SESSION["fotoPersonal"]);  //Elimina el fichero tambien de la carpeta de WINDOWS afectada
        $resulCliente->closeCursor();

        //Borrado de la base de datos de los datos bancarios
        $resulCliente=$conexionClientes->query("DELETE FROM $tablaDatosBancarios WHERE NOMBRE='$usuarioOnline'");
        $resulCliente->closeCursor();
        header("Location:../../../005_Login/salidaPagina.php");
    }
}
if(isset($_POST["volver"]))
{
    //EN CASO DE TENER QUE VOLVER
    $_SESSION["activadorPersonal"]=0; //NO SE ACTIVA NINGUNA INFORMACIÓN NI LETRERO
    header("location:../../../007_Menus/0074_MenuOpCLIENTES/OpCLIENTES.php");
}
?>