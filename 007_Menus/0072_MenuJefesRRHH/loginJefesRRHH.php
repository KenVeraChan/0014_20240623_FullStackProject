<?php
session_start(); 
if(!isset($_SESSION["usuario"]))
{
    //SI HA CERRADO LA SESIÓN ENTONCES SE LE PERMITIRÁ ACCEDER A RRHH O A JEFES
    
}
if(isset($_SESSION["usuario"]))
{
    //SI EL USUARIO NO HA CERRADO SESSIÓN NO SE LE PERMITIRÁ ENTRAR EN RRHH O JEFES COMO CLIENTE ACTIVO
    $_SESSION["privado"]=1;   //Para que se active el letrero de aviso de zona privada
    header("Location:../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area privada de la gestión Empresarial</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- ESTILOS CSS PARA TRAER DE LA URL LOS ICONOS DE LAS REDES SOCIALES -->
    <link rel="stylesheet" href="loginJefesRRHH.css">
    <script src="loginJefesRRHH.js"></script>
</head>
<body onload="cargarPagina()">
    <header id="cabeceraPrincipal">
        <table id="tablaBotones">
            <tr class="filaBoton">
                <td>
                    <div id="eleccionesJEFE" onclick="location.href='../../005_Login/0052_LoginJEFES/loginJEFES.php'">JEFES</div>
                </td>
                <td>
                    <div id="eleccionesRRHH" onclick="location.href='../../005_Login/0051_LoginRRHH/loginRRHH.php'">RR.HH.</div>
                </td>
                <td>
                    <div id="eleccionesVOLVER" onclick="location.href='../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.php'">VOLVER</div>
                </td>
            </tr>
        </table>
        <div id="iconoAdorno"><img class="imagenIcono" src="../../007_Menus/0072_MenuJefesRRHH/images/Sfer4D-IconoEmpresa.jpg" alt="iconoEmpresa"></div>     
        <div class="VaciobotonesPrincipal"></div>
        <img id="imagenPortada" src="../../007_Menus/0072_MenuJefesRRHH/images/SERVIDOR.jpg" alt="Imagen servidor">    
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
</body>
</html>