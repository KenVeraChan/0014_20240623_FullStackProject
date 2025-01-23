<?php
session_start();
include "../../005_Login/conexionPHP.php";
$usuarioEntrante=$_SESSION["usuario"];  //Se guarda el usuario entrante

//Se invocan las conexiones
$conexionJefesRRHH=ConexionPHP::getConexionJEFES_RRHH();
$conexionClientes=ConexionPHP::getConexionCLIENTES();
$tablaJefesRRHH=ConexionPHP::getBD_TablaJefes();
$tablaClientes=ConexionPHP::getBD_TablaIDClientes();

//Se procede a la búsqueda para saber si es JEFE o RRHH
$busquedaJefeRRHH=$conexionJefesRRHH->query("SELECT * FROM $tablaJefesRRHH WHERE USUARIO='$usuarioEntrante'");
$resultadoJefeRRHH=$busquedaJefeRRHH->fetchAll(PDO::FETCH_OBJ);
$resultadoJefeRRHH=$busquedaJefeRRHH->rowCount();

//Se procede a la búsqueda para saber si es CLIENTE
$busquedaCliente=$conexionClientes->query("SELECT * FROM $tablaClientes WHERE USUARIO='$usuarioEntrante'");
$resultadoCliente=$busquedaCliente->fetchAll(PDO::FETCH_OBJ);
$resultadoCliente=$busquedaCliente->rowCount();

//Se analizan los cuatro casos posibles de encontrarse en cualquiera de ambas BBDD
//CASO 1: No esta en ninguna de las BBDD ni de JEFES y RRHH ni de CLIENTES, es un caso IMPOSIBLE
if($resultadoJefeRRHH==0 && $resultadoCliente==0)
 {
   //NO ES NI UN JEFE NI UN EMPLEADO DE RRHH NI UN CLIENTE
    if($_SESSION["entradaLogin"]==1)
    {
      //Intento de entrar en el login de JEFES Y RRHH: se le dará paso
      header("Location:../../007_Menus/0072_MenuJefesRRHH/loginJefesRRHH.php");
    }
    if($_SESSION["entradaLogin"]==2)
    {
      //Intento de entrar en el login de CLIENTES: se le dará paso
      header("Location:../../005_Login/0053_LoginCLIENTES/loginCLIENTES.php");
    }
 }
 //CASO 2: No esta en ninguna de las BBDD ni de JEFES y RRHH pero si de CLIENTES
 if($resultadoJefeRRHH==0 && $resultadoCliente==1)
 {
   //NO ES NI UN JEFE NI UN EMPLEADO DE RRHH PERO SI UN CLIENTE
    if($_SESSION["entradaLogin"]==1)
    {
      //Intento de entrar en el login de JEFES Y RRHH: No se le dará paso porque es un usuario CLIENTE logeado
      $_SESSION["privado"]=1;        //Para que se active el letrero de aviso de zona privada de JEFES Y RRHH
      header("Location:../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.php");
    }
    if($_SESSION["entradaLogin"]==2)
    {
      //Intento de entrar en el login de CLIENTES: se le dará paso porque ya estaba logeado
      header("Location:../../007_Menus/0074_MenuOpCLIENTES/OpCLIENTES.php");
    }
 }
//CASO 3: Si esta en la BBDD de JEFES y RRHH pero NO en el a BBDD de CLIENTES
if($resultadoJefeRRHH==1 && $resultadoCliente==0)
{
   //ES UN JEFE O UN EMPLEADO DE RRHH PERO NO UN CLIENTE
   if($_SESSION["entradaLogin"]==1)
   {
      //Intento de entrar en el login de JEFES Y RRHH: Se le dará paso porque es un usuario JEFE O RRHH logeado

      //HAY QUE DISCERNIR SI ES JEFE O RRHH (DESCARGAR ROL DE LA BBDD, PARA CONTRASTAR)






      






      header("Location:../../007_Menus/0072_MenuJefesRRHH/loginJefesRRHH.php");
   }
   if($_SESSION["entradaLogin"]==2)
   {
      //Intento de entrar en el login de CLIENTES: No se le dará paso porque ya estaba logeado
      $_SESSION["privado"]=2;        //Para que se active el letrero de aviso de zona privada de los CLIENTES
      header("Location:../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.php");
   }
}


?>