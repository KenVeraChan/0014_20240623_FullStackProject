<?php
session_start();
require "../../005_Login/conexionPHP.php";
error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
$conexionProductos=ConexionPHP::getConexionCLIENTES();
$BD_tabla=ConexionPHP::getBD_TablaInterfazImagenes();

    //PRIMERO REINICIO DE TODAS LAS VARIABLES
    //REINICIO DE TODAS LAS VARIABLES BORRANDO HASTA EL ÚLTIMO ELEMENTO DEL QUE MAYOR TENGA ENTRADAS EN LA TABLA SQL
    //La consulta SQL generada funciona: creando una primera consulta para agrupar por departamentos la cantidad de productos en ellos y luego de haber sido generado
    // se hace una consulta sobre esa tabla abstracta que devuelve el valor maximo de entre todos los productos habidos en los agrupados departamentos de la tabla
    $consultaVentas=$conexionProductos->query("SELECT MAX(CONSULTA.PRODDEPART) AS MAXIMO FROM (SELECT SECTOR,COUNT(*) AS PRODDEPART FROM $BD_tabla WHERE DESTINO='PRODUCTOS' GROUP BY SECTOR) AS CONSULTA");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    foreach($resultadoVentas as $cargaVentas)
    {
        $longitudCantidad=$cargaVentas->MAXIMO;
    }
    for($i=0;$i<$longitudCantidad;$i++)
    {
        //SE LIMPIAN LAS SIGUIENTES VARIABLES QUE FUERON USADAS EN EL SLIDER Y SE VUELVE A USAR AQUI
        $_SESSION["NOMBREPROD"][$i]="";
        $_SESSION["SECTORPROD"][$i]="";
        $_SESSION["STOCKPROD"][$i]="";
        $_SESSION["COSTEPROD"][$i]="";
        $_SESSION["DETALLESPROD"][$i]="";
    }
    $consultaVentas->closeCursor(); //Cierra la conexion y la consulta

//CASO DE QUE EL AREA SEA DE CONSTRUCCION
if(isset($_GET["CONSTRUCCION"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE PRODUCTOS
    $consultaVentas=$conexionProductos->query("SELECT * FROM $BD_tabla WHERE DESTINO='PRODUCTOS' AND SECTOR='CONSTRUCCION'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->NOMBRE))
            {
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
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
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
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
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
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
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
?>