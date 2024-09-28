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
        $_SESSION["rutaImagen"]=compruebaCarpetaDestino($destino);
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
if(isset($_GET["DESTINOS"]))  //PROVENIENTE DE LA PAGINA DEL REGRESO DESDE LA ACTUALIZACION
{
    $destino=$_GET["DESTINOS"];
    //PRIMERO SE UBICA LA CARPETA DEL SERVIDOR DE EXTRACCION DE LAS IMAGENES
    //Se le comunica al servidor a dónde se quieren subir las imagenes, LA RUTA Segun EL DESTINO ESPECIFICADO
    $_SESSION["rutaImagen"]=compruebaCarpetaDestino($destino);
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
if(isset($_GET["ID"]))
{
    $ID=$_GET["ID"];
    //SI SE PIDE CARGAR UNA DE LOS REGISTROS IDENTIFICADOS POR EL ID ENVIADO AL SERVIDOR
    $consulta=$conexion->query("SELECT * FROM $BD_tabla WHERE ID='$ID'");
    $resultado=$consulta->fetchAll(PDO::FETCH_OBJ);
    $_SESSION["LIMITE"]=$consulta->rowCount();
    foreach($resultado as $download)
    {
        $_SESSION["idDown"][0]=$download->ID;       
        $_SESSION["nombreDown"][0]=$download->NOMBRE;
        $_SESSION["tipoDown"][0]=$download->TIPO;
        $_SESSION["tamanioDown"][0]=$download->TAMANIO;
        $_SESSION["destinoDown"][0]=$download->DESTINO;
        $_SESSION["sectorDown"][0]=$download->SECTOR;
        $_SESSION["stockDown"][0]=$download->STOCK;
        $_SESSION["costeDown"][0]=$download->COSTE;
        $_SESSION["detallesDown"][0]=$download->DETALLES;
    }
    $_SESSION["rutaImagen"]=compruebaCarpetaDestino( $_SESSION["destinoDown"][0]);
    $consulta->closeCursor();  //Cierra la conexion y la consulta
    if($_SESSION["LIMITE"]>0)
    {  
      //no hace nada porque todo ha salid correcto
      header("location:../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/0081_01_ControlActualizaciones/controlActualizaciones.php");
    }
    else
    {
      $_SESSION["senalImagen"]=9;  //No existe ninguna imagen con ese ID
      header("location:../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/controlVentasInterfaz.php");
    }
}
if(isset($_GET["ACTUALIZAR"]))
{
    //parece que al darle a ACTUALIZAR del botón SI el programa cree que se le dan a TODOS LOS BOTONES QUE PONE SI: corregir eso
    $ID=$_SESSION["idDown"][0];
    $DESTINO=$_SESSION["destinoDown"][0];

    if(strcmp($DESTINO,"SLIDER")==0 || strcmp($DESTINO,"NOVEDADES")==0 || strcmp($DESTINO,"CATEGORIA PRODUCTOS")==0 || strcmp($DESTINO,"CATEGORIA SERVICIOS")==0 || strcmp($DESTINO,"CATEGORIA PROYECTOS")==0)
    {
        //VARIABLE IMPLICADA EN EL PROCESO
        $DETALLES=$_GET["DETALLES"];
        
        if(!empty($DETALLES))
        {
        //SE RELLENÓ PARA ACTUALIZAR
        //EN EL CASO DE QUE TRAS DARLE A ACTUALIZAR SE DESCUBRA QUE ES SLIDER
        $consulta=$conexion->query("UPDATE $BD_tabla SET DETALLES='$DETALLES' WHERE ID=$ID");
        $consulta->closeCursor();  //Cierra la conexion y la consulta
        $_SESSION["senalImagen"]=27;  //REGISTRO ACTUALIZADO CORRECTAMENTE
        header("location:../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/0081_01_ControlActualizaciones/controlActualizaciones.php");        
        }
        if(empty($DETALLES))
        {
        //NO SE RELLENÓ LUEGO NO SE VA A ACTUALIZAR
        $_SESSION["senalImagen"]=28;  //REGISTRO SE HA DADO A ACTUALIZAR PERO NO SE HA EJECUTADO POR CELDAS VACIAS
        header("location:../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/0081_01_ControlActualizaciones/controlActualizaciones.php");
        }
    }
    if(strcmp($DESTINO,"PRODUCTOS")==0 || strcmp($DESTINO,"SERVICIOS")==0 || strcmp($DESTINO,"PROYECTOS")==0)
    {
        //VARIABLES IMPLICADAS EN EL PROCESO
        $SECTOR=$_GET["SECTOR"];
        $STOCK=$_GET["STOCK"];
        $COSTE=$_GET["COSTE"];
        $DETALLES=$_GET["DETALLES"];

        if(empty($SECTOR) && empty($STOCK) && empty($COSTE) && empty($DETALLES))
        {
            //0000:0 NO SE RELLENÓ LUEGO NO SE VA A ACTUALIZAR
            $_SESSION["senalImagen"]=11;  //REGISTRO SE HA DADO A ACTUALIZAR PERO NO SE HA EJECUTADO POR CELDAS VACIAS
            header("location:../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/0081_01_ControlActualizaciones/controlActualizaciones.php");
        }
        if(empty($SECTOR) && empty($STOCK) && empty($COSTE) && !empty($DETALLES))
        {
            //0001:1 EN EL CASO DE QUE SOLO SE ACTUALICE: DETALLES
            $consulta=$conexion->query("UPDATE $BD_tabla SET DETALLES='$DETALLES' WHERE ID=$ID");
            $consulta->closeCursor();  //Cierra la conexion y la consulta
            $_SESSION["senalImagen"]=12;  //REGISTRO ACTUALIZADO CORRECTAMENTE
            header("location:../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/0081_01_ControlActualizaciones/controlActualizaciones.php");
        }
        if(empty($SECTOR) && empty($STOCK) && !empty($COSTE) && empty($DETALLES))
        {
            //0010:2 EN EL CASO DE QUE SOLO SE ACTUALICE: COSTE
            $consulta=$conexion->query("UPDATE $BD_tabla SET COSTE='$COSTE' WHERE ID=$ID");
            $consulta->closeCursor();  //Cierra la conexion y la consulta
            $_SESSION["senalImagen"]=13;  //REGISTRO ACTUALIZADO CORRECTAMENTE
            header("location:../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/0081_01_ControlActualizaciones/controlActualizaciones.php");
        }
        if(empty($SECTOR) && empty($STOCK) && !empty($COSTE) && !empty($DETALLES))
        {
            //0011:3 EN EL CASO DE QUE SOLO SE ACTUALICE: COSTE Y DETALLES
            $consulta=$conexion->query("UPDATE $BD_tabla SET COSTE='$COSTE', DETALLES='$DETALLES' WHERE ID=$ID");
            $consulta->closeCursor();  //Cierra la conexion y la consulta
            $_SESSION["senalImagen"]=14;  //REGISTRO ACTUALIZADO CORRECTAMENTE
            header("location:../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/0081_01_ControlActualizaciones/controlActualizaciones.php");
        }
        if(empty($SECTOR) && !empty($STOCK) && empty($COSTE) && empty($DETALLES))
        {
            //0100:4 EN EL CASO DE QUE SOLO SE ACTUALICE: STOCK
            $consulta=$conexion->query("UPDATE $BD_tabla SET STOCK='$STOCK' WHERE ID=$ID");
            $consulta->closeCursor();  //Cierra la conexion y la consulta
            $_SESSION["senalImagen"]=15;  //REGISTRO ACTUALIZADO CORRECTAMENTE
            header("location:../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/0081_01_ControlActualizaciones/controlActualizaciones.php");
        }
        if(empty($SECTOR) && !empty($STOCK) && empty($COSTE) && !empty($DETALLES))
        {
            //0101:5 EN EL CASO DE QUE SOLO SE ACTUALICE: STOCK Y DETALLES
            $consulta=$conexion->query("UPDATE $BD_tabla SET STOCK='$STOCK', DETALLES='$DETALLES' WHERE ID=$ID");
            $consulta->closeCursor();  //Cierra la conexion y la consulta
            $_SESSION["senalImagen"]=16;  //REGISTRO ACTUALIZADO CORRECTAMENTE
            header("location:../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/0081_01_ControlActualizaciones/controlActualizaciones.php");
        }
        if(empty($SECTOR) && !empty($STOCK) && !empty($COSTE) && empty($DETALLES))
        {
            //0110:6 EN EL CASO DE QUE SOLO SE ACTUALICE: STOCK Y COSTE
            $consulta=$conexion->query("UPDATE $BD_tabla SET STOCK='$STOCK', DETALLES='$DETALLES' WHERE ID=$ID");
            $consulta->closeCursor();  //Cierra la conexion y la consulta
            $_SESSION["senalImagen"]=17;  //REGISTRO ACTUALIZADO CORRECTAMENTE
            header("location:../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/0081_01_ControlActualizaciones/controlActualizaciones.php");
        }
        if(empty($SECTOR) && !empty($STOCK) && !empty($COSTE) && !empty($DETALLES))
        {
            //0111:7 EN EL CASO DE QUE SOLO SE ACTUALICE: STOCK, COSTE Y DETALLES
            $consulta=$conexion->query("UPDATE $BD_tabla SET STOCK='$STOCK', COSTE='$COSTE', DETALLES='$DETALLES' WHERE ID=$ID");
            $consulta->closeCursor();  //Cierra la conexion y la consulta
            $_SESSION["senalImagen"]=18;  //REGISTRO ACTUALIZADO CORRECTAMENTE
            header("location:../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/0081_01_ControlActualizaciones/controlActualizaciones.php");
        }
        if(!empty($SECTOR) && empty($STOCK) && empty($COSTE) && empty($DETALLES))
        {
            //1000:8 EN EL CASO DE QUE SOLO SE ACTUALICE: SECTOR
            $consulta=$conexion->query("UPDATE $BD_tabla SET SECTOR='$SECTOR' WHERE ID=$ID");
            $consulta->closeCursor();  //Cierra la conexion y la consulta
            $_SESSION["senalImagen"]=19;  //REGISTRO ACTUALIZADO CORRECTAMENTE
            header("location:../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/0081_01_ControlActualizaciones/controlActualizaciones.php");
        }
        if(!empty($SECTOR) && empty($STOCK) && empty($COSTE) && !empty($DETALLES))
        {
            //1001:9 EN EL CASO DE QUE SOLO SE ACTUALICE: STOCK Y DETALLES
            $consulta=$conexion->query("UPDATE $BD_tabla SET SECTOR='$SECTOR', DETALLES='$DETALLES' WHERE ID=$ID");
            $consulta->closeCursor();  //Cierra la conexion y la consulta
            $_SESSION["senalImagen"]=20;  //REGISTRO ACTUALIZADO CORRECTAMENTE
            header("location:../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/0081_01_ControlActualizaciones/controlActualizaciones.php");
        }
        if(!empty($SECTOR) && empty($STOCK) && !empty($COSTE) && empty($DETALLES))
        {
            //1010:10 EN EL CASO DE QUE SOLO SE ACTUALICE: SECTOR Y COSTE
            $consulta=$conexion->query("UPDATE $BD_tabla SET SECTOR='$SECTOR', COSTE='$COSTE' WHERE ID=$ID");
            $consulta->closeCursor();  //Cierra la conexion y la consulta
            $_SESSION["senalImagen"]=21;  //REGISTRO ACTUALIZADO CORRECTAMENTE
            header("location:../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/0081_01_ControlActualizaciones/controlActualizaciones.php");
        }
        if(!empty($SECTOR) && empty($STOCK) && !empty($COSTE) && !empty($DETALLES))
        {
            //1011:11 EN EL CASO DE QUE SOLO SE ACTUALICE: SECTOR, COSTE Y DETALLES
            $consulta=$conexion->query("UPDATE $BD_tabla SET SECTOR='$SECTOR', COSTE='$COSTE', DETALLES='$DETALLES' WHERE ID=$ID");
            $consulta->closeCursor();  //Cierra la conexion y la consulta
            $_SESSION["senalImagen"]=22;  //REGISTRO ACTUALIZADO CORRECTAMENTE
            header("location:../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/0081_01_ControlActualizaciones/controlActualizaciones.php");
        }
        if(!empty($SECTOR) && !empty($STOCK) && empty($COSTE) && empty($DETALLES))
        {
            //1100:12 EN EL CASO DE QUE SOLO SE ACTUALICE: SECTOR Y STOCK
            $consulta=$conexion->query("UPDATE $BD_tabla SET SECTOR='$SECTOR', STOCK='$STOCK' WHERE ID=$ID");
            $consulta->closeCursor();  //Cierra la conexion y la consulta
            $_SESSION["senalImagen"]=23;  //REGISTRO ACTUALIZADO CORRECTAMENTE
            header("location:../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/0081_01_ControlActualizaciones/controlActualizaciones.php");
        }
        if(!empty($SECTOR) && !empty($STOCK) && empty($COSTE) && !empty($DETALLES))
        {
            //1101:13 EN EL CASO DE QUE SOLO SE ACTUALICE: SECTOR, STOCK Y DETALLES
            $consulta=$conexion->query("UPDATE $BD_tabla SET SECTOR='$SECTOR', STOCK='$STOCK', DETALLES='$DETALLES' WHERE ID=$ID");
            $consulta->closeCursor();  //Cierra la conexion y la consulta
            $_SESSION["senalImagen"]=24;  //REGISTRO ACTUALIZADO CORRECTAMENTE
            header("location:../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/0081_01_ControlActualizaciones/controlActualizaciones.php");
        }
        if(!empty($SECTOR) && !empty($STOCK) && !empty($COSTE) && empty($DETALLES))
        {
            //1110:14 EN EL CASO DE QUE SOLO SE ACTUALICE: SECTOR, STOCK Y COSTE
            $consulta=$conexion->query("UPDATE $BD_tabla SET SECTOR='$SECTOR', STOCK='$STOCK', COSTE='$COSTE' WHERE ID=$ID");
            $consulta->closeCursor();  //Cierra la conexion y la consulta
            $_SESSION["senalImagen"]=25;  //REGISTRO ACTUALIZADO CORRECTAMENTE
            header("location:../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/0081_01_ControlActualizaciones/controlActualizaciones.php");
        }
        if(!empty($SECTOR) && !empty($STOCK) && !empty($COSTE) && !empty($DETALLES))
        {
            //1111:15 EN EL CASO DE QUE SOLO SE ACTUALICE TODO: SECTOR, STOCK, COSTE Y DETALLES
            $consulta=$conexion->query("UPDATE $BD_tabla SET SECTOR='$SECTOR', STOCK='$STOCK', COSTE='$COSTE', DETALLES='$DETALLES' WHERE ID=$ID");
            $consulta->closeCursor();  //Cierra la conexion y la consulta
            $_SESSION["senalImagen"]=26;  //REGISTRO ACTUALIZADO CORRECTAMENTE
            header("location:../../../008_ObjetivosEmpresa/0081_ControlVentasInterfaz/0081_01_ControlActualizaciones/controlActualizaciones.php");
        }
    }
}

function compruebaCarpetaDestino($destino)
{
    session_start();
    if(strcmp($destino,"SLIDER")==0)
    {
    //CASO 1: SI SON IMAGENES DEL SLIDER DEL MENU PRINCIPAL
    $carpeta_destino="../../009_SectorPublico/0091_PaginaPrincipal/sliderImages/";
    $_SESSION["senalImagen"]=1;  //Imagenes cargadas desde la carpeta del servidor SLIDER
    return $carpeta_destino;
    }

    if(strcmp($destino,"PRODUCTOS")==0)
    {
    //CASO 2: SI SON IMAGENES DE PRODUCTOS
    $carpeta_destino="../../009_SectorPublico/0093_PaginaProductos/productImages/";
    $_SESSION["senalImagen"]=2;  //Imagenes cargadas desde la carpeta del servidor PRODUCTOS
    return $carpeta_destino;
    }
    if(strcmp($destino,"SERVICIOS")==0)
    {
    //CASO 3: SI SON IMAGENES DE SERVICIOS
    $carpeta_destino="../../009_SectorPublico/0094_PaginaServicios/servicesImages/";
    $_SESSION["senalImagen"]=3;  //Imagenes cargadas desde la carpeta del servidor SERVICIOS
    return $carpeta_destino;
    }
    if(strcmp($destino,"PROYECTOS")==0)
    {
    //CASO 4: SI SON IMAGENES DE PROYECTOS
    $carpeta_destino="../../009_SectorPublico/0095_PaginaProyectos/projectsImages/";
    $_SESSION["senalImagen"]=4;  //Imagenes cargadas desde la carpeta del servidor PROYECTOS
    return $carpeta_destino;
    }
    if(strcmp($destino,"NOVEDADES")==0)
    {
    //CASO 5: SI SON IMAGENES DE NOVEDADES
    $carpeta_destino="../../009_SectorPublico/0091_PaginaPrincipal/newsImages/";
    $_SESSION["senalImagen"]=5;  //Imagenes cargadas desde la carpeta del servidor NOVEDADES
    return $carpeta_destino;
    }
    if(strcmp($destino,"CATEGORIA PRODUCTOS")==0)
    {
    //CASO 6: SI SON IMAGENES DE CATEGORIA PRODUCTOS
    $carpeta_destino="../../009_SectorPublico/0093_PaginaProductos/productCategory/";
    $_SESSION["senalImagen"]=6;  //Imagenes cargadas desde la carpeta del servidor CATEGORIA PRODUCTOS
    return $carpeta_destino;
    }
    if(strcmp($destino,"CATEGORIA SERVICIOS")==0)
    {
    //CASO 7: SI SON IMAGENES DE CATEGORIA SERVICIOS
    $carpeta_destino="../../009_SectorPublico/0094_PaginaServicios/servicesCategory/";
    $_SESSION["senalImagen"]=7;  //Imagenes cargadas desde la carpeta del servidor CATEGORIA SERVICIOS
    return $carpeta_destino;
    }
    if(strcmp($destino,"CATEGORIA PROYECTOS")==0)
    {
    //CASO 8: SI SON IMAGENES DE CATEGORIA PROYECTOS
    $carpeta_destino="../../009_SectorPublico/0095_PaginaProyectos/projectsCategory/";
    $_SESSION["senalImagen"]=8;  //Imagenes cargadas desde la carpeta del servidor CATEGORIA PROYECTOS
    return $carpeta_destino;
    }
}
?>