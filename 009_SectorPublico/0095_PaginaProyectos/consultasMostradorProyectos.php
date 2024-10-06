<?php
require "../../005_Login/conexionPHP.php";
error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
$conexionServicios=ConexionPHP::getConexionCLIENTES();
$BD_tabla=ConexionPHP::getBD_TablaInterfazImagenes();

//DESCARGA DE LAS FOTOGRAFIAS DE LAS CATEGORÍAS DE PRODUCTOS
$consServicios=$conexionServicios->query("SELECT NOMBRE FROM $BD_tabla WHERE DESTINO='CATEGORIA SERVICIOS'");
$resulServicios=$consServicios->fetchAll(PDO::FETCH_OBJ);
$k=0; //inicio de la variable puntero al array generado de almacenaje
foreach($resulServicios as $carServicios)
{
    if(isset($carServicios->NOMBRE))
    {
        $_SESSION["CATEGORIASERV"][$k]=$carServicios->NOMBRE;
        $k++;
    }
}
$consServicios->closeCursor();
function extraccionCategoriaServicios($eleccion)
{
    switch($eleccion)
    {
        case 1:
            {
                $valor=array_search("ASTRONOMIA.png",$_SESSION["CATEGORIASERV"],true);
                break;
            }
        case 2:
            {
                $valor=array_search("AUTOMATIZACION.png",$_SESSION["CATEGORIASERV"],true);
                break;
            }
        case 3:
            {
                $valor=array_search("ECOLOGIA.png",$_SESSION["CATEGORIASERV"],true);
                break;
            }
        case 4:
            {
                $valor=array_search("INFRAESTRUCTURAS.png",$_SESSION["CATEGORIASERV"],true);
                break;
            }
        case 5:
            {
                $valor=array_search("MEDICINA.png",$_SESSION["CATEGORIASERV"],true);
                break;
            }
        case 6:
            {
                $valor=array_search("OCEANOGRAFIA.png",$_SESSION["CATEGORIASERV"],true);
                break;
            }
        case 7:
            {
                $valor=array_search("TELECOMUNICACIONES.png",$_SESSION["CATEGORIASERV"],true);
                break;
            }
        case 8:
            {
                $valor=array_search("EDUCACION.png",$_SESSION["CATEGORIASERV"],true);
                break;
            }
        default:
            {
                $valor=0;
                break;
            }
    }
    return $_SESSION["CATEGORIASERV"][$valor];
}
function extraeDetallesServicios($stringNombre)
{
    $conexionServicios=ConexionPHP::getConexionCLIENTES();
    $BD_tabla=ConexionPHP::getBD_TablaInterfazImagenes();
    $consServicios=$conexionServicios->query("SELECT NOMBRE,DETALLES FROM $BD_tabla WHERE DESTINO='CATEGORIA SERVICIOS'");
    $resulServicios=$consServicios->fetchAll(PDO::FETCH_OBJ);
    $k=0; //Es el puntero que guarda la coleccion de datos extraidos del servidor en referente a NOMBRE y DETALLES
    foreach($resulServicios as $carServicios)
    {
        if(isset($carServicios->NOMBRE))
        {
            $_SESSION["NOMSERV"][$k]=substr($carServicios->NOMBRE,0,-4);
            $_SESSION["DETSERV"][$k]=$carServicios->DETALLES;
            $k++;
        }
    }
    $consServicios->closeCursor();  //Cierra la consulta realiada
    return $_SESSION["DETSERV"][array_search($stringNombre,$_SESSION["NOMSERV"],true)];
}
?>