<?php
session_start();
require "../../005_Login/conexionPHP.php";
error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
$conexionProductos=ConexionPHP::getConexionCLIENTES();
$BD_tabla=ConexionPHP::getBD_TablaVentas();

//REINICIO DE TODAS LAS VARIABLES BORRANDO HASTA EL ÚLTIMO ELEMENTO DEL QUE MAYOR TENGA ENTRADAS EN LA TABLA SQL
//La consulta SQL generada funciona: creando una primera consulta para agrupar por departamentos la cantidad de productos en ellos y luego de haber sido generado
// se hace una consulta sobre esa tabla abstracta que devuelve el valor maximo de entre todos los productos habidos en los agrupados departamentos de la tabla
    $consultaVentas=$conexionProductos->query("SELECT MAX(CONSULTA.PRODDEPART) AS MAXIMO FROM (SELECT AREA,COUNT(*) AS PRODDEPART FROM VENTAS WHERE SECTOR='PRODUCTOS' GROUP BY AREA) AS CONSULTA");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    foreach($resultadoVentas as $cargaVentas)
    {
        $longitudCantidad=$cargaVentas->MAXIMO;
    }
    for($i=0;$i<$longitudCantidad;$i++)
    {
        $_SESSION["ID"][$i]="";
        $_SESSION["NOMBRE"][$i]="";
        $_SESSION["STOCK"][$i]="";
        $_SESSION["SECTOR"][$i]="";
        $_SESSION["AREA"][$i]="";
        $_SESSION["FOTOGRAFIA"][$i]="";
        $_SESSION["DETALLES"][$i]="";
    }
    $consultaVentas->closeCursor(); //Cierra la conexion y la consulta

//CASO DE QUE EL AREA SEA DE CONSTRUCCION
if(isset($_GET["CONSTRUCCION"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE PRODUCTOS
    $consultaVentas=$conexionProductos->query("SELECT * FROM $BD_tabla WHERE SECTOR='PRODUCTOS' AND AREA='CONSTRUCCION'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["ID"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBRE"][$i]=$cargaVentas->NOMBRE;
                $_SESSION["STOCK"][$i]=$cargaVentas->STOCK;
                $_SESSION["SECTOR"][$i]=$cargaVentas->SECTOR;
                $_SESSION["AREA"][$i]=$cargaVentas->AREA;
                $_SESSION["FOTOGRAFIA"][$i]=$cargaVentas->FOTOGRAFIA;
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
    $consultaVentas=$conexionProductos->query("SELECT * FROM $BD_tabla WHERE SECTOR='PRODUCTOS' AND AREA='INDUSTRIA'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["ID"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBRE"][$i]=$cargaVentas->NOMBRE;
                $_SESSION["STOCK"][$i]=$cargaVentas->STOCK;
                $_SESSION["SECTOR"][$i]=$cargaVentas->SECTOR;
                $_SESSION["AREA"][$i]=$cargaVentas->AREA;
                $_SESSION["FOTOGRAFIA"][$i]=$cargaVentas->FOTOGRAFIA;
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
    $consultaVentas=$conexionProductos->query("SELECT * FROM $BD_tabla WHERE SECTOR='PRODUCTOS' AND AREA='BIOINGENIERIA'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["ID"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBRE"][$i]=$cargaVentas->NOMBRE;
                $_SESSION["STOCK"][$i]=$cargaVentas->STOCK;
                $_SESSION["SECTOR"][$i]=$cargaVentas->SECTOR;
                $_SESSION["AREA"][$i]=$cargaVentas->AREA;
                $_SESSION["FOTOGRAFIA"][$i]=$cargaVentas->FOTOGRAFIA;
                $_SESSION["DETALLES"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0093_PaginaProductos/paginaProductos.php");
}
//CASO DE QUE EL AREA SEA DE AERONAUTICA
if(isset($_GET["AERONAUTICA"]))
{
    //GENERA LA CONSULTA SELECCIONANDO SOLO LA PARTE DE PRODUCTOS
    $consultaVentas=$conexionProductos->query("SELECT * FROM $BD_tabla WHERE SECTOR='PRODUCTOS' AND AREA='AERONAUTICA'");
    $resultadoVentas=$consultaVentas->fetchAll(PDO::FETCH_OBJ);
    //DESCARGA DATOS DE LA CONSULTA
    $i=0; //Puntero de recorrido del ARRAY
        foreach($resultadoVentas as $cargaVentas)
        {
            if(isset($cargaVentas->ID) && isset($cargaVentas->NOMBRE))
            {
                $_SESSION["ID"][$i]=$cargaVentas->ID;
                $_SESSION["NOMBRE"][$i]=$cargaVentas->NOMBRE;
                $_SESSION["STOCK"][$i]=$cargaVentas->STOCK;
                $_SESSION["SECTOR"][$i]=$cargaVentas->SECTOR;
                $_SESSION["AREA"][$i]=$cargaVentas->AREA;
                $_SESSION["FOTOGRAFIA"][$i]=$cargaVentas->FOTOGRAFIA;
                $_SESSION["DETALLES"][$i]=$cargaVentas->DETALLES;
                $i++;
            }
        }
        $consultaVentas->closeCursor(); //Cierra la conexion y la consulta
        $_SESSION["concesion"]=1;   //Semaforo de concesion de activacion del catalogo
        header("location:../../009_SectorPublico/0093_PaginaProductos/paginaProductos.php");
}
?>