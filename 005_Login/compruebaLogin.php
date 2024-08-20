<?php
    require "conexionPHP.php";
    try{
        session_start();  //Inicio de la variable superglobal
        $base= ConexionPHP::getConexionJEFES_RRHH();  //Conexion establecida desde la clase ConexionPHP
        $BBDDJefes=ConexionPHP::getBD_TablaJefes(); //Solicita nombre BBDD de los JEFES
        $sql="SELECT * FROM $BBDDJefes WHERE USUARIO= :login AND CONTRASENIA= :password"; //uso de marcadores
        $sql_CompruebaJefesRRHH="SELECT * FROM $BBDDJefes WHERE USUARIO= :login AND CONTRASENIA= :password AND ROL= :rol"; //Consulta para ver si es JEFE o RRHH
        $rolRRHH="RRHH";
        $rolJEFES="JEFE";

        //COMPRUEBA SI EL REGISTRO ESTA EN LA BBDD//
        $resultado=$base->prepare($sql);  
        $login=htmlentities(addslashes($_POST["login"]));
        $password=htmlentities(addslashes($_POST["password"]));
                //htmlentities() lo que hace es: Convert all applicable characters to HTML entities
                //addslashes() lo que hace es: escapar de evitar entradas de teclado raras o bien inyecciones SQL
        $resultado->bindValue(":login",$login);
        $resultado->bindValue(":password",$password);
        $resultado->execute();
        $numeroRegistro=$resultado->rowCount();  //Si el usuario existe detectará una fila encontrada, sino dará cero filas
        
        //COMPRUEBA SI EL REGISTRO CONSULTADO ES DE RRHH O DE JEFES
        $resultadoComprobar=$base->prepare($sql_CompruebaJefesRRHH);
        $login=htmlentities(addslashes($_POST["login"]));
        $password=htmlentities(addslashes($_POST["password"]));
        $resultadoComprobar->bindValue(":login",$login);
        $resultadoComprobar->bindValue(":password",$password);
        if($_SESSION["loginRRHH"]==1)
        {
            //COMPRUEBA SI CUMPLE EL ROL DE RRHH EL REGISTRO CONSULTADO EN LA BBDD
            $resultadoComprobar->bindValue(":rol",$rolRRHH);
        }
        if($_SESSION["loginJEFES"]==1)
        {
            //COMPRUEBA SI CUMPLE EL ROL DE JEFES EL REGISTRO CONSULTADO EN LA BBDD
            $resultadoComprobar->bindValue(":rol",$rolJEFES);
        }
        $resultadoComprobar->execute();
        $numeroRegistroComprobar=$resultadoComprobar->rowCount();

        //CUATRO POSIBILIDADES CONSIDERADAS
        if($numeroRegistro!=0 && $numeroRegistroComprobar!=0)
        {
            //Caso 1: Datos bien metidos y pertenece a RRHH o a JEFES --> SI DEJA ENTRAR
            //Antes de redirigir al usuario se declarará la variable global session_start()
            //Para generar el letrero de entrada CORRECTA
            $_SESSION["semaforo"]=0;  //Reconocido que el identificador es de RRHH
            $_SESSION["logeando"]=1;  //Se han introducido bien los datos
            //permite usarse en cualquier parte del código de cualquier página creada PHP
            $_SESSION["usuario"]=$_POST["login"];
            $resultado->closeCursor();  //Para futuras consultas que este libre el paso
            $resultadoComprobar->closeCursor();  //Para futuras consultas que este libre el paso
            if($_SESSION["loginRRHH"]==1)
            {
                header("location:../007_Menus/0071_MenuOpRRHH/OpRRHH.php");
                //Se pone el doble punto para partir del directorio RAIZ
            }
            if($_SESSION["loginJEFES"]==1)
            {
                header("location:../007_Menus/0073_MenuOpJEFES/OpJEFES.php");
                //Se pone el doble punto para partir del directorio RAIZ
            }
        }
        if($numeroRegistro==0 && $numeroRegistroComprobar==0)
        {
            //Caso 2: Datos mal metidos y no pertenece a RRHH --> NO DEJA ENTRAR
            $_SESSION["semaforo"]=0;  //Reconocido que el identificador es de RRHH
            $_SESSION["logeando"]=0;  //Fallido en entrada de datos
            $resultado->closeCursor();  //Para futuras consultas que este libre el paso
            $resultadoComprobar->closeCursor();  //Para futuras consultas que este libre el paso
            //Se le redirige a la misma pagina propia de LOGIN
            if($_SESSION["loginRRHH"]==1)
            {
                header("location: ../005_Login/0051_LoginRRHH/loginRRHH.php");
            }
            if($_SESSION["loginJEFES"]==1)
            {
                header("location: ../005_Login/0052_LoginJEFES/loginJEFES.php");
            }
        }
        if($numeroRegistro!=0 && $numeroRegistroComprobar==0)
        {
            //Caso 3: Datos bien metidos y no pertenece a RRHH --> NO DEJA ENTRAR
            //COMPRUEBA SI ES JEFE//
            $_SESSION["semaforo"]=1;  //No se le permitirá el acceso a JEFES al área de RRHH
            //Para que no genere el letrero de entrada FALLIDA, pues no ha sido un fallo de login
            $_SESSION["logeando"]=1; 
            $resultado->closeCursor();  //Para futuras consultas que este libre el paso
            $resultadoComprobar->closeCursor();  //Para futuras consultas que este libre el paso
            //Se le redirige a la misma pagina propia de LOGIN
            if($_SESSION["loginRRHH"]==1)
            {
                header("location: ../005_Login/0051_LoginRRHH/loginRRHH.php");
            }
            if($_SESSION["loginJEFES"]==1)
            {
                header("location: ../005_Login/0052_LoginJEFES/loginJEFES.php");
            }
        }
        if($numeroRegistro==0 && $numeroRegistroComprobar!=0)
        {
            //Caso 4 (imposible): Datos mal metidos y si pertenece a RRHH --> NO DEJA ENTRAR
            $_SESSION["semaforo"]=0; //Asi no se saca ningun letrero
            $_SESSION["logeando"]=1; //Para el BORRADO IMPERIOSO DEL BUFFER 
        }
    }catch(Exception $e){
        die("Error: ".$e->getMessage()."  ".$e->getLine());
    }
?>