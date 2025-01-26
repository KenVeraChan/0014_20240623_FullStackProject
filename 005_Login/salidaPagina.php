<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salida Pagina Web</title>
</head>
<body>
    <?php
        session_start();
        if($_SESSION["loginRRHH"]==1)
        {
            session_destroy();  //Destruye la sesión y devuelve a la zona de LOGIN RRHH
            setcookie("cookieRRHH","RRHH",time()-1);  //Duracion de la COOKIE de -1 segundo, luego es destruida
            session_start();    //Se crea de nuevo la sesión
            $_SESSION["logeando"]=4;  //Se crea de nuevo la sesión para dar valor al LOGEADO de confirmación de sesión usuario cerrada
            header("location:../005_Login/0051_LoginRRHH/loginRRHH.php");
            //Se pone el doble punto para partir del directorio RAIZ
        }
        if($_SESSION["loginJEFES"]==1)
        {
            session_destroy();  //Destruye la sesión y devuelve a la zona de LOGIN JEFES
            setcookie("cookieJEFE","JEFE",time()-1);  //Duracion de la COOKIE de -1 sg.
            session_start();    //Se crea de nuevo la sesión
            $_SESSION["logeando"]=4;  //Se crea de nuevo la sesión para dar valor al LOGEADO de confirmación de sesión usuario cerrada
            header("location:../005_Login/0052_LoginJEFES/loginJEFES.php");
            //Se pone el doble punto para partir del directorio RAIZ
        }
        if($_SESSION["loginCLIENTES"]==1)
        {
            if($_SESSION["logeando"]==3)
            {
                //Si viene de haber cerrado la sesión al darse de baja como CLIENTE se procede con la destrucción de la SESSION y se crea otra para el logeado
                session_destroy();  //Destruye la sesión y devuelve a la zona de LOGIN CLIENTES
                setcookie("cookieCLIENTE","CLIENTE",time()-1);  //Duracion de la COOKIE de -1 sg.
                session_start();    //Se crea de nuevo la sesión
                $_SESSION["logeando"]=3;  //Se crea de nuevo la sesión para dar valor al LOGEADO
                header("location:../005_Login/0053_LoginCLIENTES/loginCLIENTES.php");
                //Se pone el doble punto para partir del directorio RAIZ
            }
            else
            {
                //Si viene de haber cerrado la sesión voluntariamente se procede con la destrucción de la SESSION y listo
                session_destroy();  //Destruye la sesión y devuelve a la zona de LOGIN CLIENTES
                setcookie("cookieCLIENTE","CLIENTE",time()-1);  //Duracion de la COOKIE de -1 sg.
                session_start();    //Se crea de nuevo la sesión
                $_SESSION["logeando"]=4;  //Se crea de nuevo la sesión para dar valor al LOGEADO de confirmación de sesión usuario cerrada
                header("location:../005_Login/0053_LoginCLIENTES/loginCLIENTES.php");
                //Se pone el doble punto para partir del directorio RAIZ
            }
        }
    ?>
</body>
</html>