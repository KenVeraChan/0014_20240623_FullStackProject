<?php
    require "conexionPHP.php";
    try{
        $base= ConexionPHP::getConexionJEFES_RRHH();  //Conexion establecida desde la clase ConexionPHP
        $BBDDJefes=ConexionPHP::getBD_TablaJefes(); //Solicita nombre BBDD de los JEFES
        $sql="SELECT * FROM $BBDDJefes WHERE USUARIO= :login AND CONTRASENIA= :password"; //uso de marcadores
        $resultado=$base->prepare($sql);  
        $login=htmlentities(addslashes($_POST["login"]));
        $password=htmlentities(addslashes($_POST["password"]));
                //htmlentities() lo que hace es: Convert all applicable characters to HTML entities
                //addslashes() lo que hace es: escapar de evitar entradas de teclado raras o bien inyecciones SQL
        $resultado->bindValue(":login",$login);
        $resultado->bindValue(":password",$password);
        $resultado->execute();
        $numeroRegistro=$resultado->rowCount();  //Si el usuario existe detectará una fila encontrada, sino dará cero filas
            if($numeroRegistro!=0)
            {
                //Antes de redirigir al usuario se declarará la variable global session_start()
                session_start();  //se inicia la sesion
                //Para generar el letrero de entrada CORRECTA
                $_SESSION["logeando"]=1;
                //La variable SUPERGLOBAL $_SESSION["nombre_elegido"]
                //permite usarse en cualquier parte del código de cualquier página creada PHP
                $_SESSION["usuario"]=$_POST["login"];
                header("location:../007_Menus/0071_MenuOpRRHH/OpRRHH.php"); //CAMBIAR!!!!
                //Se pone el doble punto para partir del directorio RAIZ
            }else{
                //Se le redirige a la misma pagina propia de LOGIN
                header("location: ../005_Login/0051_LoginRRHH/loginRRHH.php");
                session_start();
                //Para generar el letrero de entrada FALLIDA
                $_SESSION["logeando"]=0;
            }

    }catch(Exception $e){
        die("Error: ".$e->getMessage()."  ".$e->getLine());
    }
?>