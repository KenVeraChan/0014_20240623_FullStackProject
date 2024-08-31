<?php
require "../../005_Login/conexionPHP.php";
    ///////////////////////////////////////////
    //CODIGO DE CARGA DE LOS DATOS DE LA BBDD//
    ///////////////////////////////////////////
    $conexion=ConexionPHP::getConexionJEFES_RRHH();
    $BD_tabla=ConexionPHP::getBD_TablaJefesGannt();
    
    ///////////////////////////////////////////    
    ////// CARGA LA FECHA MAS ANTIGUA /////////
    ///////////////////////////////////////////
    $baseInicio=$conexion->query("SELECT MIN(INICIO) AS INICIO FROM ".$BD_tabla);
    //Extrae el minimo de toda una coleccion de fechas por myy grande que sea la tabla
    $registroInicio=$baseInicio->fetchAll(PDO::FETCH_OBJ); 
    foreach($registroInicio as $ganntInicio)
    {
        $fechaInicio=$ganntInicio->INICIO;
    }
    $baseInicio->closeCursor();  //Cierra la conexion y la consulta
    $_SESSION["fechaInicio"]=$fechaInicio;

    ///////////////////////////////////////////
    ////// CARGA LA FECHA MAS RECIENTE ////////
    ///////////////////////////////////////////
    $baseFin=$conexion->query("SELECT MAX(INICIO) AS FIN FROM ".$BD_tabla);
    //Extrae el minimo de toda una coleccion de fechas por myy grande que sea la tabla
    $registroFin=$baseFin->fetchAll(PDO::FETCH_OBJ); 
    foreach($registroFin as $ganntFin)
    {
        $fechaFin=$ganntFin->FIN;
    }
    $baseFin->closeCursor();  //Cierra la conexion y la consulta
    $_SESSION["fechaFin"]=$fechaFin;

    ///////////////////////////////////////////    
    ////// CARGA Y GUARDA TODA LA BBDD ////////
    ///////////////////////////////////////////
    $base=$conexion->query("SELECT * FROM ".$BD_tabla);
    //Extrae el minimo de toda una coleccion de fechas por myy grande que sea la tabla
    $registro=$base->fetchAll(PDO::FETCH_OBJ); 
    $_SESSION["filas"]=$base->rowCount();
    $base->closeCursor();  //Cierra la conexion y la consulta
    $_SESSION["registro"]=$registro;

    ///////////////////////////////////////////////////////////////////////////////////
    //// CARGA LA CANTIDAD DE DÍAS QUE EXISTE ENTRE LA FECHA MAS ANTIGUA Y RECIENTE ///
    ///////////////////////////////////////////////////////////////////////////////////
    $baseIntervalo=$conexion->query("SELECT DATEDIFF((SELECT MAX(INICIO) AS FIN FROM ".$BD_tabla."),(SELECT MIN(INICIO) AS INICIO FROM ".$BD_tabla."))AS RESULTADO;");
    //Extrae el número de días entre la fecha mas reciente y la antigua
    $registroIntervalo=$baseIntervalo->fetchAll(PDO::FETCH_OBJ); 
    foreach($registroIntervalo as $ganntIntervalo)
    {
        $fechaIntervalo=$ganntIntervalo->RESULTADO;
    }
    $baseIntervalo->closeCursor();  //Cierra la conexion y la consulta
    $_SESSION["fechaIntervalo"]=$fechaIntervalo+fechaFinal();

    ////////////////////////////////////////////////////////////////////////////
    ////// COMPARACION FECHA FINAL CON CADA UNA DE LOS INICIOS+DURACION ////////
    ////////////////////////////////////////////////////////////////////////////
    function fechaFinal()  //Necesario $registro: BBDD y $fechaFin: fecha mas reciente para la comparación
    {
        //Se crea el array de almacenamiento de diferencia de dias despues de la fecha final registrada
        $registroFecha=array(); //array de objetos
        $fechaIntervalo=array(); //array de enteros positivos o negativos
        //ZERO GENERAR LA CONEXION
        $conexion=ConexionPHP::getConexionJEFES_RRHH();
        $BD_tabla=ConexionPHP::getBD_TablaJefesGannt();
        
        //PRIMERO CUANTIFICAR HASTA EL ÚLTIMO ID REGISTRADO AUNQUE HAYA SALTOS EN LA TABLA
        $ids=$conexion->query("SELECT MAX(ID) AS MAXIMO FROM ".$BD_tabla);
        //Extrae el minimo de toda una coleccion de fechas por myy grande que sea la tabla
        $registroIDS=$ids->fetchAll(PDO::FETCH_OBJ); 
        foreach($registroIDS as $GIDS)
        {
            $filasBBDD=$GIDS->MAXIMO;
        }
        $ids->closeCursor();  //Cierra la conexion y la consulta

        //SEGUNDO EJECUTAR LA CONSULTA SQL Y GUARDA EN UNA MATRIZ LOS OBJETOS DESCARGADOS
        for($i=1;$i<=$filasBBDD;$i++)
        {
        $baseFecha=$conexion->query("SELECT DATEDIFF(
                                            (SELECT MAX(INICIO) FROM ".$BD_tabla."),
                                            (SELECT ADDDATE(INICIO,INTERVAL (SELECT DURACION FROM ".$BD_tabla." WHERE ID=".$i.") DAY) AS FINALSUMADO FROM ".$BD_tabla." WHERE ID=".$i.")) AS DIFERENCIA, 
                                            INICIO AS FECHAINICIO FROM ".$BD_tabla." WHERE ID=".$i);
        //Extrae el minimo de toda una coleccion de fechas por myy grande que sea la tabla
        $registroFecha[($i-1)]=$baseFecha->fetchAll(PDO::FETCH_OBJ); 
        }
        //TERCERO SACA EN OTRA MATRIZ LOS VALORES REFERENTES A DIFERENCIA Y DESPRECIA IDs NULOS DE LA BBDD
        for($i=0;$i<$filasBBDD;$i++)
        {
            if(isset($registroFecha[$i]))
            {
                foreach($registroFecha[$i] as $ganntFecha)
                {
                    $fechaIntervalo[$i]=$ganntFecha->DIFERENCIA;
                }
            }
            else
            {
                $fechaIntervalo[$i]=0; //Se pone a cero porque falló la descarga y el ISSET
            }
        }
        $_SESSION["UNO"]=$fechaIntervalo;
        //CUARTO DEVUELVE EL VALOR MAS PEQUEÑO DE TODA LA MATRIZ DE ENTEROS
        $fechaFinalGanntTrazado=abs(min($fechaIntervalo));
        $baseFecha->closeCursor();  //Cierra la conexion y la consulta
        return $fechaFinalGanntTrazado;
    }
?>