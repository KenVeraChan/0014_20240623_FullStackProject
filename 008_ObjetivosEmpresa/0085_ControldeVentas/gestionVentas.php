<?php
require "../../005_Login/conexionPHP.php";

if(isset($_GET["inserccion"]))
{
    //CODIGO DE CARGA DE LOS DATOS DE LA BBDD
    $conexion=ConexionPHP::getConexionJEFES_RRHH();
    $BD_tabla=ConexionPHP::getBD_TablaJefesTareas();
    //VARIABLES DEL FORMULARIO
    $tarea=$_GET["nombreTarea"];
    $departamento=$_GET["departamento"];
    $tecnicos=$_GET["tecnicos"];
    $costes=$_GET["costes"];  
    $fecha=$_GET["fecha"];  
    $resolucion=$_GET["resolucion"]; 
    
    $sql="INSERT INTO ".$BD_tabla."(TAREA,DEPARTAMENTO,TECNICOS,COSTES,FECHA,RESOLUCION) VALUES('$tarea','$departamento','$tecnicos','$costes','$fecha','$resolucion')";
    $base=$conexion->query($sql);
    $base->closeCursor();  //Cierra la conexion y la consulta
    session_start();
    $_SESSION["semaforo"]=1; //Para la generacion del letrero de subida OKEY
    header("Location:../0085_ControldeVentas/controlVentas.php");
}
function inspecionPedidos()
{
    //CODIGO DE CARGA DE LOS DATOS DE LA BBDD
    $conexion=ConexionPHP::getConexionCLIENTES();
    $BD_tabla=ConexionPHP::getBD_TablaClientes();
    //RESTO DE CARGAS DE LA PAGINA WEB
    $base=$conexion->query("SELECT * FROM $BD_tabla");
    $registroVentas=$base->fetchAll(PDO::FETCH_OBJ);
    $base->closeCursor();  //Cierra la conexion y la consulta
    $_SESSION["candidatos"]=$registroVentas;
}

//GESTION DE CANDIDATOS ACEPTADOS O DENEGADOS A PLANTILLA
if(isset($_GET["id"]))  //PRIMERO COMPRUEBA QUE SE LE HA DADO AL ACCIONAMIENTO DEL BOTON CUYO VALOR INTERNO LO LLEVA EL ID
{
    //CODIGO DE CARGA DE LOS DATOS DE LA BBDD
    $conexion=ConexionPHP::getConexionCLIENTES();
    $BD_tabla=ConexionPHP::getBD_TablaClientes();
    //VARIABLE UNICA DE LA CONSULTA ES EL ID
    if($_GET["validez"]==1)
    {
        $sql="UPDATE ".$BD_tabla." SET ENTREGADO='ENTREGADO' WHERE ID=".$_GET["id"];
        $base=$conexion->query($sql);
        $base->closeCursor();  //Cierra la conexion y la consulta
        session_start();
        $_SESSION["semaforo"]=2; //Para la generacion del letrero de CANDIDATO ACEPTADO
    }
    if($_GET["validez"]==0)
    {
        $sql="UPDATE ".$BD_tabla." SET ENTREGADO='CANCELADO' WHERE ID=".$_GET["id"];
        $base=$conexion->query($sql);
        $base->closeCursor();  //Cierra la conexion y la consulta
        session_start();
        $_SESSION["semaforo"]=3; //Para la generacion del letrero de CANDIDATO DENEGADO
    }
    header("Location:../0085_ControldeVentas/controlVentas.php");
}
?>