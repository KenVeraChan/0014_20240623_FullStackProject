<?php
session_start();   //Uso de la variable GLOBAL
//error_reporting(0);   //Permite aceptar la variable $_SESSION["PUNTERO"] sin necesidad de definirla sin que de WARNING
include "consultasMostradorServicios.php";  //CARGA EL MOSTRADOR DE PRODUCTOS PRINCIPALMENTE
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal Corporación Sfer4D</title>
    <link rel="stylesheet" href="../../009_SectorPublico/0094_PaginaServicios/paginaServicios.css">
    <script src="../../009_SectorPublico/0094_PaginaServicios/scriptsServicios.js"></script>
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
        <div id="iconoAdorno"><img src="../../009_SectorPublico/0094_PaginaServicios/images/Sfer4D-IconoEmpresa.jpg" id="iconoEmpresa"></div>      
        <div class="VaciobotonesPrincipal">
            <a href="../../007_Menus/0072_MenuJefesRRHH/loginJefesRRHH.php" class="areaPrivada"><img src="../../009_SectorPublico/0094_PaginaServicios/images/CANDADO.png" title="Area Privada" alt="Area Privada" width="40px" height="40px"></a>
            <a href="../../009_SectorPublico/0096_PaginaGestionCliente/comprasCliente.php" class="areaPrivada"><img src="../../009_SectorPublico/0094_PaginaServicios/images/COMPRAS.png" title="Ver Carrito de Compra" alt="Ver Carrito de Compra" width="40px" height="40px"></a>
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
    <div class="consulta" style="background-image: url(../../009_SectorPublico/0094_PaginaServicios/images/SERVICIOS.jpg); background-size: 100% 100%;">    
    <form action="../../009_SectorPublico/0094_PaginaServicios/consultasServicios.php" method="GET">
        <table class="seccionPrincipal">   <!-- PRIMERA BANDA COMO MOSTRADOR DE VENTAS -->
                <td class="noticia">
                    <table class="tablaInterna">
                        <tr class="fila">
                            <td><img class="imgBloques" src="servicesCategory/<?php echo extraccionCategoriaServicios(1);?>"></td>
                        </tr>
                        <tr class="fila">
                            <td><div style="margin-left:2%">ASTRONOMIA</div></td>
                        </tr>
                        <tr class="fila">
                            <td><p class="parrafo" style="visibility:hidden"><?php echo extraeDetallesServicios("ASTRONOMIA")?></p></td>
                        </tr>
                        <tr class="fila">
                            <td><input type="submit" class="acceder" name="ASTRONOMIA" value="CATALOGO"></td>
                        </tr>
                    </table>
                </td>
                <td class="noticia">
                    <table class="tablaInterna">
                        <tr class="fila">
                            <td><img class="imgBloques" src="servicesCategory/<?php echo extraccionCategoriaServicios(2);?>"></td>
                        </tr>
                        <tr class="fila">
                            <td><div style="margin-left:2%">AUTOMATIZACION</div></td>
                        </tr>
                        <tr class="fila">
                            <td><p class="parrafo" style="visibility:hidden"><?php echo extraeDetallesServicios("AUTOMATIZACION")?></p></td>
                        </tr>
                        <tr class="fila">
                            <td><input type="submit" class="acceder" name="AUTOMATIZACION" value="CATALOGO"></td>
                        </tr>
                    </table>    
                </td>
                <td class="noticia">
                    <table class="tablaInterna">
                        <tr class="fila">
                            <td><img class="imgBloques" src="servicesCategory/<?php echo extraccionCategoriaServicios(3);?>"></td>
                        </tr>
                        <tr class="fila">
                            <td><div style="margin-left:2%">ECOLOGIA</div></td>
                        </tr>
                        <tr class="fila">
                            <td><p class="parrafo" style="visibility:hidden"><?php echo extraeDetallesServicios("ECOLOGIA")?></p></td>
                        </tr>
                        <tr class="fila">
                            <td><input type="submit" class="acceder" name="ECOLOGIA" value="CATALOGO"></td>
                        </tr>
                    </table> 
                </td>
                <td class="noticia">
                    <table class="tablaInterna">
                        <tr class="fila">
                            <td><img class="imgBloques" src="servicesCategory/<?php echo extraccionCategoriaServicios(4);?>"></td>
                        </tr>
                        <tr class="fila">
                            <td><div style="margin-left:2%">INFRAESTRUCTURAS</div></td>
                        </tr>
                        <tr class="fila">
                            <td><p class="parrafo" style="visibility:hidden"><?php echo extraeDetallesServicios("INFRAESTRUCTURAS")?></p></td>
                        </tr>
                        <tr class="fila">
                            <td><input type="submit" class="acceder" name="INFRAESTRUCTURAS" value="CATALOGO"></td>
                        </tr>
                    </table>  
                </td>
                <td class="noticia">
                    <table class="tablaInterna">
                        <tr class="fila">
                            <td><img class="imgBloques" src="servicesCategory/<?php echo extraccionCategoriaServicios(5);?>"></td>
                        </tr>
                        <tr class="fila">
                            <td><div style="margin-left:2%">MEDICINA</div></td>
                        </tr>
                        <tr class="fila">
                            <td><p class="parrafo" style="visibility:hidden"><?php echo extraeDetallesServicios("MEDICINA")?></p></td>
                        </tr>
                        <tr class="fila">
                            <td><input type="submit" class="acceder" name="MEDICINA" value="CATALOGO"></td>
                        </tr>
                    </table>  
                </td>
                <td class="noticia">
                    <table class="tablaInterna">
                        <tr class="fila">
                            <td><img class="imgBloques" src="servicesCategory/<?php echo extraccionCategoriaServicios(6);?>"></td>
                        </tr>
                        <tr class="fila">
                            <td><div style="margin-left:2%">OCEANOGRAFIA</div></td>
                        </tr>
                        <tr class="fila">
                            <td><p class="parrafo" style="visibility:hidden"><?php echo extraeDetallesServicios("OCEANOGRAFIA")?></p></td>
                        </tr>
                        <tr class="fila">
                            <td><input type="submit" class="acceder" name="OCEANOGRAFIA" value="CATALOGO"></td>
                        </tr>
                    </table>  
                </td>
                <td class="noticia">
                    <table class="tablaInterna">
                        <tr class="fila">
                            <td><img class="imgBloques" src="servicesCategory/<?php echo extraccionCategoriaServicios(7);?>"></td>
                        </tr>
                        <tr class="fila">
                            <td><div style="margin-left:2%">TELECOMUNICACIONES</div></td>
                        </tr>
                        <tr class="fila">
                            <td><p class="parrafo" style="visibility:hidden"><?php echo extraeDetallesServicios("TELECOMUNICACIONES")?></p></td>
                        </tr>
                        <tr class="fila">
                            <td><input type="submit" class="acceder" name="TELECOMUNICACIONES" value="CATALOGO"></td>
                        </tr>
                    </table>  
                </td>
                <td class="noticia">
                    <table class="tablaInterna">
                        <tr class="fila">
                            <td><img class="imgBloques" src="servicesCategory/<?php echo extraccionCategoriaServicios(8);?>"></td>
                        </tr>
                        <tr class="fila">
                            <td><div style="margin-left:2%">EDUCACION</div></td>
                        </tr>
                        <tr class="fila">
                            <td><p class="parrafo" style="visibility:hidden"><?php echo extraeDetallesServicios("EDUCACION")?></p></td>
                        </tr>
                        <tr class="fila">
                            <td><input type="submit" class="acceder" name="EDUCACION" value="CATALOGO"></td>
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
                            <td><img class="imgBloquesDET" src="servicesCategory/<?php echo($_SESSION["SECTORSERV"][0]);?>.png"></td>
                        </tr>
                        <tr class="filaDET">
                            <td><div style="margin-left:2%"><?php echo($_SESSION["SECTORSERV"][0]);?></div></td>
                        </tr>
                        <?php $i=0; for($i=0;$i<$_SESSION["MAX"];$i++)
                                    {
                                        if(!empty($_SESSION["NOMBRESERV"][$i]))  //Comprueba si la variable de la celda del ARRAY NO está vacío
                                        {
                                        ?>
                        <tr class="filaDET">
                            <td>
                                <p class="contenedorEnlace">
                                    <a href="../../009_SectorPublico/0094_PaginaServicios/consultasServicios.php?ID=<?php echo $_SESSION["IDSERV"][$i];?>" class="botonAc">
                                        <?php echo $_SESSION["NOMBRESERV"][$i];?>
                                    </a>
                                </p>    
                            </td>
                        </tr>
                                <?php }
                                }; ?>
                    </table>
                </td>
                <td class="noticiaDET">
                    <form action="../../009_SectorPublico/0096_PaginaGestionCliente/consultasCliente.php" method="GET">
                        <table class="tablaInternaDET">
                            <tr class="filaDET">
                                <td>
                                    <br><img class="imgBloquesDES" src="<?php echo $_SESSION["DESTINOSERV"].$_SESSION["NOMBRE_SERV"];?>" alt="Imagen servicio">
                                </td>
                            </tr>
                            <tr class="filaDET">
                                <td><div name="idPEDIDO" style="margin-left:2%"><br><br><strong>ID:<br></strong><?php echo $_SESSION["ID_SERV"];?><br></div></td>
                            </tr>
                            <tr class="filaDET">
                                <td><div name="nombrePEDIDO" style="margin-left:2%"><br><strong>NOMBRE:<br></strong><?php echo substr($_SESSION["NOMBRE_SERV"],0,-4);?><br><br></div></td>
                            </tr>
                            <tr class="filaDET">
                                <td><div name="stockPEDIDO" style="margin-left:2%"><strong>STOCK DISPONIBLE:<br></strong><?php echo $_SESSION["STOCK_SERV"];?><br><br></div></td>
                            </tr>
                            <tr class="filaDET">
                                <td><div name="costePEDIDO" style="margin-left:2%"><strong>COSTE UNIDAD:<br></strong><?php echo $_SESSION["COSTE_SERV"];?><br><br></div></td>
                            </tr>
                            <tr class="filaDET">
                                <td><div name="detallePEDIDO" style="margin-left:2%"><strong>DETALLES PRODUCTO:<br></strong><?php echo $_SESSION["DETALLES_SERV"];?><br><br></div></td>
                            </tr>
                            <tr class="filaDET">
                                <td>
                                    <br><br><input type="submit" class="comprar" name="comprar" value="<?php echo $_SESSION["ID_SERV"];?>" title="Accionar para añadir a la cesta">
                                </td>
                            </tr>
                            <tr class="filaDET">
                                <td>
                                    <div style="margin-left:2%"><strong class="cajaCantidad">CANTIDAD</strong></div>
                                    <input type="number" class="despliegue" min="1" max="9999" name="cantidad">
                                </td>
                            </tr>
                        </table>
                    </form>   
                </td>
            </table>
    <?php } ?>
    <?php  if($_SESSION["concesion"]==0){ ?>    <!-- EN EL CASO DE QUE SE HAYA ACCIONADO CUALQUIER BOTON DEL MOSTRADOR-->
        <!-- NO MUESTRA NADA AL NO ENCONTRARSE NADA -->
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
    <script>letreroConfirmado(<?php echo($_SESSION["senalImagen"])?>);</script>
    <?php $_SESSION["senalImagen"]=0; //Reiniciar variable ?> 
</body>
</html>