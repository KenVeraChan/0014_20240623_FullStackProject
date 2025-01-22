<?php
//CODIGO PRINCIPAL DE CARGA DE LAS TAREAS DE LA BBDD TANTO EN TAREAS COMO EN ACTUALIZCIONES CONFIRMADAS
if(isset($_SESSION["semaforoTABLA"]))
{
    if($_SESSION["semaforoTABLA"]==1)
    {
        //DE LA PAGINA DE TAREAS PDIENTES
        include "../../005_Login/conexionPHP.php";
        $conexion=ConexionPHP::getConexionJEFES_RRHH();
        $BD_tabla=ConexionPHP::getBD_TablaJefesTareas();
            //ESTE CODIGO PARA LA CARGA DE LOS DATOS EN LA TABLA DESDE LA BBDD
        $tamPagina=15;
        if(isset($_GET["cargaPagina"]))
            {
                $paginaInicial=($_GET["cargaPagina"])* $tamPagina;
                $_GET["enviar"]=true; //Reactivar por cada accionamiento de boton de paginación
            }
        else
            {
                $paginaInicial=0;
                $_GET["enviar"]=true;
            }
        //EN EL CASO DE LA PRIMERA CARGA DE LA PAGINA WEB Y NO SE INTRODUZCA IDENTIFICADOR
            $base=$conexion->query("SELECT * FROM $BD_tabla LIMIT  $paginaInicial,$tamPagina");
            $registro=$base->fetchAll(PDO::FETCH_OBJ);
            //Contaje de filas para la paginación posterior
            $filasSQL=$conexion->query("SELECT * FROM $BD_tabla")->rowCount();  
            //Contar numero de filas afectadas por la sentencia SQL
    }
    if($_SESSION["semaforoTABLA"]==2)
    {
        //DE LA PAGINA DE TAREAS ACTUALIZADAS
        include "../../005_Login/conexionPHP.php";
        $conexion=ConexionPHP::getConexionJEFES_RRHH();
        $BD_tabla=ConexionPHP::getBD_TablaJefesTareas();
        //ESTE CODIGO PARA LA ACTUALIZACION DE LA CONFIRMACION DE OK EN LAS TAREAS DE LA BBDD
        $id=$_GET["id"];
        //Se guarda el ID de la tarea para actualizar a fin de usarlo en el botón de ACTUALIZAR
        $_SESSION["idTask"]=$id;
        $base=$conexion->query("SELECT * FROM $BD_tabla WHERE ID=$id");
        $registro=$base->fetchAll(PDO::FETCH_OBJ);
    }
}
//ESTE CODIGO PARA VOLVER DESDE LA PAGINA DE TAREAS PENDIENTES
if(isset($_GET["VolverDeTareasPend"]))
{
    unset($_GET["VolverDeTareasPend"]); //Se destruye la variable para que no entre aquí en bucle infinito cuando se cargue la pagina y esto existiera
    header("location:../../007_Menus/0071_MenuOpRRHH/OpRRHH.php");
}
//ESTE CODIGO PARA VOLVER DESDE LA PAGINA DE TAREAS ACTUALIZADAS
if(isset($_POST["VolverDeActualizar"]))
{
    //Al no haber actualizado nada, se considera que no se ha tocado la BBDD
    unset($_GET["VolverDeActualizar"]); //Se destruye la variable para que no entre aquí en bucle infinito cuando se cargue la pagina y esto existiera
    session_start(); //Se inicia sesion para poder habilitar el mensaje del letrero de salida sin modificaciones
    $_SESSION["semaforo"]=2;
    header("location:../../006_Paginacion/0061_PaginacionTareas/tareasPendientes.php");
}
//ESTE CODIGO PARA ACTUALIZAR TODA LA TAREA EN LA BBDD 
if(isset($_POST["actualizar"]))
{
    include "../../005_Login/conexionPHP.php";
    $conexion=ConexionPHP::getConexionJEFES_RRHH();
    $BD_tabla=ConexionPHP::getBD_TablaJefesTareas();
    $resolucion=$_POST["resolucion"];
    session_start();
    $id=$_SESSION["idTask"];
    $base=$conexion->query("UPDATE $BD_tabla SET RESOLUCION='$resolucion' WHERE ID=$id");
    $_SESSION["semaforo"]=1;
    header("location:../../006_Paginacion/0061_PaginacionTareas/tareasPendientes.php");
}
?>