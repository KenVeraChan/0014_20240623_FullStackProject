<?php
include "../005_Login/conexionPHP.php";
// Al hacerse la conexion mediante MYSQLI se llamarán a los métodos de la conexion 
// para poder efecturala (doble técnica: usar POO creado de la CONEXION y uso MYSQLI en vez de PDO)
$BD_servidor=ConexionPHP::getBD_Servidor();
$BD_usuario=ConexionPHP::getBD_Usuario();
$BD_contrasenia=ConexionPHP::getBD_Contrasenia();
$BD_nombre=ConexionPHP::getBD_NombreEMPLEADOS();
$BD_tabla=ConexionPHP::getBD_TablaEmpleados();
$modificar=$_GET["modificar"];
try{  
    //CONEXION PROCESO
    $conexion=mysqli_connect($BD_servidor,$BD_usuario,$BD_contrasenia);
    mysqli_set_charset($conexion,"utf8");
    try{
            mysqli_select_db($conexion,$BD_nombre);
            ///COMPROBACION DE ACTUALIZACION: SE EJECUTA LA ACTUALIZACION ///
            if(strcmp($modificar,"modificar"))
            {
                session_start();  //INICIAR LA SESION SIEMPRE//
                $LECTURA=json_decode($_SESSION["L"],true); //Para descarga como una matriz asociativa
                $nuevoID=$LECTURA["RegID"];
                $ESCRITURA=json_decode($_SESSION["E"],true); //Para descarga como una matriz asociativa
                $nom=$ESCRITURA["RegNombre"];
                $ape=$ESCRITURA["RegApellidos"];
                $dir=$ESCRITURA["RegDireccion"];
                $pob=$ESCRITURA["RegPoblacion"];
                $prof=$ESCRITURA["RegProfesion"];
                $aho=$ESCRITURA["RegAhorros"];

                $sql="UPDATE $BD_tabla SET NOMBRE=?,APELLIDOS=?,DIRECCION=?,POBLACION=?,PROFESION=?,AHORROS=? WHERE ID=?";
                $resultado=mysqli_prepare($conexion,$sql);
                $okey=mysqli_stmt_bind_param($resultado,"sssssii",$nom,$ape,$dir,$pob,$prof,$aho,$nuevoID);
                $okey=mysqli_stmt_execute($resultado);
                mysqli_stmt_close($resultado); 
                $_SESSION["semaforo"]=3;
                header("location:../003_Actualizacion/actualizacionPHP.php");   
            }
        }
        catch(mysqli_sql_exception $error1)
        {
            echo "No se ha podido establecer conexión con la base de datos!";
            echo "<br><br>Error en: ".$error1->getLine();
            echo "<br><br>Error porque: ".$error1->getMessage();
        }
    }catch(mysqli_sql_exception $error2){
        echo "No se ha podido realizar la conexión!";
    }
?>