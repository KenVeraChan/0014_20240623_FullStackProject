<?php
require "../../../../005_Login/conexionPHP.php";
session_start();
$conexion=ConexionPHP::getConexionCLIENTES();
$tablaDatosBancarios=ConexionPHP::getBD_DatosBancarios();

if(isset($_POST["cargar"]))
{
    //Carga datos de la BBDD para rellenar automaticamente el formulario si es que existen sus datos
    $usuarioOnline=$_SESSION["usuario"];
    $consultaDatos=$conexion->query("SELECT * FROM $tablaDatosBancarios WHERE NOMBRE='$usuarioOnline'");
    $tabla=$consultaDatos->fetchAll(PDO::FETCH_OBJ);
    $usuarios=$consultaDatos->rowCount();
    if($usuarios>0)
    {
        //Carga los valores de un usuario solicitado
        foreach($tabla as $nodo)
        {
            $_SESSION["NOMBREDB"]=$nodo->NOMBRE;
            $_SESSION["NUMERODB"]=$nodo->NUMERO;
            $_SESSION["MESDB"]=$nodo->MES;
            $_SESSION["ANIODB"]=$nodo->ANIO;
            $_SESSION["CCVDB"]=$nodo->CCV;
        }
        $consultaDatos->closeCursor();
        $_SESSION["indicador"]=3;  //datos cargados correctamente
    }
    if($usuarios==0)
    {
        //Pone los valores por defecto
        $_SESSION["NOMBREDB"]="";
        $_SESSION["NUMERODB"]=0;
        $_SESSION["MESDB"]="MES";
        $_SESSION["ANIODB"]="ANIO";
        $_SESSION["CCVDB"]=0;  
        $consultaDatos->closeCursor();
        $_SESSION["indicador"]=7;  //datos cargados correctamente, PERO NO EXISTEN
    }
    header("Location:../../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/0096_01_01_TarjetaBanco/tarjetaBancaria.php");  
}
if(isset($_POST["activar"]))
{
    //PRIMERO COMPRUEBA QUE NO ESTE REGISTRADO PREVIAMENTE SINO NO LO ACTIVA
    //Con ucwords() se pone todas las palabras de una cadena en mayúsculas
    //Con mb_strtolower() pone todas las letras de una cadena en minúsculas
    $nombreTarjetaDB=ucwords(mb_strtolower($_POST["nombreTarjeta"]));  //Nombre de la tarjeta de crédito
    $consultaDatos=$conexion->query("SELECT * FROM $tablaDatosBancarios WHERE NOMBRE='$nombreTarjetaDB'");
    $usuarios=$consultaDatos->rowCount();
    if($usuarios==0)
    {
        //Adquisición de datos
        $numTarjetaDB=$_POST["numTarjeta"];  //Numero de la tarjeta de crédito
        $mesTarjetaDB=$_POST["mesTarjeta"];  //Mes de expiración de la tarjeta de crédito
        $anioTarjetaDB=$_POST["anioTarjeta"];  //Anio de expiración de la tarjeta de crédito
        $ccvTarjetaDB=$_POST["CCVtarjeta"]; //CCV de la tarjeta de crédito
        if(!empty($numTarjetaDB) && !empty($nombreTarjetaDB) && !empty($ccvTarjetaDB))
        {
            //Envio a la BBDD de los datos recopilados
            //Carga datos de la BBDD para rellenar automaticamente el formulario si es que existen sus datos
            $consultaDatos=$conexion->query("INSERT INTO $tablaDatosBancarios(NOMBRE,NUMERO,MES,ANIO,CCV)VALUES('$nombreTarjetaDB','$numTarjetaDB','$mesTarjetaDB','$anioTarjetaDB','$ccvTarjetaDB')");
            $consultaDatos->closeCursor();
            $_SESSION["indicador"]=4;  //datos actualizados correctamente
            header("Location:../../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/0096_01_01_TarjetaBanco/tarjetaBancaria.php");  
        }
        else
        {
            $consultaDatos->closeCursor();
            $_SESSION["indicador"]=8;  //datos no introducidos correctamente, es un error NO SE HA ACTIVADO
            header("Location:../../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/0096_01_01_TarjetaBanco/tarjetaBancaria.php");  
        }
    }
    else  //Si ya estaba registrado entonces no se registrará de nuevo
    {
        $consultaDatos->closeCursor();
        $_SESSION["indicador"]=5;  //datos que ya estaban registrados no se volverán a introducir
        header("Location:../../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/0096_01_01_TarjetaBanco/tarjetaBancaria.php");  
    }
}
if(isset($_POST["actualizar"]))
{
    //Primero se comprobará si existe el registro para actualizar sino es así se le dirá que lo registre
    //Con ucwords() se pone todas las palabras de una cadena en mayúsculas
    //Con mb_strtolower() pone todas las letras de una cadena en minúsculas
    $nombreTarjetaDB=ucwords(mb_strtolower($_POST["nombreTarjeta"]));  //Nombre de la tarjeta de crédito
    $consultaDatos=$conexion->query("SELECT * FROM $tablaDatosBancarios WHERE NOMBRE='$nombreTarjetaDB'");
    $usuarios=$consultaDatos->rowCount();

    if($usuarios==0)
    {
        //Si no habia no se puede axtualizar
        $consultaDatos->closeCursor();
        $_SESSION["indicador"]=6;  //datos que no estaban registrados no tiene sentido haberle dado a actualizar
        header("Location:../../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/0096_01_01_TarjetaBanco/tarjetaBancaria.php");   
    }
    else
    {
        //Si hay se procede a actualizar
        $numTarjetaDB=$_POST["numTarjeta"];  //Numero de la tarjeta de crédito
        $mesTarjetaDB=$_POST["mesTarjeta"];  //Mes de expiración de la tarjeta de crédito
        $anioTarjetaDB=$_POST["anioTarjeta"];  //Anio de expiración de la tarjeta de crédito
        $ccvTarjetaDB=$_POST["CCVtarjeta"]; //CCV de la tarjeta de crédito
        if(!empty($numTarjetaDB) && !empty($nombreTarjetaDB) && !empty($ccvTarjetaDB))
        {
            //Envio a la BBDD de los datos recopilados
            //Carga datos de la BBDD para rellenar automaticamente el formulario si es que existen sus datos
            $consultaDatos=$conexion->query("UPDATE $tablaDatosBancarios SET NOMBRE='$nombreTarjetaDB',NUMERO='$numTarjetaDB',MES='$mesTarjetaDB',ANIO='$anioTarjetaDB',CCV='$ccvTarjetaDB' WHERE NOMBRE='$nombreTarjetaDB'");
            $consultaDatos->closeCursor();
            $_SESSION["indicador"]=1;  //datos actualizados correctamente
            header("Location:../../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/0096_01_01_TarjetaBanco/tarjetaBancaria.php");  
        }
        else
        {
            $_SESSION["indicador"]=2;  //datos no introducidos correctamente, es un error NO SE HA ACTUALIZADO
            header("Location:../../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/0096_01_01_TarjetaBanco/tarjetaBancaria.php");  
        }
    }
}
if(isset($_POST["volver"]))
{
    header("Location:../../../../009_SectorPublico/0096_PaginaGestionCliente/0096_01_PersonalCliente/personalClientes.php");  
}
?>