<?php
require "../../005_Login/conexionPHP.php";
function cargandoTareas()
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
    $_SESSION["registro"]=$registro;

    //BUSQUEDAS PARA LA TABLA DE LAS ESTADISTICAS
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
    header("Location:../0082_CreacionObjetivos/creacionTareas.php");
}

function inspecionCandidatos()
{
    //CODIGO DE CARGA DE LOS DATOS DE LA BBDD
    $conexion=ConexionPHP::getConexionEMPLEADOS();
    $BD_tabla=ConexionPHP::getBD_TablaEmpleados();
    //RESTO DE CARGAS DE LA PAGINA WEB
    $base=$conexion->query("SELECT * FROM $BD_tabla");
    $registroCandidatos=$base->fetchAll(PDO::FETCH_OBJ);
    $base->closeCursor();  //Cierra la conexion y la consulta
    $_SESSION["candidatos"]=$registroCandidatos;
}

//GESTION DE CANDIDATOS ACEPTADOS O DENEGADOS A PLANTILLA
if(isset($_GET["id"]))  //PRIMERO COMPRUEBA QUE SE LE HA DADO AL ACCIONAMIENTO DEL BOTON CUYO VALOR INTERNO LO LLEVA EL ID
{
    //CODIGO DE CARGA DE LOS DATOS DE LA BBDD
    $conexion=ConexionPHP::getConexionEMPLEADOS();
    $BD_tabla=ConexionPHP::getBD_TablaEmpleados();
    //VARIABLE UNICA DE LA CONSULTA ES EL ID
    if($_GET["validez"]==1)
    {
        $sql="UPDATE ".$BD_tabla." SET CONTRATACION='APROBADA' WHERE ID=".$_GET["id"];
        $base=$conexion->query($sql);
        $base->closeCursor();  //Cierra la conexion y la consulta
        session_start();
        $_SESSION["semaforo"]=2; //Para la generacion del letrero de CANDIDATO ACEPTADO
    }
    if($_GET["validez"]==0)
    {
        $sql="UPDATE ".$BD_tabla." SET CONTRATACION='DENEGADA' WHERE ID=".$_GET["id"];
        $base=$conexion->query($sql);
        $base->closeCursor();  //Cierra la conexion y la consulta
        session_start();
        $_SESSION["semaforo"]=3; //Para la generacion del letrero de CANDIDATO DENEGADO
    }
    header("Location:../0082_CreacionObjetivos/creacionTareas.php");
}
?>