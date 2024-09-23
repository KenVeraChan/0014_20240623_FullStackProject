<?php
session_start();
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
function extraccionCategoria($eleccion)
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
?>