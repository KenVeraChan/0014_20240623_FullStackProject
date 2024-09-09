<?php
session_start();
require "../../005_Login/conexionPHP.php";
$conexion=ConexionPHP::getConexionCLIENTES();   //Ahora se necesita la conexión con la BBDD de los clientes
$BD_tabla=ConexionPHP::getBD_TablaSlider();
//FICHERO PRINCIPAL DE INICIO DE EJECUCIÓN BACKEND
//Recepción de los datos de la imagen
//Variable global $_FILES y las propiedades de la imagen
$nombreImagen=$_FILES["imagen"]["name"];
$tipoImagen=$_FILES["imagen"]["type"];
$tamanioImagen=$_FILES["imagen"]["size"];
$destino=$_POST["destinoImagen"];
//Se le comunica al servidor a dónde se quieren subir las imagenes, LA RUTA Segun EL DESTINO ESPECIFICADO

if(strcmp($destino,"SLIDER")==0)
{
//CASO 1: SI SON IMAGENES DEL SLIDER DEL MENU PRINCIPAL
$carpeta_destino=$_SERVER["DOCUMENT_ROOT"].'/009_SectorPublico/0091_PaginaPrincipal/sliderImages/';
$_SESSION["rutaImagen"]=$carpeta_destino;  //SE GUADA LA RUTA DE ALMACENAJE DE LAS IMAGENES
}

if(strcmp($destino,"PRODUCTOS")==0)
{
//CASO 2: SI SON IMAGENES DE PRODUCTOS
$carpeta_destino=$_SERVER["DOCUMENT_ROOT"].'/009_SectorPublico/0093_PaginaProductos/productImages/';
$_SESSION["rutaImagen"]=$carpeta_destino;  //SE GUADA LA RUTA DE ALMACENAJE DE LAS IMAGENES
}
if(strcmp($destino,"SERVICIOS")==0)
{
//CASO 3: SI SON IMAGENES DE SERVICIOS
$carpeta_destino=$_SERVER["DOCUMENT_ROOT"].'/009_SectorPublico/0094_PaginaServicios/servicesImages/';
$_SESSION["rutaImagen"]=$carpeta_destino;  //SE GUADA LA RUTA DE ALMACENAJE DE LAS IMAGENES
}

if(isset($_POST["CARGA"]))
{
    $id=$_POST["idImagen"];  //Carga según el ID introducido
    //SI SE PIDE CARGAR UNA IMAGEN SE PROCEDE CON LA CONSULTA DE LA CARGA DE LA IMAGEN
    $consulta=$conexion->query("SELECT * FROM $BD_tabla WHERE ID='$id'");
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
    $numeroFilasCarga=$consulta->rowCount();
    foreach($resultado as $foto)
    {
        $_SESSION["idImagen"]=$foto["ID"];       
        $_SESSION["nombreImagen"]=$foto["NOMBRE"];
        $_SESSION["tipoImagen"]=$foto["TIPO"];
        $_SESSION["tamanioImagen"]=$foto["TAMANIO"];
        $_SESSION["destinoImagen"]=$foto["DESTINO"];
    }
    $consulta->closeCursor();  //Cierra la conexion y la consulta
    if($numeroFilasCarga>0)
    {  
        $_SESSION["senalImagen"]=1;  //Imagen cargada desde la carpeta del servidor
        if($_SESSION["destinoImagen"]=="SLIDER")
        {
            $_SESSION["destinoCargado"]=1;   //URL DE LAS IMAGENES DEL SLIDER
        }
        if($_SESSION["destinoImagen"]=="PRODUCTOS")
        {
            $_SESSION["destinoCargado"]=2;   //URL DE LAS IMAGENES DE LOS PRODUCTOS
        }
        if($_SESSION["destinoImagen"]=="SERVICIOS")
        {
            $_SESSION["destinoCargado"]=3;   //URL DE LAS IMAGENES DE LOS SERVICIOS
        }
    }
    else
    {
        $_SESSION["senalImagen"]=6;  //No existe ninguna imagen con ese ID
    }
    header("location:../../008_ObjetivosEmpresa/0084_ControldeInterfaz/controldeInterfaz.php");
}
if(isset($_POST["INSERTA"]))
{
    if($destino!="")    //Si se especifica para qué se usará la imagen: SLIDER, PRODUCTOS, SERVICIOS, deja entrar
    {
        if($tamanioImagen<=3000000)   //LIMITANDO el Tamanio a 3MG
        {
            if($tipoImagen=="image/jpeg" || $tipoImagen=="image/jpg" || $tipoImagen=="image/png" || $tipoImagen=="image/gif")
            {
                //Como siempre se añaden las descargas a la carpeta TEMPORAL, se le indica al servidor de moverlas a la carpeta señalada
                move_uploaded_file($_FILES["imagen"]["tmp_name"],$carpeta_destino.$nombreImagen);
                //Mover la imagen del directorio temporal al directorio seleccionado
                //AHORA SE SUBE AL SERVIDOR LA IMAGEN PARA LUEGO SER CARGADA SI PROCEDIERA
                $consulta=$conexion->query("INSERT INTO $BD_tabla (NOMBRE,TIPO,TAMANIO,CONTENIDO,DESTINO)VALUES('$nombreImagen','$tipoImagen','$tamanioImagen','$carpeta_destino','$destino')");
                $consulta->closeCursor();
                $_SESSION["senalImagen"]=2;  //Imagen subida al servidor de la BBDD
                header("location:../../008_ObjetivosEmpresa/0084_ControldeInterfaz/controldeInterfaz.php");
            }
            else
            {
                $_SESSION["senalImagen"]=4; //El formato de la imagen no es de tipo JPEG
                header("location:../../008_ObjetivosEmpresa/0084_ControldeInterfaz/controldeInterfaz.php");
            }
        }
        else{
            $_SESSION["senalImagen"]=5;  //El tamanio de la imagen excede lo permitido de 3MG
            header("location:../../008_ObjetivosEmpresa/0084_ControldeInterfaz/controldeInterfaz.php");
        }
        //Se invoca al area de instancias en donde estan todos los ficheros del CONTROLADOR
    }
    else    //Si se especifica para qué se usará la imagen: SLIDER, PRODUCTOS, SERVICIOS, deja entrar
    {
        $_SESSION["senalImagen"]=3;  //Imagen subida al servidor de la BBDD
        header("location:../../008_ObjetivosEmpresa/0084_ControldeInterfaz/controldeInterfaz.php");
    }
}
if(isset($_POST["BORRA"]))
{
    $id=$_POST["idImagen"];  //Carga según el ID introducido
    //SI SE PIDE CARGAR UNA IMAGEN SE PROCEDE CON LA CONSULTA DE LA CARGA DE LA IMAGEN
    $consulta=$conexion->query("DELETE FROM $BD_tabla WHERE ID='$id'");  
    $_SESSION["senalImagen"]=7;  //Imagen eliminada de la BBDD y del directorio del servidor en donde se almaceno
    unlink($carpeta_destino.$_SESSION["nombreImagen"]);  //Elimina el fichero tambien de la carpeta de WINDOWS afectada
    header("location:../../008_ObjetivosEmpresa/0084_ControldeInterfaz/controldeInterfaz.php");  //Se regresa a la pagina anterior
}
if(isset($_POST["VOLVER"]))
{
    header("location:../../007_Menus/0073_MenuOpJEFES/OpJEFES.php");
}
?>