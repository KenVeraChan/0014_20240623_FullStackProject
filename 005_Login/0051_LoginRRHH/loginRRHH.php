<?php
session_start();
$_SESSION["loginJEFES"]=0;  //Se corrobora que el sector de JEFES no es donde se intenta ENTRAR en el LOGIN
$_SESSION["loginRRHH"]=1;   //Se identifica el sector de RRHH intentando ENTRAR en el LOGIN
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
                <table>
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
    <script>
        if(<?php echo $_SESSION["logeando"]?>==0)
        {
            //En el caso de que no esten bien escritas el USUARIO o la CONTRASENIA
            letreroConfirmadaEntrada(1);
        }
        if(<?php echo $_SESSION["semaforo"]?>==1)
        {
            //En el caso de que un JEFE quiera acceder al área de RRHH y lo tiene prohibido
            letreroConfirmadaEntrada(2);
        }
        function letreroConfirmadaEntrada(seleccion)
        {        
            var letrero= document.getElementsByClassName("letreroOK")[0];
            if(seleccion==1)
            {
                letrero.innerHTML="Lo siento. Ususario o contraseña INCORRECTOS"; 
            }
            if(seleccion==2)
            {
                letrero.innerHTML="Lo siento. Su ROL de JEFE no le permite el acceso al área de RRHH";   
            }
            letrero.style.paddingTop="10px";
            letrero.style.boxShadow= "rgb(150,150,150) 5px 5px 20px 10px";
            letrero.style.transitionDuration = "1s";
            letrero.style.marginTop="0px";

            document.addEventListener("mousemove",function(){
            let temporizador=setTimeout(function(){
                var letrero= document.getElementsByClassName("letreroOK")[0];
                letrero.style.transitionDuration = "1s";
                letrero.style.marginTop="-50px";
            },3500);
            })
            clearTimeout(temporizador);
        }
    </script>
    <?php $_SESSION["logeando"]=1; //Para el BORRADO IMPERIOSO DEL BUFFER 
          $_SESSION["semaforo"]=0; //Asi no se saca ningun letrero?>
</body>
</html>