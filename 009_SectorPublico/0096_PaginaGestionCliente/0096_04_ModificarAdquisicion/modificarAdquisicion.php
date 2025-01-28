<?php
session_start();   //Uso de la variable GLOBAL
    error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
    require "../../../005_Login/conexionPHP.php";
    require "../../../005_Login/cierreSesionesCookie.php";   //Gestion de cierres de sesion tras consumirse la COOKIE
    $rutaPaginaModificaCompra="location:../../../005_Login/";   //Se pone la ruta desde la página Modificar carrito de la compra
    cargaWebCookie($rutaPaginaModificaCompra);   //Se ejecuta la función de carga página según cookie desde la página Modificar carrito de la compra
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area de Modificación Adquisición del producto</title>
    <link rel="stylesheet" href="../../../009_SectorPublico/0096_PaginaGestionCliente/0096_04_ModificarAdquisicion/modificarAdquisicion.css">
    <script src="../../../009_SectorPublico/0096_PaginaGestionCliente/0096_04_ModificarAdquisicion/scriptsModificarAdquisicion.js"></script>
</head>
<body onload="cargarPagina()">
        <div class="letreroOK" style=
               "position:absolute;
                height: 30px; 
                text-align: center;
                color: white;
                margin-top:-40px;
                background-color: rgba(0, 0, 19, 0.89);
                box-shadow: none">
        </div>
    <header id="cabeceraPrincipal">
        <div id="iconoAdorno"><img src="../../../009_SectorPublico/0096_PaginaGestionCliente/0096_04_ModificarAdquisicion/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>      
        <?php if(isset($_SESSION["usuario"])) {?>
            <div id="areaSesion">
                <table style="width:100%">
                    <tr>
                        <div id="bienvenido"><strong><?php echo"Bienvenido/a: ".$_SESSION["usuario"];?></strong></div>
                        <a href="../../../005_Login/salidaPagina.php" id="cerrarSesion"><strong>CERRAR SESION</strong></a>
                    </tr>
                </table>
            </div>   
        <?php }?>
        <?php if(!isset($_SESSION["usuario"])) {?>
            <div id="areaSesion">
                <table style="width:100%">
                    <tr>
                        <div id="bienvenido" style="margin-top:15px"><strong>Bienvenido: Cliente Invitado</strong></div>                    
                        <div id="cerrarSesion"></div>
                    </tr>
                </table>
            </div>   
        <?php }?>
        <div class="VaciobotonesPrincipal">
            <a href="../../../007_Menus/0072_MenuJefesRRHH/loginJefesRRHH.php" class="areaPrivada"><img src="../../../009_SectorPublico/0096_PaginaGestionCliente/0096_04_ModificarAdquisicion/images/CANDADO.png" title="Area Privada" alt="Area Privada" width="40px" height="40px"></a>
            <a href="../../../009_SectorPublico/0096_PaginaGestionCliente/comprasCliente.php" class="areaPrivada"><img src="../../../009_SectorPublico/0096_PaginaGestionCliente/0096_04_ModificarAdquisicion/images/COMPRAS.png" title="Ver Carrito de Compra" alt="Ver Carrito de Compra" width="40px" height="40px"></a>
        </div>
        <table id="tabla">
            <tr class="cajaBotonera">
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento_lejos(1);?>'">INICIO</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento_lejos(2);?>'">HISTORIA</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento_lejos(3);?>'">PRODUCTOS</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento_lejos(4);?>'">SERVICIOS</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento_lejos(5);?>'">PROYECTOS</div>
                <div class="bloque_opciones" style="color: yellow" onclick="location.href='<?php echo ConexionPHP::IR_departamento_lejos(6);?>'">CLIENTES</div>
            </tr>
        </table>
        <div class="VaciobotonesPrincipal"></div>
    </header>  
    <div class="consulta" style="background-image: url(../../../009_SectorPublico/0096_PaginaGestionCliente/0096_04_ModificarAdquisicion/images/CLIENTE.jpg)">    
        <table class="seccionPrincipal">   <!-- PRIMERA BANDA COMO MOSTRADOR DE VENTAS -->
            <tr class="filaCompra" style="height:10px">
                <td class="celdaCompra" colspan="2">MODIFICAR CANTIDAD ADQUIRIDA</td>
                <td class="celdaCompra" colspan="3">FECHA ACTUAL: <?php echo date("D d-M-Y H:i:s");?></td>
            </tr>
        </table>
        <form action="../../../009_SectorPublico/0096_PaginaGestionCliente/consultasCliente.php" method="GET">
            <table class="seccionPrincipal">
                    <tr class="filaCompra">
                        <td class="celdaC"><strong>ID ARTÍCULO</strong></td>
                        <td class="celdaC"><strong>IMAGEN PRODUCTO</strong></td>
                        <td class="celdaC"><strong>NOMBRE ARTÍCULO</strong></td>
                        <td class="celdaC"><strong>DEPARTAMENTO</strong></td>
                        <td class="celdaC"><strong>CANTIDAD</strong></td>
                        <td class="celdaC"><strong>COSTE UNITARIO</strong></td>
                        <td class="celdaC"><strong>COSTE TOTAL</strong></td>        
                    </tr>
                    <br><br>
                    <tr class="filaVenta">
                        <td class="celdaV"><input type="text" name="identificadorVENTA" class="idTexto" value="<?php echo $_SESSION["IDC"];?>" disabled></td>
                        <td class="celdaV"><img class="img" src="<?php echo $_SESSION["IMAGENC"];?>"></td>
                        <td class="celdaV"><?php echo $_SESSION["NOMBREC"];?></td>
                        <td class="celdaV"><?php echo $_SESSION["DEPARTAMENTOC"];?></td>
                        <td class="celdaV"><?php echo $_SESSION["CANTIDADC"];?><br><input type="number" id="despliegue" onchange="cambiaStock(<?php echo $_SESSION['ALMACENSTOCK'];?>)" min="0" max="<?php echo $_SESSION['ALMACENSTOCK'];?>" name="cantidad" value="0" title="cantidad: 0, elimina el elemento del carrito. Otra cantidad, modifica lo establecido"><div><br></div><input type="submit" name="modificar" value="" class="pulsadorActualizar" title="Al pulsar se actualizará la cantidad y el precio cargados"><input type="submit" name="volver" value="" class="pulsadorVolver" title="Volver al carrito de la Compra"></td>
                        <td class="celdaV"><?php echo $_SESSION["COSTEUNITC"]."€";?></td>
                        <td class="celdaV"><?php echo $_SESSION["COSTETOTC"]."€";?></td>
                    </tr>
            </table>
            <br><br>
            <table class="seccionPrincipal">
                    <tr class="filaCompraStock">
                        <td class="celdaC"><strong>ID ARTÍCULO</strong></td>
                        <td class="celdaC"><strong>IMAGEN PRODUCTO</strong></td>
                        <td class="celdaC"><strong>NOMBRE ARTÍCULO</strong></td>
                        <td class="celdaC"><strong>DEPARTAMENTO</strong></td>
                        <td class="celdaC"><strong>EN STOCK</strong></td>
                        <td class="celdaC"><strong>DESCRICIÓN TÉCNICA</strong></td>     
                    </tr>
                    <br><br>
                    <tr class="filaVentaStock">
                        <td class="celdaS"><input type="text" class="idTextoStock" value="<?php echo $_SESSION["IDC"];?>" disabled></td>
                        <td class="celdaS"><img class="img" src="<?php echo $_SESSION["IMAGENC"];?>"></td>
                        <td class="celdaS"><?php echo $_SESSION["NOMBREC"];?></td>
                        <td class="celdaS"><?php echo $_SESSION["DEPARTAMENTOC"];?></td>
                        <td class="celdaS">EN STOCK<br><br><?php echo $_SESSION["ALMACENSTOCK"];?><br><br>TRAS COMPRA<br><br><input type="text" id="trasCompra" value="<?php echo $_SESSION["ALMACENSTOCK"];?>" disabled></td>                               
                        <td class="celdaS"><?php echo $_SESSION["DETALLESSTOCK"];?></td>
                    </tr>
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
    <script>letreroConfirmado(<?php echo($_SESSION["senalCarrito"])?>);</script>
    <?php $_SESSION["senalCarrito"]=0; //Reiniciar variable?>
</body>
</html>