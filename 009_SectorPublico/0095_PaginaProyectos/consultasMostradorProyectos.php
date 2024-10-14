<?php
require "../../005_Login/conexionPHP.php";
error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
$conexionProyectos=ConexionPHP::getConexionCLIENTES();
$BD_tabla=ConexionPHP::getBD_TablaInterfazImagenes();

//DESCARGA DE LAS FOTOGRAFIAS DE LAS CATEGORÍAS DE PRODUCTOS
$consProyectos=$conexionProyectos->query("SELECT NOMBRE FROM $BD_tabla WHERE DESTINO='CATEGORIA PROYECTOS'");
$resulProyectos=$consProyectos->fetchAll(PDO::FETCH_OBJ);
$k=0; //inicio de la variable puntero al array generado de almacenaje
foreach($resulProyectos as $carProyectos)
{
    if(isset($carProyectos->NOMBRE))
    {
        $_SESSION["CATEGORIAPROY"][$k]=$carProyectos->NOMBRE;
        $k++;
    }
}
$consProyectos->closeCursor();
function extraccionCategoriaProyectos($eleccion)
{
    switch($eleccion)
    {
        case 1:
            {
                $valor=array_search("AGRICULTURA.png",$_SESSION["CATEGORIAPROY"],true);
                break;
            }
        case 2:
            {
                $valor=array_search("ATMOSFERA.png",$_SESSION["CATEGORIAPROY"],true);
                break;
            }
        case 3:
            {
                $valor=array_search("CARRETERAS.png",$_SESSION["CATEGORIAPROY"],true);
                break;
            }
        case 4:
            {
                $valor=array_search("COLONIZACION.png",$_SESSION["CATEGORIAPROY"],true);
                break;
            }
        case 5:
            {
                $valor=array_search("METEORITO.png",$_SESSION["CATEGORIAPROY"],true);
                break;
            }
        case 6:
            {
                $valor=array_search("PROFUNDIDADES.png",$_SESSION["CATEGORIAPROY"],true);
                break;
            }
        case 7:
            {
                $valor=array_search("PROGRAMACION.png",$_SESSION["CATEGORIAPROY"],true);
                break;
            }
        case 8:
            {
                $valor=array_search("SUBMARINISMO.png",$_SESSION["CATEGORIAPROY"],true);
                break;
            }
        default:
            {
                $valor=0;
                break;
            }
    }
    return $_SESSION["CATEGORIAPROY"][$valor];
}
function extraeDetallesProyectos($stringNombre)
{
    $conexionProyectos=ConexionPHP::getConexionCLIENTES();
    $BD_tabla=ConexionPHP::getBD_TablaInterfazImagenes();
    $consProyectos=$conexionProyectos->query("SELECT NOMBRE,DETALLES FROM $BD_tabla WHERE DESTINO='CATEGORIA PROYECTOS'");
    $resulProyectos=$consProyectos->fetchAll(PDO::FETCH_OBJ);
    $k=0; //Es el puntero que guarda la coleccion de datos extraidos del servidor en referente a NOMBRE y DETALLES
    foreach($resulProyectos as $carProyectos)
    {
        if(isset($carProyectos->NOMBRE))
        {
            $_SESSION["NOMPROY"][$k]=substr($carProyectos->NOMBRE,0,-4);
            $_SESSION["DETPROY"][$k]=$carProyectos->DETALLES;
            $k++;
        }
    }
    $consProyectos->closeCursor();  //Cierra la consulta realiada
    return $_SESSION["DETPROY"][array_search($stringNombre,$_SESSION["NOMPROY"],true)];
}
?>