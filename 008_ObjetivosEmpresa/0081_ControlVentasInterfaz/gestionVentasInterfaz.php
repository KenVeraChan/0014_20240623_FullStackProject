<?php
session_start();
require "../../005_Login/conexionPHP.php";
$conexion=ConexionPHP::getConexionCLIENTES();   //Ahora se necesita la conexión con la BBDD de los clientes
$BD_tabla=ConexionPHP::getBD_TablaInterfazImagenes();
//FICHERO PRINCIPAL DE INICIO DE EJECUCIÓN BACKEND
//CARGA DE DATOS DE LAS IMAGENES
if(isset($_GET["DOWNLOAD"]))
{ 
    $destino=$_GET["eleccionSector"];
    if(isset($destino))
    {
        //PRIMERO SE UBICA LA CARPETA DEL SERVIDOR DE EXTRACCION DE LAS IMAGENES
        //Se le comunica al servidor a dónde se quieren subir las imagenes, LA RUTA Segun EL DESTINO ESPECIFICADO

        if(strcmp($destino,"SLIDER")==0)
        {
        //CASO 1: SI SON IMAGENES DEL SLIDER DEL MENU PRINCIPAL
        $carpeta_destino="../../009_SectorPublico/0091_PaginaPrincipal/sliderImages/";
        $_SESSION["rutaImagen"]=$carpeta_destino;  //SE GUADA LA RUTA DE ALMACENAJE DE LAS IMAGENES
        $_SESSION["senalImagen"]=1;  //Imagenes cargadas desde la carpeta del servidor SLIDER
        }

        if(strcmp($destino,"PRODUCTOS")==0)
        {
        //CASO 2: SI SON IMAGENES DE PRODUCTOS
        $carpeta_destino="../../009_SectorPublico/0093_PaginaProductos/productImages/";
        $_SESSION["rutaImagen"]=$carpeta_destino;  //SE GUADA LA RUTA DE ALMACENAJE DE LAS IMAGENES
        $_SESSION["senalImagen"]=2;  //Imagenes cargadas desde la carpeta del servidor PRODUCTOS
        }
        if(strcmp($destino,"SERVICIOS")==0)
        {
        //CASO 3: SI SON IMAGENES DE SERVICIOS
        $carpeta_destino="../../009_SectorPublico/0094_PaginaServicios/servicesImages/";
        $_SESSION["rutaImagen"]=$carpeta_destino;  //SE GUADA LA RUTA DE ALMACENAJE DE LAS IMAGENES
        $_SESSION["senalImagen"]=3;  //Imagenes cargadas desde la carpeta del servidor SERVICIOS
        }
        if(strcmp($destino,"PROYECTOS")==0)
        {
        //CASO 4: SI SON IMAGENES DE PROYECTOS
        $carpeta_destino="../../009_SectorPublico/0095_PaginaProyectos/projectsImages/";
        $_SESSION["rutaImagen"]=$carpeta_destino;  //SE GUADA LA RUTA DE ALMACENAJE DE LAS IMAGENES
        $_SESSION["senalImagen"]=4;  //Imagenes cargadas desde la carpeta del servidor PROYECTOS
        }
        if(strcmp($destino,"NOVEDADES")==0)
        {
        //CASO 5: SI SON IMAGENES DE NOVEDADES
        $carpeta_destino="../../009_SectorPublico/0091_PaginaPrincipal/newsImages/";
        $_SESSION["rutaImagen"]=$carpeta_destino;  //SE GUADA LA RUTA DE ALMACENAJE DE LAS IMAGENES
        $_SESSION["senalImagen"]=5;  //Imagenes cargadas desde la carpeta del servidor NOVEDADES
        }
        if(strcmp($destino,"CATEGORIA PRODUCTOS")==0)
        {
        //CASO 6: SI SON IMAGENES DE CATEGORIA PRODUCTOS
        $carpeta_destino="../../009_SectorPublico/0093_PaginaProductos/productCategory/";
        $_SESSION["rutaImagen"]=$carpeta_destino;  //SE GUADA LA RUTA DE ALMACENAJE DE LAS IMAGENES
        $_SESSION["senalImagen"]=6;  //Imagenes cargadas desde la carpeta del servidor CATEGORIA PRODUCTOS
        }
        if(strcmp($destino,"CATEGORIA SERVICIOS")==0)
        {
        //CASO 7: SI SON IMAGENES DE CATEGORIA SERVICIOS
        $carpeta_destino="../../009_SectorPublico/0094_PaginaServicios/servicesCategory/";
        $_SESSION["rutaImagen"]=$carpeta_destino;  //SE GUADA LA RUTA DE ALMACENAJE DE LAS IMAGENES
        $_SESSION["senalImagen"]=7;  //Imagenes cargadas desde la carpeta del servidor CATEGORIA SERVICIOS
        }
        if(strcmp($destino,"CATEGORIA PROYECTOS")==0)
        {
        //CASO 8: SI SON IMAGENES DE CATEGORIA PROYECTOS
        $carpeta_destino="../../009_SectorPublico/0095_PaginaProyectos/projectsCategory/";
        $_SESSION["rutaImagen"]=$carpeta_destino;  //SE GUADA LA RUTA DE ALMACENAJE DE LAS IMAGENES
        $_SESSION["senalImagen"]=8;  //Imagenes cargadas desde la carpeta del servidor CATEGORIA PROYECTOS
        }

        //SEGUNDO: SE ATIENDE A LA PETICION SOLICITADA PARA MOSTAR LA TABLA DE LAS IMAGENES DE CADA TIPO
        //SI SE PIDE CARGAR UNA IMAGEN SE PROCEDE CON LA CONSULTA DE LA CARGA DE LA IMAGEN
        $consulta=$conexion->query("SELECT * FROM $BD_tabla WHERE DESTINO='$destino'");
        $resultado=$consulta->fetchAll(PDO::FETCH_OBJ);
        $_SESSION["LIMITE"]=$consulta->rowCount();
        $i=0; //PUNTERO DE VECTOR PARA DESCARGA DE LA IMAGEN
        foreach($resultado as $download)
        {
            $_SESSION["idDown"][$i]=$download->ID;       
            $_SESSION["nombreDown"][$i]=$download->NOMBRE;
            $_SESSION["tipoDown"][$i]=$download->TIPO;
            $_SESSION["tamanioDown"][$i]=$download->TAMANIO;
            $_SESSION["destinoDown"][$i]=$download->DESTINO;
            $_SESSION["sectorDown"][$i]=$download->SECTOR;
            $_SESSION["stockDown"][$i]=$download->STOCK;
            $_SESSION["costeDown"][$i]=$download->COSTE;
            $_SESSION["detallesDown"][$i]=$download->DETALLES;
            $i++;     //SIGUIENTE ITERANTE
        }
        $consulta->closeCursor();  //Cierra la conexion y la consulta
        if($_SESSION["LIMITE"]>0)
        {  
            //no hace nada porque todo ha salid correcto
        }
        else
        {
            $_SESSION["senalImagen"]=9;  //No existe ninguna imagen con ese ID
        }
        header("location:../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/controlVentasInterfaz.php");
    }
    if(!isset($destino))
    {
        $_SESSION["senalImagen"]=10;  //NO HA INTRODUCIDO UNA ELECCION DEL DESPLEGABLE
        header("location:../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/controlVentasInterfaz.php");
    }
}
if(isset($_GET["EXIT"]))
{
    header("location:../../007_Menus/0073_MenuOpJEFES/OpJEFES.php");
}
?>