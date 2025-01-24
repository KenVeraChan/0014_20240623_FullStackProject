<?php
session_start();  //para el gestionado del logeo y los carteles de intento de entrar
//AL ESTAR YA REGISTRADO COMO CLIENTE DENTRO DEL MENU DE CLIENTES SE ACTIVA EL LOGEO DE CLIENTE PARA LUEGO DETECTARLO EN LA SALIDA PAGINA
$_SESSION["loginJEFES"]=0;  //Se corrobora que el sector de JEFES no es donde se intenta ENTRAR en el LOGIN
$_SESSION["loginRRHH"]=0;   //Se identifica que no ha sido un individuo del sector de RRHH
$_SESSION["loginCLIENTES"]=1;   //Se identifica que SI ha sido un individuo del sector de CLIENTES
if(isset($_SESSION["usuario"]) && !empty($_SESSION["usuario"]) && $_SESSION["usuario"]!="")
{
    //SI EL USUARIO NO HA CERRADO SESSIÓN NO SE LE PERMITIRÁ ENTRAR EN RRHH O JEFES COMO CLIENTE ACTIVO
    $_SESSION["entradaLogin"]=2;   //Para hacer referencia que se intentó entrar en el LOGIN DE CLIENTES  
    header("Location:../../007_Menus/0072_MenuJefesRRHH/loginJefesRRHHClientesCheck.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN Clientes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- ESTILOS CSS PARA TRAER DE LA URL LOS ICONOS DE LAS REDES SOCIALES -->
    <link rel="stylesheet" href="loginCLIENTES.css">
    <script src="loginCLIENTES.js"></script>
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
        <div id="iconoAdorno"><img src="../0053_LoginCLIENTES/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>     
        <div class="VaciobotonesPrincipal"></div>
            <form action="../../005_Login/compruebaLogin.php" method="POST" id="formularioLogin">
                <table id="tablaLogin">
                    <tr id="izqTitulo" style="color: rgb(204, 0, 255)">AREA DE CLIENTES</tr>
                    <tr><td class="izq"></td></tr>
                    <tr><td class="izq" style="color: rgb(204, 0, 255);">LOGIN: </td><td class="der"><input type="text" class="cajaForm" name="login" placeholder="Usuario"></td></tr>
                    <tr><td class="izq"></td></tr>
                    <tr><td class="izq" style="color: rgb(204, 0, 255);">PASSWORD: </td><td class="der"><input type="password" class="cajaForm" name="password" placeholder="Contraseña"></td></tr>
                    <tr><td class="izq"></td></tr>
                    <tr id="botoneslog">
                        <td><input type="submit" class="logear" name="entrar" value="ENTRAR"></td>
                        <td><input type="submit" class="logear" name="registrar" value="REGISTRAR"></td>
                        <td><a href="../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.php" name="volver" class="returned"><strong>VOLVER</strong></a></td>
                    </tr>
                </table>
            </form> 
                <table id="indicaciones">
                    <tr><td class="der" style="color: rgb(204, 0, 255)">BIENVENIDO CLIENTE</td></tr>
                    <tr><td class="der"></td></tr>
                    <tr><td class="der" style="color: rgb(204, 0, 255);">Si aun no es cliente, regístrese y empiece a disfrutar de las ventajas de tener al alcance toda la tecnología punta</td></tr>
                    <tr><td class="der" style="color: rgb(204, 0, 255);">Si ya es cliente disfrute de las ventajas actuales de compras de productos, servicios y proyectos</td></tr>
                    <tr><td class="der"></td></tr>
                </table>
        <img id="imagenPortada" src="../0053_LoginCLIENTES/images/VENTAS.jpg" alt="Imagen clientes">    
    </header>
    <div class="piePagina">
        <footer id="piePrincipal">
            <div id="redesSociales">  <!-- TRAYENDO LOS ICONOS DE LAS REDES SOCIALES Y DÁNDOLES DECOARION -->
                <i class="fa fa-apple" id="apple"></i>
                <i class="fa fa-twitter-square" id="twitter"></i>
                <i class="fa fa-github-square" id="github"></i>
                <i class="fa fa-facebook-square" id="facebook"></i> 
                <i class="fa fa-youtube-square" id="youtube"></i> 
                <i class="fa fa-linkedin-square" id="linkedin"></i> 
                <i class="fa fa-whatsapp" id="whatsapp"></i> 
                <i class="fa fa-instagram" id="instagram"></i> 
                <i class="fa fa-map-marker" id="mapsg"></i>
            </div>
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
        if(<?php echo $_SESSION["logeando"];?>==0)
        {
            //En el caso de que no esten bien escritas el USUARIO o la CONTRASENIA
            letreroConfirmadaEntrada(1);
        }
        if(<?php echo $_SESSION["activadorPersonal"];?>==3)
        {
            //En el caso de que el CLIENTE haya decidido eliminar su propia cuenta
            letreroConfirmadaEntrada(3);     
        }
        function letreroConfirmadaEntrada(seleccion)
        {        
            var letrero= document.getElementsByClassName("letreroOK")[0];
            if(seleccion==1)
            {
                letrero.innerHTML="Lo siento. Usuario o contraseña del cliente INCORRECTOS"; 
            }
            if(seleccion==3)
            {
                letrero.innerHTML="SU CUENTA PERSONAL HA SIDO ELIMINADA!";   
            }
            if(seleccion==1 || seleccion==3)
            {
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
        }
    </script>
    <?php $_SESSION["logeando"]=1; //Para el BORRADO IMPERIOSO DEL BUFFER 
          $_SESSION["semaforo"]=0; //Asi no se saca ningun letrero?>
</body>
</html>