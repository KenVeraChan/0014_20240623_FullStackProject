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
    session_start();
    //CODIGO DE CARGA DE LOS DATOS DE LA BBDD
    $conexion=ConexionPHP::getConexionEMPLEADOS();
    $BD_tabla=ConexionPHP::getBD_TablaEmpleados();
    $idCandidato=$_GET["id"];   //Se guarda en una variable para su uso posterior
    //VARIABLE UNICA DE LA CONSULTA ES EL ID
    if($_GET["validez"]==1)
    {
        //CODIGO DE LA DESCARGA DE LA INFORMACIÓN DEL CANDIDATO ADMITIDO
        $descargaCandidatos=$conexion->query("SELECT * FROM $BD_tabla WHERE ID='$idCandidato'"); //SELECCIONA SLIDER O NOVEDADES UNICAMENTE
        $resultado=$descargaCandidatos->fetchAll(PDO::FETCH_OBJ);
        //Cierra la conexion
        $descargaCandidatos->closeCursor();
        //GUARDA LOS DATOS DEL CANDIDATO PARA UNIRLOS A SI ES JEFE, RRHH O EMPLEADO JUNTO CON SU ROL
        $_SESSION["CANDIDATOADMITIDO"]=$resultado;
        //AHORA HAY QUE IR A LA PAGINA DE DECISIÓN DE ASIGNACIÓN DE DEPARTAMENTO: EMPLEADO, RR.HH. O JEFES
            header("Location:../0082_CreacionObjetivos/0082_01_AsignacionDepartamental/asignandoDepartamentos.php");
            //Y luego se vuelve al menu de apartados de asignacion de candidatos
    }
    if($_GET["validez"]==0)
    {
        $sql="UPDATE ".$BD_tabla." SET CONTRATACION='DENEGADA' WHERE ID=".$_GET["id"];
        $base=$conexion->query($sql);
        $base->closeCursor();  //Cierra la conexion y la consulta
        $_SESSION["semaforo"]=3; //Para la generacion del letrero de CANDIDATO DENEGADO
        header("Location:../0082_CreacionObjetivos/creacionTareas.php");
    }
}
//SI SE ACCIONA EL REGISTRO DEL ROL DE JEFES
if(isset($_POST["confirmaJEFES"]))
{
    //COMPRUEBA QUE NO ESTEN VACÍAS LAS VARIABLES ROL Y CONSTRASENIA ASIGNADAS
    if(!empty($_POST["rolJEFES"]) && !empty($_POST["contraseniaAsignada"]))
    {
        session_start();
        //RECOGE LAS VARIABLES DEL SERVIDOR EN VARIABLES NORMALES
            $ROL="JEFE";
            $DEPARTAMENTO=$_POST["rolJEFES"];
            $PASSWORD= $_POST["contraseniaAsignada"];
        //DESCARGA DE LA INFORMACION QUE SE HABÍA GUARDADO ANTES DEL CANDIDATO ADMITIDO
            $admisionCandidato= $_SESSION["CANDIDATOADMITIDO"];
            foreach($admisionCandidato as $informacion)
            {
                $ID=$informacion->ID;
                $NOMBRE=$informacion->NOMBRE;
            }
        //CODIGO DE ADICIÓN DE UN EMPLEADO COMO RRHH
            $conexion=ConexionPHP::getConexionJEFES_RRHH();
            $BD_tabla=ConexionPHP::getBD_TablaJefes();
        //RESTO DE CARGAS DE LA PAGINA WEB
            $base=$conexion->query("INSERT INTO $BD_tabla (USUARIO,CONTRASENIA,ROL,DEPARTAMENTO)VALUES('$NOMBRE','$PASSWORD','$ROL','$DEPARTAMENTO')");
            $base->closeCursor();  //Cierra la conexion y la consulta
        //Y SE APRUEBA LA CANDIDATURA DEL USUARIO SOLICITANTE Y LUEGO SE PROCEDERÁ A SU ASIGNACIÓN LABORAL
            //CODIGO DE CARGA DE LOS DATOS DE LA BBDD
            $conexion=ConexionPHP::getConexionEMPLEADOS();
            $BD_tabla=ConexionPHP::getBD_TablaEmpleados();
            $base=$conexion->query("UPDATE $BD_tabla SET CONTRATACION='APROBADA' WHERE ID='$ID'");
            $base->closeCursor();  //Cierra la conexion y la consulta
        $_SESSION["semaforo"]=4; //Para la generacion del letrero de CANDIDATO ADMITIDO COMO JEFE
        header("Location:../0082_CreacionObjetivos/creacionTareas.php");
    }
    else
    {
        session_start();
        $_SESSION["semaforo"]=1;  //NO HAY ROL ASIGNADO EN SECTOR JEFES
        header("Location:../../008_ObjetivosEmpresa/0082_CreacionObjetivos/0082_01_AsignacionDepartamental/asignandoDepartamentos.php");
    }
}
//SI SE ACCIONA EL REGISTRO DEL ROL DE RRHH
if(isset($_POST["confirmaRRHH"]))
{
    //COMPRUEBA QUE NO ESTEN VACÍAS LAS VARIABLES ROL Y CONSTRASENIA ASIGNADAS
    if(!empty($_POST["rolRRHH"]) && !empty($_POST["contraseniaAsignada"]))
    {
        session_start();
        //RECOGE LAS VARIABLES DEL SERVIDOR EN VARIABLES NORMALES
            $ROL="RRHH";
            $DEPARTAMENTO=$_POST["rolRRHH"];
            $PASSWORD= $_POST["contraseniaAsignada"];
        //DESCARGA DE LA INFORMACION QUE SE HABÍA GUARDADO ANTES DEL CANDIDATO ADMITIDO
            $admisionCandidato= $_SESSION["CANDIDATOADMITIDO"];
            foreach($admisionCandidato as $informacion)
            {
                $ID=$informacion->ID;
                $NOMBRE=$informacion->NOMBRE;
            }
        //CODIGO DE ADICIÓN DE UN EMPLEADO COMO RRHH
            $conexion=ConexionPHP::getConexionJEFES_RRHH();
            $BD_tabla=ConexionPHP::getBD_TablaJefes();
        //RESTO DE CARGAS DE LA PAGINA WEB
            $base=$conexion->query("INSERT INTO $BD_tabla (USUARIO,CONTRASENIA,ROL,DEPARTAMENTO)VALUES('$NOMBRE','$PASSWORD','$ROL','$DEPARTAMENTO')");
            $base->closeCursor();  //Cierra la conexion y la consulta
        //Y SE APRUEBA LA CANDIDATURA DEL USUARIO SOLICITANTE Y LUEGO SE PROCEDERÁ A SU ASIGNACIÓN LABORAL
            //CODIGO DE CARGA DE LOS DATOS DE LA BBDD
            $conexion=ConexionPHP::getConexionEMPLEADOS();
            $BD_tabla=ConexionPHP::getBD_TablaEmpleados();    
            $base=$conexion->query("UPDATE $BD_tabla SET CONTRATACION='APROBADA' WHERE ID='$ID'");
            $base->closeCursor();  //Cierra la conexion y la consulta
        $_SESSION["semaforo"]=5; //Para la generacion del letrero de CANDIDATO DENEGADO
        header("Location:../0082_CreacionObjetivos/creacionTareas.php");    }
    else
    {
        session_start();
        $_SESSION["semaforo"]=2;  //NO HAY ROL ASIGNADO EN SECTOR RRHH
        header("Location:../../008_ObjetivosEmpresa/0082_CreacionObjetivos/0082_01_AsignacionDepartamental/asignandoDepartamentos.php");
    }
}
//SI SE ACCIONA EL REGISTRO DEL ROL DE EMPLEADOS
if(isset($_POST["confirmaEMPLEADOS"]))
{
    //COMPRUEBA QUE NO ESTEN VACÍAS LAS VARIABLES ROL Y CONSTRASENIA ASIGNADAS
    if(!empty($_POST["rolEMPLEADOS"]) && !empty($_POST["contraseniaAsignada"]))
    {
        session_start();
        //RECOGE LAS VARIABLES DEL SERVIDOR EN VARIABLES NORMALES
            $ROL="EMPLEADO";
            $CONTRATO=$_POST["rolEMPLEADOS"];
            $PASSWORD= $_POST["contraseniaAsignada"];
                //SACA LA FECHA ACTUAL DE HOY
                $HOY = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
            $FECHAALTA = date("Y-m-d H:i:s",$HOY);
        //DESCARGA DE LA INFORMACION QUE SE HABÍA GUARDADO ANTES DEL CANDIDATO ADMITIDO
            $admisionCandidato=  $_SESSION["CANDIDATOADMITIDO"];
            foreach($admisionCandidato as $informacion)
            {
                $ID=$informacion->ID;
                $NOMBRE=$informacion->NOMBRE;
                $APELLIDOS=$informacion->APELLIDOS;
                $DIRECCION=$informacion->DIRECCION;
                $OFICIO_ANTERIOR=$informacion->PROFESION;
            }
        //CODIGO DE ADICIÓN DE UN EMPLEADO COMO RRHH
            $conexion=ConexionPHP::getConexionEMPLEADOS();
            $BD_tabla=ConexionPHP::getBD_TablaEmpleadosActuales();
        //RESTO DE CARGAS DE LA PAGINA WEB
            $base=$conexion->query("INSERT INTO $BD_tabla (NOMBRE,APELLIDOS,DIRECCION,OFICIO_ANTERIOR,FECHA_ASIGNACION,ROL,CONTRATO,CONTRASENIA)VALUES('$NOMBRE','$APELLIDOS','$DIRECCION','$OFICIO_ANTERIOR','$FECHAALTA','$ROL','$CONTRATO','$PASSWORD')");
            $base->closeCursor();  //Cierra la conexion y la consulta
        //Y SE APRUEBA LA CANDIDATURA DEL USUARIO SOLICITANTE Y LUEGO SE PROCEDERÁ A SU ASIGNACIÓN LABORAL
            //CODIGO DE CARGA DE LOS DATOS DE LA BBDD
            $conexion=ConexionPHP::getConexionEMPLEADOS();
            $BD_tabla=ConexionPHP::getBD_TablaEmpleados();    
            $base=$conexion->query("UPDATE $BD_tabla SET CONTRATACION='APROBADA' WHERE ID='$ID'");
            $base->closeCursor();  //Cierra la conexion y la consulta
        $_SESSION["semaforo"]=6; //Para la generacion del letrero de CANDIDATO ADMITIDO COMO EMPLEADO
        header("Location:../0082_CreacionObjetivos/creacionTareas.php");
    }
    else
    {
        session_start();
        $_SESSION["semaforo"]=3;  //NO HAY CONTRATO ASIGNADO EN SECTOR EMPLEADOS
        header("Location:../../008_ObjetivosEmpresa/0082_CreacionObjetivos/0082_01_AsignacionDepartamental/asignandoDepartamentos.php");
    }
}
?>
