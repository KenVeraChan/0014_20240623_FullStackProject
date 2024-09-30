<?php
session_start();   //Uso de la variable GLOBAL
error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
$_SESSION["concesion"];  //Semaforo de concesion de activacion del catalogo
include "consultasCliente.php";  //CARGA EL MOSTRADOR DE PRODUCTOS PRINCIPALMENTE
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area de las compras del Cliente</title>
    <link rel="stylesheet" href="../../009_SectorPublico/0096_PaginaGestionCliente/comprasCliente.css">
    <script src="../../009_SectorPublico/0096_PaginaGestionCliente/scriptsComprasCliente.js"></script>
</head>
<body onload="cargarPagina()">
    <header id="cabeceraPrincipal">
        <div id="iconoAdorno"><img src="../../009_SectorPublico/0096_PaginaGestionCliente/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>      
        <div class="VaciobotonesPrincipal">
            <a href="../../007_Menus/0072_MenuJefesRRHH/loginJefesRRHH.php" class="areaPrivada"><img src="../../009_SectorPublico/0093_PaginaProductos/images/CANDADO.png" title="Area Privada" alt="Area Privada" width="40px" height="40px"></a>
            <a href="../../009_SectorPublico/0096_PaginaGestionCliente/comprasCliente.php" class="areaPrivada"><img src="../../009_SectorPublico/0093_PaginaProductos/images/COMPRAS.png" title="Ver Carrito de Compra" alt="Ver Carrito de Compra" width="40px" height="40px"></a>
        </div>
        <table id="tabla">
            <tr class="cajaBotonera">
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='../../009_SectorPublico/0091_PaginaPrincipal/paginaPrincipal.php'">INICIO</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='../../009_SectorPublico/0092_PaginaHistoria/paginaHistoria.php'">HISTORIA</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='../../009_SectorPublico/0093_PaginaProductos/paginaProductos.php'">PRODUCTOS</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='../../009_SectorPublico/0094_PaginaServicios/paginaServicios.php'">SERVICIOS</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='../../004_Eliminacion/eliminacionPHP.php'">PROYECTOS</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='../../005_Login/0053_LoginCLIENTES/loginCLIENTES.php'">CLIENTES</div>
            </tr>
        </table>
        <div class="VaciobotonesPrincipal"></div>
    </header>  
    <div class="consulta" style="background-image: url(../../009_SectorPublico/0096_PaginaGestionCliente/images/CLIENTE.jpg); background-size: 100% 100%;">    
    <form action="../../009_SectorPublico/0093_PaginaProductos/consultasClientes.php" method="GET">
        <table class="seccionPrincipal">   <!-- PRIMERA BANDA COMO MOSTRADOR DE VENTAS -->

        </table>
    </form>
    </div>
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
</body>
</html>