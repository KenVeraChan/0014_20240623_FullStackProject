<?php
    if($_SESSION["semaforo"]==1)
    {
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
    if($_SESSION["semaforo"]==2)
    {
        include "../../005_Login/conexionPHP.php";
        $conexion=ConexionPHP::getConexionJEFES_RRHH();
        $BD_tabla=ConexionPHP::getBD_TablaJefesTareas();
        //ESTE CODIGO PARA LA ACTUALIZACION DE LA CONFIRMACION DE OK EN LAS TAREAS DE LA BBDD
        $id=$_GET["id"];
        $base=$conexion->query("SELECT * FROM $BD_tabla WHERE ID=$id");
        $registro=$base->fetchAll(PDO::FETCH_OBJ);
    }
    if($_SESSION["semaforo"]==3)
    {
        //ESTE CODIGO PARA ACTUALIZAR TODA LA TAREA EN LA BBDD 
        if(isset($_POST["actualizar"]))
        {
            $resolucion=$_POST["resolucion"];
            $base=$conexion->query("UPDATE $BD_tabla SET RESOLUCION='$resolucion' WHERE ID=$id");
        }
    }
?>