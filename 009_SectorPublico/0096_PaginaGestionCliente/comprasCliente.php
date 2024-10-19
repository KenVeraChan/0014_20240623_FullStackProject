<?php
session_start();   //Uso de la variable GLOBAL
error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
require "../../005_Login/conexionPHP.php";
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
        <div class="letreroOK" style=
               "position:absolute;
                width:100%; 
                height: 30px; 
                text-align: center;
                color: white;
                margin-top:-40px;
                background-color: rgba(0, 0, 19, 0.89);
                box-shadow: none">
        </div>
    <header id="cabeceraPrincipal">
        <div id="iconoAdorno"><img src="../../009_SectorPublico/0096_PaginaGestionCliente/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>      
        <div class="VaciobotonesPrincipal">
            <a href="../../007_Menus/0072_MenuJefesRRHH/loginJefesRRHH.php" class="areaPrivada"><img src="../../009_SectorPublico/0093_PaginaProductos/images/CANDADO.png" title="Area Privada" alt="Area Privada" width="40px" height="40px"></a>
            <a href="../../009_SectorPublico/0096_PaginaGestionCliente/comprasCliente.php" class="areaPrivada"><img src="../../009_SectorPublico/0093_PaginaProductos/images/COMPRAS.png" title="Ver Carrito de Compra" alt="Ver Carrito de Compra" width="40px" height="40px"></a>
        </div>
        <table id="tabla">
            <tr class="cajaBotonera">
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento(1);?>'">INICIO</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento(2);?>'">HISTORIA</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento(3);?>'">PRODUCTOS</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento(4);?>'">SERVICIOS</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento(5);?>'">PROYECTOS</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento(6);?>'">CLIENTES</div>
            </tr>
        </table>
        <div class="VaciobotonesPrincipal"></div>
    </header>  
    <div class="consulta" style="background-image: url(../../009_SectorPublico/0096_PaginaGestionCliente/images/CLIENTE.jpg); background-size: 100% 100%;">    
        <form action="../../009_SectorPublico/0096_PaginaGestionCliente/consultasCliente.php" method="GET">
            <table class="seccionPrincipal">   <!-- PRIMERA BANDA COMO MOSTRADOR DE VENTAS -->
                <tr class="filaCompra" style="height:10px">
                    <td class="celdaCompra" colspan="2">CARRITO DE LA COMPRA</td>
                    <td class="celdaCompra" colspan="3">FECHA ACTUAL: <?php echo date("D d-M-Y H:i:s");?></td>
                    <td class="celdaCompra" colspan="1"><input type="submit" class="pulsadorDescarga" name="descargar"></td>
                </tr>
            </table>
        </form>
        <?php if($_SESSION["senalCarrito"]==2){?>
            <table class="seccionPrincipal">
                    <tr class="filaCompra">
                        <td>ID ARTÍCULO</td>
                        <td>NOMBRE ARTÍCULO</td>
                        <td>DEPARTAMENTO</td>
                        <td>CANTIDAD</td>
                        <td>COSTE UNITARIO</td>
                        <td>COSTE TOTAL</td>        
                    </tr>
                <?php for($i=0;$i<count($_SESSION["IDC"]);$i++){ ?>
                    <tr class="filaCompra">
                        <td><?php echo $_SESSION["IDC"][$i];?></td>
                        <td><?php echo $_SESSION["NOMBREC"][$i];?></td>
                        <td><?php echo $_SESSION["DEPARTAMENTOC"][$i];?></td>
                        <td><?php echo $_SESSION["CANTIDADC"][$i];?></td>
                        <td><?php echo $_SESSION["COSTEUNITC"][$i];?></td>
                        <td><?php echo $_SESSION["COSTETOTC"][$i];?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>
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
    <script>letreroConfirmado(<?php echo($_SESSION["senalCarrito"])?>);</script>
    <?php $_SESSION["senalCarrito"]=0; //Reiniciar variable ?> 
</body>
</html>