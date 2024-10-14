<?php
session_start();
require "../../005_Login/conexionPHP.php";
error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
$conexionProductos=ConexionPHP::getConexionCLIENTES();
$BD_tabla=ConexionPHP::getBD_TablaInterfazImagenes();

//CASO DE QUE EL AREA SEA DE CONSTRUCCION
if(isset($_GET["CONSTRUCCION"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE PRODUCTOS
    $consultaVentas=$conexionProductos->query("SELECT * FROM $BD_tabla WHERE DESTINO='PRODUCTOS' AND SECTOR='CONSTRUCCION'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDPROD"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBREPROD"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORPROD"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKPROD"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTEPROD"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETALLES"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0093_PaginaProductos/paginaProductos.php");
}
//CASO DE QUE EL AREA SEA DE INDUSTRIA
if(isset($_GET["INDUSTRIA"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE PRODUCTOS
    $consultaVentas=$conexionProductos->query("SELECT * FROM $BD_tabla WHERE DESTINO='PRODUCTOS' AND SECTOR='INDUSTRIA'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDPROD"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBREPROD"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORPROD"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKPROD"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTEPROD"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETALLES"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0093_PaginaProductos/paginaProductos.php");
}
//CASO DE QUE EL AREA SEA DE BIOINGENIERIA
if(isset($_GET["BIOINGENIERIA"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE PRODUCTOS
    $consultaVentas=$conexionProductos->query("SELECT * FROM $BD_tabla WHERE DESTINO='PRODUCTOS' AND SECTOR='BIOINGENIERIA'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDPROD"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBREPROD"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORPROD"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKPROD"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTEPROD"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETALLES"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0093_PaginaProductos/paginaProductos.php");
}
//CASO DE QUE EL AREA SEA DE AEROESPACIAL
if(isset($_GET["AEROESPACIAL"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE PRODUCTOS
    $consultaVentas=$conexionProductos->query("SELECT * FROM $BD_tabla WHERE DESTINO='PRODUCTOS' AND SECTOR='AEROESPACIAL'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $filasDescargadas=$consultaVentas->rowCount();
    $_SESSION["MAX"]=$filasDescargadas;
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["IDPROD"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBREPROD"][$i]=substr($cargaVentas->NOMBRE,0,-4);
                $_SESSION["SECTORPROD"][$i]=$cargaVentas->SECTOR;
                $_SESSION["STOCKPROD"][$i]=$cargaVentas->STOCK;
                $_SESSION["COSTEPROD"][$i]=$cargaVentas->COSTE;
                $_SESSION["DETALLES"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0093_PaginaProductos/paginaProductos.php");
}
if(!empty($_GET["ID"]))
{
    $ID=$_GET["ID"];
    //Se guarda el destino de la carpeta de los productos del servidor
    $carpeta_destino="../../009_SectorPublico/0093_PaginaProductos/productImages/";
    $_SESSION["DESTINO"]=$carpeta_destino;
    //Se realiza la consulta correspondiente
    $consultaVentas=$conexionProductos->query("SELECT * FROM $BD_tabla WHERE ID='$ID'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    $numeroProductos=$consultaVentas->rowCount();
    foreach($resultadoVentas as $cargaVentas)
    {
        if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
        {
            $_SESSION["ID_PROD"]=$cargaVentas->ID;
            $_SESSION["NOMBRE_PROD"]=$cargaVentas->NOMBRE;
            $_SESSION["SECTOR_PROD"]=$cargaVentas->SECTOR;
            $_SESSION["STOCK_PROD"]=$cargaVentas->STOCK;
            $_SESSION["COSTE_PROD"]=$cargaVentas->COSTE;
            $_SESSION["DETALLES_PROD"]=$cargaVentas->DETALLES;
        }
    }
    if($numeroProductos<1)
    {
        //NO se han encontrado productos con ese ID
        header("location:../../009_SectorPublico/0093_PaginaProductos/paginaProductos.php");
    }
    if($numeroProductos>0)
    {
        //SI se han encontrado productos con ese ID
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        if(strcmp($_SESSION["SECTOR_PROD"],"CONSTRUCCION")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        if(strcmp($_SESSION["SECTOR_PROD"],"INDUSTRIA")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        if(strcmp($_SESSION["SECTOR_PROD"],"BIOINGENIERIA")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        if(strcmp($_SESSION["SECTOR_PROD"],"AEROESPACIAL")==0)
        {
            $_SESSION["concesion"]=1;  //carga la categoria de cuyos productos se consultó
        }
        header("location:../../009_SectorPublico/0093_PaginaProductos/paginaProductos.php");
    }
}
?>