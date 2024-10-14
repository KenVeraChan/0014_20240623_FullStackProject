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
            header("location:../005_Login/0051_LoginRRHH/loginRRHH.php");
            //Se pone el doble punto para partir del directorio RAIZ
        }
        if($_SESSION["loginJEFES"]==1)
        {
            session_destroy();  //Destruye la sesión y devuelve a la zona de LOGIN JEFES
            header("location:../005_Login/0052_LoginJEFES/loginJEFES.php");
            //Se pone el doble punto para partir del directorio RAIZ
        }
    ?>
</body>
</html>