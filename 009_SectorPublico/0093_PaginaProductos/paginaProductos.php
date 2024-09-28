<?php
session_start();   //Uso de la variable GLOBAL
error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
$_SESSION["concesion"];  //Semaforo de concesion de activacion del catalogo
include "consultasMostrador.php";  //CARGA EL MOSTRADOR DE PRODUCTOS PRINCIPALMENTE
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal Corporación Sfer4D</title>
    <link rel="stylesheet" href="../../009_SectorPublico/0093_PaginaProductos/paginaProductos.css">
    <script src="../../009_SectorPublico/0093_PaginaProductos/scriptsProductos.js"></script>
</head>
<body onload="cargarPagina()">
    <header id="cabeceraPrincipal">
        <div id="iconoAdorno"><img src="../../009_SectorPublico/0093_PaginaProductos/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>      
        <div class="VaciobotonesPrincipal">
            <a href="../../007_Menus/0072_MenuJefesRRHH/loginJefesRRHH.php" class="areaPrivada"><img src="../../009_SectorPublico/0093_PaginaProductos/images/CANDADO.png" title="Area Privada" alt="Area Privada" width="40px" height="40px"></a>
            <a href="" class="areaPrivada"><img src="../../009_SectorPublico/0093_PaginaProductos/images/COMPRAS.png" title="Ver Carrito de Compra" alt="Ver Carrito de Compra" width="40px" height="40px"></a>
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
    <div class="consulta" style="background-image: url(../../009_SectorPublico/0093_PaginaProductos/images/PRODUCTOS.jpg); background-size: 100% 100%;">    
    <form action="../../009_SectorPublico/0093_PaginaProductos/consultasProductos.php" method="GET">
        <table class="seccionPrincipal">   <!-- PRIMERA BANDA COMO MOSTRADOR DE VENTAS -->
                <td class="noticia">
                    <table class="tablaInterna">
                        <tr class="fila">
                            <td><img class="imgBloques" src="productCategory/<?php echo extraccionCategoria(1);?>"></td>
                        </tr>
                        <tr class="fila">
                            <td><div style="margin-left:2%">CONSTRUCCION</div></td>
                        </tr>
                        <tr class="fila">
                            <td><p class="parrafo"></p></td>
                        </tr>
                        <tr class="fila">
                            <td><input type="submit" class="acceder" name="CONSTRUCCION" value="CATALOGO"></td>
                        </tr>
                    </table>
                </td>
                <td class="noticia">
                    <table class="tablaInterna">
                        <tr class="fila">
                            <td><img class="imgBloques" src="productCategory/<?php echo extraccionCategoria(2);?>"></td>
                        </tr>
                        <tr class="fila">
                            <td><div style="margin-left:2%">INDUSTRIA</div></td>
                        </tr>
                        <tr class="fila">
                            <td><p class="parrafo"></p></td>
                        </tr>
                        <tr class="fila">
                            <td><input type="submit" class="acceder" name="INDUSTRIA" value="CATALOGO"></td>
                        </tr>
                    </table>    
                </td>
                <td class="noticia">
                    <table class="tablaInterna">
                        <tr class="fila">
                            <td><img class="imgBloques" src="productCategory/<?php echo extraccionCategoria(3);?>"></td>
                        </tr>
                        <tr class="fila">
                            <td><div style="margin-left:2%">BIOINGENIERÍA</div></td>
                        </tr>
                        <tr class="fila">
                            <td><p class="parrafo"></p></td>
                        </tr>
                        <tr class="fila">
                            <td><input type="submit" class="acceder" name="BIOINGENIERIA" value="CATALOGO"></td>
                        </tr>
                    </table> 
                </td>
                <td class="noticia">
                    <table class="tablaInterna">
                        <tr class="fila">
                            <td><img class="imgBloques" src="productCategory/<?php echo extraccionCategoria(4);?>"></td>
                        </tr>
                        <tr class="fila">
                            <td><div style="margin-left:2%">AEROESPACIAL</div></td>
                        </tr>
                        <tr class="fila">
                            <td><p class="parrafo"></p></td>
                        </tr>
                        <tr class="fila">
                            <td><input type="submit" class="acceder" name="AEROESPACIAL" value="CATALOGO"></td>
                        </tr>
                    </table>  
                </td>
        </table>
    </form>
    <?php  if($_SESSION["concesion"]==1){ ?>    <!-- EN EL CASO DE QUE SE HAYA ACCIONADO CUALQUIER BOTON DEL MOSTRADOR-->
            <table class="seccionDET">   <!-- SEGUNDA BANDA DE DETALLE DE LAS VENTAS ELEGIDAS -->        
                <td class="noticiaDET">
                    <table class="tablaInternaDET">
                        <tr class="filaDET">
                            <td><img class="imgBloquesDET" src="productCategory/<?php echo($_SESSION["SECTORPROD"][0]);?>.png"></td>
                        </tr>
                        <tr class="filaDET">
                            <td><div style="margin-left:2%"><?php echo($_SESSION["SECTORPROD"][0]);?></div></td>
                        </tr>
                        <?php $i=0; for($i=0;$i<count($_SESSION["NOMBREPROD"]);$i++)
                                    {
                                        if(!empty($_SESSION["NOMBREPROD"][$i]))  //Comprueba si la variable de la celda del ARRAY NO está vacío
                                        {
                                        ?>
                        <tr class="filaDET">
                            <td>
                                <p class="contenedorEnlace">
                                    <a href="../../009_SectorPublico/0093_PaginaProductos/consultasProductos.php?ID=<?php echo $_SESSION["IDPROD"][$i];?>" class="botonAc">
                                        <?php echo $_SESSION["NOMBREPROD"][$i];?>
                                    </a>
                                </p>    
                            </td>
                        </tr>
                                <?php }
                                }; ?>
                    </table>
                </td>
                <td class="noticiaDET">
                    <table class="tablaInternaDET">
                        <tr class="filaDET">
                            <td><img class="imgBloquesDET" src="images/DINERO.png"></td>
                        </tr>
                        <tr class="filaDET">
                            <td><div style="margin-left:2%">Gestión del capital</div></td>
                        </tr>
                        <tr class="filaDET">
                            <td><p class="parrafoDET"></p></td>
                        </tr>
                    </table>   
                </td>
            </table>
    <?php } ?>
    <?php  if($_SESSION["concesion"]==0){ ?>  <!-- EN EL CASO DE QUE NO SE HAYA ACCIONADO CUALQUIER BOTON DEL MOSTRADOR-->
            <table class="seccionDET">   <!-- SEGUNDA BANDA DE DETALLE DE LAS VENTAS ELEGIDAS -->        
                <td class="noticiaDET">
                    <table class="tablaInternaDET">
                        <tr class="filaDET">
                            <td><img class="imgBloquesDET" src="productCategory/CONSTRUCCION.png"></td>
                        </tr>
                        <tr class="filaDET">
                            <td><div style="margin-left:2%">CONSTRUCCION</div></td>
                        </tr>
                        <tr class="filaDET">
                            <td>
                                <input type="submit" class="botonAc" value="ROBOT" name="ROBOT">
                            </td>
                        </tr>
                    </table>
                </td>
                <td class="noticiaDET">
                    <table class="tablaInternaDET">
                        <tr class="filaDET">
                            <td><img class="imgBloquesDET" src="images/DINERO.png"></td>
                        </tr>
                        <tr class="filaDET">
                            <td><div style="margin-left:2%">Gestión del capital</div></td>
                        </tr>
                        <tr class="filaDET">
                            <td><p class="parrafoDET"></p></td>
                        </tr>
                    </table>   
                </td>
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
</body>
</html>
<?php echo  "Datos leidos del servidor: "."<br>".
            $_SESSION["ID_PROD"]."<br>".
            $_SESSION["NOMBRE_PROD"]."<br>".
            $_SESSION["SECTOR_PROD"]."<br>".
            $_SESSION["STOCK_PROD"]."<br>".
            $_SESSION["COSTE_PROD"]."<br>".
            $_SESSION["DETALLES_PROD"] 
?>