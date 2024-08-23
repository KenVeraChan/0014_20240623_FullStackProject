<?php
if($_SESSION["cediendo"]==1)
{
    //CODIGO DE CARGA DE LOS DATOS DE LA BBDD
    $conexion=ConexionPHP::getConexionJEFES_RRHH();
    $BD_tabla=ConexionPHP::getBD_TablaJefesTareas();
    //RESTO DE CARGAS DE LA PAGINA WEB
    $base=$conexion->query("SELECT * FROM $BD_tabla");
    $registro=$base->fetchAll(PDO::FETCH_OBJ);
    //Contaje de filas para la paginación posterior
    $filasSQL=$conexion->query("SELECT * FROM $BD_tabla")->rowCount();  
    //Contar numero de filas afectadas por la sentencia SQL
    $base->closeCursor();  //Cierra la conexion y la consulta
}
if($_SESSION["cediendo"]==2)
{
    //BUSQUEDAS PARA LA TABLA DE LAS ESTADISTICAS
    $conexion=ConexionPHP::getConexionJEFES_RRHH();
    $BD_tabla=ConexionPHP::getBD_TablaJefesTareas();
    //CREA MATRIZ DE DEPARTAMENTOS PARA FACILITAR LA ENORME CONSULTA
    $departamentos=array("I+D+I","Marketing","Produccion","RRHH","Finanzas","Logistica","Directivo","Administracion","Comercial");    //CONDIGO DE LA CONSULTA GENERADA
    for($i=0;$i<count($departamentos);$i++)
    {
        //NUMERO DE TAREAS//
        $ConsultaDepart=$conexion->query("SELECT COUNT(DEPARTAMENTO) FROM $BD_tabla WHERE DEPARTAMENTO='$departamentos[$i]'");
        $resultado=$ConsultaDepart->fetch(PDO::FETCH_NUM)[0];  //Descarga de datos como si fuera una matriz indexada cuyo valor único deseado el es el 0
        $_SESSION["TAREAS"][$i]=$resultado;

        //INGRESOS POR DEPARTAMENTO//
        $ConsultaIngresos=$conexion->query("SELECT SUM(COSTES) FROM $BD_tabla WHERE DEPARTAMENTO='$departamentos[$i]' AND COSTES>0");
        $resultado=$ConsultaIngresos->fetch(PDO::FETCH_NUM)[0];  //Descarga de datos como si fuera una matriz indexada cuyo valor único deseado el es el 0
        if(isset($resultado))
        {
            $_SESSION["INGRESOS"][$i]=$resultado;
        }
        else
        {
            $_SESSION["INGRESOS"][$i]=0;
        }

        //COSTES POR DEPARTAMENTO//
        $ConsultaCostes=$conexion->query("SELECT SUM(COSTES) FROM $BD_tabla WHERE DEPARTAMENTO='$departamentos[$i]' AND COSTES<0");
        $resultado=$ConsultaCostes->fetch(PDO::FETCH_NUM)[0];  //Descarga de datos como si fuera una matriz indexada cuyo valor único deseado el es el 0
        if(isset($resultado))
        {
            $_SESSION["COSTES"][$i]=$resultado;
        }
        else
        {
            $_SESSION["COSTES"][$i]=0;
        }

        //BENEFICIOS POR DEPARTAMENTO
        $_SESSION["BENEFICIOS"][$i]=$_SESSION["INGRESOS"][$i]-abs($_SESSION["COSTES"][$i]);

        //GANANCIAS POR DEPARTAMENTO
        if($_SESSION["INGRESOS"][$i]!=0)
        {
            $_SESSION["GANANCIAS"][$i]= ($_SESSION["BENEFICIOS"][$i]/$_SESSION["INGRESOS"][$i])*100;
        }
        else
        {
            $_SESSION["GANANCIAS"][$i]=0;
        }
    }
    $ConsultaDepart->closeCursor(); //Cierra la conexion y consulta TAREAS
    $ConsultaIngresos->closeCursor(); //Cierra la conexion y consulta INGRESOS
    $ConsultaCostes->closeCursor(); //Cierra la conexion y consulta COSTES

}
?>