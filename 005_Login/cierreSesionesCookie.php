<?php
//Es una cabecera que se colocará en todas los headers de las páginas web
function cargaWebCookie($ruta)
{
    if(isset($_COOKIE["cookieVisitaPagina"]))
    {
        $_SESSION["activadorCookie"]=0;   //Queda desactivada el panel de información de la COOKIE
        //Si existe la COOKIE no mostará el cartel de ACEPTAR LAS COOKIES al visitar la página por primera vez
        //No hará nada si existe la misma COOKIE
    }
    else
    {
        $_SESSION["activadorCookie"]=1; //Queda activada el panel de información de la COOKIE
        //Si no existe la COOKIE, se crea la COOKIE para navegar en la página web
        setcookie("cookieVisitaPagina","Usuario",0,"/","localhost");   //Duracion de la COOKIE de 2 minutos, si fuera omitido, la cookie expirará al final de la sesión (cuando el navegador es cerrado).
        // Si se establece a 0, o es omitido, la cookie expirará al final de la sesión (cuando el navegador es cerrado).
    }   
    if(!isset($_SESSION["usuario"])) 
    {
        //SI NO HAY NI UN JEFE, NI UN EMPLEADO DE RRHH O UN CLIENTE CONECTADO SE PONE TODO A CERO
        $_SESSION["loginJEFES"]=0;
        $_SESSION["loginRRHH"]=0;
        $_SESSION["loginCLIENTES"]=0;
    }
    else
    {
        if($_SESSION["loginJEFES"]==1)
        {
            if(!isset($_COOKIE["cookieJEFE"]))
            {
                //Si no existe se tiene que cerrar la sesión del usuario, sea quien sea
                session_destroy();  //Destruye la sesión y devuelve a la zona de LOGIN JEFES
                session_start();    //Se crea de nuevo la sesión
                $_SESSION["loginJEFES"]=0;  //Se reinicia la variable para futuras conexiones en otras areas
                $_SESSION["logeando"]=5;  //Se crea de nuevo la sesión para dar valor al LOGEADO de confirmación de sesión usuario cerrada
                header($ruta."0052_LoginJEFES/loginJEFES.php");
                //Se pone el doble punto para partir del directorio RAIZ
            }
        }
        if($_SESSION["loginRRHH"]==1)
        {
            if(!isset($_COOKIE["cookieRRHH"]))
            {
                //Si no existe se tiene que cerrar la sesión del usuario, sea quien sea
                session_destroy();  //Destruye la sesión y devuelve a la zona de LOGIN RRHH
                session_start();    //Se crea de nuevo la sesión
                $_SESSION["loginRRHH"]=0;  //Se reinicia la variable para futuras conexiones en otras areas
                $_SESSION["logeando"]=5;  //Se crea de nuevo la sesión para dar valor al LOGEADO de confirmación de sesión usuario cerrada
                header($ruta."0051_LoginRRHH/loginRRHH.php");
                //Se pone el doble punto para partir del directorio RAIZ
            }
        }
        if($_SESSION["loginCLIENTES"]==1)
        {
            if(!isset($_COOKIE["cookieCLIENTE"]))
            {
                //Si no existe se tiene que cerrar la sesión del usuario, sea quien sea
                //Si viene de haber cerrado la sesión voluntariamente se procede con la destrucción de la SESSION y listo
                session_destroy();  //Destruye la sesión y devuelve a la zona de LOGIN CLIENTES
                session_start();    //Se crea de nuevo la sesión
                $_SESSION["loginCLIENTES"]=0;  //Se reinicia la variable para futuras conexiones en otras areas
                $_SESSION["logeando"]=5;  //Se crea de nuevo la sesión para dar el valor de SESIÓN CADUCADA AL USUARIO
                header($ruta."0053_LoginCLIENTES/loginCLIENTES.php");
            //Se pone el doble punto para partir del directorio RAIZ
            }
        }
    }
}
?>