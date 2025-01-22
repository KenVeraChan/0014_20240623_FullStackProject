<?php
session_start();
$_SESSION["loginJEFES"]=1;      //Se identifica el sector de RRHH intentando ENTRAR en el LOGIN
$_SESSION["loginRRHH"]=0;       //Se corrobora que el sector de JEFES no es donde se intenta ENTRAR en el LOGIN
$_SESSION["loginCLIENTES"]=0;   //Se identifica que no ha sido un individuo del sector de CLIENTES
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN Jefes</title>
    <link rel="stylesheet" href="loginJEFES.css">
    <script src="loginJEFES.js"></script>
</head>
<body onload="cargarPagina()">
        <div class="letreroOK" style=
            "position:absolute;
                width:100%; 
                height: 30px; 
                text-align: center;
                color: rgb(204, 0, 255);
                margin-top:-40px;
                background-color: rgba(0, 0, 19, 0.89);
                box-shadow: none">
        </div>
    <header id="cabeceraPrincipal">
        <div id="iconoAdorno"><img src="../0052_LoginJEFES/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>     
        <div class="VaciobotonesPrincipal"></div>
            <form action="../../005_Login/compruebaLogin.php" method="POST" id="formularioLogin">
                <table id="tablaLogin">
                    <tr id="izqTitulo" style="color: rgb(204, 0, 255)">AREA DE JEFES</tr>
                    <tr><td class="izq"></td></tr>
                    <tr><td class="izq" style="color: rgb(204, 0, 255);">LOGIN: </td><td class="der"><input type="text" class="cajaForm" name="login" placeholder="Usuario"></td></tr>
                    <tr><td class="izq"></td></tr>
                    <tr><td class="izq" style="color: rgb(204, 0, 255);">PASSWORD: </td><td class="der"><input type="password" class="cajaForm" name="password" placeholder="Contraseña"></td></tr>
                    <tr><td class="izq"></td></tr>
                    <tr id="botoneslog">
                        <td><input type="submit" class="logear" name="enviar" value="ENTRAR"></td>
                        <td><a href="../../007_Menus/0072_MenuJefesRRHH/loginJefesRRHH.php" name="enviar" class="returned"><strong>VOLVER</strong></a></td>
                    </tr>
                </table>
            </form> 
                <table id="indicaciones">
                    <tr><td class="der" style="color: rgb(204, 0, 255)">FUNCIONES DESEMPEÑADAS</td></tr>
                    <tr><td class="der"></td></tr>
                    <tr><td class="der" style="color: rgb(204, 0, 255);">Comprobar la SOLICITUD de los pedidos de los clientes</td></tr>
                    <tr><td class="der" style="color: rgb(204, 0, 255);">Control de las TAREAS generadas en la empresa</td></tr>
                    <tr><td class="der" style="color: rgb(204, 0, 255);">Control de los PROYECTOS empresariales</td></tr>
                    <tr><td class="der" style="color: rgb(204, 0, 255);">Control de la INTERFAZ de la empresa</td></tr>
                    <tr><td class="der"></td></tr>
                </table>
        <img id="imagenPortada" src="../0052_LoginJEFES/images/JEFES.jpg" alt="Imagen Despacho JEFES">    
    </header>
    <div class="piePagina">
        <footer id="piePrincipal">
            <div id="zocalo">
                -------- Fundadores --------
                <br><strong>William Wissangel</strong></br>
                <strong>Sharyllín Rousher</strong>
                <br>---- Correo Electrónico ----</br>
                <strong>sfer4D_corporation@outlook.com</strong>
            </div>
            <div class="pie">
                Asociado: <strong>BioGenTech Corp</strong><br>
                Competidor: <strong>Techeimer Corp</strong><br>
                Inversor: <strong>Medigraria Corporation</strong><br>
                Registro 2024: <strong>Registro C4321</strong>
            </div>
        </footer>
    </div>
    <script> letreroConfirmadaEntrada(<?php echo $_SESSION["logeando"]?>);</script>
    <?php $_SESSION["logeando"]=0; //Para el BORRADO IMPERIOSO DEL BUFFER 
          $_SESSION["semaforo"]=0; //Asi no se saca ningun letrero?>
</body>
</html>