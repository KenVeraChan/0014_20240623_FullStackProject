<?php
if($_SESSION["cediendo"]==1)
{
    //CODIGO DE CARGA DE LOS DATOS DE LA BBDD
    require "../../005_Login/conexionPHP.php";
    $conexion=ConexionPHP::getConexionJEFES_RRHH();
    $BD_tabla=ConexionPHP::getBD_TablaJefesTareas();
    
    //RESTO DE CARGAS DE LA PAGINA WEB
    $base=$conexion->query("SELECT * FROM $BD_tabla");
    $registro=$base->fetchAll(PDO::FETCH_OBJ);
    //Contaje de filas para la paginación posterior
    $filasSQL=$conexion->query("SELECT * FROM $BD_tabla")->rowCount();  
    //Contar numero de filas afectadas por la sentencia SQL
}



?>