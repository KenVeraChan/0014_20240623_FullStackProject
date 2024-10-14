<?php
require "../../005_Login/conexionPHP.php";
error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
$conexionProductos=ConexionPHP::getConexionCLIENTES();
$BD_tabla=ConexionPHP::getBD_TablaInterfazImagenes();

//DESCARGA DE LAS FOTOGRAFIAS DE LAS CATEGORÍAS DE PRODUCTOS
$consVentas=$conexionProductos->query("SELECT NOMBRE FROM $BD_tabla WHERE DESTINO='CATEGORIA PRODUCTOS'");
$resulVentas=$consVentas->fetchAll(PDO::FETCH_OBJ);
$k=0; //inicio de la variable puntero al array generado de almacenaje
foreach($resulVentas as $carVentas)
{
    if(isset($carVentas->NOMBRE))
    {
        $_SESSION["CATEGORIAPROD"][$k]=$carVentas->NOMBRE;
        $k++;
    }
}
$consVentas->closeCursor();
function extraccionCategoriaProductos($eleccion)
{
    switch($eleccion)
    {
        case 1:
            {
                $valor=array_search("CONSTRUCCION.png",$_SESSION["CATEGORIAPROD"],true);
                break;
            }
        case 2:
            {
                $valor=array_search("INDUSTRIA.png",$_SESSION["CATEGORIAPROD"],true);
                break;
            }
        case 3:
            {
                $valor=array_search("BIOINGENIERIA.png",$_SESSION["CATEGORIAPROD"],true);
                break;
            }
        case 4:
            {
                $valor=array_search("AEROESPACIAL.png",$_SESSION["CATEGORIAPROD"],true);
                break;
            }
        default:
            {
                $valor=0;
                break;
            }
    }
    return $_SESSION["CATEGORIAPROD"][$valor];
}
function extraeDetallesProductos($stringNombre)
{
    $conexionProductos=ConexionPHP::getConexionCLIENTES();
    $BD_tabla=ConexionPHP::getBD_TablaInterfazImagenes();
    $consProductos=$conexionProductos->query("SELECT NOMBRE,DETALLES FROM $BD_tabla WHERE DESTINO='CATEGORIA PRODUCTOS'");
    $resulProductos=$consProductos->fetchAll(PDO::FETCH_OBJ);
    $k=0; //Es el puntero que guarda la coleccion de datos extraidos del servidor en referente a NOMBRE y DETALLES
    foreach($resulProductos as $carProductos)
    {
        if(isset($carProductos->NOMBRE))
        {
            $_SESSION["NOMPROD"][$k]=substr($carProductos->NOMBRE,0,-4);
            $_SESSION["DETPROD"][$k]=$carProductos->DETALLES;
            $k++;
        }
    }
    $consProductos->closeCursor();  //Cierra la consulta realiada
    return $_SESSION["DETPROD"][array_search($stringNombre,$_SESSION["NOMPROD"],true)];
}
?>