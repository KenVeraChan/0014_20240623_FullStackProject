<?php
session_start();
$_SESSION["loginJEFES"]=0;  //Se corrobora que el sector de JEFES no es donde se intenta ENTRAR en el LOGIN
$_SESSION["loginRRHH"]=0;   //Se identifica que no ha sido un individuo del sector de RRHH
$_SESSION["loginCLIENTES"]=1;   //Se identifica que SI ha sido un individuo del sector de CLIENTES

if(!isset($_SESSION["usuario"]))
{
    //SI HA CERRADO LA SESIÓN ENTONCES SE LE DEJARÁ ENTRAR EN ESTA PAGINA WEB
}
if(isset($_SESSION["usuario"]))
{
    //SI EL USUARIO NO HA CERRADO SESSIÓN ENTRARÁ EN EL MENÚ DE OPCIONES DEL PROPIO CLIENTE
    header("Location:../../007_Menus/0074_MenuOpCLIENTES/OpCLIENTES.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN Jefes</title>
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
                        <td><input type="submit" class="logear" name="enviar" value="ENTRAR"></td>
                        <td><input type="submit" class="logear" name="registrar" value="REGISTRAR"></td>
                        <td><a href="../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.php" name="enviar" class="returned"><strong>VOLVER</strong></a></td>
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
                letrero.innerHTML="Lo siento. Ususario o contraseña del cliente INCORRECTOS"; 
            }
            if(seleccion==2)
            {
                letrero.innerHTML="BIEN DISEÑADO TODO OKEY";   
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