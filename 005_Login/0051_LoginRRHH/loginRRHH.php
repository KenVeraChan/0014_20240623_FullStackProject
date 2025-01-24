<?php
session_start();  //para el gestionado del logeo y los carteles de intento de entrar
//AL ESTAR YA REGISTRADO COMO EMPLEADO RRHH DENTRO DEL MENU DE RRHH SE ACTIVA EL LOGEO DE RRHH PARA LUEGO DETECTARLO EN LA SALIDA PAGINA
$_SESSION["loginJEFES"]=0;  //Se corrobora que el sector de JEFES no es donde se intenta ENTRAR en el LOGIN
$_SESSION["loginRRHH"]=1;   //Se identifica que ha sido un individuo del sector de RRHH
$_SESSION["loginCLIENTES"]=0;   //Se identifica que no ha sido un individuo del sector de CLIENTES
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN Recursos Humanos</title>
    <link rel="stylesheet" href="loginRRHH.css">
    <script src="loginRRHH.js"></script>
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
        <div id="iconoAdorno"><img src="../0051_LoginRRHH/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>     
        <div class="VaciobotonesPrincipal"></div>
            <form action="../../005_Login/compruebaLogin.php" method="POST" id="formularioLogin">
                <table id="tablaLogin">
                    <tr id="izqTitulo" style="color: rgb(204, 0, 255)">AREA DE RR.HH.</tr>
                    <tr><td class="izq"></td></tr>
                    <tr><td class="izq" style="color: rgb(204, 0, 255);">LOGIN: </td><td class="der"><input type="text" class="cajaForm" name="login" placeholder="Usuario"></td></tr>
                    <tr><td class="izq"></td></tr>
                    <tr><td class="izq" style="color: rgb(204, 0, 255);">PASSWORD: </td><td class="der"><input type="password" class="cajaForm" name="password" placeholder="Contraseña"></td></tr>
                    <tr><td class="izq"></td></tr>
                    <tr>
                        <td><input type="submit" class="logear" name="enviar" value="ENTRAR"></td>
                        <td><a href="../../007_Menus/0072_MenuJefesRRHH/loginJefesRRHH.php" name="enviar" class="returned"><strong>VOLVER</strong></a></td>
                    </tr>
                </table>
            </form> 
                <table id="indicaciones">
                    <tr><td class="der" style="color: rgb(204, 0, 255)">FUNCIONES DESEMPEÑADAS</td></tr>
                    <tr><td class="der"></td></tr>
                    <tr><td class="der" style="color: rgb(204, 0, 255);">Comprobar GESTION de candidatos CRUD</td></tr>
                    <tr><td class="der" style="color: rgb(204, 0, 255);">Control de las TAREAS revisadas por el JEFE</td></tr>
                    <tr><td class="der"></td></tr>
                </table>
        <img id="imagenPortada" src="../0051_LoginRRHH/images/RRHH.jpg" alt="Imagen Oficina de RRHH">    
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
    <script>letreroConfirmadaEntrada(<?php echo $_SESSION["logeando"]?>);</script>
    <?php $_SESSION["logeando"]=0; //Para el BORRADO IMPERIOSO DEL BUFFER 
          $_SESSION["semaforo"]=0; //Asi no se saca ningun letrero?>
</body>
</html>