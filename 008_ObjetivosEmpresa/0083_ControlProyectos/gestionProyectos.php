<?php
require "../../005_Login/conexionPHP.php";
    //CODIGO DE CARGA DE LOS DATOS DE LA BBDD
    $conexion=ConexionPHP::getConexionJEFES_RRHH();
    $BD_tabla=ConexionPHP::getBD_TablaJefesGannt();
    //CARGA LA FECHA MAS ANTIGUA
    $baseInicio=$conexion->query("SELECT MIN(INICIO) AS INICIO FROM ".$BD_tabla);
    //Extrae el minimo de toda una coleccion de fechas por myy grande que sea la tabla
    $registroInicio=$baseInicio->fetchAll(PDO::FETCH_OBJ); 
    foreach($registroInicio as $ganntInicio)
    {
        $fechaInicio=$ganntInicio->INICIO;
    }
    $baseInicio->closeCursor();  //Cierra la conexion y la consulta
    $_SESSION["fechaInicio"]=$fechaInicio;

    //CARGA LA FECHA MAS RECIENTE
    $baseFin=$conexion->query("SELECT MAX(INICIO) AS FIN FROM ".$BD_tabla);
    //Extrae el minimo de toda una coleccion de fechas por myy grande que sea la tabla
    $registroFin=$baseFin->fetchAll(PDO::FETCH_OBJ); 
    foreach($registroFin as $ganntFin)
    {
        $fechaFin=$ganntFin->FIN;
    }
    $baseFin->closeCursor();  //Cierra la conexion y la consulta
    $_SESSION["fechaFin"]=$fechaFin;


    $_SESSION["registro"]=$registro;
?>