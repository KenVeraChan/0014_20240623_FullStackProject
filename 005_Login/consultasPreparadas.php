<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas Preparadas</title>
</head>
<body>
<?php
include("conexionPHP.php");
//Se incluye el fichero de creación de un objeto para  guardar
// el dato CARGADO y compararlo con el ACTUALIZADO
include("actualizacionMetodosPHP.php");
try{   
    //METODO 2: EMPLEANDO EN TODO ESTE FICHERO --> DE MYSQLI PARA LAS CONSULTAS PREPARADAS
    //CREANDO VARIABLES RECIBIDAS DE LOS BOTONES DE ACCION
    $busqueda=$_GET["busqueda"];
    $inserccion=$_GET["inserccion"];
    $actualizacion=$_GET["actualizacion"];
    $carga=$_GET["carga"];
    $borrar=$_GET["borrado"];
    $eliminacion=$_GET["eliminacion"];
    $carga_elim=$_GET["carga_eliminacion"];
    $borrar_elim=$_GET["borrado_eliminacion"];
    //CREANDO VARIABLES RECIBIDAS DEL FORMULARIO
    $id=$_GET["id"];
    $nom=$_GET["nom"];
    $ape=$_GET["ape"];
    $dir=$_GET["dir"];
    $pob=$_GET["pob"];
    $prof=$_GET["prof"];
    $aho=$_GET["aho"];
    //SE CREA UN ARRAY UNIDIMENSIONAL DE VALORES PARA FACILITAR EL CODIGO
    $datos_FORM=array($id,$nom,$ape,$dir,$pob,$prof,$aho);
    $datos_CONSULTA=array("ID","NOMBRE","APELLIDOS","DIRECCION","POBLACION","PROFESION","AHORROS");
    $datos_CONSULTA_DINERO=array(0,1000,25000,50000,75000,100000,125000,20000000);
    $datos_COMPARACION=array(0,"","","","","",0);  //Array para la fase de ACTUALIZAR
    $datos_ACTUALIZACION=array(0,"","","","","",0);  //Array para la fase de ACTUALIZAR
    //CONEXION PROCESO
    $conexion=mysqli_connect($BD_servidor,$BD_usuario,$BD_contrasenia);
    mysqli_set_charset($conexion,"utf8");
    try{
        mysqli_select_db($conexion,$BD_nombre);
            ///COMPROBACION DE BUSQUEDA///
            if(!strcmp($busqueda,"BUSCAR") & strcmp($inserccion,"INSERTAR") & strcmp($actualizacion,"ACTUALIZAR") & strcmp($eliminacion,"ELIMINAR"))
            {
                $semaforo=0;   //señal de qué selector esta implicado tras los CONDICIONALES
                $puntero=0;    //señal para la seleccion del tipo de AHORRO en el desplegable
                $contador=0;
                session_start();  //INICIAR LA SESION SIEMPRE//
                //INICIALIZACION DE VARIABLE ARRAY
                    for ($i=0;$i<100;$i++)
                    {
                    for($j=0;$j<7;$j++)
                        {
                            if(isset($_SESSION["matrizEmpleados"][$i][$j]))
                            {
                                //Se igualan a NULL porque si fuera un espacio en blanco crearía fila vacía
                                $_SESSION["matrizEmpleados"][$i][$j]=null;
                            }
                        }
                        $j=0; //Reinicio de la variable siguiente fila
                    }
                ///FASE DE COMPROBACION///
                for($semaforo=0;$semaforo<count($datos_FORM);$semaforo++)
                {
                    if(!is_null($datos_FORM[$semaforo]) && $semaforo!=10)
                    {
                        if($semaforo==6)
                        {
                            if(!strcmp($datos_FORM[$semaforo],"Menos de 1.000"))
                            {
                                $puntero=0;
                            }
                            if(!strcmp($datos_FORM[$semaforo],"De 1.000 a 25.000"))
                            {
                                $puntero=1;
                            }
                            if(!strcmp($datos_FORM[$semaforo],"De 25.000 a 50.000"))
                            {
                                $puntero=2;
                            }
                            if(!strcmp($datos_FORM[$semaforo],"De 50.000 a 75.000"))
                            {
                                $puntero=3;
                            }
                            if(!strcmp($datos_FORM[$semaforo],"De 75.000 a 100.000"))
                            {
                                $puntero=4;
                            }
                            if(!strcmp($datos_FORM[$semaforo],"De 100.000 a 125.000"))
                            {
                                $puntero=5;
                            }
                            if(!strcmp($datos_FORM[$semaforo],"Mas de 125.000"))
                            {
                                $puntero=6;
                            }
                                $sql="SELECT 
                                    $datos_CONSULTA[0],
                                    $datos_CONSULTA[1],
                                    $datos_CONSULTA[2],
                                    $datos_CONSULTA[3],
                                    $datos_CONSULTA[4],
                                    $datos_CONSULTA[5],
                                    $datos_CONSULTA[6]
                                FROM $BD_tabla 
                                WHERE $datos_CONSULTA[$semaforo]>? AND $datos_CONSULTA[$semaforo]<?";
                                $resultado=mysqli_prepare($conexion,$sql);
                                $okey=mysqli_stmt_bind_param($resultado,"ii",$datos_CONSULTA_DINERO[0+$puntero],$datos_CONSULTA_DINERO[1+$puntero]);
                                $okey=mysqli_stmt_execute($resultado);
                                if($okey==false)
                                {
                                    echo "Error al ejecutar la consulta";
                                }else{
                                $okey=mysqli_stmt_bind_result($resultado,$conID,$conNombre,$conApellidos,$conDireccion,$conPoblacion,$conProfesion,$conAhorros);
                                    while(mysqli_stmt_fetch($resultado))
                                    {
                                        $_SESSION["matrizEmpleados"][$contador][0]=$conID;
                                        $_SESSION["matrizEmpleados"][$contador][1]=$conNombre;
                                        $_SESSION["matrizEmpleados"][$contador][2]=$conApellidos;
                                        $_SESSION["matrizEmpleados"][$contador][3]=$conDireccion;
                                        $_SESSION["matrizEmpleados"][$contador][4]=$conPoblacion;
                                        $_SESSION["matrizEmpleados"][$contador][5]=$conProfesion;
                                        $_SESSION["matrizEmpleados"][$contador][6]=$conAhorros;
                                        $contador=$contador+1;
                                    }
                                mysqli_stmt_close($resultado); 
                                }
                            $semaforo=10;
                        }
                        else
                        {
                          //CON EL RESTO DE OPCIONES NO COMPARATIVAS
                            $sql="SELECT 
                                    $datos_CONSULTA[0],
                                    $datos_CONSULTA[1],
                                    $datos_CONSULTA[2],
                                    $datos_CONSULTA[3],
                                    $datos_CONSULTA[4],
                                    $datos_CONSULTA[5],
                                    $datos_CONSULTA[6]
                                FROM $BD_tabla 
                                WHERE $datos_CONSULTA[$semaforo]=?";
                            //----- PASO 2 -----//
                            //Preparación de la consulta con la función mysqli_prepare(), //
                            //la cual requiere de dos argumentos: El objeto de conexión y la sentencia SQ //
                            $resultado=mysqli_prepare($conexion,$sql);
                            //----- PASO 3 -----//
                            //Unir los parámetros a la sentencia sql. La función mysqli_param() lo hace //
                            $okey=mysqli_stmt_bind_param($resultado,"s",$datos_FORM[$semaforo]);
                            //----- PASO 4 -----//
                            //Ejecutar la consulta con la función mysqli_stmt_execute()//
                            $okey=mysqli_stmt_execute($resultado);
                            if($okey==false)
                            {
                                echo "Error al ejecutar la consulta";
                            }
                            else
                            {
                                $okey=mysqli_stmt_bind_result($resultado,$conID,$conNombre,$conApellidos,$conDireccion,$conPoblacion,$conProfesion,$conAhorros);
                                    while(mysqli_stmt_fetch($resultado))
                                    {
                                        $_SESSION["matrizEmpleados"][$contador][0]=$conID;
                                        $_SESSION["matrizEmpleados"][$contador][1]=$conNombre;
                                        $_SESSION["matrizEmpleados"][$contador][2]=$conApellidos;
                                        $_SESSION["matrizEmpleados"][$contador][3]=$conDireccion;
                                        $_SESSION["matrizEmpleados"][$contador][4]=$conPoblacion;
                                        $_SESSION["matrizEmpleados"][$contador][5]=$conProfesion;
                                        $_SESSION["matrizEmpleados"][$contador][6]=$conAhorros;
                                        $contador=$contador+1;
                                    }
                                mysqli_stmt_close($resultado); 
                            }
                            $semaforo=10;  //SE CIERRA EL PASO PARA QUE ENTRE AQUI DE NUEVO
                        }
                        $_SESSION["semaforo"]=1;
                        header("location:../001_Busqueda/busquedaPHP-TABLAFIND.php");
                    }
                }
            }
            ///COMPROBACIÓN DE INSERCCION/// 
            if(strcmp($busqueda,"BUSCAR") & !strcmp($inserccion,"INSERTAR") & strcmp($actualizacion,"ACTUALIZAR") & strcmp($eliminacion,"ELIMINAR"))
            {
                $sql="INSERT INTO CONTACTOS_EMPRESA(ID,NOMBRE,APELLIDOS,DIRECCION,POBLACION,PROFESION,AHORROS) VALUES(?,?,?,?,?,?,?)";
                $resultado=mysqli_prepare($conexion,$sql);
                $okey=mysqli_stmt_bind_param($resultado,"isssssi",$id,$nom,$ape,$dir, $pob, $prof,$aho);
                $okey=mysqli_stmt_execute($resultado);
                if($okey==false)
                {
                    echo "Error al ejecutar la consulta";
                }
                else
                {
                session_start();  //INICIAR LA SESION SIEMPRE//
                $_SESSION["semaforo"]=2;
                header("location:../002_Inserccion/inserccionPHP.php");
                mysqli_stmt_close($resultado); 
                }
            }
            ///COMPROBACIÓN DE ACTUALIZACION/// 
            if(strcmp($busqueda,"BUSCAR") & strcmp($inserccion,"INSERTAR") & (!strcmp($actualizacion,"ACTUALIZAR") || !strcmp($carga,"CARGAR")|| !strcmp($borrar,"BORRAR")) & strcmp($eliminacion,"ELIMINAR"))
            {
                if(!strcmp($carga,"CARGAR"))
                {
                    //SI SE QUIEREN CARGAR LOS DATOS POR EL ID BUSCADO SE MOSTRARAN EN LA TABLA
                    //SE INVOCA UNA VARIABLE DE TIPO GLOBAL PARA RECIBIR LO QUE SE QUIERE CARGAR CON EL ID
                    //----- PASO 1 -----//
                    //Creacion de la consulta //
                    $sql="SELECT * FROM $BD_tabla WHERE $datos_CONSULTA[0]=?";
                    //----- PASO 2 -----//
                    //Preparación de la consulta con la función mysqli_prepare(), //
                    //la cual requiere de dos argumentos: El objeto de conexión y la sentencia SQ //
                    $resultado=mysqli_prepare($conexion,$sql);

                    //----- PASO 3 -----//
                    //Unir los parámetros a la sentencia sql. La función mysqli_param() lo hace //
                    $okey=mysqli_stmt_bind_param($resultado,"i",$id);

                    //----- PASO 4 -----//
                    //Ejecutar la consulta con la función mysqli_stmt_execute()//
                    $okey=mysqli_stmt_execute($resultado);
                    if($okey==false)
                    {
                        echo "Error al ejecutar la consulta";
                    }
                    else
                    {
                        //----- PASO 5 -----//
                        // Asociar variables al resultado de la consulta. //
                        //Esto se consigue con la función mysqli_stmt_bind_result() //
                        $okey=mysqli_stmt_bind_result($resultado,$conID,$conNombre,$conApellidos,$conDireccion,$conPoblacion,$conProfesion,$conAhorros);                    
                        //----- PASO 6 -----//
                        //Leer los valores. Para ello se utilizará la función mysqli_stmt_fetch //
                        session_start();  //INICIAR LA SESION SIEMPRE//
                        while(mysqli_stmt_fetch($resultado))
                            {
                                $_SESSION["id"]=$conID;
                                $_SESSION["nombre"]=$conNombre;
                                $_SESSION["apellidos"]=$conApellidos;
                                $_SESSION["direccion"]=$conDireccion;
                                $_SESSION["poblacion"]=$conPoblacion;
                                $_SESSION["profesion"]=$conProfesion;
                                $_SESSION["ahorros"]=$conAhorros;
                            }
                        if(is_null($conID))
                        {
                            //Si comprueba que mysqli_stmt_fetch en SQL da NULL ejecuta esto
                            //TRAS BORRAR LOS DATOS SE BORRAN LAS CASILLAS
                            //Si es NULL se guarda un 2
                            $_SESSION["semaforo"]=2;    
                        }
                        else
                        {
                            //Si no es NULL se guarda un 1
                            $_SESSION["semaforo"]=1; 
                            //Y se guarda en la matriz de comparacion para la posterior actualizacion
                            $datos_COMPARACION[0]=$_SESSION["id"];
                            $datos_COMPARACION[1]=$_SESSION["nombre"];
                            $datos_COMPARACION[2]=$_SESSION["apellidos"];
                            $datos_COMPARACION[3]=$_SESSION["direccion"];
                            $datos_COMPARACION[4]=$_SESSION["poblacion"];
                            $datos_COMPARACION[5]=$_SESSION["profesion"];
                            $datos_COMPARACION[6]=$_SESSION["ahorros"];
                        }
                        header("location:../003_Actualizacion/actualizacionPHP.php");
                        mysqli_stmt_close($resultado); 
                    }
                }
                if(!strcmp($borrar,"BORRAR"))
                {
                    session_start();  //INICIAR LA SESION SIEMPRE//
                    //TRAS BORRAR LOS DATOS SE BORRAN LAS CASILLAS
                    $_SESSION["id"]="";
                    $_SESSION["nombre"]="";
                    $_SESSION["apellidos"]="";
                    $_SESSION["direccion"]="";
                    $_SESSION["poblacion"]="";
                    $_SESSION["profesion"]="";
                    $_SESSION["ahorros"]="";
                    $_SESSION["semaforo"]=2;
                    header("location:../003_Actualizacion/actualizacionPHP.php");
                    mysqli_stmt_close($resultado); 
                }
                if(!strcmp($actualizacion,"ACTUALIZAR"))
                {
                    //DADO QUE LA OTRA MATRIZ YA SE HA COMPLETADO, SE PROCEDE CON ESTA OTRA MATRIZ
                    //SE RELLENA EL ARRAY DE LOS DATOS RECIBIDOR POR EL FORMULARIO PARA ACTUALIZAR
                        $datos_ACTUALIZACION[0]=$id;
                        $datos_ACTUALIZACION[1]=$nom;
                        $datos_ACTUALIZACION[2]=$ape;
                        $datos_ACTUALIZACION[3]=$dir;
                        $datos_ACTUALIZACION[4]=$pob;
                        $datos_ACTUALIZACION[5]=$prof;
                        $datos_ACTUALIZACION[6]=$aho;
                    session_start();  //INICIAR LA SESION SIEMPRE//
                    $_SESSION["semaforo"]=3; //Activada señal para la ACTUALIZACIÓN
                    header("location:../003_Actualizacion/actualizacionPHP.php");
                    mysqli_stmt_close($resultado); 
                }
            }
            ///COMPROBACIÓN DE ELIMINACION/// 
            if(strcmp($busqueda,"BUSCAR") & strcmp($inserccion,"INSERTAR") & strcmp($actualizacion,"ACTUALIZAR") & (!strcmp($eliminacion,"ELIMINAR") || !strcmp($carga_elim,"CARGA") || !strcmp($borrar_elim,"BORRA")))
            {
                if(!strcmp($carga_elim,"CARGA"))
                {
                    //SI SE QUIEREN CARGAR LOS DATOS POR EL ID BUSCADO SE MOSTRARAN EN LA TABLA
                    //SE INVOCA UNA VARIABLE DE TIPO GLOBAL PARA RECIBIR LO QUE SE QUIERE CARGAR CON EL ID
                    //----- PASO 1 -----//
                    //Creacion de la consulta //
                    $sql="SELECT * FROM $BD_tabla WHERE $datos_CONSULTA[0]=?";
                    //----- PASO 2 -----//
                    //Preparación de la consulta con la función mysqli_prepare(), //
                    //la cual requiere de dos argumentos: El objeto de conexión y la sentencia SQ //
                    $resultado=mysqli_prepare($conexion,$sql);

                    //----- PASO 3 -----//
                    //Unir los parámetros a la sentencia sql. La función mysqli_param() lo hace //
                    $okey=mysqli_stmt_bind_param($resultado,"i",$id);

                    //----- PASO 4 -----//
                    //Ejecutar la consulta con la función mysqli_stmt_execute()//
                    $okey=mysqli_stmt_execute($resultado);
                    if($okey==false)
                    {
                        echo "Error al ejecutar la consulta";
                    }else{
                    //----- PASO 5 -----//
                    // Asociar variables al resultado de la consulta. //
                    //Esto se consigue con la función mysqli_stmt_bind_result() //
                    $okey=mysqli_stmt_bind_result($resultado,$conID,$conNombre,$conApellidos,$conDireccion,$conPoblacion,$conProfesion,$conAhorros);                    
                    //----- PASO 6 -----//
                    //Leer los valores. Para ello se utilizará la función mysqli_stmt_fetch //
                    session_start();  //INICIAR LA SESION SIEMPRE//
                    while(mysqli_stmt_fetch($resultado))
                    {
                        $_SESSION["id"]=$conID;
                        $_SESSION["nombre"]=$conNombre;
                        $_SESSION["apellidos"]=$conApellidos;
                        $_SESSION["direccion"]=$conDireccion;
                        $_SESSION["poblacion"]=$conPoblacion;
                        $_SESSION["profesion"]=$conProfesion;
                        $_SESSION["ahorros"]=$conAhorros;
                    }
                    if(is_null($conID))
                    {
                        $_SESSION["semaforo"]=2;
                    }
                    else
                    {
                        $_SESSION["semaforo"]=1;
                    }
                    header("location:../004_Eliminacion/eliminacionPHP.php");
                    mysqli_stmt_close($resultado); 
                    }
                }
                if(!strcmp($borrar_elim,"BORRA"))
                {
                    session_start();  //INICIAR LA SESION SIEMPRE//
                    //TRAS BORRAR LOS DATOS SE BORRAN LAS CASILLAS
                    $_SESSION["id"]="";
                    $_SESSION["nombre"]="";
                    $_SESSION["apellidos"]="";
                    $_SESSION["direccion"]="";
                    $_SESSION["poblacion"]="";
                    $_SESSION["profesion"]="";
                    $_SESSION["ahorros"]="";
                    //Limpieza del formulario
                    $_SESSION["semaforo"]=2;
                    header("location:../004_Eliminacion/eliminacionPHP.php");
                    mysqli_stmt_close($resultado); 
                }
                if(!strcmp($eliminacion,"ELIMINAR"))
                {
                    //TRAS CARGAR LOS DATOS SE DESBLOQUEARAN TODAS LAS CASILLAS PARA CAMBIAR ALGO Y SE ACTUALIZARA
                    //SI SE QUIEREN CARGAR LOS DATOS POR EL ID BUSCADO SE MOSTRARAN EN LA TABLA
                    //SE INVOCA UNA VARIABLE DE TIPO GLOBAL PARA RECIBIR LO QUE SE QUIERE CARGAR CON EL ID
                    //----- PASO 1 -----//
                    //Creacion de la consulta //
                    $sql="DELETE FROM $BD_tabla WHERE $datos_CONSULTA[0]=?";
                    //----- PASO 2 -----//
                    //Preparación de la consulta con la función mysqli_prepare(), //
                    //la cual requiere de dos argumentos: El objeto de conexión y la sentencia SQ //
                    $resultado=mysqli_prepare($conexion,$sql);

                    //----- PASO 3 -----//
                    //Unir los parámetros a la sentencia sql. La función mysqli_param() lo hace //
                    $okey=mysqli_stmt_bind_param($resultado,"i",$id);

                    //----- PASO 4 -----//
                    //Ejecutar la consulta con la función mysqli_stmt_execute()//
                    $okey=mysqli_stmt_execute($resultado);
                    if($okey==false)
                    {
                        echo "Error al ejecutar la consulta";
                    }else
                    {
                        session_start();  //INICIAR LA SESION SIEMPRE//
                        //TRAS BORRAR LOS DATOS SE BORRAN LAS CASILLAS
                        //Se limpian los datos del formulario tras eliminar el usuario
                        $_SESSION["id"]="";
                        $_SESSION["nombre"]="";
                        $_SESSION["apellidos"]="";
                        $_SESSION["direccion"]="";
                        $_SESSION["poblacion"]="";
                        $_SESSION["profesion"]="";
                        $_SESSION["ahorros"]="";
                        //Limpieza del formulario
                        $_SESSION["semaforo"]=2;
                        header("location:../004_Eliminacion/eliminacionPHP.php");
                        mysqli_stmt_close($resultado); 
                    }                
                }
            }

    }catch(mysqli_sql_exception $error1)
    {
        echo "No se ha podido establecer conexión con la base de datos!";
    }

}catch(mysqli_sql_exception $error2){
    echo "No se ha podido realizar la conexión!";
}
?>
</body>
</html>