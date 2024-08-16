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
                    <tr><div>AREA DE RECURSOS HUMANOS</div></tr>
                    <tr><br></tr>
                    <tr><td class="izq">Login: </td><td class="der"><input type="text" name="login" placeholder="Usuario"></td></tr>
                    <tr><td class="izq">Password: </td><td class="der"><input type="password" name="password" placeholder="Contraseña"></td></tr>
                    <tr><td><input type="submit" class="logear" name="enviar" value="ENTRAR"></td></tr>
                </table>
            </form> 
        <img id="imagenPortada" src="../0051_LoginRRHH/images/SERVIDOR.jpg" alt="Imagen servidor">    
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
        if(<?php session_start(); echo($_SESSION["logeando"])?>==0)
        {
            letreroConfirmadaEntrada();
        }
        function letreroConfirmadaEntrada()
        {
            var letrero= document.getElementsByClassName("letreroOK")[0];
            letrero.innerHTML="Lo siento. Ususario o contraseña INCORRECTOS";
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
    <?php $_SESSION["logeando"]=1; //Para el BORRADO IMPERIOSO DEL BUFFER ?>
</body>
</html>