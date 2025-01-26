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
$descargaJefeRRHH=$busquedaJefeRRHH->fetchAll(PDO::FETCH_OBJ);
$resultadoJefeRRHH=$busquedaJefeRRHH->rowCount();

//Se procede a la búsqueda para saber si es CLIENTE
$busquedaCliente=$conexionClientes->query("SELECT * FROM $tablaClientes WHERE USUARIO='$usuarioEntrante'");
$descargaCliente=$busquedaCliente->fetchAll(PDO::FETCH_OBJ);
$resultadoCliente=$busquedaCliente->rowCount();

//Se analizan los cuatro casos posibles de encontrarse en cualquiera de ambas BBDD
//CASO 1: No esta en ninguna de las BBDD ni de JEFES y RRHH ni de CLIENTES: Es decir, que no se ha logeado en ningún sitio.
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
      //Intento de entrar en el login de JEFES Y RRHH: Se le dará paso porque es un usuario JEFE O RRHH logeado
      foreach($descargaJefeRRHH as $rol)
      {
      //SE DISCIERNE SI ES JEFE O RRHH: DESCARGANDO EL ROL DE LA BBDD, PARA CONTRASTAR
      $rolUsuario=$rol->ROL;
      }
   if($_SESSION["entradaLogin"]==1)
   {
      if(strcmp($rolUsuario,string2: "JEFE")==0)
      {
        //ES UN JEFE EL IDENTIFICADO DESDE LA BBDD LUEGO ENTRARÁ EN EL MENU DE OPCIONES DE JEFE
        header("Location:../../007_Menus/0073_MenuOpJEFES/OpJEFES.php");
      }
      if(strcmp($rolUsuario,string2: "RRHH")==0)
      {
        //ES UNO DE RRHH IDENTIFICADO DESDE LA BBDD LUEGO ENTRARÁ EN EL MENU DE OPCIONES DE RRHH
        header("Location:../../007_Menus/0071_MenuOpRRHH/OpRRHH.php");
      }
   }
   if($_SESSION["entradaLogin"]==2)
   {
      //Intento de entrar en el login de CLIENTES: No se le dará paso porque ya estaba logeado
      if(strcmp($rolUsuario,string2: "JEFE")==0)
      {
        //ES UN JEFE EL IDENTIFICADO: Se pone esto para que al cerrar la sesion del JEFE no muestre el LOGIN DEL CLIENTE sino del propio JEFE
        $_SESSION["loginJEFES"]=1;  //Se corrobora que el sector de JEFES no es donde se intenta ENTRAR en el LOGIN
        $_SESSION["loginRRHH"]=0;   //Se identifica que no ha sido un individuo del sector de RRHH
        $_SESSION["loginCLIENTES"]=0;   //Se identifica que SI ha sido un individuo del sector de CLIENTES
      }
      if(strcmp($rolUsuario,string2: "RRHH")==0)
      {
        //ES UNO DE RRHH IDENTIFICADO: Se pone esto para que al cerrar la sesion del RRHH no muestre el LOGIN DEL CLIENTE sino del propio empleado RRHH
        $_SESSION["loginJEFES"]=0;  //Se corrobora que el sector de JEFES no es donde se intenta ENTRAR en el LOGIN
        $_SESSION["loginRRHH"]=1;   //Se identifica que no ha sido un individuo del sector de RRHH
        $_SESSION["loginCLIENTES"]=0;   //Se identifica que SI ha sido un individuo del sector de CLIENTES
      }
      $_SESSION["privado"]=2;        //Para que se active el letrero de aviso de zona privada de los CLIENTES
      header("Location:../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.php");
   }
}
//CASO 4: Si esta en la BBDD de JEFES y RRHH, así como en la de CLIENTES: Caso IMPOSIBLE
if($resultadoJefeRRHH==1 && $resultadoCliente==1)
{
    //Aunque intente entrar en cualquier LOGIN no se le permitirá por la incoherencia en el registro
    $_SESSION["privado"]=3;        //Caso imposible de que el usuario pertenezca al sector JEFES, RRHH Y EMPLEADOS al mismo tiempo
    header("Location:../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.php");
}
?>